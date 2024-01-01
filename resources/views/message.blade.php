@extends('.review')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
      <?php echo $r['back'] ?>
        {{$r['header']}}</h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
<div class="col-md-8 col-xs-10 offset-xs-1 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

  <div class="card-body collapse in">
    <div class="card-block text-xs-center">
      <?php echo $message ?>
    </div>
  </div>
</div>
</div>
</div>
  </div>
</div>

@endsection
