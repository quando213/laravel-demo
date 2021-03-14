/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/product-detail.js ***!
  \****************************************/
var swatchColorEl = $('#configurable_swatch_color');
var swatchSizeEl = $('#configurable_swatch_size');
var errorMessage = $('#error-message');
var colorId, sizeId, stockQuantity, quantity;
var options = JSON.parse($('#options-data').val());
var colors = options.filter(function (value, index, array) {
  return array.findIndex(function (t) {
    return t.color_id === value.color_id;
  }) === index;
}).map(function (a) {
  return a.color;
});
var sizes = options.filter(function (value, index, array) {
  return array.findIndex(function (t) {
    return t.size_id === value.size_id;
  }) === index;
}).map(function (a) {
  return a.size;
});
colors.forEach(function (color) {
  swatchColorEl.append("<li class=\"is-media\">\n                                            <a href=\"javascript:void(0)\"\n                                               class=\"swatch-link swatch-link-80 has-image choose-color\"\n                                               data-id=\"".concat(color.id, "\"\n                                               data-name=\"").concat(color.name, "\"\n                                               style=\"height: 23px; width: 23px;\">\n                                                <span class=\"selected-color-before\"></span>\n                                                <span class=\"swatch-label\"\n                                                      style=\"height: 21px; width: 21px; line-height: 21px;\n                                                      background-color: ").concat(color.code, "\">\n<!--                                                    <span class=\"option-before\"></span>-->\n<!--                                                    <span class=\"option-after\"></span>-->\n                                                </span>\n                                            </a>\n                                        </li>"));
});
sizes.forEach(function (size) {
  swatchSizeEl.append("<li class=\"option-s\">\n                                            <a href=\"javascript:void(0)\"\n                                               class=\"swatch-link swatch-link-129 choose-size\"\n                                               data-id=\"".concat(size.id, "\"\n                                               data-name=\"").concat(size.name, "\"\n                                               style=\"height: 23px; min-width: 23px;\">\n                                                        <span class=\"swatch-label\"\n                                                              style=\"height: 21px; min-width: 21px; line-height: 21px;\">").concat(size.name, "</span>\n                                            </a>\n                                        </li>"));
});
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

  var option = options.filter(function (a) {
    return a.size_id == sizeId && a.color_id == colorId;
  })[0];

  if (!option || !option.quantity) {
    $('.out-of-stock-only').show();
    $('.in-stock-only').hide();
  } else {
    stockQuantity = option.quantity;
    $('.out-of-stock-only').hide();
    $('.in-stock-only').show();
  }
}

$('#add-to-cart').click(function () {
  return addToCart(false);
});
$('#buy-now').click(function () {
  return addToCart(true);
});

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
/******/ })()
;