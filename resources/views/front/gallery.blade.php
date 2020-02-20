@extends('front.dashboard')

@section('content')

<div class="latest-gallery-area bg-white section-p-30">
        <div class="container">
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="carousel-title">
                        <h2><span>Photo Gallery</span></h2>
                    </div>
                </div>
            </div> -->
              <div class="col-md-3">
                  <!-- required for floating -->
                  <!-- Nav tabs -->

                <ul class="nav nav-tabs tabs-left gallery-category-list">

                  @foreach($category as $key => $gal)
                    <?php if($id==$gal->id){?>
                      <li class="active"><a href="{{route('gallerydetail',$gal->id)}}" ><i class="fa fa-plus" aria-hidden="true"></i>{{$gal->name}}</a></li>
                    <?php }else{?>
                    <li><a href="{{route('gallerydetail',$gal->id)}}" ><i class="fa fa-plus" aria-hidden="true"></i>{{$gal->name}}</a></li>
                  <?php }?>
                  @endforeach
                </ul>
              </div>
                <div class="col-md-9">
                  <div class="tab-content">
                    <div class="tab-pane active" id="connect">
                      <div class="gallery-details">
                        @if($galleryres)
                        @foreach($galleryres as $gallery_wise)
                          <div class="single-gallery">

                              <a  href="{{env('APP_URL_STORAGE').$gallery_wise['images']}}" data-lightbox="image-1" data-title="{{isset($gallery_wise['description'])?$gallery_wise['description']:'Demo'}}"><img src="{{env('APP_URL_STORAGE').$gallery_wise['images']}}" alt="gallery 1"  width="186px" height="186px"></a>
                          </div>
                        @endforeach
                        @else
                        <div class="single-gallery">
                              <a href="#" data-lightbox="image-1" data-title="My caption">No Images Found</a>
                          </div>
                        @endif
                        
                          
                      </div>
                    </div>
                   
                  </div>
                </div>
            </div>
        </div>
</div>
@endsection