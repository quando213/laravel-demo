/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/product-detail.js ***!
  \****************************************/
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var swatchColorEl = $('#configurable_swatch_color');
var swatchSizeEl = $('#configurable_swatch_size');
var addingToCartBtn = $('.cart-spinner');
var errorMessage = $('#error-message');
var colorId, sizeId, option, quantity;
var productData = JSON.parse($('#product-data').val());
var options = productData.options;
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

  option = options.filter(function (a) {
    return a.size_id == sizeId && a.color_id == colorId;
  })[0];

  if (!option || !option.quantity) {
    $('.out-of-stock-only').show();
    $('.in-stock-only').hide();
  } else {
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
  if (!validateOptions()) {
    return;
  }

  addingToCartBtn.show();
  var cart = JSON.parse(localStorage.getItem('cart')) || [];
  var existItem = cart.filter(function (item) {
    return item.option_id === option.id;
  })[0];

  if (!existItem) {
    cart.push({
      product_id: option.product_id,
      option_id: option.id,
      quantity: quantity,
      product: productData,
      option: option
    });
    localStorage.setItem('cart', JSON.stringify(cart));
  } else if (existItem.quantity + quantity > option.quantity) {
    errorMessage.text('Số lượng sản phẩm không đủ');
  } else {
    cart = cart.map(function (item) {
      return item.option_id === option.id ? _objectSpread(_objectSpread({}, item), {}, {
        quantity: existItem.quantity + quantity
      }) : item;
    });
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
/******/ })()
;