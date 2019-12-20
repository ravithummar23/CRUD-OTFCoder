@extends('layouts.admin')
@section('title')
Edit User 
@endsection
@section('css')

@endsection
@section('content')
 <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid ">
          <div class="kt-subheader__main">
              <h3 class="kt-subheader__title">User</h3>
              <span class="kt-subheader__separator kt-subheader__separator--v"></span>
              <h4 class="kt-subheader__title">Edit</h4>
          </div>
      </div>
  </div>

  <!-- end:: Content Head -->

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Edit User 
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            {{  Form::open(array('url'=>'admin/users/'.$editUser->id , 'method' =>'PUT','files'=>'true','class'=>'kt-form'))}}
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first m-0">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type = "text" value="{{$editUser->first_name}}"name="first_name" class="form-control" placeholder="Enter First name">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('first_name') }}</small></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type = "text" value="{{$editUser->last_name}}"name="last_name" class="form-control" placeholder="Enter Last name">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('last_name') }}</small></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number:</label>
                            <input type = "number" value="{{$editUser->phone}}"name="phone" class="form-control" placeholder="Enter Phone Number">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('phone') }}</small></span>
                        </div>
                        <div class="form-group">
                            <label>Email address:</label>
                            <input type = "email" value="{{$editUser->email}}"name="email" class="form-control" placeholder="Enter email">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('email') }}</small></span>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        {{ Form::submit('Update',array('class'=>'btn btn-primary')) }}
                        <a class="btn btn-secondary" href="{{URL::to('admin/users')}}">Cancel</a>
                    </div>
                </div>
                {{Form::close()}}

            <!--end::Form-->
        </div>

        <!--end::Portlet-->
  </div>

  <!-- end:: Content -->
@endsection
@section('pagelevel_script') 
@endsection