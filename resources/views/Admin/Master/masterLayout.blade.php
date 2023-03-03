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
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-arrow-down"></i>
                            
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0">Hi, {{ auth()->guard('admin')->user()->name }}</h6>
                                        
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <!-- item-->
                                <a href="{{ route("admin.adminProfile") }}" class="text-reset notification-item">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-xs me-3 mt-1">
                                            <span class="avatar-title bg-soft-primary rounded-circle font-size-16">
                                                <i class="ri-user-line text-primary font-size-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="mb-1">Profile</h6>
                                            <p class="mb-0 font-size-12">View & edit personal profile details.</p>
                                        </div>
                                    </div>
                                </a>
                               
                            </div>
                            <!-- item-->
                            <div class="pt-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route("admin.logout") }}">
                                        <i class="ri-shut-down-line align-middle me-1"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
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
                        <li><a href="{{ route("admin.dashboard") }}" class="waves-effect"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" ri-file-shield-line"></i>
                                <span>Artist management</span>
                            </a>
                            
                            <ul class="sub-menu" aria-expanded="true">
                                <a href="javascript: void(0);">
                                    <span>Artists</span>
                                </a>
                                <li><a href="{{ route("artists.index") }}">List of artists</a></li>
                                <li><a href="{{ route("artists.create") }}">Add artist</a></li>
                              <a href="javascript: void(0);">
                                <span>Artist type</span>
                            </a>
                                <li><a href="{{ route("artisttypes.index") }}">List of artist types</a></li>
                                <li><a href="{{ route("artisttypes.create") }}">Add artist type</a></li>
                                
                                <a href="javascript: void(0);">
                                    <span>Category management</span>
                                </a>
                                <li><a href="{{ route("artwork-category.index") }}">List of categories</a></li>
                                <li><a href="{{ route("artwork-category.create") }}">Add category</a></li>
                                <a href="javascript: void(0);">
                                    <span>Collection Type management</span>
                                </a>
                                <li><a href="{{ route("collections.index") }}">List of Collection Types</a></li>
                                <li><a href="{{ route("collections.create") }}">Add Collection Type</a></li>

                                <a href="javascript: void(0);">
                                    <span>Style management</span>
                                </a>
                                <li><a href="{{ route("styles.index") }}">List of styles</a></li>
                                <li><a href="{{ route("styles.create") }}">Add style</a></li>

                                <a href="javascript: void(0);">
                                    <span>Artwork Subject mgmt</span>
                                </a>
                                <li><a href="{{ route("artworks-subjects.index") }}">List of Subjects</a></li>
                                <li><a href="{{ route("artworks-subjects.create") }}">Add Subject</a></li>

                                <a href="javascript: void(0);">
                                    <span>Material management</span>
                                </a>
                                <li><a href="{{ route("materials.index") }}">List of materials</a></li>
                                <li><a href="{{ route("materials.create") }}">Add material</a></li>

                                <a href="javascript: void(0);">
                                    <span>Movement management</span>
                                </a>
                                <li><a href="{{ route("movements.index") }}">List of movements</a></li>
                                <li><a href="{{ route("movements.create") }}">Add movement</a></li>

                                
                            </ul> 
                            
                            
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Artwork management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('artworks.index') }}">List of artworks</a></li>
                                <li><a href="{{ route('artworks.create') }}">Add artwork</a></li>
                            </ul>
                        </li>
                       
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Buyer management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="#">List of buyers</a></li>
                                <li><a href="#">Add buyer</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-gallery-fill"></i>
                                <span>Gallerist management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="#">List of gallerists</a></li>
                                <li><a href="#">Add gallerist</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" ri-file-shield-line"></i>
                                <span>Subscription plans</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route("subscriptions.create") }}">Add subscription</a></li>
                                <li><a href="{{ route("artists.index") }}">Plan for artists</a></li>
                                <li><a href="{{ route("artists.index") }}">Plan for gallerist</a></li>
                                <li><a href="{{ route("artists.index") }}">Plan for users</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Cms management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('cms.index') }}">Home page cms</a></li>
                                <li><a href="{{ route('cms.create') }}">Add cms</a></li>
                            </ul>
                        </li>
                        

                        

                       
                        
                        
                        <!-- <li><a href="#" class="waves-effect"><i class="far fa-smile"></i>  Website+Android+IOS Development</a></li> -->
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
    
