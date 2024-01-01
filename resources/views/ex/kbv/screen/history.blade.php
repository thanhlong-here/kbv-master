@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">  <a href="{{url('screen/info')}}">
          <i class="ft-arrow-left"></i>
          Lịch sử
        </a></h4>
    </div>

  </div>
  <div class="content-body">



            @foreach( $rows as $row )
  <div class="card">
              <div class="card-header" >

                  <div class="row" >
                        <div class="{{ $row->c }}  pad font-medium-2">
                      <strong>  {{ $row->created_at }}
                      </strong>
                      </div>
                  <div class="{{ $row->s }}  pad font-medium-2">
                    <strong>
                       {{ $row->out ? '-'.$row->out : '+'.$row->in }} điểm
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
<div class="content-footer">
{{$query->render()}}
</div>
</div>

@endsection
