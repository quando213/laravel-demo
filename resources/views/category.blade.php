@extends('layout.master')

@section('title')
    {{ $category->name }}
@endsection

@section('page_title')
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{ $category->name }}</h1>
            <span>Khám phá danh mục {{ $category->name }}</span>
        </div>

    </section>
@endsection

@section('content')
    <div class="postcontent nobottommargin col_last clearfix">

        <div class="shop shop-flex clearfix d-flex flex-wrap row">
            @foreach($products as $product)
                @php
                    $productLink = route('product', ['categorySlug' => $product->category['slug'], 'productSlug' => $product->slug]);
                @endphp
                <div class="product clearfix col-md-4">
                    <div class="product-image">
                        <a href="{{$productLink}}">
                            <img src="{{ $product->images_url[0] }}" alt="{{ $product->name }}">
                        </a>
                        <a href="{{$productLink}}">
                            <img
                                src="{{ count($product->images_url) > 1 ? $product->images_url[1] : $product->images_url[0] }}"
                                alt="{{ $product->name }}">
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

    <div id="filterProductComponent" class="sidebar nobottommargin">
        <div class="sidebar-widgets-wrap">
            <div class="widget widget-filter-links clearfix">
                <h4>Sắp xếp</h4>
                <ul class="shop-sorting">
                    <li class="widget-filter-reset" style="display: none;">
                        <a href="javascript:void(0)" class="clear-param" data-clear="sort">Bỏ</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="set-sort" data-sort="price" data-order="asc">Giá tăng dần</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="set-sort" data-sort="price" data-order="desc">Giá giảm dần</a>
                    </li>
                </ul>
            </div>

            <div class="widget widget-filter-links-clone clearfix">
                <h4>Kích cỡ</h4>
                <div class="widget-filter-reset" style="display: none;">
                    <a href="javascript:void(0)" class="clear-param" data-clear="size">Bỏ</a>
                </div>
                <ul class="swatches">
                    @foreach($sizes as $size)
                        @foreach($size->children as $child)
                            <li class="swatch-item">
                                <a :title="children.name"
                                   href="javascript:void(0)"
                                   class="select-size"
                                   data-id="{{ $child->id }}"
                                >
                                    <div>{{ $child->name }}</div>
                                    <span></span>
                                </a>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>

            <div class="widget widget-filter-links-clone clearfix">
                <h4>Màu sắc</h4>
                <div class="widget-filter-reset" style="display: none;">
                    <a href="javascript:void(0)" class="clear-param" data-clear="color">Bỏ</a>
                </div>
                <ul class="swatches">
                    @foreach($colors as $color)
                        <li class="swatch-item">
                            <a title="${{ $color->name }}"
                               href="javascript:void(0)"
                               class="select-color"
                               data-id="{{ $color->id }}"
                               style="background-color: {{ $color->code }}"
                            >
                                <span></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="widget widget-filter-links clearfix">
                <h4>Đơn giá</h4>
                <div class="widget-filter-reset" style="display: none;">
                    <a href="javascript:void(0)" class="clear-param" data-clear="price">Bỏ</a>
                </div>
                <div class="price-range">
                    <input type="number" class="sm-form-control required" id="price-min" placeholder="Min">
                    <input type="number" class="sm-form-control required" id="price-max" placeholder="Max">
                    <a href="javascript:void(0)"
                       class="set-price button button-3d button-mini button-rounded button-dirtygreen"
                       style="height: 40px; line-height: 41px; margin: 0">
                        OK
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extraCss')

@endsection

@section('extraJs')
    <script src="{{url('js/product-list.js')}}"></script>
@endsection
