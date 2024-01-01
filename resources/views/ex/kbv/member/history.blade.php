@extends('ex.kbv.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('member')}}"> Thành viên </a></h4>
    </div>

  </div>
  <div class="content-body">
      <div class="col-md-8 offset-md-2 ">


            @foreach( $rows as $row )
            <div class="card">
              <div class="row" >

                <div class="{{ $row->s }} " style="padding:0.75rem">

                    {{ $row->note }}


                </div>

                <div class="{{$row->c}} " style="padding:0.75rem">

                     <strong>
                          {{ $row->out ? '-'.$row->out : '+'.$row->in }} điểm :
                        </strong>
                        {{ $row->created_at }}

                </div>
              </div>
              </div>

            @endforeach

          <div class="row">
              {{$query->render()}}
          </div>

  </div>
</div>
</div>


@endsection
