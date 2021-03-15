<header id="header">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{route('index')}}" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="{{lib_assets('images/logo-witch.png')}}" alt="Witch Logo"></a>
                <a href="{{route('index')}}" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="{{lib_assets('images/logo-witch.png')}}" alt="Witch Logo"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">

                <ul>
                    <li class="current"><a href="{{route('index')}}"><div>Trang Chủ</div></a></li>
                    @foreach($categories as $category)
                        <li><a href="{{route('category', ['categorySlug' => $category->slug])}}"><div>{{ $category->name }}</div></a>
                            @if(count($category->children))
                                <ul>
                                    @foreach($category->children as $subCategory)
                                        <li><a href="{{route('category', ['categorySlug' => $subCategory->slug])}}"><div>{{ $subCategory->name }}</div></a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <!-- Top Cart
                ============================================= -->
                <div id="top-cart">
                    <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
                    <div class="top-cart-content">
                        <div class="top-cart-title">
                            <h4>Giỏ hàng</h4>
                        </div>
                        <div class="top-cart-items">
                        </div>
                        <div class="top-cart-action clearfix">
                            <span class="fleft top-checkout-price">Thành tiền: </span>
                            <span id="top-total-order" class="fright top-checkout-price mb-2"></span>
                            <div>
                                <a href="{{ route('cart') }}"><button class="button button-3d btn-block nomargin">Thanh toán</button></a>
                            </div>
                        </div>
                    </div>
                </div><!-- #top-cart end -->

                <!-- Top Search
                ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div><!-- #top-search end -->

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header>
