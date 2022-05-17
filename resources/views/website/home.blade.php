@extends('website.master')

@section('main')
<main>
      <section class="main-slider-section padding padding-b">
        <div class="main-slider  ">
            @foreach ($mainBanner as $banner)
            <div class="main-item">
                <img src="{{ image($banner->thumb) }}" alt="banner-img">

            </div>
            @endforeach
        </div>
    </section>

    @if(isset($products))
    <section>
            <div class="product-section padding-b">
                <div class="container">
                    <div class="our-product">
                        <div class="important-title">
                            <span class="line-1"></span>
                            <h1>{{$products->translate(app()->getlocale())->title}}</h1>
                            <span class="line-1"></span>
                        </div>
                        
                        <div class="product-items"> 
                        @if(isset($products->posts) && (count($products->posts) > 0))
                      @foreach($products->posts as $post)
                            <a href="/{{$products->getfullslug()}}" class="p-item">
                                <div class="front-item">
                                @foreach ($post->files as $file)

                                    <img src="/{{ config('config.image_path') . $file->file }}" alt="product_img">
                                    @endforeach
                                    <div class="read-more-box">
                                        <div class="title">{{$post->translate(app()->getlocale())->title}}</div>
                                        <div class="read-more-links">
                                            <div class="read-more">Read More</div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36.514" height="11.852" viewBox="0 0 36.514 11.852">
                                                <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right" transform="translate(0.75 1.061)">
                                                <g id="Arrow_-_Right" data-name="Arrow - Right" transform="translate(0 9.73) rotate(-90)">
                                                    <path id="Stroke_1" data-name="Stroke 1" d="M0,35.013V0" transform="translate(4.865 0)" fill="none" stroke="#e3662a" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                    <path id="Stroke_3" data-name="Stroke 3" d="M9.73,0,4.865,4.886,0,0" transform="translate(0 30.128)" fill="none" stroke="#e3662a" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                               
                            </a>
                            @endforeach
                            @endif
                            </div>
                            
                        </div>
                        <a href="/{{$products->getfullslug()}}" class="see-all-link">See All</a>
                    </div>
                </div>
            </div>
        </section>
        @endif
    @if(isset($about_section))
    <section>
        <div class="about-section padding">
            <div class="container">
                <div class="important-title">
                    <span class="line-1"></span>
                    <h1>{{$about_section->title}}</h1>
                    <span class="line-1"></span>
                </div>
                
                <div class="about-position-box">
                    <div class="row wrap-row">
                     
                        <div class="col-lg-5">
                            <div class="about-image">
                                <img src="{{ image($about_section->posts[0]->thumb) }}" alt="img">
                            </div>
                         
                        </div>
                        <div class="col-lg-8 absolute-position">
                            <div class="text-box-h">
                                <h2>{{$about_section->posts[0][app()->getLocale()]->title}}</h2>
                                <div class="about-text">
                                    {!!$about_section->posts[0][app()->getLocale()]->text!!}
                                </div>
                                <a href="/{{$about_section->getfullslug()}}" class="about-read-link">
                                    <div class="read-link">{{ trans('website.Read More') }}</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36.514" height="11.852"
                                        viewBox="0 0 36.514 11.852">
                                        <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right"
                                            transform="translate(0.75 1.061)">
                                            <g id="Arrow_-_Right" data-name="Arrow - Right"
                                                transform="translate(0 9.73) rotate(-90)">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M0,35.013V0"
                                                    transform="translate(4.865 0)" fill="none" stroke="#e3662a"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" stroke-width="1.5" />
                                                <path id="Stroke_3" data-name="Stroke 3" d="M9.73,0,4.865,4.886,0,0"
                                                    transform="translate(0 30.128)" fill="none" stroke="#e3662a"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" stroke-width="1.5" />
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
    </section>
    @endif
    @if(isset($news)) 
    <section>
        @if(isset($news->posts) && (count($news->posts) > 0))
            @foreach($news->posts as $post)
            <div class="important-title">
                <span class="line-1"></span>
                <h1>{{$post->translate(app()->getlocale())->title}}</h1>
                <span class="line-1"></span>
            </div>
            <div class="news-section padding m-b-2">
                <div class="container">
                    <div class="row row2">
                    
                        <div class="col-lg-4 news-position">
                        @foreach ($post->files as $file)
                            <div class="news-img-box">
                                <img src="/{{ config('config.image_path') . $file->file }}" alt="img">
                            </div>
                            @endforeach
                        </div>
               
                        <div class="col-lg-8">
                            <div class="news-text-box">
                                <div class="time">
                                    <span>{{ getDates($post->date) }}</span>
                                </div>
                                <h2 class="m-b-1">{!! $post->translate(app()->getlocale())->desc!!}
                                </h2>
                                <div class="text">{!! $post->translate(app()->getlocale())->text!!}
                                </div>
                                <a href="/{{$news->getfullslug()}}" class="about-read-link m-t-1">
                                    <div class="read-link">Read more</div>
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
            @endforeach
            @endif
         
        </section>
    @endif

</main>

@endsection