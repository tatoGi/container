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
                <span>/</span>
                @endforeach

            </div>
        </div>
    </section>
    @endif
    <section>
        <div class="news-section p-t-5 news-det-section">
            <div class="container">
                <div class="row row2">
                    <div class="col-lg-4 news-position">
                        <div class="news-img-box">
                            <img src="{{ image($model->thumb) }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="news-text-box news-det-text-box ">
                            <div class="time">
                                <span>{{ getDates($model->date) }}</span>

                            </div>
                            <h2>{!! $model->translate(app()->getlocale())->desc !!}
                            </h2>
                            <div class="det-socials">
                                <div class="share-icons">
                                    <a href="{{$model->facebook}}">
                                        <span class="icon-face"></span>
                                    </a>
                                    <a href="{{$model->Twitter}}">
                                        <span class="icon-tw"></span>
                                    </a>
                                    <a href="{{$model->instagram}}">
                                        <span class="icon-inst"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="text">
                    {!! $model->translate(app()->getlocale())->text !!}
                </div>
                @foreach ($model->files as $file)
                <div class="about-page-img-gallery">
                    <a href="/{{ config('config.image_path') . $file->file }}" data-fancybox="video-inner">
                        <img src="/{{ config('config.image_path') . $file->file }}" alt="">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <section>
            <div class="important-title m-t-2">
                <span class="line-1"></span>
                <h1>{{ $news->translate(app()->getlocale())->title }}</h1>
                <span class="line-1"></span>
            </div>
            
           
            <div class="news-slider">
            @if (isset($news->posts) && count($news->posts) > 0)
              
              @foreach ($news->posts as $post)
                <div class="news-section padding m-b-22">
                    <div class="container">
                        <div class="row row2">
                            <div class="col-lg-4 news-position">
                                <div class="news-img-box">
                                    <img src="{{ image($post->thumb) }}" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="news-text-box">
                                    <div class="time">
                                        <span>{{ getDates($post->date) }}</span>
                                        
                                    </div>
                                    <h2 class="m-b-1">{!! $post->translate(app()->getlocale())->desc !!}
                                    </h2>
                                    <div class="text">{!! $post->translate(app()->getlocale())->text !!}
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
            </div>
            
            </section>

<div class="container">
    <div class="pagination">
        @if(isset($news_posts) && (count($news_posts) > 0))

        {{ $news_posts->links("website.components.pagination") }}
        @endif
    </div>
</div>

</section>
           
            
    
    @include('website.components.progress')
</main>
@endsection
