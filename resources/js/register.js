let token = localStorage.getItem('token');
if (token) {
    location.replace('/');
}

const registerForm = $('form#register');
registerForm.submit(async function (event) {
    try {
        event.preventDefault();
        let formData = new FormData(registerForm[0]);
        const result = await axios.post(BASE_URL + '/api/entry/register', Object.fromEntries(formData));
        alert(`Welcome ${result.data.name}! Please log in to start your session.`);
        location.replace('/entry/login');
    } catch (e) {
        alert(Object.values(e.response.data.errors).join(' '));
    }
})
