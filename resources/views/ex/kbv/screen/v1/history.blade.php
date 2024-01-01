@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">

      <div class="card">
        <div class="card-block">
          <form class="form">
              <div class="form-body">


<h4 class="form-section">
<a href="{{url('screen/info')}}">
  <i class="ft-arrow-left"></i>
</a>
  Lịch sử</h4>



                @foreach( $trans as $t)
                      <?php
                          $a  = $t->out ? "pull-right" :"pull-left";
                          $c  = $t->out ?  "text-danger":"text-success";
                      ?>
                  <div class="row" >
                    <div class="col-md-12">

                          <p class="card-text text-xs-center">
                          Lúc : {{ $t->created_at }}
                          </p>

                      <div class="{{$c}} {{$a}} font-medium-2">

                            {{ $t->out ? '-'.$t->out : '+'.$t->in }}

                      </div>
                      <div class="{{$a}}">
                          <p class="blue-grey" style="margin:0 0.5rem"> {{ $t->note }}</p>
                      </div>

                    </div>
                  </div>
                @endforeach

			         </div>
            </form>
          </div>
<div class="card-footer">
    {{$trans->render()}}
</div>

        </div>
  </div>
</div>

@endsection
