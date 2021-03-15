/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/checkout.js ***!
  \**********************************/
var cartEmpty = $('#cart-empty');
var mainContent = $('#main-content');
var selectCity = $('[name="city_id"]');
var selectDistrict = $('[name="district_id"]');
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
      htmlContent += "<tr class=\"cart_item\">\n                    <td class=\"cart-product-thumbnail\">\n                        <a href=\"".concat(itemPath, "\">\n                            <img width=\"64\" height=\"64\" src=\"").concat(item.product.thumbnail_url, "\" alt=\"").concat(item.product.name, "\">\n                        </a>\n                    </td>\n\n                    <td class=\"cart-product-name\">\n                        <a href=\"").concat(itemPath, "\">").concat(item.product.name, "</a>\n                        <div class=\"error-quantity\" data-id=\"").concat(item.option_id, "\" style=\"display: none;\">\n                            <span class=\"text-danger\" style=\"font-size: 12px\">S\u1ED1 l\u01B0\u1EE3ng s\u1EA3n ph\u1EA9m kh\xF4ng \u0111\u1EE7</span>\n                        </div>\n                    </td>\n\n                    <td class=\"cart-product-color\">\n                        <span class=\"color-product-cart\" style=\"background-color: ").concat(item.option.color.code, "\"></span>\n                    </td>\n\n                    <td class=\"cart-product-size\">\n                        <span>").concat(item.option.size.name, "</span>\n                    </td>\n\n                    <td class=\"cart-product-quantity\">\n                        <span>").concat(item.quantity, "</span>\n                    </td>\n\n                    <td class=\"cart-product-price\">\n                        <span class=\"amount\">").concat(item.product.price_pretty, "\u20AB</span>\n                    </td>\n\n                    <td class=\"cart-product-subtotal\">\n                        <span class=\"amount\">").concat((item.product.price * item.quantity).toLocaleString('us'), "\u20AB</span>\n                    </td>\n                </tr>");
    });
    $('#cart-items').html(htmlContent);
    $('#quantity-total').text(quantityTotal);
    $('#order-total').text(orderTotal.toLocaleString('us') + '₫');
    cartEmpty.hide();
    mainContent.show();
  } else {
    cartEmpty.show();
    mainContent.hide();
  }
}

selectCity.change(function () {
  axios.get(BASE_URL + "/api/regions/cities/".concat($(this).val(), "/districts")).then(function (response) {
    var districts = response.data.data;
    selectDistrict.html('<option value="">Chọn quận huyện</option>');
    districts.forEach(function (district) {
      selectDistrict.append("<option value=\"".concat(district.id, "\">").concat(district.name, "</option>"));
    });
  })["catch"](function (e) {
    return console.log(e.responseText);
  });
  selectDistrict.prop('disabled', false);
});
var billingForm = $('#billing-form');
billingForm.submit(function (e) {
  e.preventDefault();
  var formData = new FormData(billingForm[0]);
  var formObj = Object.fromEntries(formData);
  formObj.details = JSON.parse(localStorage.getItem('cart'));
  axios.post(BASE_URL + "/api/order", formObj).then(function (response) {
    console.log(response.data);
  })["catch"](function (e) {
    return console.log(e.responseText);
  });
});
printCart();
/******/ })()
;