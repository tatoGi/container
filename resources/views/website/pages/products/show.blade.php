@extends('website.master')
@section('main')
  
  
  
  <main>
  @if(isset($breadcrumbs))

        <section>
            <div class="container">
                <div class="b-r-c">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    <span >/</span>
                    @foreach ($breadcrumbs as $breadcrumb)
                   
                    <a href="/{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    
                    @endforeach
                     
                </div>
            </div>
        </section>
    @endif

        <section>
            <div class="products-det-cont p-t-5">
                <div class="container">
              
                    <div class="row">
                   
                        <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-5 ">
                            <div class="tab-img-products">
                                <div class="tab-img-box-position">
                                @foreach ($model->files as $file)
                                    <div class="tab-img-item">
                                      <img src="/{{ config('config.image_path') . $file->file }}" alt="Nature" onclick="myFunction(this);">
                                    </div>
                                    @endforeach
                                  
                                </div> 
                                @if (isset($products->posts) && count($products->posts) > 0)
                                            @foreach ($products->posts as $product)
                                   <a href="{{ image($product->thumb) }}" data-fancybox="tab-img" id="tab-fancy">
                                        <img id="expandedImg" style="width:100%" src="{{ image($product->thumb) }}">
                                   </a> 
                                   @endforeach
                                   @endif
                                    <div class="tab-zoom">
                                        <svg id="search-normal" xmlns="http://www.w3.org/2000/svg" width="20.493" height="20.493" viewBox="0 0 20.493 20.493">
                                            <path id="Vector" d="M16.224,8.112A8.112,8.112,0,1,1,8.112,0,8.112,8.112,0,0,1,16.224,8.112Z" transform="translate(1.708 1.708)" fill="none" stroke="#414141" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"/>
                                            <path id="Vector-2" data-name="Vector" d="M1.708,1.708,0,0" transform="translate(17.078 17.078)" fill="none" stroke="#414141" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"/>
                                            <path id="Vector-3" data-name="Vector" d="M0,0H20.493V20.493H0Z" transform="translate(0 0)" fill="none" opacity="0"/>
                                        </svg>
                                    </div>  
                            </div>
                        </div>
                       
                        <div class="col-xxl-9 col-lg-8 col-md-8 col-sm-7">
                            <div class="container-components-box">
                                <h1 class="container-name">
                                {{ $model[app()->getlocale()]->title }}
                                </h1>
                                <div class="cont-snt">
                                {!! $model[app()->getlocale()]->desc !!}
                                </div>
                                <div class="container-description">
                                    <h3>Description:</h3>
                                    <div class="text">
                                    {!! $model[app()->getlocale()]->text !!}
                                    </div>
                                </div>
                                <div class="container-components">
                                    <div class="c-weight c-c-t">
                                        <h5>Weight:</h5>
                                        <div class="weight">
                                            <div>
                                                <span>             
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.6" height="9.226" viewBox="0 0 12.6 9.226">
                                                        <path id="Path" d="M12.237,2.124,5.49,8.871a1.252,1.252,0,0,1-1.747,0L.362,5.5A1.245,1.245,0,0,1,2.124,3.743L4.609,6.229,10.476.362a1.245,1.245,0,0,1,1.761,1.761" fill="#e3662a"/>
                                                    </svg>
                                                </span>
                                                <span>
                                                {!! $model->Weight !!}

                                                </span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="c-size c-c-t"> 
                                        <div class="size">
                                            <h5>Size:</h5>
                                            <div>
                                                <span>             
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.6" height="9.226" viewBox="0 0 12.6 9.226">
                                                        <path id="Path" d="M12.237,2.124,5.49,8.871a1.252,1.252,0,0,1-1.747,0L.362,5.5A1.245,1.245,0,0,1,2.124,3.743L4.609,6.229,10.476.362a1.245,1.245,0,0,1,1.761,1.761" fill="#e3662a"/>
                                                    </svg>
                                                </span>
                                                <span>
                                                {!! $products->Size !!}

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c-m-q c-c-t">
                                        <h5>
                                            Measurement: 
                                            <span>Pack</span>
                                        </h5>                                        
                                        <h5>
                                            Minimum Quantity:
                                            <span>10</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                   
                </div>
            </div>
        </section>

 
 
       
      
        
        <hr class="hr-bottom">

    </main>
    @endsection

