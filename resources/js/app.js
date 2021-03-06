require('./bootstrap');

let token = localStorage.getItem('token');
if (token) {
    axios.get(BASE_URL + '/api/entry/detail')
        .then(function (result) {
            if (location.pathname.indexOf('/admin') === 0 && result.data.role !== 2) {
                location.replace('/');
            }
            $('.username').html(result.data.name);
            $('.guest-only').hide();
            $('.user-only').show();
        })
        .catch(function (e) {
            logout();
            alert('An error occurred. Please login again.');
        });
} else {
    logout();
}

$('.btn-logout').click(function () {
    axios.get(BASE_URL + '/api/entry/logout').then(() => {
        logout();
        location.replace('/');
    }).catch(e => {
        logout();
        alert('An error occurred');
        location.replace('/');
    });
})

function logout() {
    localStorage.removeItem('token');
    $('.guest-only').show();
    $('.user-only').hide();
}
