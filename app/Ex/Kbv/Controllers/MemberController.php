<?php

namespace App\Ex\Kbv\Controllers;

use App\Ex\Kbv\Controllers\KbvController;

use App\Ex\Kbv\Model\KbvMission;

use App\Seed\Member;
use App\Basic\Sys\Domain;
use App\Basic\Sys\User;
use App\Basic\Sys\City;
use App\Issuer\Card;
use App\Issuer\Config;
use App\Issuer\Catalogue;
use App\Issuer;
use App\Phone;
use App\Ex\Kbv\Helper;
use App\Seed\Transaction;
use App\Seed\BankAccount;
use App\Ex\Kbv\Model\KbvSetting;

use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;
use DB;
use PHPExcel;
use PHPExcel_IOFactory;
use App\Issuer\MemberCurrency;
use Carbon\Carbon;
class MemberController extends KbvController
{

	function index(Request $req)
	{
		if (!$this->access())
			return redirect('/');

		$search      = $this->se();
		$query       = $this->query($search);
		$total       = $query->count();

		$points      = $query->sum('redeempoint');

		$accumulates = $query->sum('accumulate');

		$bdays       = Member::where('issuer_id', $this->issuer()->id)
			->whereNotNull('area')
			->where(DB::raw('DAY(birthday)'), date('d'))
			->where(DB::raw('MONTH(birthday)'), date('m'))
			->count();

		//$bdays  = 100;
		//session(['query_members'  => $query->orderBy('created_at', 'desc')->get()]);

		$query  = $query->orderBy('created_at', 'desc')->paginate(6);

		$member = $query->map(function ($m) {
			$phone  = Phone::where('user_id', $m->user_id)->first();
			$u      = $m->user();
			$m->national =  $phone ? $phone->national : '';
			$m->number   =  $phone ? $phone->number : '';
			$m->city     =  City::find($m->area) ?  City::find($m->area)->name : '';
			$m->xu = 0;

			$memcur = MemberCurrency::where([
				['currency_id', 1],
				['member_id', $m->id],
			])->first();
			if ( $memcur )
				$m->xu = $memcur->redeempoint;

			return $m;
		});

		$cities = City::where('country', 'VN')->get();

		return view('ex.kbv.member', compact(
			'member',
			'search',
			'query',
			'cities',
			'total',
			'points',
			'accumulates',
			'bdays'
		));
	}

	public function configPointRef ()
	{
		$config = Config::where("issuer_id", 1)->first();
		if ( !$config ) {
			$config = new Config();
			$config->presenter_point = 10;
			$config->presentee_point = 5;
			$config->issuer_id = 1;
		}
		return view('ex.kbv.member.point.config', compact('config'));
	}

	public function configPointRefUpdate( Request $req )
	{
			if ( !$req->id ) {
				$config = new Config();
			} else {
				$config = Config::find($req->id);
			}
			$config->presenter_point = $req->presenter_point;
			$config->presentee_point = $req->presentee_point;

			$config->save();
			return redirect()->back()
			->with([
				'flag' => 'susscess',
				'message' => 'Cấu hình thưởng điểm thành công'
			]);
	}

	public function player($id){
			$mem  = Member::find($id);
			return view('ex.kbv.member.player', compact('mem'));
	}

	public function upPlayer(Request $req){
		return	Helper::up_player($req->player,$req->id);
	}

	function tester()
	{
		$secret  = Domain::where('name', 'app_kbv')->first()->secret;
		$r = [
			'header'  => 'Kiểm tra login',
			'private' => $secret,
			'action'  => url('member/tester')
		];
		return view('ex.kbv.member.tester', compact('r'));
	}

	function noti()
	{
		$total  =  $this->query($this->se())->count();
		return view('ex.kbv.member.pushall', compact('total'));
	}


	function push($id)
	{
		if (!$this->access())
			return redirect('/');
		$mem  = Member::find($id);
		return view('ex.kbv.member.push', compact('mem'));
	}

	function history($id)
	{
		$query = Transaction::where('member_id', $id)
			->orderby('created_at', 'desc')->paginate(30);
		$rows  = $query->map(function ($row) {
			$row->c   =  'col-md-4 pull-left text-xs-left  bg-primary white';
			$row->s   =  'col-md-8 pull-right text-xs-right bg-teal white';

			if ($row->out) {
				$row->s   =  'col-md-8 pull-left text-xs-left bg-primary white';
				$row->c   =  'col-md-4 pull-right text-xs-right bg-teal white';
			}
			return $row;
		});
		return view('ex.kbv.member.history', compact('query', 'rows'));
	}

