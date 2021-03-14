const swatchColorEl = $('#configurable_swatch_color');
const swatchSizeEl = $('#configurable_swatch_size');
const errorMessage = $('#error-message');
let colorId, sizeId, stockQuantity, quantity;

const options = JSON.parse($('#options-data').val());
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
    let option = options.filter(a => a.size_id == sizeId && a.color_id == colorId)[0];
    if (!option || !option.quantity) {
        $('.out-of-stock-only').show();
        $('.in-stock-only').hide();
    } else {
        stockQuantity = option.quantity;
        $('.out-of-stock-only').hide();
        $('.in-stock-only').show();
    }
}

$('#add-to-cart').click(() => addToCart(false));
$('#buy-now').click(() => addToCart(true));

function addToCart(redirect) {
    if (!colorId) {
        errorMessage.text('Vui lòng chọn màu');
        return;
    }
    if (!sizeId) {
        errorMessage.text('Vui lòng chọn kích cỡ');
        return;
    }
    quantity = Number($('[name="quantity"]').val());
    if (!quantity || quantity < 1) {
        errorMessage.text('Vui lòng nhập số lượng');
        return;
    }
    checkQuantity();
    if (quantity > stockQuantity) {
        errorMessage.text('Số lượng sản phẩm không đủ');
        return;
    }
    errorMessage.text('');
    $('.cart-spinner').show();
}
