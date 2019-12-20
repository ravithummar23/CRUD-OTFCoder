<!DOCTYPE html>
<html lang="en" >
   <!-- begin::Head -->
    <head>
        <base href="">
        <meta charset="utf-8" />
        <title> {{config('admin.project_name')}} | Register New   </title>
        <meta name="description" content="Updates and statistics">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

        <!--end::Fonts -->

        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="{{URL::to('public/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

        <!--end::Page Vendors Styles -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{URL::to('public/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="{{URL::to('public/assets/css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/css/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/css/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/css/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />

        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
        @yield('pagelevel_css')
    </head>

    <!-- end::Head -->
    <!-- end::Body -->
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!--Begin:: App Content-->
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content ">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-xl-6 ">
                        <div class="m-login__logo mb-0">
                            <a href="{{URL::to('login')}}">
                                <img src="{{URL::to('public/default/logo.png')}}" width="160px;" style="margin-left: 42%;">
                            </a>
                        </div>
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">Register here </h3>
                                </div>
                            </div>
                            {{  Form::open(array('url'=>'register' , 'method' =>'POST','files'=>'true','class'=>'kt-form kt-form--label-right'))}}
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Profile Image</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                                        <div class="kt-avatar__holder" style="background-image: url({{URL::to('public/default/default_user.png')}})"></div>
                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="profile_image" accept=".png, .jpg, .jpeg">
                                                        </label>
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                        <span class="form-text " style="color: red"><small>{{ $errors->first('profile_image') }}</small></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                               <input type="text" name="first_name" value="" class="form-control" placeholder="Enter First name">
                                                <span class="form-text " style="color: red"><small>{{ $errors->first('first_name') }}</small></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                              <input type="text" name="last_name" value="" class="form-control" placeholder="Enter Last name">
                                                <span class="form-text " style="color: red"><small>{{ $errors->first('last_name') }}</small></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Phone Number</label>
                                            <div class="col-lg-9 col-xl-6">
                                              <input type="number" name="phone" value="" class="form-control" placeholder="Enter Phone Number">
                                                <span class="form-text " style="color: red"><small>{{ $errors->first('phone') }}</small></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                            <div class="col-lg-9 col-xl-6">
                                              <input type="email" name="email" value="" class="form-control" placeholder="Enter Last name">
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
                                          <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                              <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                                                <span class="form-text " style="color: red"><small>{{ $errors->first('confirm_password') }}</small></span>
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
                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>

            <!--End:: App Content-->
        </div>
        <!-- end:: Page -->
        <!-- end::Global Config -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="{{URL::to('public/assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page) -->
        <script src="{{URL::to('public/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
        <!-- <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script> -->
        <!-- <script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script> -->

        <!--end::Page Vendors -->

        <!--begin::Page Scripts(used by this page) -->
        <script src="{{URL::to('public/assets/js/pages/dashboard.js')}}" type="text/javascript"></script>
        <!--begin::Page Snippets -->
       
        <script src="{{URL::to('public/assets/js/pages/custom/user/profile.js')}}" type="text/javascript"></script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