	function give()
	{
		if (!$this->access())
			return redirect('/');
		$total  = $this->query($this->se())->count();

		return view('ex.kbv.member.give', compact('total'));
	}

	function send(Request $req)
	{
		$info =  strip_tags(str_replace("&nbsp;", ' ', $req->message));

		$response =   Helper::push($req->phone, [
			"en" =>  $info,
			"vi" =>  $info
		]);

		$data = json_decode($response, true);



		if (isset($data['id'])) {
			return redirect()->back()
				->with([
					'flag' => 'susscess',
					'message' => 'Push Finish'
				]);
		}
		return redirect()->back()
			->with([
				'flag' => 'failed',
				'message' => 'Đã có lỗi!'
			]);
	}

	function sendAll(Request $req)
	{
		$content = [
			"en" => $req->content,
			"vi" => $req->content,
		];
		switch ($req->send) {
			case 'list':

				$search      = $this->se();
				$query       = $this->query($search);
				$mems        = $query->get();

				foreach ($mems as $mem) {
					Helper::push($mem->phone, $content);
				}

				return redirect()->back()
					->with([
						'flag' => 'susscess',
						'message' => 'Gửi thông báo thành công'
					]);

				break;

			default:
				$response = Helper::pushAll($content);

				$return["allresponses"] = $response;
				$return = json_encode($return);

				$data = json_decode($response, true);

				if (isset($data['id'])) {
					return redirect()->back()
						->with([
							'flag' => 'susscess',
							'message' => 'Gửi thông báo thành công'
						]);
				}
				break;
		}




		return redirect()->back()
			->with([
				'flag' => 'failed',
				'message' => 'Đã có lỗi!'
			]);
	}

	function export()
	{
		$query  = $this->query($this->se());

		$member = $query->get()->map(function ($m) {
			$phone  = Phone::where('user_id', $m->user_id)->first();
			$u      = $m->user();
			$m->national =  $phone ? $phone->national : '';
			$m->number   =  $phone ? $phone->number : '';
			$m->city     =  City::find($m->area) ?  City::find($m->area)->name : '';
			return $m;
		});

		$excel = new PHPExcel();
		//Chọn trang cần ghi (là số từ 0->n)
		$excel->setActiveSheetIndex(0);

		//Tạo tiêu đề cho trang. (có thể không cần)
		$excel->getActiveSheet()->setTitle('Danh sách thành viên');

		$cols = [
			'A1'  =>  'Thành viên',
			'B1'  =>  'Số điện thoại',
			'C1'  =>  'Email',
			'D1'  =>  'Sinh nhật',
			'E1'  =>  'Công ty',
			'F1'  =>  'Khu vực',
			'G1'  =>  'Điểm',
			'H1'  =>  'Tích lũy',
		];

		foreach ($cols as $key => $value) {
			$excel->getActiveSheet()->setCellValue($key, $value);
		}
		$excel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);

		$numRow = 2;
		foreach ($member as $row) {
			$excel->getActiveSheet()->setCellValue('A' . $numRow, $row->name);
			$excel->getActiveSheet()->setCellValue('B' . $numRow, $row->national . ' ' . $row->number);
			$excel->getActiveSheet()->setCellValue('C' . $numRow, $row->email);
			$excel->getActiveSheet()->setCellValue('D' . $numRow, date('Y-m-d', strtotime($row->birthday)));
			$excel->getActiveSheet()->setCellValue('E' . $numRow, $row->work);
			$excel->getActiveSheet()->setCellValue('F' . $numRow, $row->city);
			$excel->getActiveSheet()->setCellValue('G' . $numRow, $row->redeempoint);
			$excel->getActiveSheet()->setCellValue('H' . $numRow, $row->accumulate);
			$numRow++;
		}
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="member.xls"');
		PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');

