<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/medroc/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Aug 2022 05:26:21 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login |Art 360 - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset("Admin/assets/images/favicon.ico") }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset("Admin/assets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset("Admin/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset("Admin/assets/css/app.min.css") }}" id="app-style" rel="stylesheet" type="text/css" />
<style>
    .password-icon {
    position: absolute;
    top: 44%;
    right: 38px;
}
</style>
    </head>

    <body class="authentication-bg d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        @if(Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="p-4">
                    <div class="card overflow-hidden mt-2">
                        <div class="auth-logo text-center bg-primary position-relative">
                            <div class="img-overlay"></div>
                            <div class="position-relative pt-4 py-5 mb-1">
                                <div class="text-center">
                                    <a href="{{ url("admin") }}" class="d-block auth-logo">
                                        <img src="{{ asset("art360_logo.png") }}" alt="" height="52" class="logo logo-dark mx-auto">
                                        <img src="{{ asset("art360_logo.png") }}" alt="" height="24" class="logo logo-light mx-auto">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body position-relative">
                            <div class="p-4 mt-n5 card rounded">
                                <form class="form-horizontal" action="{{ route("admin.login") }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input name="email" type="text" class="form-control" id="username" placeholder="Enter email">
                                        @if ($errors->has('email'))

                                        <span class="text-danger">{{ $errors->first('email') }}</span>

                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword">Password</label>
                                        <input name="password" type="password" class="form-control" id="userpassword" placeholder="Enter password"> 
                                        <span class="password-icon" onclick="password_show_hide();">
                                            <i class="ri-eye-line" id="show_eye"></i>
                                            <i class="fas  ri-eye-off-line d-none" id="hide_eye"></i>
                                        </span>       
                                        @if ($errors->has('password'))

                                        <span class="text-danger">{{ $errors->first('password') }}</span>

                                        @endif
                                    </div>

                                    <div class="form-check mt-3">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log IN</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div>
                </div>
            </div>

        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>
        <script>
            function password_show_hide() {
              var x = document.getElementById("userpassword");
              var show_eye = document.getElementById("show_eye");
              var hide_eye = document.getElementById("hide_eye");
              hide_eye.classList.remove("d-none");
              if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
              } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
              }
            }
            </script>
    </body>

<!-- Mirrored from themesdesign.in/medroc/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Aug 2022 05:26:21 GMT -->
</html>
