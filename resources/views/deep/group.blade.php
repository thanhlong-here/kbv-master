@extends('deep')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title ">
        <?php echo $header ?>
       </h4>
    </div>

  </div>
  <div class="row">

    <form class="form" method="post" action="{{url('group/add')}}">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="parent_id" value="{{$parent}}" >
      <div class="col-md-2 ">
        <div class="form-group">

              <input id="code" name="code"
              type="text" class="form-control">


        </div>
      </div>

      <div class="col-md-4 ">
        <div class="form-group">


              <input id="name" name="name" type="text" class="form-control">

        </div>
      </div>
        <div class="col-md-1">
          <button type="submit"
          name="action" id="action"
          class="btn btn-primary mr-1">Create</button>
        </div>
        </form>

  </div>
  <div class="content-body">
<div class="card">
  <!-- Groups -->
    <div class="card-block" >
        <div class="row">

          <div class="col-md-2">
              <div class="form-group">
                <strong>CODE</strong>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                <strong>Name</strong>
              </div>
          </div>


        </div>

      @foreach( $groups as $group )

            <div class="row">

              <form class="form" action="{{url('group/edit')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <input type="hidden" name="group_id" value="{{$group->id}}" >

                <div class="col-md-2 ">
                  <div class="form-group">
                    <p>

                        {{$group->code}}

                    </p>
                    <p>
                      <div class="form-group">

                        <input id="code" name="code"
                        type="text" class="form-control"
                        value="{{$group->code}}">

                      </div>
                    </p>
                  </div>
                </div>

                <div class="col-md-4 ">
                  <div class="form-group">
                    <p>
                      <a href="{{url('group/'.$group->id)}}">
                        {{$group->name}}
                      </a>

                    </p>
                    <p>
                      <div class="form-group">

                        <input id="name" name="name" type="text" class="form-control" value="{{$group->name}}">

                      </div>
                    </p>
                  </div>
                </div>
                  <div class="col-md-1">
                    <button type="submit"
                    name="action" id="action"
                    class="btn btn-primary mr-1">Update</button>
                  </div>

                  </form>
                  <div class="col-md-1">

                    <form class="form" action="{{url('group/del')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" >
                        <input type="hidden" name="group_id" value="{{$group->id}}" >
                        <button type="submit" class="btn btn-danger mr-1">Delete</button>
                      </form>
                  </div>
            </div>

      @endforeach
  </div>
  <!--End Groups -->
</div>
  </div>
</div>

@endsection
