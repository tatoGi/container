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
        <div class="product-section padding-b mobile-padding-b">
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
                        <a href="/{{$post->getfullslug()}}" class="p-item">
                            @if(isset($post->thumb))
                            <div class="front-item">
                                <img src="{{ image($post->thumb) }}">
                                <div class="read-more-box">
                                    <div class="title">{{$post->translate(app()->getlocale())->title}}</div>
                                    <div class="read-more-links">
                                        <div class="read-more">Read More</div>
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
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="back-item">
                                <img src="/uploads/img/blue.png" alt="bg_product">
                                <div class="read-more-box">
                                    <div class="title">{{$post->translate(app()->getlocale())->title}}</div>
                                    <div class="read-more-links">
                                        <div class="read-more">Read More</div>
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
                                    </div>
                                </div>
                            </div>
                            @endif
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
                    <h1>{{$about_section[app()->getlocale()]->title}}</h1>

                    <span class="line-1"></span>
                </div>

                <div class="about-position-box">
                    <div class="row wrap-row">

<<<<<<< HEAD
                        <div class="col-lg-5 col-md-6 col-sm-6 col-12">
=======
                        <div class="col-lg-5 col-lg-5 col-md-6 col-sm-6 col-12">
>>>>>>> 98d172dc80b84deaa0e3c9aac0a9171fd017f1b9
                            <div class="about-image">
                                <img src="{{ image($about_section->posts[0]->thumb) }}" alt="img">
                            </div>

                        </div>
<<<<<<< HEAD
                        <div class="col-lg-8 col-md-8 col-sm-8 col-12 absolute-position">
=======
                        <div class="col-lg-8 col-lg-8 col-md-8 col-sm-8 col-12 absolute-position absolute-position">
>>>>>>> 98d172dc80b84deaa0e3c9aac0a9171fd017f1b9
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

    @if(isset($popular_products))
    
    <section>

        <div class="popular-product-section padding-b">
            <div class="popular-product">
<<<<<<< HEAD
                <div class="important-title">
                    <span class="line-1"></span>
                    <h1>POPULAR PRODUCT</h1>
                    <span class="line-1"></span>
                </div>
               
                <div class="popular-slider-container">
                @if(isset($popular_products) && (count($popular_products) > 0))
                        @foreach($popular_products as $post)
                    <div class="popular-slider-item">
                        <div class="container">
                            <div class="row wrap-row wrap-row2 row-height">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 position-r">
                                    <div class="popular-product-text">
                                        <h1>{{ $post->translate(app()->getlocale())->title }}
                                        </h1>
                                        <div class="text">{!! $post->translate(app()->getlocale())->text !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 absolute-pos">
                                    <div class="popular-product-img">
                                        <img src="{{ image($post->thumb) }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
=======
                <div class="container">
                    <div class="important-title">
                        <span class="line-1"></span>
                        <h1>{{$post->translate(app()->getlocale())->title}}</h1>
                        <span class="line-1"></span>
                    </div>
                    
                      
                    <div class="row wrap-row row-height">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 position-r">
                            <div class="popular-product-text">
                                <h1>{!! $post->translate(app()->getlocale())->desc !!}
                                </h1>
                                <div class="text">{!! $post->translate(app()->getlocale())->title !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 absolute-pos">
                            <div class="popular-product-img">
                                <img src="{{ image($post->thumb) }}" alt="img">
                            </div>
                        </div>
>>>>>>> 98d172dc80b84deaa0e3c9aac0a9171fd017f1b9
                    </div>
                    @endforeach
                @endif
                </div>
                


            </div>
        </div>
    </section>
@endif
    @if(isset($news))
    <section>
<<<<<<< HEAD
        <div class="news-section news-section2 padding nn-section">
            <div class="important-title">
                <span class="line-1"></span>
                <h1>{{$news->translate(app()->getlocale())->title}}</h1>
                <span class="line-1"></span>
            </div>
            
            <div class="news-sliders-2">
            @if(isset($news->posts) && (count($news->posts) > 0))
            @foreach($news->posts as $post)
                <div class="news-slider-2-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-5 col-12 news-position">
                                <div class="news-img-box">
                                    <img src="{{ image($post->thumb) }}" alt="img">
                                </div>
=======

        <div class="important-title">
            <span class="line-1"></span>
            <h1>{{$news->translate(app()->getlocale())->title}}</h1>
            <span class="line-1"></span>
        </div>
        @if(isset($news->posts) && (count($news->posts) > 0))
        @foreach($news->posts as $post)
        <div class="news-section padding m-b-2">
            <div class="container">
                <div class="row row2">

                    <div class="col-lg-4 col-md-5 col-sm-5 col-12 news-position">

                        <div class="news-img-box">
                            <img src="{{ image($post->thumb) }}" alt="img">
                        </div>

                    </div>

                    <div class="col-lg-8 col-lg-8 col-md-7 col-sm-7 col-12">
                        <div class="news-text-box">
                            <div class="time">
                                <span>{{ getDates($post->date) }}</span>
>>>>>>> 98d172dc80b84deaa0e3c9aac0a9171fd017f1b9
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-12">
                                <div class="news-text-box">
                                    <div class="time">
                                        <span>{{ getDates($post->date) }}</span>

                                    </div>
                                    <h2>{!! $post->translate(app()->getlocale())->desc!!}
                                    </h2>
                                    <div class="text">{!! $post->translate(app()->getlocale())->text!!}
                                    </div>
                                    <a href="/{{$news->getfullslug()}}" class="see-all-link see-2  see-all-link2">
                                        See All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
          

        </div>

    </section>
    @endif

</main>

@endsection
