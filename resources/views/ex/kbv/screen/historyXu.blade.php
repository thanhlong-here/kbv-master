@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">
<div class="content-header" style="padding:10px 0px">
  <div class="content-header-left  pull-left">
    <h4 class="content-header-title">
       <a href="{{url('screen/info')}}">
        <i class="ft-arrow-left"></i>
        Lịch sử
      </a>
    </h4>
  </div>


</div>
</div>
<div class="content-wrapper">

  <div class="content-body">



            @foreach( $rows as $row )
  <div class="card">
              <div class="card-header" >

                  <div class="row" >
                        <div class="{{ $row->c }} pad font-medium-2">
                          <strong>
                        {{ $row->created_at }}
                      </strong>
                      </div>
                  <div class="{{ $row->s }} pad font-medium-2">
                      <strong>
                       {{ $row->out ? '-'.$row->out : '+'.$row->in }} Xu
                     </strong>
                  </div>
                </div>

            </div>
            <div class="card-block">


                                  {{ $row->note }}

            </div>

  </div>
            @endforeach



</div>

</div>
<div class="content-wrapper">
  <div class="content-footer">
    {{$query->render()}}
  </div>
  <div class="row text-xs-center quick">
    <a href="javascript:void(0)" id="xuredeem"
    data-value="{{$mem->xu}}"
    data-link="{{ Request::root() }}/screen/member/point/1/{{$mem->id}}"
    class="btn btn-info"
    >
            Đổi xu
            <i class="ft-arrow-right"></i>
        </a>
  </div>
</div>
@endsection