var c;
var galleryImagesContainer = document.getElementById('galleryImages');
var imageCropFileInput = document.getElementById('imageCropFileInput');
var cropperImageInitCanvas = document.getElementById('cropperImg');
var cropImageButton = document.getElementById('cropImageBtn');
// Crop Function On change
  function imagesPreview(input) {
    var cropper;
    galleryImagesContainer.innerHTML = '';
    var img = [];
    if(cropperImageInitCanvas.cropper){
      cropperImageInitCanvas.cropper.destroy();
      cropImageButton.style.display = 'none';
      cropperImageInitCanvas.width = 0;
      cropperImageInitCanvas.height = 0;
    }
    if (input.files.length) {
      var i = 0;
      var index = 0;
      for (let singleFile of input.files) {
        var reader = new FileReader();
        reader.onload = function(event) {
          var blobUrl = event.target.result;
          img.push(new Image());
          img[i].onload = function(e) {
            // Canvas Container
            var singleCanvasImageContainer = document.createElement('div');
            singleCanvasImageContainer.id = 'singleImageCanvasContainer'+index;
            singleCanvasImageContainer.className = 'singleImageCanvasContainer';
            // Canvas Close Btn
            var singleCanvasImageCloseBtn = document.createElement('button');
            var singleCanvasImageCloseBtnText = document.createTextNode('Close');
            // var singleCanvasImageCloseBtnText = document.createElement('i');
            // singleCanvasImageCloseBtnText.className = 'fa fa-times';
            singleCanvasImageCloseBtn.id = 'singleImageCanvasCloseBtn'+index;
            singleCanvasImageCloseBtn.className = 'singleImageCanvasCloseBtn';
            singleCanvasImageCloseBtn.onclick = function() { removeSingleCanvas(this) };
            singleCanvasImageCloseBtn.appendChild(singleCanvasImageCloseBtnText);
            singleCanvasImageContainer.appendChild(singleCanvasImageCloseBtn);
            // Image Canvas
            var canvas = document.createElement('canvas');
            canvas.id = 'imageCanvas'+index;
            canvas.className = 'imageCanvas singleImageCanvas';
            canvas.width = e.currentTarget.width;
            canvas.height = e.currentTarget.height;
            canvas.onclick = function() { cropInit(canvas.id); };
            singleCanvasImageContainer.appendChild(canvas)
            // Canvas Context
            var ctx = canvas.getContext('2d');
            ctx.drawImage(e.currentTarget,0,0);
            // galleryImagesContainer.append(canvas);
            galleryImagesContainer.appendChild(singleCanvasImageContainer);
            while (document.querySelectorAll('.singleImageCanvas').length == input.files.length) {
              var allCanvasImages = document.querySelectorAll('.singleImageCanvas')[0].getAttribute('id');
              cropInit(allCanvasImages);
              break;
            };
            urlConversion();
            index++;
          };
          img[i].src = blobUrl;
          i++;
        }
        reader.readAsDataURL(singleFile);
      }
      // addCropButton();
      // cropImageButton.style.display = 'block';
    }
  }
  imageCropFileInput.addEventListener("change", function(event){
    imagesPreview(event.target);
  });
