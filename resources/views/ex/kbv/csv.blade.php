@extends('ex.kbv.review')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <h4 class="content-header-title pull-left">
  <a href="{{url('report')}}"> Nhận điểm</a>
       </h4>

  </div>

  <div class="content-body">


    <div class="col-md-8 col-xs-10 offset-xs-1 box-shadow-1 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

        <form  class="form" action="{{url('report/csv')}}" enctype="multipart/form-data" method="post">


                  <fieldset>
                    <div class="input-group ">

                      <div class="form-control  ">

                          <input type="file" id="file" name="file" accept=".csv"
                            class="" required>

                          </label>
                        <button type="submit" class="btn btn-info ">Next</button>
                      </div>

                      </div>

                  </fieldset>


        </form>


    </div>
  </div>

<?php if(isset($release)) : ?>

<form  class="form" action="{{url('report/change')}}" enctype="multipart/form-data" method="post">


    <div class="col-md-8 col-xs-10 offset-xs-1 box-shadow-1 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">


    <div class="card-header">
    <div class="row">
      <div class="col-md-5">
          <div class="card-title">
            <strong>Thành viên </strong>
          </div>
      </div>
      <div class="col-md-5">
          <div class="card-title">
            <strong>Seri No</strong>
          </div>
      </div>


      <div class="col-md-2">
          <div class="card-title">
                  <strong>Điểm reset</strong>
          </div>
      </div>
    </div>
    </div>
    <div class="card-block">
    @foreach( $release as $i)
  <div class="row">

    <div class="col-md-5">
        <p>{{$i->number}}</p>
        <div class="card-title">

          <strong>{{$i->name}}</strong>
        </div>
    </div>

    <div class="col-md-5">
        <p>
            {{$i->product}}
        </p>
        <div class="card-title">
          <strong>  {{$i->seri}}</strong>
          <input type="hidden" name="release[]" value="{{$i->release}}" />
        </div>
    </div>
    <div class="col-md-2">
        <div class="card-title">
          <strong>  {{$i->points}}</strong>
        </div>
    </div>
  </div>
  <input type="hidden" name="release[]" value="40">
    @endforeach

  </div>
<div class="card-footer">

      <button name="change" id="change" class="btn btn-warning" type="submit" >
          Thu hồi điểm
      </button>

</div>


</div>

    </div>
  </form>
<?php
endif;
?>
</div>
</div>

@endsection
