@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h4 class="content-header-title">
				<span> Đổi xu </span>
			</h4>

		</div>

	</div>
	<div class="content-body">
		<div class="card">
			<!-- Header -->
			<div id="search" class="card-block">

				<form class="form" action="{{$r['url.search']}}" method="post">
					<div class="form-actions top clearfix">
						<input type="hidden" name="_token" value="{{csrf_token()}}">

						<div class="row">
							<div class="col-md-8">
								<div class="form-group">

									<input id="phone" name="phone" type="text" value="{{$search}}" class="form-control" placeholder="Số điện thoại">
								</div>
							</div>


							<div class="col-md-1">
								<button type="submit" class="btn">Tìm kiếm</button>
							</div>
						</div>
					</div>
				</form>

			</div>
			<!--  End Header -->
			<div class="card-block">
				<div class="row">
					<div class="col-md-2">
						<div class="card-title">
							<strong>Thành viên </strong>
						</div>
					</div>

					<div class="col-md-2">
						<div class="card-title">
							TK ngân hàng
						</div>
					</div>

					<div class="col-md-2">
						<div class="card-title">
							Số xu có
						</div>
					</div>

					<div class="col-md-2">
						<div class="card-title">
							Xu đổi
						</div>
					</div>


				</div>

				@foreach( $trans as $tran)


				<form class="form" method="post" action="{{url('redeem-xu/action')}}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="transaction_id" value="{{$tran->id}}">
					<input type="hidden" name="member_phone" value="{{$tran->phone}}">
					<input type="hidden" name="member_id" value="{{$tran->member_id}}">
					<div class="form-body">
						<div class="row form-section">

							<div class="col-md-2">
								<p>
									<a href="javascript:void(0)">
										<strong> {{$tran->phone}} </strong>
									</a>
								</p>
								<span>
									Cập nhật lúc : {{$tran->updated_at}}
								</span>
							</div>
							<div class="col-md-2">
								<p>
									Tên ngân hàng : {{ $tran->bank_name }}
								</p>
								<p>
									Số tài khoản : {{ $tran->bank_number }}
								</p>
								<p>
									Chủ tài khoản : {{ $tran->name }}
								</p>

							</div>
							<div class="col-md-2">
								<p>{{$tran->redeempoint}}</p>
							</div>
							<div class="col-md-2">
								<p>{{$tran->out}}</p>
							</div>

							<div class="col-md-4">

								<button type="submit" value="inactive" name="action" id="action" class="btn btn-error">
									Thất bại
								</button>
								<button type="submit" value="active" name="action" id="action" class="btn btn-warning">
									Thành công
								</button>
							</div>
						</div>
				</form> @endforeach

			</div>

			{{ $trans->render() }}

		</div>
	</div>
</div>

@endsection
