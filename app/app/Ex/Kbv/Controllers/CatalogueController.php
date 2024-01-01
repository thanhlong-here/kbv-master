<?php

namespace App\Ex\Kbv\Controllers;

use App\Ex\Kbv\Controllers\KbvController;
use App\Issuer\Message;
use App\Issuer\Catalogue;
use App\Basic\Media;

use Illuminate\Http\Request;
use App\Ex\Kbv\Helper;

use Session;
use Validator;
use DB;
class CatalogueController extends KbvController
{

    function index(Request $req)
    {
        $query = Catalogue::where('issuer_id', $this->issuer()->id)
            ->orderBy('created_at', 'desc');
        $search     =  session('search_catalogue');
        if ($search['name']) {
            $query->where('name', 'like', '%' . $search['name'] . '%');
        }
        $news  = $query->paginate(9);

        $r = [
            'header' => 'Tin tức',
            'url.new'     => url('catalogue/new'),
            'url.search'  => url('catalogue/search'),
        ];
        return view('ex.kbv.catalogue.index', compact('news', 'r', 'search'));
    }

    public function search(Request $req)
    {
        session(['search_catalogue' => ['name' => $req->name]]);
        return redirect()->back();
    }

    public function fresh()
    {
        if (!$this->access())
            return redirect('/');
        return view('ex.kbv.catalogue.new');
    }

    public function add(Request $req)
    {
        if (!$this->access())
            return redirect('/');
        $this->validate($req, [
            'name' => 'required|max:254',
        ]);

        $news = $this->do_add($req);
        if ($news->id) {
            return redirect(url('catalogue/id/' . $news->id))
                ->with(['flag' => 'success', 'message' => 'Tạo mới thành công']);
        }
        return redirect()->back()
            ->with(['flag' => 'failed', 'message' => 'Tạo mới không thành công']);
    }

    public function detail($id)
    {
        if (!$this->access())
            return redirect('/');
        $catalogue = Catalogue::find($id);
        return view('ex.kbv.catalogue.detail', compact('catalogue'));
    }

    public function save(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|max:254',
        ]);
        $catalogue = Catalogue::find($req->catalogue_id);


        $catalogue->name    = $req->name;
        $catalogue->link = $req->link;

        $catalogue->save();
        return redirect()->back()
            ->with(['flag' => 'success', 'message' => 'Lưu thành công']);
    }

    function do_add($req)
    {
        $catalogue = new Catalogue();
        $catalogue->issuer_id  = $this->is;
        $catalogue->name      = $req->name;
        $catalogue->link       = $req->link;
        $catalogue->save();
        return $catalogue;
    }

    public function action(Request $req)
    {
        $news = Catalogue::find($req->catalogue_id);

        switch ($req->action) {
            case 'delete':
                $news->delete();
                return redirect()->back()
                    ->with([
                        'flag' => 'susscess',
                        'message' => 'Deleted'
                    ]);
                break;
        }
    }
}
