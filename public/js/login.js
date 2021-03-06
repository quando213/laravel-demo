/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/login.js ***!
  \*******************************/
var token = localStorage.getItem('token');

if (token) {
  location.replace('/');
}

var loginForm = $('form#login');
loginForm.submit(function (event) {
  event.preventDefault();
  var formData = new FormData(loginForm[0]);
  axios.post(BASE_URL + '/api/entry/login', Object.fromEntries(formData)).then(function (result) {
    alert("Welcome back ".concat(result.data.user.name, "!"));
    localStorage.setItem('token', result.data.token);
    location.replace('/');
  })["catch"](function (e) {
    if (e.response.status === 401) {
      alert('Invalid email/password.');
    } else {
      alert('An error occurred.');
    }
  });
});
/******/ })()
;