@extends('website.master')
@section('main')

<main>
    @if(isset($breadcrumbs))
    <section>
        <div class="container">
            @foreach ($breadcrumbs as $breadcrumb)
            <div class="b-r-c">
                <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                <span>/</span>
                <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
            </div>
        </div>
        @endforeach
    </section>
    @endif

    @if(isset($products))
    <section class="padding-b">
        <div class="important-title">
            <span class="line-1"></span>
            <h1>{{$model->title}}</h1>

            <span class="line-1"></span>
        </div>


        <div class="container">

            <div class="row">



                <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="select-categories-box">
                        <h2>Product Categories</h2>
                        <hr>
                        <div class="categories-list">
                            <ul class="list-ul">
                                <li class="list-li ">
                                    <a href="#" onclick="openPos(event, 'all')">{{trans('website.all')}}</a>
                                    <span></span>
                                </li>
                                
                                @foreach($category as $key => $cat)
                                @if($cat ==! 0)
                                @if ($cat->children ==! 0)
                                    @foreach ($cat->children as $subSec)
                                <li class="list-li tablinks" >
                                
                                  
                                    <a href="#" onclick="openPos(event, '{{$subSec->id}}','{{$cat->id }}')">{{ $cat->translate(app()->getlocale())->title }}</a>
                                 
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                            viewBox="0 0 9.414 16.828">
                                            <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                transform="translate(8 1.414) rotate(90)">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M14,0,7,7,0,0" fill="none"
                                                    stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </span>

                                   
                                    <ul class="child-ul tablinks">

                                        <li>
                                            <a href="#" onclick="openPos(event, '{{$subSec->id}}')">{{ ($subSec[app()->getlocale()]->title) }}</a>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                                    viewBox="0 0 9.414 16.828">
                                                    <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                        transform="translate(8 1.414) rotate(90)">
                                                        <path id="Stroke_1" data-name="Stroke 1" d="M14,0,7,7,0,0"
                                                            fill="none" stroke="#000" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10"
                                                            stroke-width="2" />
                                                    </g>
                                                </svg>
                                            </span>
                                            @if ($subSec->children ==! 0)
                                            @foreach ($subSec->children as $CsubSec)

                                            <ul class="child-ul tablinks">
                                                <li>
                                                    <a href="#" onclick="openPos(event,'{{$CsubSec->id}}')">{{ ($CsubSec[app()->getlocale()]->title) }}</a>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414"
                                                            height="16.828" viewBox="0 0 9.414 16.828">
                                                            <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                                transform="translate(8 1.414) rotate(90)">
                                                                <path id="Stroke_1" data-name="Stroke 1"
                                                                    d="M14,0,7,7,0,0" fill="none" stroke="#000"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-miterlimit="10" stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    @if ($CsubSec->children ==! 0)
                                            @foreach ($CsubSec->children as $DsubSec)
                                           
                                            <ul class="child-ul">
                                                <li>
                                                    <a href="#" onclick="openPos(event, '{{$DsubSec->id}}')">{{ ($DsubSec[app()->getlocale()]->title) }}</a>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414"
                                                            height="16.828" viewBox="0 0 9.414 16.828">
                                                            <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                                transform="translate(8 1.414) rotate(90)">
                                                                <path id="Stroke_1" data-name="Stroke 1"
                                                                    d="M14,0,7,7,0,0" fill="none" stroke="#000"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-miterlimit="10" stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </span>

                                                </li>
                                    
                                               
                                            </ul>
                                            @endforeach
                                            @endif
                                                </li>
                                    
                                               
                                            </ul>
                                            @endforeach
                                            @endif
                                          
                                        </li>


                                    </ul>
                                    @endforeach
                                    @endif
                                </li>
                                @endif
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-9 col-lg-9 col-md-8 col-sm-6">
                    <div class="products-container">
                        <div class="form-box">

                            <div class="product-search-result">
                                <h2>{{$products->translate(app()->getlocale())->title}}</h2>
                                <h4>
                                    found <span>{{ $products_posts->total() }} </span> result
                                </h4>
                            </div>
                            <form action="" method="" role="search">
                                <input id="searhtext" type="text" placeholder="Search..." name="que">
                                <button>
                                    <svg id="search-normal" xmlns="http://www.w3.org/2000/svg" width="20.493"
                                        height="20.493" viewBox="0 0 20.493 20.493">
                                        <path id="Vector"
                                            d="M16.224,8.112A8.112,8.112,0,1,1,8.112,0,8.112,8.112,0,0,1,16.224,8.112Z"
                                            transform="translate(1.708 1.708)" fill="none" stroke="#414141"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" />
                                        <path id="Vector-2" data-name="Vector" d="M1.708,1.708,0,0"
                                            transform="translate(17.078 17.078)" fill="none" stroke="#414141"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" />
                                        <path id="Vector-3" data-name="Vector" d="M0,0H20.493V20.493H0Z"
                                            transform="translate(0 0)" fill="none" opacity="0" />
                                    </svg>
                                </button>
                            </form>
        
                        </div>
                   
                        <div class="products-list" id="search-list">
                        @if(isset($products_posts) && (count($products_posts) > 0))
                            @foreach($products_posts as $post)
                         
                            @if(isset($post->category) && ($post->category) != 0)
                        
                            <a href="/{{$post->getfullslug()}}" class="product-list-item tabcontent"  id="{{$post->category}}">
                               
                                <div class="list-img">
                                    <img src="{{ image($post->thumb) }}" alt="img">
                                    <div class="photo-hover">
                                        <div class="text">
                                            {!! $post->translate(app()->getlocale())->text !!}
                                        </div>
                                    </div>
                                </div>
                                <h3>{{$post->translate(app()->getlocale())->title}}</h3>
                            </a>
                            @endif
                            @endforeach
                            @endif
                        </div>
                       

                    </div>
                </div>
            </div>

        </div>

    </section>
    @endif


    <section>
        <div class="container">
            <div class="pagination">
                @if(isset($products_posts) && (count($products_posts) > 0))
                {{ $products_posts->links("website.components.pagination") }}
                @endif
            </div>
        </div>

    </section>
</main>
@endsection
