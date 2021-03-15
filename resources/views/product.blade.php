@extends('layout.master')

@section('title')
    {{ $product->name }}
@endsection

@section('page_title')
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{ $product->name }}</h1>
        </div>

    </section>
@endsection

@section('content')
    <div class="single-product">

        <div class="product">

            <div class="col_two_fifth part-images-product">
                <!-- Product Single - Gallery
                  ============================================= -->
                <div class="product-image">
                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                        <div class="flexslider">
                            <div class="slider-wrap" data-lightbox="gallery">
                                @foreach($product->images_url as $image_url)
                                    <div class="slide" data-thumb="{{ $image_url }}">
                                        <a href="{{ $image_url }}" title="{{ $product->name }}"
                                           data-lightbox="gallery-item">
                                            <img src="{{ $image_url }}" alt="{{ $product->name }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col_two_fifth product-desc">
                <div id="priceOptionComponent">
                    <input type="hidden" id="product-data" value="{{ json_encode($product, true) }}">
                    <div class="product-price">
                        <ins>{{ $product->price_pretty }}₫</ins>
                    </div>

                    <div class="clear"></div>
                    <div class="line"></div>

                    <div class="card product-meta">
                        <div class="card-body">
                            <span itemprop="productID" class="sku_wrapper">Mã SP: <span
                                    class="sku">{{ $product->id }}</span>.</span>
                            <span class="posted_in">Danh mục: <a
                                    href="{{ route('category', ['categorySlug' => $product->category['slug']]) }}"
                                    rel="tag">{{ $product->category['name'] }}</a>.</span>

                        </div>
                    </div>

                    <div class="clear"></div>
                    <div class="line"></div>

                    <fieldset class="product-options">
                        <dl class="last">
                            <dt class="swatch-attr">
                                <label id="color_label" class="required">
                                    <em>*</em>Màu sắc:
                                    <span id="select_label_color"
                                          class="select-label"></span>
                                </label>

                            </dt>
                            <dd class="clearfix swatch-attr">
                                <div class="input-box">
                                    <ul id="configurable_swatch_color" class="configurable-swatch-list clearfix">
                                    </ul>
                                </div>
                            </dd>
                            <dt class="swatch-attr">
                                <label id="size_label" class="required">
                                    Kích cỡ:
                                    <span id="select_label_size"
                                          class="select-label"></span>
                                </label>
                            </dt>
                            <dd class="clearfix swatch-attr last">
                                <div class="input-box">
                                    <ul id="configurable_swatch_size" class="configurable-swatch-list clearfix">
                                    </ul>
                                </div>
                            </dd>
                            <dt class="swatch-attr mt-4">
                                <label id="quantity_label" class="required">
                                    Số lượng:
                                </label>
                            </dt>
                            <dd class="clearfix swatch-attr last">
                                <div class="quantity clearfix mb-3">
                                    <input type="button" value="-" class="minus">
                                    <input type="number" step="1" min="1" name="quantity"
                                           title="Số lượng" class="qty" size="4" value="1"/>
                                    <input type="button" value="+" class="plus">
                                </div>
                            </dd>
                        </dl>
                        <span class="out-of-stock-only text-danger">Sản phẩm đã hết hàng. Vui lòng chọn kích cỡ, màu khác</span>
                        <span id="error-message" class="text-danger"></span>
                    </fieldset>
                    <div class="clear"></div>
                    <!-- Product Single - Quantity & Cart Button
    ============================================= -->
                    <div class="nobottommargin">
                        <div style="width: 49%" class="d-inline-block">
                            <button
                                class="add-to-cart button btn-block button-mini button-border button-rounded button-default nomargin in-stock-only"
                                id="add-to-cart">
                                Thêm giỏ hàng
                                <div class="css3-spinner cart-spinner" style="position: absolute; z-index:auto;">
                                    <div class="css3-spinner-rect1"></div>
                                    <div class="css3-spinner-rect2"></div>
                                    <div class="css3-spinner-rect3"></div>
                                    <div class="css3-spinner-rect4"></div>
                                    <div class="css3-spinner-rect5"></div>
                                </div>
                            </button>
                            <button
                                class="add-to-cart button btn-block button-mini button-border button-rounded button-red nomargin out-of-stock-only"
                                style="cursor: default;">Hết hàng
                            </button>
                        </div>
                        <div style="width: 49%" class="fright d-inline-block">
                            <button
                                class="add-to-cart button btn-block button-mini button-border button-rounded nomargin in-stock-only"
                                id="buy-now">
                                Mua ngay
                                <div class="css3-spinner cart-spinner" style="position: absolute; z-index:auto;">
                                    <div class="css3-spinner-rect1"></div>
                                    <div class="css3-spinner-rect2"></div>
                                    <div class="css3-spinner-rect3"></div>
                                    <div class="css3-spinner-rect4"></div>
                                    <div class="css3-spinner-rect5"></div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="line"></div>
                    <div class="si-share noborder clearfix">
                        <div class="d-flex float-left">
                            <span class="mr-5">Chia sẻ:</span>
                            <a href="javascript:void(0)" class="social-icon si-borderless si-facebook"
                               @click="shareProduct">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col_full nobottommargin">
                <div class="tabs clearfix nobottommargin" id="tab-1">

                    <ul class="tab-nav clearfix">
                        <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="d-none d-md-inline-block"> Mô tả</span></a>
                        </li>
                    </ul>

                    <div class="tab-container">
                        <div class="tab-content clearfix" id="tabs-1">
                            <p style="white-space: pre-line">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="line"></div>

    {{--  Related products  --}}

    <div class="col_full nobottommargin">

        <h4>Sản phẩm liên quan</h4>

        <div id="oc-product" class="shop owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false"
             data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">
            @foreach($related_products as $product)
                @php
                $product_link = route('product', ['productSlug' => $product->slug, 'categorySlug' => $product->category['slug']]);
                @endphp
                <div class="oc-item">
                    <div class="product clearfix iproduct">
                        <div class="product-image">
                            <a href="{{ $product_link }}">
                                <img src="{{ $product->images_url[0] }}"
                                     alt="">
                            </a>
                            <a href="{{ $product_link }}"><img
                                    src="{{ count($product->images_url) > 1 ? $product->images_url[1] : $product->images_url[0] }}"
                                    alt=""></a>

                            <div class="product-overlay">
                                <a href="{{ $product_link }}" class="add-to-cart"><i class="icon-info"></i><span> Chi tiết</span></a>
                                <a href="https://witch.vn/pop-up/16" class="item-quick-view" data-lightbox="ajax"><i
                                        class="icon-zoom-in2"></i><span> Xem nhanh</span></a>
                            </div>
                        </div>
                        <div class="product-desc center">
                            <div class="product-title"><h3><a href="{{ $product_link }}">{{ $product->name }}</a>
                                </h3></div>
                            <div class="product-price">
                                <ins>1,150,000₫</ins>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

@section('extraCss')

@endsection

@section('extraJs')
    <script src="{{url('js/product-detail.js')}}"></script>
@endsection
