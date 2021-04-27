<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
<head><base href="{{url('/')}}">
        <meta charset="utf-8" />
        <title>Brain App | Login </title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="{{asset('admin/assets/css/pages/login/classic/login-4.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{asset('admin/assets/plugins/global/plugins.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/style.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{asset('admin/assets/media/logos/perdoski-favicon.png')}}" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{asset('admin/assets/media/bg/bg-3.jpg')}}');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-15">
                            <a href="#">
                                <img src="{{asset('admin/assets/media/logos/logo-letter-7.png')}}" class="max-h-75px" alt="" />
                            </a>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login forgot password form-->

                        <div class="login-signin">
                            <div class="mb-20">
                                <h3>Reset Password</h3>
                                <div class="text-muted font-weight-bold">Enter your new password to reset your password</div>
                            </div>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group mb-5">
                                    <input id="email" type="email" class="form-control form-control-solid h-auto py-4 px-8 @error('email') is-invalid @enderror" placeholder="Email" name="email" required  value="{{ $email ?? old('email') }}" autocomplete="off" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <input id="password" type="password" class="form-control form-control-solid h-auto py-4 px-8 @error('password') is-invalid @enderror" placeholder="password" name="password" required autocomplete="new-password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <input id="password-confirm" type="password" class="form-control form-control-solid h-auto py-4 px-8"  placeholder="password confirmation" name="password_confirmation" required autocomplete="new-password" />
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Reset Password</button>
                                </div>
                            </form>
                        </div>
                        <!--end::Login forgot password form-->
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        <script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{asset('admin/assets/plugins/global/plugins.bundle.js?v=7.0.5')}}"></script>
        <script src="{{asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5')}}"></script>
        <script src="{{asset('admin/assets/js/scripts.bundle.js?v=7.0.5')}}"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{asset('admin/assets/js/pages/custom/login/login-general.js?v=7.0.5')}}"></script>
        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>

