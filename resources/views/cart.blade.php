@extends('layout.master')

@section('title')
    Giỏ hàng
@endsection

@section('page_title')
    <section id="page-title">

        <div class="container clearfix">
            <h1>Giỏ hàng</h1>
        </div>

    </section>
@endsection

@section('content')
    <div id="cart-empty">
        <h3>Giỏ hàng trống</h3>
        <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span>
        <p><a href="/">Click vào đây</a> để tiếp tục mua hàng</p>
    </div>
    <div id="main-content">
        <span id="error-message" class="text-danger"></span>
        <div class="table-responsive">
            <table class="table cart">
                <thead>
                <tr>
                    <th class="cart-product-remove">&nbsp;</th>
                    <th class="cart-product-thumbnail">Hình ảnh</th>
                    <th class="cart-product-name">Sản phẩm</th>
                    <th class="cart-product-color">Màu sắc</th>
                    <th class="cart-product-size">Kích cỡ</th>
                    <th class="cart-product-quantity">Số lượng</th>
                    <th class="cart-product-price">Giá</th>
                    <th class="cart-product-subtotal">Tổng tiền</th>
                </tr>
                </thead>
                <tbody id="cart-items">
                </tbody>

            </table>
        </div>

        <div class="row clearfix">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 clearfix">
                <h4>Tổng giỏ hàng</h4>
                <div class="table-responsive">
                    <table class="table cart">
                        <tbody>
                        <tr class="cart_item">
                            <td class="cart-product-name">
                                <strong>Tổng số lượng</strong>
                            </td>

                            <td class="cart-product-name">
                                <span id="quantity-total" class="amount"></span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td class="cart-product-name">
                                <strong>Tổng thanh toán</strong>
                            </td>
                            <td class="cart-product-name">
                                <span id="order-total" class="amount color lead font-weight-bold"></span>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="fright">
                    <a href="javascript:void(0)" id="update-cart" class="button button-3d nomargin">Cập nhật giỏ hàng</a>
                    <a href="/checkout" class="button button-3d notopmargin ml-0">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraCss')

@endsection

@section('extraJs')
    <script src="{{ url('js/cart.js') }}"></script>
@endsection
