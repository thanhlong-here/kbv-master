@extends('welcome')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h2 class="content-header-title">Admin</h2>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="{{ url('') }}">Home</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
  <div class="content-body"><!-- Overview -->
<div class="card">
<div class="card-header">

  <div class="heading-elements">
      <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
      </ul>
  </div>
</div>
<div class="card-body collapse in" aria-expanded="true">

  <form action='{{route('auth')}}' method="post" class="form">

    <div class="form-body">
      <div class="col-md-6 offset-md-3">

        @if ($errors->any())

        <div class="alert bg-info alert-icon-right alert-arrow-right alert-dismissible fade in" role="alert">
        								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        									<span aria-hidden="true">×</span>
        								</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
        </div>
        @endif
        @if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    			  <div class="form-group col-md-5 mb-1">
    			         <input type="password" id="pass" class="form-control"  name="pass">
    			  </div>
            <div class="form-group col-md-5 mb-1">

     			      <input type="text" id="login" class="form-control" placeholder="login" name="login" >

     			  </div>
              <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-paper-plane-o"></i> Send
                </button>
              </div>

        </div>
    	</div>


  </form>

</div>
</div>
  </div>
</div>
@endsection
