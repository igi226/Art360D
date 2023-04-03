<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{ asset('art360_logo.png') }}">
    <link href="{{ asset('Admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('Admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Admin/assets/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.0/cropper.css">
</head>

<body data-topbar="dark">
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <i class="ri-loader-line spin-icon"></i>
            </div>
        </div>
    </div>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route("admin.dashboard") }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('art360_logo.png') }}" alt=""
                                    height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('art360_logo.png') }}" alt=""
                                    height="20">
                            </span>
                        </a>
                        <a href="{{ route("admin.dashboard") }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('art360_logo.png') }}" alt=""
                                    height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('art360_logo.png') }}" alt=""
                                    height="20">
                            </span>
                        </a>
                    </div>
                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ri-search-line"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="mb-3 m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                    </div>
                    
                    <div class="dropdown d-inline-block user-dropdown">
                        <a href="{{ route("admin.logout") }}" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-shut-down-line"></i>
                            
                    </a>
                        
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route("admin.dashboard") }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('art360_logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('art360_logo.png') }}" alt="" height="22">
                    </span>
                </a>
                <a href="{{ route("admin.dashboard") }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('art360_logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('art360_logo.png') }}" alt="" height="22">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <div data-simplebar class="sidebar-menu-scroll">
              
                <div id="sidebar-menu">
                  
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li><a href="{{ route("user.artist.Profile") }}" class="waves-effect"><i class="fas fa-home"></i> Profile</a></li>
                        

                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Artwork management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('artworks.index') }}">List of artworks</a></li>
                                <li><a href="{{ route('artworks.create') }}">Add artwork</a></li>
                            </ul>
                        </li> --}}
                       
                         
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>

       @yield('content')
       <footer class="footer">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-sm-12">
                     <div class="text-sm-end d-sm-block">
                         &copy; <?php echo date("Y"); ?> Art360. All Rights Reserved.
                     </div>
                 </div>
             </div>
         </div>
    </div>
  
    <div class="rightbar-overlay"></div>

    <script src="{{ asset('Admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/app.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('Admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/pages/datatables.init.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    {{--  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.0/cropper.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2class').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });

    </script>
    
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[1]);
            });
        });
    </script>
   
</body>

</html>
