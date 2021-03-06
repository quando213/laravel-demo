let token = localStorage.getItem('token');
if (token) {
    location.replace('/');
}

const loginForm = $('form#login');
loginForm.submit(event => {
    event.preventDefault();
    let formData = new FormData(loginForm[0]);
    axios.post(BASE_URL + '/api/entry/login', Object.fromEntries(formData)).then(result => {
        alert(`Welcome back ${result.data.user.name}!`);
        localStorage.setItem('token', result.data.token);
        location.replace('/');
    }).catch(e => {
        if (e.response.status === 401) {
            alert('Invalid email/password.');
        } else {
            alert('An error occurred.');
        }
    });
})
