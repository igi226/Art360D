@extends('User.Main.mainLayout')
@section('title', 'Gallery | Art360D')
@section('content')
<div class="gallery_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="product-details-image">
                    <img src="https://www.art360d.com/img/gallery/flower.JPG" alt="product">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-self-center">
                <div class="product-image-content">
                    <div class="pro_thumb">
                        <span><img src="{{ asset('User/assets/images/g1.jpg') }}" alt=""></span>
                        <h3>THE GARDEN</h3>

                    </div>
                    <h2>Description</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="item-content item-content-flex">
                            <div class="icon-gallery">
                              
                              <span><a href="javascript:void(0);" class="btn btn-like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                            </div>
                            <div class="icon-gallery">
                              <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                            </div> 
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection