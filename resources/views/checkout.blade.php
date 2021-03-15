@extends('layout.master')

@section('title')
    Thanh toán
@endsection

@section('page_title')
    <section id="page-title">

        <div class="container clearfix">
            <h1>Thanh toán</h1>
        </div>

    </section>
@endsection

@section('content')
    <div id="cart-empty">
        <h3>Giỏ hàng trống</h3>
        <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span>
        <p><a href="/">Click vào đây</a> để tiếp tục mua hàng</p>
    </div>
    <div id="main-content" class="row clearfix">
        <div class="col-lg-4 mb-4">
            <h3>Thông tin thanh toán</h3>
            <p>Hãy điền đầy đủ thông tin bên dưới</p>

            <form id="billing-form" name="billing-form" class="nobottommargin">

                <div class="col_full">
                    <label>Họ tên:</label>
                    <input type="text" name="customer_name" class="sm-form-control" required />
                </div>

                <div class="clear"></div>

                <div class="col_full">
                    <label>Số điện thoại:</label>
                    <input type="tel" name="phone_number" class="sm-form-control" required />
                </div>

                <div class="col_full">
                    <label>Địa chỉ Email:</label>
                    <input type="email" name="email" class="sm-form-control" required />
                </div>

                <div class="col_full">
                    <label>Tỉnh thành:</label>
                    <select style="-webkit-appearance: none;" name="city_id" class="sm-form-control" required>
                        <option value="">Chọn tỉnh thành</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col_full">
                    <label>Quận huyện:</label>
                    <select style="-webkit-appearance: none;" name="district_id" class="sm-form-control" disabled required>
                        <option value="">Chọn quận huyện</option>
                    </select>
                </div>

                <div class="col_full">
                    <label>Địa chỉ:</label>
                    <input type="text" name="address" class="sm-form-control" required/>
                </div>
            </form>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Thông tin đơn hàng</h3>
                    <div class="table-responsive">
                        <table class="table cart">
                            <thead>
                            <tr>
                                <th class="cart-product-thumbnail">&nbsp;</th>
                                <th class="cart-product-name">Sản phẩm</th>
                                <th class="cart-product-color">Màu sắc</th>
                                <th class="cart-product-size">Kích cỡ</th>
                                <th class="cart-product-quantity">Số lượng</th>
                                <th class="cart-product-quantity">Giá</th>
                                <th class="cart-product-subtotal">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody id="cart-items">
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table cart">
                            <tbody>
                            <tr class="cart_item">
                                <td class="notopborder cart-product-name">
                                    <strong>Tổng số lượng</strong>
                                </td>

                                <td class="notopborder cart-product-name">
                                    <span id="quantity-total" class="amount"></span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Tổng thanh toán</strong>
                                </td>

                                <td class="cart-product-name">
                                    <span id="order-total" class="amount color lead"><strong></strong></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <h3>Phương thức thanh toán</h3>
                    <div class="mt-3"><strong>Chuyển khoản</strong></div>
                    <div>Khi nhấn đặt hàng, đơn hàng của bạn sẽ được tạo, vui lòng chuyển khoản theo hướng dẫn</div>
                    <button form="billing-form" class="button button-3d fright">
                        Đặt hàng
                        <div class="css3-spinner" style="position: absolute; z-index:auto; cursor: pointer; display: none;">
                            <div class="css3-spinner-rect1"></div>
                            <div class="css3-spinner-rect2"></div>
                            <div class="css3-spinner-rect3"></div>
                            <div class="css3-spinner-rect4"></div>
                            <div class="css3-spinner-rect5"></div>
                        </div>
                    </button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('extraCss')

@endsection

@section('extraJs')
    <script src="{{ url('js/checkout.js') }}"></script>
@endsection
