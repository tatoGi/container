@extends('website.master')
@section('main')
  
  
  
  <main>
  @if(isset($breadcrumbs))

<section>
    <div class="container">
        <div class="b-r-c">
            <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
            <span>/</span>
            @foreach ($breadcrumbs as $breadcrumb)
            <a href="/{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
            
            @endforeach
             
        </div>
    </div>
</section>
@endif
        <section class="mg-b-21">  
            <div class="photo-albums p-t-5">
                <div class="container">
                    <div class="albums-title">
                        <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
                    </div>
                    <div class="photo-box">
                        <a href="{{ image($model->thumb) }}" class="photo" data-fancybox="photos">
                            <img src="{{ image($model->thumb) }}" alt="product">
                            <div class="photo-hover">
                                <div class="text">
                               {!! $photo->translate(app()->getlocale())->desc !!}
                                </div> 
                            </div>
                        </a>
                   
                    </div>
                </div>
            </div>
           
        </section>
        <section>
        <div class="container">
            <div class="pagination">
                @if(isset($photo_posts) && (count($photo_posts) > 0))
                {{ $photo_posts->links("website.components.pagination") }}
                @endif
            </div>
        </div>

    </section>
    
        <section>
        @if(isset($photo_posts) && (count($photo_posts) > 0))
                        @foreach($photo_posts as $post)
            <div class="important-title m-t-2">
                <span class="line-1"></span>
                <h1>{{$post->translate(app()->getlocale())->title}}</h1>
                <span class="line-1"></span>
            </div>
            
            <div class="news-slider">
                <div class="news-section padding m-b-22 padding-2">
                    <img src="assets/img/Mask Group 158.svg" alt="svg" class="album-slider-pos">
                    <div class="container">
                        <div class="row row2 album-row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 news-position">
                                <div class="news-img-box">
                                    <img src="{{ image($post->thumb) }}" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                <div class="news-text-box album-text-box">
                                     
                                    <h2 class="m-b-1">
                                        {!! $post->translate(app()->getlocale())->desc !!}
                                    </h2>
                                    
                                    <a href="/{{$photo->getfullslug()}}" class="about-read-link m-t-1">
                                        <div class="read-link">See more</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36.514" height="11.852" viewBox="0 0 36.514 11.852">
                                            <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right" transform="translate(0.75 1.061)">
                                              <g id="Arrow_-_Right" data-name="Arrow - Right" transform="translate(0 9.73) rotate(-90)">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M0,35.013V0" transform="translate(4.865 0)" fill="none" stroke="#e3662a" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                <path id="Stroke_3" data-name="Stroke 3" d="M9.73,0,4.865,4.886,0,0" transform="translate(0 30.128)" fill="none" stroke="#e3662a" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                              </g>
                                            </g>
                                          </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            @endforeach
            @endif
        </section>


 @include('website.components.progress')

    </main>
    @endsection