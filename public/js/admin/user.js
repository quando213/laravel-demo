/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/admin/user.js ***!
  \************************************/
var userList = $('#user-list');
var userForm = $('#user-form');
var passwordFields = $('.password-field');
var userModal = $('#user-modal');
var userModalTitle = $('#user-modal .modal-title');
var submitBtn = $('button[type="submit"]');
var userId;
var filter = {};

function getList() {
  axios.get('/api/admin/user', {
    params: filter
  }).then(function (result) {
    return printList(result.data);
  })["catch"](function (e) {
    return alert(JSON.parse(e.response.responseText).message);
  });
}

window.addEventListener('DOMContentLoaded', function (event) {
  getList();
});

function printList(data) {
  var htmlContent = '';
  data.forEach(function (item) {
    htmlContent += "<tr>\n<td>".concat(item.name, "</td>\n<td>").concat(item.email, "</td>\n<td>").concat(item.role, "</td>\n<td>\n    <button type=\"button\" class=\"btn btn-primary update-user\" data-id=\"").concat(item.id, "\">Update</button>\n    <button type=\"button\" class=\"btn btn-danger delete-user\" data-id=\"").concat(item.id, "\">Delete</button>\n</td>\n</tr>");
  });
  userList.html(htmlContent);
}

$('.create-user').click(function () {
  userForm[0].reset();
  userModalTitle.text('Create New User');
  passwordFields.show();
  userId = null;
  userModal.modal();
});
userList.on('click', '.update-user', function () {
  userForm[0].reset();
  userModalTitle.text('Update User');
  passwordFields.hide();
  userId = $(this).attr('data-id');
  axios.get("/api/admin/user/".concat(userId)).then(function (result) {
    $('input[name="name"]').val(result.data.name);
    $('input[name="email"]').val(result.data.email);
    $("select[name=\"role\"] option[value=\"".concat(result.data.role, "\"]")).attr('selected', 'selected');
    userModal.modal();
  })["catch"](function (e) {
    return alert(JSON.parse(e.response.responseText).message);
  });
});
userForm.submit(function (event) {
  event.preventDefault();
  var formData = Object.fromEntries(new FormData(userForm[0]));
  submitBtn.text('Processing...');

  if (userId) {
    delete formData.password;
    delete formData.password_confirmation;
    axios.put(BASE_URL + "/api/admin/user/".concat(userId), formData).then(function (result) {
      alert("Success! ".concat(result.data.name, " has been updated!"));
      getList();
      userModal.modal('hide');
      submitBtn.text('Submit');
    })["catch"](function (e) {
      return alert(JSON.parse(e.response.responseText).message);
    });
  } else {
    axios.post(BASE_URL + '/api/admin/user', formData).then(function (result) {
      alert("Success! ".concat(result.data.name, " has been added!"));
      getList();
      userModal.modal('hide');
      submitBtn.text('Submit');
    })["catch"](function (e) {
      return alert(JSON.parse(e.response.responseText).message);
    });
  }
});
userList.on('click', '.delete-user', function () {
  if (!confirm('Are you sure you want to delete this user?')) {
    return false;
  }

  userId = $(this).attr('data-id');
  axios["delete"]("/api/admin/user/".concat(userId)).then(function (result) {
    alert("Success! ".concat(result.data.name, " has been deleted!"));
    getList();
  })["catch"](function (e) {
    return alert(JSON.parse(e.response.responseText).message);
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