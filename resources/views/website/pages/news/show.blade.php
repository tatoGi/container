@extends('website.master')



@section('main')

<main>

    @if(isset($breadcrumbs))



    <section>

        <div class="container">

            <div class="b-r-c">

                <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>

                <span>/</span>
                <a href="/{{$section->getfullslug()}}">  {{ $section[app()->getlocale()]->title }}</a>
                <span>/</span>
                @foreach ($breadcrumbs as $breadcrumb)



                <a href="/{{ $breadcrumb['url'] }}">{{Str::limit($breadcrumb['name'] , 70 , $end='...' )}}</a>

              

                @endforeach



            </div>

        </div>

    </section>

    @endif

    <section>

        <div class="news-section p-t-5 news-det-section">

            <div class="container">

                <div class="row row2">

                    <div class="col-lg-4 col-md-5 col-sm-5 col-12 news-position">

                        <div class="news-img-box">

                            <img src="{{ image($model->thumb) }}" alt="img">

                        </div>

                    </div>

                    <div class="col-lg-8 col-md-7 col-sm-7 col-12">

                        <div class="news-text-box news-det-text-box ">

                            <div class="time">

                                <span>{{ getDates($model->date) }}</span>


<<<<<<< HEAD
                                
=======

>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
                            </div>

                            <h2>{{ $model->translate(app()->getlocale())->title }}

                            </h2>

                            <div class="det-socials">

<<<<<<< HEAD
                    <div class="share-icons">

                        <a  data-href="/{{$model->getfullslug()}}"
                                data-layout="button_count" data-size="small"><a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https://europack.ge/{{$model->getfullslug()}}&amp;src={{$model->translate(app()->getlocale())->title}}" class="fb-xfbml-parse-ignore">


                                

                                <span class="icon-face"></span>

                            </a>
                            

                            <a class="twitter-share-button"
                            href="https://twitter.com/intent/tweet?text=https://europack.ge/{{$model->getfullslug()}}" target="_blank">

                                <span class="icon-tw"></span>

                            </a>

                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://europack.ge/{{$model->getfullslug()}}" target="_blank">

                                <span class="icon-linkedin"></span>

                            </a>
=======
                                <div class="share-icons">
                                    @if(isset($model->facebook))
                                    <a href="{{$model->facebook}}">
    
                                        <span class="icon-face"></span>

                                    </a>
                                    @endif
                                    @if(isset($model->Twitter))
                                    <a href="{{$model->Twitter}}">

                                        <span class="icon-tw"></span>

                                    </a>
                                    @endif
                                    @if(isset($model->instagram))
                                    <a href="{{$model->instagram}}">

                                        <span class="icon-inst"></span>

                                    </a>
                                    @endif

                                </div>

                            </div>

                        </div>
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8



                    </div>

                </div>

<<<<<<< HEAD
                        </div>



                    </div>

                </div>

=======
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
                <div class="text">

                    {!! $model->translate(app()->getlocale())->desc !!}

                </div>
                <div class="text">

                    {!! $model->translate(app()->getlocale())->text !!}

                </div>

        

                <div class="about-page-img-gallery">
                  
                   
                @foreach ($model->files as $file)
                @if($file->file != $model->thumb)
                   
                    <a href="/{{ config('config.image_path') . $file->file }}" data-fancybox="video-inner">

                        <img src="/{{ config('config.image_path') . $file->file }}" alt="">

                    </a>
                  @endif
                    @endforeach
                
                </div>

               

            </div>

        </div>

        </div>

    </section>

    <section>

            <div class="important-title m-t-2">

                <span class="line-1"></span>

                <h1>{{ trans('admin.Other_news') }}</h1>

                <span class="line-1"></span>

            </div>

            

           

            <div class="news-slider">

<<<<<<< HEAD
            @if (isset($news_slider))

          

              @foreach ($news_slider as $post)
        
=======
            @if (isset($news->posts) && count($news->posts) > 0)

          

              @foreach ($news->posts->slice(0, 4) as $post)
            
              @if($model->id !== $post->id)
            
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
                <div class="news-section padding m-b-22">

                    <div class="container">

                        <div class="row row2">

                            <div class="col-lg-4 col-lg-4 col-md-5 col-sm-5 col-12 news-position">

                                <div class="news-img-box">

                                    <img src="{{ image($post->thumb) }}" alt="img">

                                </div>

                            </div>

                            <div class="col-lg-8 col-md-7 col-sm-7 col-12">

                                <div class="news-text-box news-text-box2">

                                    <div class="time">

                                    <span>{{ \Carbon\Carbon::parse($post->date)->format('d')}}</span>
                                            <span>
                                                {{ \Carbon\Carbon::parse($post->date)->translatedFormat('F Y')}}</span>

                                        

                                    </div>

                                    <h2 class="m-b-1">{{ $post->translate(app()->getlocale())->title }}

                                    </h2>

                                    <div class="text">{!! $post->translate(app()->getlocale())->desc !!}

                                    </div>

                                    <a href="/{{$post->getfullslug()}}" class="about-read-link m-t-1">

                                        <div class="read-link">{{ trans('admin.Read_More') }}</div>

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
<<<<<<< HEAD
       
=======
            @endif
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
                @endforeach

            @endif

            </div>

            <div class="container">
            <div class="slider-arrows">
                <li>
<<<<<<< HEAD
                    <a id="prev">
=======
                    <a id="prev2">
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382"
                                viewBox="0 0 65.542 33.382">
                                <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right"
                                    transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right"
                                        transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0"
                                            transform="translate(13.863)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0"
                                            transform="translate(0 47.705)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                        {{trans('admin.Prev')}}
                    </a>
                </li>
                <li class="last-li">
<<<<<<< HEAD
                    <a id="next">
=======
                    <a id="next2">
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
                    {{trans('admin.Next')}}
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382"
                                viewBox="0 0 65.542 33.382">
                                <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right"
                                    transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right"
                                        transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0"
                                            transform="translate(13.863)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0"
                                            transform="translate(0 47.705)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </a>
                </li>
            </div>
        </div>

            </section>





</section>

           

            

    

    @include('website.components.progress')

</main>

@endsection

