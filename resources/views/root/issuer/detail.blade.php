@extends('root')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h2 class="content-header-title">Issuer</h2>
    </div>

  </div>
  <div class="content-body">

  <div class="card col-md-10 offset-md-1 ">
    <form class="form form-horizontal"
    action="{{url('issuer/edit')}}"
    method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="iss_id" value="{{$iss->id}}" >
        <div class="row">
          <div class="col-md-6  box-shadow-1 ">
            <div class="card-block  text-xs-center">

                    <img src="{{url('images/portrait/medium/avatar-m-4.png')}}" class="rounded-circle  height-150" alt="Card image">

            </div>
            <div class="form-group">
                <label >Issuer</label>

                <input type="text" class="form-control"

                name="title" id="title"
                value="{{$iss->title}}"

                placeholder="Issuer" >

            </div>
            <div class="form-group">
              <label >Account</label>
              <div class="form-control">

                <label>
                    <strong> {{$iss->user()->public}}
                    </strong>
                  </label>

                  <div class="pull-right">
                    <a  href="#"> Change password</a>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6" style="margin-top: 1rem;">
                  <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"
                           {{ ($iss->active =='active') ? 'checked' : ''}}
                        name="status" id="status" >
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Active</span>
                      </label>
                </div>
              <div class="col-md-6">
                <select class="form-control" id="type" name="type">
                  @foreach ($iss->EnumTypes as $value )
                      <option value="{{$value}}"
                        @if($iss->type == $value)
                          selected
                        @endif >
                        {{ucfirst( $value )}} </option>

                  @endforeach

            </select>
              </div>


            </div>
            </div>
        </div>

          <div class="col-md-6 ">
            <div class="px-1 py-1">

              <div class="form-group">
                  <label >Address</label>
                  <input type="text" class="form-control"
                  name="address" id="address"

                  value="{{$iss->address}}"

                  placeholder="Issuer" >
              </div>

            <div class="row">
			            <div class="form-group col-md-6 mb-2">
			                 <label >E-mail</label>

			                 <input type="text" class="form-control"
                       id="email" name="email"

                       value="{{$iss->email}}"

                       placeholder="E-mail" >

			             </div>
			              <div class="form-group col-md-6 mb-2">
			                 <label >Contact Number</label>

                       <input type="text" class="form-control"
                        name="phone" id="phone"

                        value="{{$iss->phone}}"

                        placeholder="Phone" >

                     </div>
						</div>

            <div class="form-group">
                 <label >Website</label>

                 <input type="text" class="form-control"
                 id="website" name="website"

                 value="{{$iss->website}}"

                 placeholder="website" >

             </div>
                <div class="form-group">
                    <label> About</label>

                    <textarea  rows="5" class="form-control"
                    name="about" id="about"
                    placeholder="About Issuer">{{$iss->content}}</textarea>

                </div>



            </div>

        </div >
      </div>

      <div class="form-actions right">
                    <button type="button" class="btn btn-warning mr-1">
                      <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                    </button>
                </div>
</form>

</div>
  </div>
</div>

@endsection
