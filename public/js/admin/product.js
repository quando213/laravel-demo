/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/admin/product.js ***!
  \***************************************/
var productList = $('#product-list');
var productForm = $('#product-form');
var productModal = $('#product-modal');
var productModalTitle = $('#product-modal .modal-title');
var submitBtn = $('button[type="submit"]');
var productId;
var filter = {};

function getList() {
  axios.get('/api/admin/product', {
    params: filter
  }).then(function (result) {
    return printList(result.data);
  })["catch"](function (e) {
    return e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText);
  });
}

window.addEventListener('DOMContentLoaded', function (event) {
  getList();
});

function printList(data) {
  var htmlContent = '';
  data.forEach(function (item) {
    htmlContent += "<tr>\n<td>".concat(item.name, "</td>\n<td>").concat(item.price, "</td>\n<td>").concat(item.description, "</td>\n<td>").concat(item.username, "</td>\n<td>\n    <button type=\"button\" class=\"btn btn-primary update-product\" data-id=\"").concat(item.id, "\">Update</button>\n    <button type=\"button\" class=\"btn btn-danger delete-product\" data-id=\"").concat(item.id, "\">Delete</button>\n</td>\n</tr>");
  });
  productList.html(htmlContent);
}

$('.create-product').click(function () {
  productForm[0].reset();
  productModalTitle.text('Create New Product');
  productId = null;
  productModal.modal();
});
productList.on('click', '.update-product', function () {
  productModalTitle.text('Update Product');
  productId = $(this).attr('data-id');
  axios.get("/api/admin/product/".concat(productId)).then(function (result) {
    $('input[name="name"]').val(result.data.name);
    $('input[name="price"]').val(result.data.price);
    $('textarea[name="description"]').val(result.data.description);
    productModal.modal();
  })["catch"](function (e) {
    return e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText);
  });
});
productForm.submit(function (event) {
  event.preventDefault();
  var formData = Object.fromEntries(new FormData(productForm[0]));
  submitBtn.text('Processing...');

  if (productId) {
    axios.put(BASE_URL + "/api/admin/product/".concat(productId), formData).then(function (result) {
      alert("Success! ".concat(result.data.name, " has been updated!"));
      getList();
      productModal.modal('hide');
      submitBtn.text('Submit');
    })["catch"](function (e) {
      return e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText);
    });
  } else {
    axios.post(BASE_URL + '/api/admin/product', formData).then(function (result) {
      alert("Success! ".concat(result.data.name, " has been added!"));
      getList();
      productModal.modal('hide');
      submitBtn.text('Submit');
    })["catch"](function (e) {
      return e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText);
    });
  }
});
productList.on('click', '.delete-product', function () {
  if (!confirm('Are you sure you want to delete this product?')) {
    return false;
  }

  productId = $(this).attr('data-id');
  axios["delete"]("/api/admin/product/".concat(productId)).then(function (result) {
    alert("Success! ".concat(result.data.name, " has been deleted!"));
    getList();
  })["catch"](function (e) {
    return e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText);
  });
});
var filterKeyword = $('input[name="keyword"]');
filterKeyword.keyup(function () {
  if (filterKeyword.val().length) {
    filter.keyword = filterKeyword.val();
  } else {
    delete filter.keyword;
  }

  getList();
});
/******/ })()
;