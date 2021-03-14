@extends('layout.master')

@section('title')
    Homepage
@endsection

@section('slider')
    <section id="slider" class="slider-element slider-parallax revslider-wrap ohidden clearfix">

        <!--
        #################################
            - THEMEPUNCH BANNER -
        #################################
        -->
        <div id="rev_slider_ishop_wrapper" class="rev_slider_wrapper fullwidth-container" data-alias="default-slider"
             style="padding:0px;">
            <!-- START REVOLUTION SLIDER 5.1.4 fullwidth mode -->
            <div id="rev_slider_ishop" class="rev_slider fullwidthbanner" data-version="5.1.4">
                <ul>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="Witch">
                        <img src="{{lib_assets('images/banner-web.png')}}" alt="Witch"
                             style="width: 100%; height: 100%; object-fit: cover">
                    </li>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="Witch">
                        <img src="{{lib_assets('images/banner-web2.png')}}" alt="Witch"
                             style="width: 100%; height: 100%; object-fit: cover">
                    </li>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="Witch">
                        <img src="{{lib_assets('images/banner-web3.png')}}" alt="Witch"
                             style="width: 100%; height: 100%; object-fit: cover">
                    </li>
                </ul>
            </div>
        </div><!-- END REVOLUTION SLIDER -->

    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 mt-3 d-lg-flex flex-column justify-content-between">

            <div class="row">
                <div class="col-lg-6" style="margin-bottom: 15px;">
                    <a href="{{route('category', ['categorySlug' => 'vay'])}}"><img class="w-100" src="{{lib_assets('images/shop/banners/2.png')}}" alt="Image"></a>
                </div>

                <div class="col-lg-6" style="margin-bottom: 15px;">
                    <a href="{{route('category', ['categorySlug' => 'quan'])}}"><img class="w-100" src="{{lib_assets('images/shop/banners/8.png')}}" alt="Image"></a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('category', ['categorySlug' => 'ao'])}}"><img src="{{lib_assets('images/shop/banners/4.png')}}" alt="Image"></a>
                </div>
            </div>

        </div>

        <div class="col-lg-4 mt-3">
            <a href="{{route('category', ['categorySlug' => 'set'])}}"><img class="w-100" src="{{lib_assets('images/shop/banners/9.png')}}" alt="Image"></a>
        </div>
    </div>

    <div class="tabs topmargin-lg clearfix">

        <ul class="tab-nav clearfix">
            <li><a href="#new-products">Sản phẩm mới</a></li>
            <li><a href="#hot-products">Bán chạy</a></li>

        </ul>

        <div class="tab-container">
            <div class="tab-content clearfix" id="new-products">

                <div class="shop shop-flex clearfix d-flex flex-wrap">
                    @foreach($topProducts as $product)
                        @php
                        $productLink = route('product', ['categorySlug' => $product->category['slug'], 'productSlug' => $product->slug]);
                        @endphp
                        <div class="product clearfix ">
                            <div class="product-image">
                                <a href="{{$productLink}}">
                                    <img src="{{ $product->images_url[0] }}" alt="{{ $product->name }}">
                                </a>
                                <a href="{{$productLink}}">
                                    <img src="{{ count($product->images_url) > 1 ? $product->images_url[1] : $product->images_url[0] }}" alt="{{ $product->name }}">
                                </a>

                                <div class="product-overlay">
                                    <a href="{{$productLink}}" class="add-to-cart">
                                        <i class="icon-info"></i><span> Chi tiết</span>
                                    </a>
                                    <a href="https://witch.vn/pop-up/38" class="item-quick-view" data-lightbox="ajax">
                                        <i class="icon-zoom-in2"></i><span> Xem nhanh</span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-desc center">
                                <div class="product-title">
                                    <h3><a href="{{$productLink}}">{{ $product->name }}</a></h3>
                                </div>
                                <div class="product-price">
                                    <ins>{{ $product->price_pretty }}₫</ins>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="tab-content clearfix" id="hot-products">

                <div class="shop shop-flex clearfix d-flex flex-wrap">
                    @foreach($topProducts as $product)
                        @php
                            $productLink = route('product', ['categorySlug' => $product->category['slug'], 'productSlug' => $product->slug]);
                        @endphp
                        <div class="product clearfix ">
                            <div class="product-image">
                                <a href="{{$productLink}}">
                                    <img src="{{ $product->images_url[0] }}" alt="{{ $product->name }}">
                                </a>
                                <a href="{{$productLink}}">
                                    <img src="{{ count($product->images_url) > 1 ? $product->images_url[1] : $product->images_url[0] }}" alt="{{ $product->name }}">
                                </a>

                                <div class="product-overlay">
                                    <a href="{{$productLink}}" class="add-to-cart">
                                        <i class="icon-info"></i><span> Chi tiết</span>
                                    </a>
                                    <a href="https://witch.vn/pop-up/38" class="item-quick-view" data-lightbox="ajax">
                                        <i class="icon-zoom-in2"></i><span> Xem nhanh</span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-desc center">
                                <div class="product-title">
                                    <h3><a href="{{$productLink}}">{{ $product->name }}</a></h3>
                                </div>
                                <div class="product-price">
                                    <ins>{{ $product->price_pretty }}₫</ins>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
@endsection

@section('extraCss')
    <style>
        .revo-slider-emphasis-text {
            font-size: 58px;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }

        .tp-video-play-button {
            display: none !important;
        }

        .tp-caption {
            white-space: nowrap;
        }
    </style>
@endsection

@section('extraJs')
    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script src="{{lib_assets('include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{lib_assets('include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>

    <script>

        var tpj = jQuery;
        tpj.noConflict();

        tpj(document).ready(function () {

            var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution(
                {
                    sliderType: "standard",
                    jsFileLocation: "include/rs-plugin/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {},
                    responsiveLevels: [1200, 992, 768, 480, 320],
                    gridwidth: 1140,
                    gridheight: 500,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        disableFocusListener: false,
                    },
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "ares",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder">Witch</span> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        }
                    }
                });

            apiRevoSlider.bind("revolution.slide.onloaded", function (e) {
                SEMICOLON.slider.sliderParallaxDimensions();
            });

        }); //ready

    </script>
@endsection
