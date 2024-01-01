@extends('.review')
@section('content')
<div class="content-wrapper">

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
