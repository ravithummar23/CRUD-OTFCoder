<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Login | {{config('admin.project_name')}}
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Base Styles -->
		<link href="{{URL::to('public/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{URL::to('public/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{ URL::to('public/default/favicon.ico')}}" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo mb-0">
							<a href="#">
								
										<img src="{{URL::to('public/default/logo.png')}}" width="160px;">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Sign In To Admin
								</h3>
							</div>
							{{Form::open(['url' => 'admin/login','method' => 'post','class' => 'm-login__form m-form','id' => 'user_login'])}}
							
								<div class="form-group m-form__group">
									{{Form::text('email','',array('class'=>'form-control m-input','placeholder'=>'Username','autocomplete'=>'off'))}}
									
								</div>
								<div class="form-group m-form__group">
									{{Form::password('password',array('class'=>'form-control m-input m-login__form-input--last','placeholder'=>'Password'))}}
								</div>
								<div class="row m-login__form-sub">
									<span>Don't have an account yet ? 
									<a href="{{URL::to('register')}}"class="m-link m-link--focus m-login__account-link">
										 Sign Up
									</a>
									</span>
								</div>
								<div class="m-login__form-action">
									{{Form::submit('Sign In',array('id'=>'btn_login','class'=>'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary'))}}
								</div>
							{{Form::close()}}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
    	<!--begin::Base Scripts -->
		<script src="{{URL::to('public/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
        <!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
		<!--end::Web font -->
		<!--end::Base Scripts -->   
        <!--begin::Page Snippets -->
		<script src="{{URL::to('public/assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				var n = function(e, i, a) {
		            var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
		            e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeIn animated"), l.find("span").html(a)
		        }
		        //Login
				$(document).on('submit', '#user_login', function(event) {
					event.preventDefault();
					var form=$(this);
					var btn=$("#btn_login");
					form.validate({
				        rules: {
				            email: {
				                required: !0,
				                email: !0
				            },
				            password: {
				                required: !0
				            }
				        }
				    });
				    if(form.valid()){
				    	btn.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0);
				    	$.ajax({
				    		url: "{{url('login')}}",
				    		type: 'post',
				    		dataType: 'json',
				    		data: form.serialize(),
				    	})
				    	.done(function(response) {
				    		if(response.status){
				    			n(form, "success", "Login success");
		        			
		        				if(response.role == 'admin'){
				    				window.location.href="{{url('admin/dashboard')}}";
		        				}else{
				    				window.location.href="{{url('admin/users')}}";
		        				}
				    		}else{
				    			n(form, "danger", "Incorrect email or password. Please try again.")
				    		}
				    	})
				    	.fail(function() {
				    		n(form, "danger", "Something went wrong")
				    	})
				    	.always(function() {
				    		btn.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1);
				    	});
				    	
				    }
				});
				//Resigster
				$(document).on('submit', '#user_register', function(event) {
					event.preventDefault();
					var form=$(this);
					var btn=$("#btn_signup");
					
					form.validate({
                    rules: {
	                        name: {
	                            required: !0
	                        },
	                        email: {
	                            required: !0,
	                            email: !0
	                        },
	                        password: {
	                            required: !0
	                        },
	                        password_confirmation: {
	                            required: !0
	                        },
	                        agree: {
	                            required: !0
	                        }
	                    }
	                });
	                if(form.valid()){
	                	btn.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0);
	                	$.ajax({
							url: "{{url('register')}}",
							type: 'post',
							dataType: 'json',
							data: form.serialize(),
						})
						.done(function(response) {
						if(typeof response!="undefined"){
								var cls='';
								var message='';
								if(response.status){
									cls='success';
									message=response.msg;
									form.trigger('reset');
								}else{
									cls='danger';
									message=response.msg;
								}
								n(form, cls, message);
							}
						})
						.fail(function() {
							n(form, "danger", "Something went wrong");
						})
						.always(function() {
							btn.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1);
						});
	                }
				});
			});
		</script>
		<script src="{{URL::to('public/assets/js/pages/custom/user/profile.js')}}" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>
