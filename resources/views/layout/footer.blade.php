<footer id="footer" class="dark">

    <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap clearfix">

            <div class="col_two_third">

                <div class="col_one_third">

                    <div class="widget clearfix">


                        <h3>WITCH</h3>
                        <p>Thời trang và hơn thế nữa</p>

                        <div style="background: url({{lib_assets('images/world-map.png')}}) no-repeat center center; background-size: 100%;">
                            <address>
                                <strong>Địa chỉ liên hệ:</strong><br>
                                - Hà Nội: &nbsp;  Shop house 06 - Park 12 Time city 458 Minh Khai - Hai Bà Trưng - Hà Nội.<br>
                                - TP HCM: &nbsp; 726 Nguyễn Đình Chiểu - P1 - Q3 TPHCM.
                            </address>
                            <abbr title="Phone Number"><strong>Hotline:</strong></abbr> 094 8113333<br>
                            <abbr title="Email Address"><strong>Email:</strong></abbr> info@witch.vn
                        </div>

                    </div>

                </div>

                <div class="col_one_third">

                    <div class="widget widget_links clearfix">
                        <h4>Hỗ trợ</h4>
                        <li>
                            <a href="https://witch.vn/lien-he">
                                <div>Liên hệ</div>
                            </a>
                        </li>
                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="widget widget_links clearfix">
                        <h4>Danh mục</h4>

                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('category', ['categorySlug' => $category->slug])}}">
                                    <div>{{ $category->name }}</div>
                                </a>
                            </li>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="col_one_third col_last">

                <div class="widget widget_links clearfix">

                    <h4>Chính sách</h4>

                    <li>
                        <a href="#">
                            <div>Hướng dẫn thanh toán</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>Chính sách vận chuyển</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://witch.vn/chinh-sach-bao-mat">
                            <div>Chính sách bảo mật thông tin</div>
                        </a>
                    </li>
                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">

        <div class="container clearfix">

            <div class="col_half">
                Copyrights © 2021 Witch Inc.<br>

            </div>

            <div class="col_half col_last tright">
                <div class="fright clearfix">
                    <a href="https://www.facebook.com/witchcollection/" target="_blank" class="social-icon si-small si-borderless si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>
                </div>

                <div class="clear"></div>

                <i class="icon-envelope2"></i> info@witch.vn <span class="middot">·</span> <i class="icon-headphones"></i> 094 8113333 <span class="middot"></span>
            </div>

        </div>

    </div><!-- #copyrights end -->

</footer>
