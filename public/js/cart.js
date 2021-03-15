/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var cartEmpty = $('#cart-empty');
var cartContent = $('#cart-content');
var errorMessage = $('#error-message');
var cart = JSON.parse(localStorage.getItem('cart')) || [];

function printCart() {
  if (cart.length) {
    var htmlContent = '';
    var quantityTotal = 0;
    var orderTotal = 0;
    cart.forEach(function (item) {
      quantityTotal += item.quantity;
      orderTotal += item.product.price * item.quantity;
      var itemPath = "/".concat(item.product.category.slug, "/").concat(item.product.slug);
      htmlContent += "<tr class=\"cart_item\">\n                    <td class=\"cart-product-remove\">\n                        <a href=\"javascript:void(0)\" class=\"remove\" data-id=\"".concat(item.option_id, "\" title=\"X\xF3a s\u1EA3n ph\u1EA9m\"><i class=\"icon-trash2\"></i></a>\n                    </td>\n\n                    <td class=\"cart-product-thumbnail\">\n                        <a href=\"").concat(itemPath, "\">\n                            <img width=\"64\" height=\"64\" src=\"").concat(item.product.thumbnail_url, "\" alt=\"").concat(item.product.name, "\">\n                        </a>\n                    </td>\n\n                    <td class=\"cart-product-name\">\n                        <a href=\"").concat(itemPath, "\">").concat(item.product.name, "</a>\n                        <div class=\"error-quantity\" data-id=\"").concat(item.option_id, "\" style=\"display: none;\">\n                            <span class=\"text-danger\" style=\"font-size: 12px\">S\u1ED1 l\u01B0\u1EE3ng s\u1EA3n ph\u1EA9m kh\xF4ng \u0111\u1EE7</span>\n                        </div>\n                    </td>\n\n                    <td class=\"cart-product-color\">\n                        <span class=\"color-product-cart\" style=\"background-color: ").concat(item.option.color.code, "\"></span>\n                    </td>\n\n                    <td class=\"cart-product-size\">\n                        <span>").concat(item.option.size.name, "</span>\n                    </td>\n\n                    <td class=\"cart-product-quantity\">\n                        <div class=\"quantity clearfix\">\n                            <input type=\"button\" value=\"-\" class=\"minus\" />\n                            <input type=\"number\" name=\"quantity\" data-id=\"").concat(item.option_id, "\" class=\"qty\" value=\"").concat(item.quantity, "\" />\n                            <input type=\"button\" value=\"+\" class=\"plus\" />\n                        </div>\n                    </td>\n\n                    <td class=\"cart-product-price\">\n                        <span class=\"amount\">").concat(item.product.price_pretty, "\u20AB</span>\n                    </td>\n\n                    <td class=\"cart-product-subtotal\">\n                        <span class=\"amount\">").concat((item.product.price * item.quantity).toLocaleString('us'), "\u20AB</span>\n                    </td>\n                </tr>");
    });
    $('#cart-items').html(htmlContent);
    $('#quantity-total').text(quantityTotal);
    $('#order-total').text(orderTotal.toLocaleString('us') + '₫');
    cartEmpty.hide();
    cartContent.show();
  } else {
    cartEmpty.show();
    cartContent.hide();
  }
}

cartContent.on('click', '.remove', function () {
  var _this = this;

  cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart = cart.filter(function (item) {
    return item.option_id != $(_this).attr('data-id');
  });
  localStorage.setItem('cart', JSON.stringify(cart));
  location.reload();
});
cartContent.on('click', '#update-cart', function () {
  var currentCart = JSON.parse(localStorage.getItem('cart')) || [];
  var extraItems = currentCart.filter(function (item) {
    return !cart.map(function (a) {
      return a.option_id;
    }).includes(item.option_id);
  });
  cart = cart.map(function (item) {
    return _objectSpread(_objectSpread({}, item), {}, {
      quantity: Number($("[name=\"quantity\"][data-id=\"".concat(item.option_id, "\"]")).val())
    });
  });
  extraItems.forEach(function (item) {
    return cart.push(item);
  });
  cart = cart.filter(function (item) {
    return item.quantity > 0;
  });
  localStorage.setItem('cart', JSON.stringify(cart));
  location.reload();
});
printCart();
/******/ })()
;