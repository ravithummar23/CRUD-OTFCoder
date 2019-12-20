@extends('layouts.admin')
@section('title')
User  Profile
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
              <h4 class="kt-subheader__title">Profile</h4>
          </div>
      </div>
  </div>

  <!-- end:: Content Head -->

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin:: App Content-->
      <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
        <div class="row">
          <div class="col-xl-12">
            <div class="kt-portlet">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">Profile Information <small>update your personal informaiton</small></h3>
                </div>
              </div>
              {{  Form::open(array('url'=>'admin/users/'.$user->id , 'method' =>'PUT','files'=>'true','class'=>'kt-form kt-form--label-right'))}}
                <div class="kt-portlet__body">
                  <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                      <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                          <h3 class="kt-section__title kt-section__title-sm">Customer Info:</h3>
                        </div>
                      </div>
                      @php
                      // $url = URL::to();
                      @endphp
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                        <div class="col-lg-9 col-xl-6">
                          <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                            <div class="kt-avatar__holder" style="background-image: url({{URL::to('public/'.config('admin.image.user_image').Auth::user()->profile_image)}});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                              <i class="fa fa-pen"></i>
                              <input type="file" name="profile_image" accept=".png, .jpg, .jpeg">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                              <i class="fa fa-times"></i>
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                        <div class="col-lg-9 col-xl-6">
                           <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" placeholder="Enter First name">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('first_name') }}</small></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-lg-9 col-xl-6">
                          <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" placeholder="Enter Last name">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('last_name') }}</small></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Phone Number</label>
                        <div class="col-lg-9 col-xl-6">
                          <input type="number" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Enter Phone Number">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('phone') }}</small></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9 col-xl-6">
                          <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter Last name">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('email') }}</small></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                        <div class="col-lg-9 col-xl-6">
                          <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            <span class="form-text " style="color: red"><small>{{ $errors->first('password') }}</small></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="kt-portlet__foot">
                  <div class="kt-form__actions">
                    <div class="row">
                      <div class="col-lg-3 col-xl-3">
                      </div>
                      <div class="col-lg-9 col-xl-9">
                        {{ Form::submit('Update',array('class'=>'btn btn-primary')) }}&nbsp;
                        <a class="btn btn-secondary" href="{{URL::to('admin/users')}}">Cancel</a>
                      </div>
                    </div>
                  </div>
                </div>
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
    <!--End:: App Content-->
  </div>

  <!-- end:: Content -->
@endsection
@section('pagelevel_script') 
    <script src="{{URL::to('public/assets/js/pages/custom/user/profile.js')}}" type="text/javascript"></script>
@endsection