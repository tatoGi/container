<div class="header">
    <div class="header-bg">
        <div class="h-bg-1">

        </div>
        <div class="h-bg-2"></div>
    </div>

  
    <div class="header-pos-container">
        <div class="container">
            <div class="flexy-container">
                <div href="/{{app()->getLocale()}}" class="logo">
                    <a href="/{{app()->getLocale()}}">
                        <img src="/website/assets/img/logo.png" alt="logo">
                    </a>
                    <div class="logo-bg"></div>
                </div>
                <div class="navigation-menu">
                    <div class="top-navbar">
                        <div class="contact-links">
                            <li>
                                <a href="callto:{{settings('phone')}}">
                                    <span class="icon icon-Calling"></span>
                                    <span class="l-links">+{{settings('phone')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="callto:{{settings('time')}}">
                                    <span class="icon icon-Time"></span>
                                    <span class="l-links">{{settings('time')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="callto:{{settings('email')}}">
                                    <span class="icon icon-Send"></span>
                                    <span class="l-links">{{settings('email')}}</span>
                                </a>
                            </li>
                        </div>
                        <div class="social-links">
                            <li>
                                <a href="{{settings('facebook')}}">
                                    <span class="icon-face">
                                </a>
                                </span></li>
                            <li>
                                <a href="{{settings('twitter')}}">
                                    <span class="icon-tw">
                                </a>
                                </span></li>
                            <li>
                                <a href="{{settings('instagram')}}">
                                    <span class="icon-inst">
                                </a>
                                </span></li>
                        </div>
                    </div>
                    <div class="bottom-navbar">

                        <ul>
                            @foreach ($sections as $section)
                            @if ($sections !== 0)
                            <li>
                                <a href="/{{ $section->getFullSlug() }}">{{ strtoupper($section->title) }}</a>
                                
                                <div class="sub-menu">
                                    @if ($section->children->count() > 0)
                                    @foreach ($section->children as $subSec)
                                    <div class="sub-menu-links">
                                        <a href="/{{ $subSec->getFullSlug() }}">{{ strtoupper($subSec->title) }}</a>

                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </li>
                            @endif
                            @endforeach

                        </ul>
                        <div class="search-lang">
                            <div class="search-box">
                                <form action="/{{ app()->getLocale() }}/search" method="GET" role="search">
                                    <input id="myInput" type="text" placeholder="{{ trans('website.search') }}..." name="que">
                                    <button class="search-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22.535" height="22.535"
                                            viewBox="0 0 22.535 22.535">
                                            <g id="vuesax_linear_search-normal" data-name="vuesax/linear/search-normal"
                                                transform="translate(-428 -188)">
                                                <g id="search-normal" transform="translate(428 188)">
                                                    <path id="Vector"
                                                        d="M17.84,8.92A8.92,8.92,0,1,1,8.92,0,8.92,8.92,0,0,1,17.84,8.92Z"
                                                        transform="translate(1.878 1.878)" fill="none" stroke="#f16922"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                    <path id="Vector-2" data-name="Vector" d="M1.878,1.878,0,0"
                                                        transform="translate(18.779 18.779)" fill="none"
                                                        stroke="#f16922" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                    <path id="Vector-3" data-name="Vector" d="M0,0H22.535V22.535H0Z"
                                                        fill="none" opacity="0" />
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="lang-box">
                                <div class="line"></div>
                                @foreach (config('app.locales') as $k => $value)

                                @if ($value != app()->getLocale())
                                
                                <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif"
                                    class="lang">{{ trans('website.'.$value) }}</a>
                                   
                                    @endif
                                    @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <div class="burger-icon"></div>
            </div>
        </div>
    </div>
</div>