// Initialize Cropper
  function cropInit(selector) {
    c = document.getElementById(selector);
    console.log(document.getElementById(selector));
    if(cropperImageInitCanvas.cropper){
        cropperImageInitCanvas.cropper.destroy();
    }
    var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
    for (let element of allCloseButtons) {
      element.style.display = 'block';
    }
    c.previousSibling.style.display = 'none';
    // c.id = croppedImg;
    var ctx=c.getContext('2d');
    var imgData=ctx.getImageData(0, 0, c.width, c.height);
    var image = cropperImageInitCanvas;
    image.width = c.width;
    image.height = c.height;
    var ctx = image.getContext('2d');
    ctx.putImageData(imgData,0,0);
    cropper = new Cropper(image, {
      aspectRatio: 1 / 1,
      preview: '.img-preview',
      crop: function(event) {

        cropImageButton.style.display = 'block';
      }
    });

  }

  function image_crop() {
    if(cropperImageInitCanvas.cropper){
      var cropcanvas = cropperImageInitCanvas.cropper.getCroppedCanvas({width: 250, height: 250});
      // document.getElementById('cropImages').appendChild(cropcanvas);
      var ctx=cropcanvas.getContext('2d');
        var imgData=ctx.getImageData(0, 0, cropcanvas.width, cropcanvas.height);
        // var image = document.getElementById(c);
        c.width = cropcanvas.width;
        c.height = cropcanvas.height;
        var ctx = c.getContext('2d');
        ctx.putImageData(imgData,0,0);
        cropperImageInitCanvas.cropper.destroy();
        cropperImageInitCanvas.width = 0;
        cropperImageInitCanvas.height = 0;
        cropImageButton.style.display = 'none';
        var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
        for (let element of allCloseButtons) {
          element.style.display = 'block';
        }
        urlConversion();
        
    } else {
      alert('Please select any Image you want to crop');
    }
  }
  cropImageButton.addEventListener("click", function(){
    image_crop();
  });
  function removeSingleCanvas(selector) {
    selector.parentNode.remove();
    urlConversion();
  }
  function urlConversion() {
    var allImageCanvas = document.querySelectorAll('.singleImageCanvas');
    var convertedUrl = '';
    for (let element of allImageCanvas) {
      convertedUrl += element.toDataURL('image/jpeg');
      convertedUrl += 'img_url';
    }
    document.getElementById('profile_img_data').value = convertedUrl;
  }

</script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });

    </script>
    
    @yield('showDivUserType')
    @yield('frame_details')
    @yield('artWorkIndex')
    @yield('slideImage')
    <script>
        $('.show_confirm').click(function(event) {
        
            var form = $(this).closest("form");
        
            var name = $(this).data("name");
        
            //alert(form);
        
            event.preventDefault();
        
            swal({
        
                    title: `Are you sure you want to delete this data?`,
        
                    text: "If you delete this, it will be gone forever.",
        
                    icon: "warning",
        
                    buttons: true,
        
                    dangerMode: true,
        
                })
        
                .then((willDelete) => {
        
                    if (willDelete) {
        
                        form.submit();
        
                    } else {
        
                        swal("Your data file is safe!");
        
                    }
        
                });
        
        });
        
     </script>
    <script>

        $(document).ready(function(){
        
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;
        
            setProgressBar(current);
        
            $(".next").click(function(){
        
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
        
            //Add Class Active
            $("#tournamentprogress li").eq($("fieldset").index(next_fs)).addClass("active");
        
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;
        
            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
            });
        
            $(".previous").click(function(){
        
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
        
            //Remove class active
            $("#tournamentprogress li").eq($("fieldset").index(current_fs)).removeClass("active");
        
            //show the previous fieldset
            previous_fs.show();
        
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;
        
            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(--current);
            });
        
            function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%")
            }
        
            $(".submit").click(function(){
            return false;
            })
        
        });
        </script>
        <script>
            function deleteType() {
                swal("Some artists are under this type, please shift them first  then try again.");
            }
        </script>
    @yield('changeCollectionStatus')

        <script type="text/javascript">
      
            $(document).ready(function (e) {
               $('#image').change(function(){
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
