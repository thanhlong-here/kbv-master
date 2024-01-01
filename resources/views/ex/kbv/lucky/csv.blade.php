@extends('ex.kbv.review')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <h4 class="content-header-title pull-left">
  <a href="{{url('lott')}}"> Trả thưởng</a>
       </h4>

  </div>

  <div class="content-body">


    <div class="col-md-8 col-xs-10 offset-xs-1 box-shadow-1 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

        <form  class="form" action="{{url('lott/csv')}}" enctype="multipart/form-data" method="post">


                  <fieldset>
                    <div class="input-group ">

                      <div class="form-control  ">

                          <input type="file" id="file" name="file" accept=".xlsx"
                            class="" required>

                          </label>
                        <button type="submit" class="btn btn-info ">Next</button>
                      </div>

                      </div>

                  </fieldset>


        </form>

        <?php if(isset($release)) : ?>

        <form  class="form" action="{{url('lott/change')}}"  method="post">


            <div class="card-header">
            <div class="row">
              <div class="col-md-3">
                  <div class="card-title">
                    <strong>Thành viên </strong>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card-title">
                    <strong>Điểm tặng</strong>
                  </div>
              </div>


              <div class="col-md-6">
                  <div class="card-title">
                          <strong>Lý do</strong>
                  </div>
              </div>
            </div>
            </div>
            <div class="card-block">
            @foreach( $release as $i)
          <div class="row">

            <div class="col-md-3">
                <p>{{$i->phone}}</p>
                <div class="card-title">

                  <strong>{{$i->name}}</strong>
                </div>
            </div>

            <div class="col-md-3">
                <strong>
                    {{$i->points}}
                </strong>

            </div>
            <div class="col-md-6">
                <p>  {{$i->note}}</p>
            </div>
          </div>

            <input type="hidden" name="id[]"
              value="{{$i->id}}"  >

            <input type="hidden" name="points[]"
                value="{{$i->points}}">

            <input type="hidden" name="note[]"
                    value="{{$i->note}}">

            @endforeach

          </div>
        <div class="card-footer right">

              <button name="change" id="change" class="btn btn-warning" type="submit" >
                  Đổi phiếu lấy điểm
              </button>

        </div>


          </form>
        <?php
        endif;
        ?>

    </div>
  </div>

  </div>
</div>

@endsection
