@extends('welcome')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h2 class="content-header-title">Overview</h2>
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
  <h4 id="basic-forms" class="card-title">HOME</h4>
  <div class="heading-elements">
      <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
      </ul>
  </div>
</div>
<div class="card-body collapse in" aria-expanded="true">
  <div class="card-block">

<p class="card-text">
<p>Page Loading</p>

      <p class="card-text"></p></div>
</div>
</div>
  </div>
</div>
@endsection
