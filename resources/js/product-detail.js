const swatchColorEl = $('#configurable_swatch_color');
const swatchSizeEl = $('#configurable_swatch_size');
const addingToCartBtn = $('.cart-spinner');
const errorMessage = $('#error-message');
let colorId, sizeId, option, quantity;

const productData = JSON.parse($('#product-data').val());
const options = productData.options;
const colors = options
    .filter((value, index, array) => array.findIndex(t => (t.color_id === value.color_id)) === index)
    .map(a => a.color);
const sizes = options
    .filter((value, index, array) => array.findIndex(t => (t.size_id === value.size_id)) === index)
    .map(a => a.size);

colors.forEach(color => {
    swatchColorEl.append(`<li class="is-media">
                                            <a href="javascript:void(0)"
                                               class="swatch-link swatch-link-80 has-image choose-color"
                                               data-id="${color.id}"
                                               data-name="${color.name}"
                                               style="height: 23px; width: 23px;">
                                                <span class="selected-color-before"></span>
                                                <span class="swatch-label"
                                                      style="height: 21px; width: 21px; line-height: 21px;
                                                      background-color: ${color.code}">
<!--                                                    <span class="option-before"></span>-->
<!--                                                    <span class="option-after"></span>-->
                                                </span>
                                            </a>
                                        </li>`);
})

sizes.forEach(size => {
    swatchSizeEl.append(`<li class="option-s">
                                            <a href="javascript:void(0)"
                                               class="swatch-link swatch-link-129 choose-size"
                                               data-id="${size.id}"
                                               data-name="${size.name}"
                                               style="height: 23px; min-width: 23px;">
                                                        <span class="swatch-label"
                                                              style="height: 21px; min-width: 21px; line-height: 21px;">${size.name}</span>
                                            </a>
                                        </li>`);
})

swatchColorEl.on('click', '.choose-color', function () {
    $('.choose-color.selected').removeClass('selected');
    $(this).addClass('selected');
    $('#select_label_color').text($(this).attr('data-name'));
    colorId = $(this).attr('data-id');
    checkQuantity();
});

swatchSizeEl.on('click', '.choose-size', function () {
    $('.choose-size.selected').removeClass('selected');
    $(this).addClass('selected');
    $('#select_label_size').text($(this).attr('data-name'));
    sizeId = $(this).attr('data-id');
    checkQuantity();
});

function checkQuantity() {
    if (!colorId || !sizeId) {
        return;
    }
    option = options.filter(a => a.size_id == sizeId && a.color_id == colorId)[0];
    if (!option || !option.quantity) {
        $('.out-of-stock-only').show();
        $('.in-stock-only').hide();
    } else {
        $('.out-of-stock-only').hide();
        $('.in-stock-only').show();
    }
}

$('#add-to-cart').click(() => addToCart(false));
$('#buy-now').click(() => addToCart(true));

function addToCart(redirect) {
    if (!validateOptions()) {
        return;
    }
    addingToCartBtn.show();
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let existItem = cart.filter(item => item.option_id === option.id)[0];
    if (!existItem) {
        cart.push({
            product_id: option.product_id,
            option_id: option.id,
            quantity: quantity,
            product: productData,
            option: option,
        })
        localStorage.setItem('cart', JSON.stringify(cart));
    } else if (existItem.quantity + quantity > option.quantity) {
        errorMessage.text('Số lượng sản phẩm không đủ');
    } else {
        cart = cart.map(item => item.option_id === option.id ? {
            ...item,
            quantity: existItem.quantity + quantity
        } : item);
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    addingToCartBtn.hide();
    if ($('#toast-container').length) {
        $('#toast-container').remove();
    }
    $('body').append('<div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style="background-color: #51A351; color: white;"><div class="toast-message"><i class="icon-ok-sign"></i> Thêm vào giỏ hàng thành công</div></div></div>');
    setTimeout(function () {
        $('#toast-container').fadeOut();
    }, 3000);
}

function validateOptions() {
    if (!colorId) {
        errorMessage.text('Vui lòng chọn màu');
        return false;
    }
    if (!sizeId) {
        errorMessage.text('Vui lòng chọn kích cỡ');
        return false;
    }
    quantity = Number($('[name="quantity"]').val());
    if (!quantity || quantity < 1) {
        errorMessage.text('Vui lòng nhập số lượng');
        return false;
    }
    checkQuantity();
    if (quantity > option.quantity) {
        errorMessage.text('Số lượng sản phẩm không đủ');
        return false;
    }
    errorMessage.text('');
    return true;
}