		session(
			[
				'message'  => 'Xuất dữ liệu thành công',
				'flag'     => 'susscess',
			]
		);
	}

	function login(Request $req)
	{
			Session::forget('CurrentMember');
			$phone  = Phone::where('national', $req->national)
				->where('number', $req->phone)->first();

			if(isset($phone->user_id)){
					$mem  = Member::where('user_id', $phone->user_id)->first();
					if (!$mem){
							$mem  = $this->upgrade(User::find($phone->user_id));
					}
			}
			else{
				$mem    = $this->newbie($req);
			}

			$u	=	User::find(	$mem->user_id );
			if($req->version){
					$mem->ver	=	$req->version;
					$mem->save();
			}
			$mem->private = $u->password;
			$mem->public  = $u->public;

			$this->memSet($mem);
			print_r($mem->toJson());
	}

	function point($id)
	{
		if (!$this->access())
			return redirect('/');
		$mem  = Member::find($id);
		return view('ex.kbv.member.change', compact('mem'));
	}

	function showxu($id)
	{
		if (!$this->access())
			return redirect('/');
		$mem  = Member::find($id);

		$mem->xu = 0;
		$memcur = MemberCurrency::where([
			['currency_id', 1],
			['member_id', $mem->id],
		])->first();
		if ($memcur) {
			$mem->xu = $memcur->redeempoint;
		}

		return view('ex.kbv.member.changexu', compact('mem'));
	}

	function changexu(Request $req)
	{

		$this->validate($req, [
			'note'   => 'required|max:255',
			'xu'  => 'required|numeric'

		]);

		$mem  = Member::find($req->mem_id);

		$point  = $req->xu;

		$note   = $req->note;

		if ($mem) {
			if ($req->change == 'add') {
				$mem->reward_xu($point, $note);

				$mess = "Tài khoản bạn tăng : " . $point . " (điểm) \n" . $note;

				Helper::push($mem->phone, [
					"en" => $mess,
					"vi" => $mess
				]);
				return redirect()->back()
					->with(['flag' => 'susscess', 'message' => 'Tài khoản đã tăng: +' . $point]);
			} else {
				$mem->withdrawxu($point, $note);

				$mess = "Tài khoản bạn giảm : -" . $point . " (điểm) \n" . $note;

				Helper::push($mem->phone, [
					"en" => $mess,
					"vi" => $mess
				]);
				return redirect()->back()
					->with(['flag' => 'susscess', 'message' => 'Tài khoản đã giảm: -' . $point]);
			}
		}

		return redirect()->back();
	}

	function showInfo(Request $req)
	{
		/*
		$u  = User::where('public', $req->public)
			->where('password', $req->private)->first();

		if ($u) {
			$mem  = Member::where('user_id', $u->id)->first();
			$this->memSet($mem);
		} else {
			$mem  = Member::find($this->mem()->id);
		}
		*/

		$mem	=	$this->mem();

  	if( empty($mem->name) || empty($mem->email) || empty($mem->address) || empty($mem->work) ){
				return redirect(url('screen/home'));
		}
		$city_area = City::where([
			['country', 'VN'],
			['id', $mem->area],
		])->first();

		$mem->city_area = $city_area ? $city_area->name : '';

		$cities = City::where([
			['country', 'VN'],
		])->get();

		$mem->xu = 0;
		$memcur = MemberCurrency::where([
			['currency_id', 1],
			['member_id', $mem->id],
		])->first();
		if ($memcur) {
			$mem->xu = $memcur->redeempoint;
		}
		$mem	=	$this->mem();
				return view('ex.kbv.member.info', compact('mem', 'cities'));
		if($mem->ver >0){
				return view('ex.kbv.member.info', compact('mem', 'cities','catalog'));
		}
		else{
			$mday   = Carbon::now()->subYears(17);
			$mday   = $mday->toDateString();
			$setting  = KbvSetting::byCode('lock.info.area')->content;
			$locks    = [
					'area'  =>  $show = 'info' ? $setting : 'false'
			];
			return view('ex.kbv.screen.v1.info', compact('mem', 'cities','mday','locks'));
		}
	}

	function showInfoApi(Request $req)
	{
		$mem	=	$this->mem();
		$memcur = MemberCurrency::where([
			['currency_id', 1],
			['member_id', $mem->id],
		])->first();
		if ($memcur) {
			$mem->xu = $memcur->redeempoint;
		}
		return response()->json(
			[
				'success' => "true",
				'xu' => $mem->xu ? $mem->xu : 0,
				'redeempoint' => $mem->redeempoint,
			],
			200
		);
	}

	function showPointCharge($step, $mem_id)
	{
		return view('ex.kbv.member.point.master', [
			'step' => $step,
			'mem_id' => $mem_id,
		]);
	}

	function showPointChargePost ( Request $req )
	{
		$mem = $this->mem() ;//Member::find($req->mem_id);

		if ( $req->step == 3 ) {
			$transactions = new Transaction();
			$transactions->out = $req->redeem_xu;
			$transactions->member_id = $mem->id;
			$transactions->user_id = $mem->user_id;
			$transactions->issuer_id = 1;
			$transactions->currency_id = 1;
			$transactions->type = "redeem";
			$transactions->note = "Đổi xu thành tiền mặt";
			$bank = BankAccount::where([
				['user_id', $mem->user_id],
				['bank_name', $req->bank_name],
			])->first();
			if ( !$bank ) {
				$bank = new BankAccount();
				$bank->member_id = $mem->id;
				$bank->user_id = $mem->user_id;
			}

			$bank->bank_name = $req->bank_name;
			$bank->bank_number = $req->bank_number;
			$bank->name = $req->user_name;
			$bank->save();

			$transactions->status = "pending";
			$transactions->save();

			$memCur = MemberCurrency::where([
				['member_id', $mem->id],
				['currency_id', 1],
			])->first();
			$memCur->redeempoint -= $req->redeem_xu;
			$memCur->save();

			session(['CurrentXu'   => $req->redeem_xu ]);
		}
		$step	=	$req->step? $req->step : 4;
		return view('ex.kbv.member.point.master', [
			'step' => $step,
			'mem_id' => $req->mem_id,
			'mem' => $mem,
			'bank_name' => $req->has('bank_name') ? $req->bank_name : '',
			'bank_number' => $req->has('bank_number') ? $req->bank_number : '',
			'user_name' => $req->has('user_name') ? $req->user_name : '',
			'redeem_xu' => $req->redeem_xu ? $req->redeem_xu : session('CurrentXu'),

		]);
	}


	function info(Request $req)
	{

		$this->validate($req, [
			'app_token' => 'required',
			'member'    => 'required|numeric'
		]);
		$domain  = Domain::where('name', 'app_kbv')
			->where('secret', $req->app_token)->first();
		if (!$domain)   return;
		$mem  = Member::find($req->member);
		$u    = $mem->user();

		$mem->public  = $u->public;
		$mem->private = $u->password;


		print_r($mem->toJson());
	}

	//POST//
	function search(Request $req)
	{

		$release = array();
		if ($req->hasFile('list')) {
			$file = fopen($req->list, "r");
			while (!feof($file)) {
				$release[]  = str_replace(' ', '', fgetcsv($file)[0]);
			}
			fclose($file);
		} else if ($req->is_list && isset(session('search_member')['list'])) {
			$release =  session('search_member')['list'];
		}

		session([
			'search_member'  =>  [
				'name'      =>  $req->name,
				'area'      =>  $req->area,
				'number'    =>  $req->number,
				'end'       =>  $req->end,
				'start'     =>  $req->start,

				'bday_to'     =>  $req->bday_to,
				'bday_from'   =>  $req->bday_from,
				'point_to'    =>  $req->point_to,
				'point_from'  =>  $req->point_from,
				'bday'        =>  $req->bday,
				'list'        =>  $release,
			]
		]);

		return redirect()->back();
	}

	function change(Request $req)
	{

		$this->validate($req, [
			'note'   => 'required|max:255',
			'point'  => 'required|numeric'

		]);

		$mem  = Member::find($req->mem_id);

		$point  = $req->point;

		$note   = $req->note;

		if ($mem) {
			if ($req->change == 'add') {
				$mem->reward($point, $note);
				$mess = "Tài khoản bạn tăng : " . $point . " (điểm) \n" . $note;

				Helper::push($mem->phone, [
					"en" => $mess,
					"vi" => $mess
				]);
				return redirect()->back()
					->with(['flag' => 'susscess', 'message' => 'Tài khoản đã tăng: +' . $point]);
			} else {
				$mem->withdraw($point, $note);
				$mess = "Tài khoản bạn giảm : -" . $point . " (điểm) \n" . $note;

				Helper::push($mem->phone, [
					"en" => $mess,
					"vi" => $mess
				]);
				return redirect()->back()
					->with(['flag' => 'susscess', 'message' => 'Tài khoản đã giảm: -' . $point]);
			}
		}

		return redirect()->back();
	}

	function up(Request $req)
	{

		$this->validate($req, [
			'note'   => 'required|max:255',
			'point'  => 'required|numeric'

		]);

		if ($req->point < 1) {
			return redirect()->back();
		}

		$mems   = $this->query($this->se())->get();

		$point  = $req->point;

		$note   = $req->note;

		foreach ($mems as $mem) {
			$mem->reward($point, $note);
			$mess = "Tài khoản bạn tăng : " . $point . " (điểm) \n" . $note;

			Helper::push($mem->phone, [
				"en" => $mess,
				"vi" => $mess
			]);
		}
		return redirect('member')
			->with(['flag' => 'susscess', 'message' => 'Đã tặng điểm thành công']);
	}


	function action(Request $req)
	{

		$mem  = Member::find($req->mem_id);
		switch ($req->action) {
			case 'lock':
				$mem->status  = 'deactive';
				break;
			case 'unlock':
				$mem->status  = 'active';
				break;
			default:
				// code...
				break;
		}
		$mem->save();

		return redirect()->back();
	}

	//private...
	function  newbie(Request $req)
	{
		//print_r($req->input());exit;
	//DB::beginTransaction();


		$u            = new User;
		$u->password  = bcrypt(str_random(6));
		$u->public    = $req->national . $req->phone;
		$u->save();
		if ($u->id) {
			$phone  = new Phone;
			$phone->national  = $req->national;
			$phone->number    = $req->phone;
			$phone->phone     = $req->national . $req->phone;
			$phone->user_id   = $u->id;
			$phone->save();

			return $this->upgrade($u);
		}
		/*
		else {
			DB::rollBack();
		}
		*/
	}

	function upgrade($u)
	{
		$is   = $this->is;

		$mem              = new Member;
		$mem->user_id     = $u->id;
		$mem->issuer_id   = $is;

		$mem->card_id     = 1;
		$mem->accumulate  = 0;
		$mem->redeempoint = 0;

		$mem->code        = $u->public;
		$mem->phone       = $u->public;
		$mem->save();
		return $mem;
	}
	/*****************No load******/
	function query($search)
	{
		$query  =  Member::where('issuer_id', $this->issuer()->id)
			->whereNotNull('area');

		if ($search['list']) {
			$query  =  $query->whereIn('phone', $search['list']);
		}

		if ($search['bday']) {
			$query  =  $query->where(DB::raw('DAY(birthday)'), date('d'))
				->where(DB::raw('MONTH(birthday)'), date('m'));
		}

		if ($search['start']) {
			$start =  date('Y-m-d', strtotime($search['start']));
			$query  =  $query->whereDate('created_at', '<=', $start);
		}

		if ($search['end']) {
			$end =  date('Y-m-d', strtotime($search['end']));
			$query  =  $query->whereDate('created_at', '>=', $end);
		}


		if ($search['bday_from']) {
			$start =  date('Y-m-d', strtotime($search['bday_from']));
			$query  =  $query->whereDate('birthday', '>=', $start);
		}

		if ($search['bday_to']) {
			$end =  date('Y-m-d', strtotime($search['bday_to']));
			$query  =  $query->whereDate('birthday', '<=', $end);
		}


		if ($search['point_from']) {
			$from   =  $search['point_from'];
			$query  =  $query->where('redeempoint', '>=', $from);
		}

		if ($search['point_to']) {
			$to     =  $search['point_to'];
			$query  =  $query->where('redeempoint', '<=', $to);
		}

		if ($search['name'])
			$query  =  $query->where('name', 'like', '%' . $search['name'] . '%');
		if ($search['area'])
			$query  =  $query->where('area', $search['area']);
		if ($search['number'])
			$query  =  $query->where('code', 'like', '%' . $search['number'] . '%');

		return $query;
	}

	function se()
	{
		$search = [
			"name" => '', "area" => '', "number" => '',
			"start" => '', "end" => '',
			"bday_from" => '', "bday_to" => '',
			"point_from" => '', "point_to" => '',
			'bday' => '', 'list'  => array()
		];

		$s      = session('search_member');
		if ($s) {
			foreach ($s as $key => $value) {
				$search[$key] = $s[$key];
			}
		}
		return $search;
	}
}
