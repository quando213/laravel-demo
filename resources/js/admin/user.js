const userList = $('#user-list');
const userForm = $('#user-form');
const passwordFields = $('.password-field');
const userModal = $('#user-modal');
const userModalTitle = $('#user-modal .modal-title');
const submitBtn = $('button[type="submit"]');
let userId;
let filter = {};

function getList() {
    axios.get('/api/admin/user', {params: filter})
        .then(result => printList(result.data))
        .catch(e => alert(JSON.parse(e.response.responseText).message));
}

window.addEventListener('DOMContentLoaded', (event) => {
    getList();
});

function printList(data) {
    let htmlContent = '';
    data.forEach(item => {
        htmlContent += `<tr>
<td>${item.name}</td>
<td>${item.email}</td>
<td>${item.role}</td>
<td>
    <button type="button" class="btn btn-primary update-user" data-id="${item.id}">Update</button>
    <button type="button" class="btn btn-danger delete-user" data-id="${item.id}">Delete</button>
</td>
</tr>`;
    })
    userList.html(htmlContent);
}

$('.create-user').click(function () {
    userForm[0].reset();
    userModalTitle.text('Create New User');
    passwordFields.show();
    userId = null;
    userModal.modal();
})

userList.on('click', '.update-user', function () {
    userForm[0].reset();
    userModalTitle.text('Update User');
    passwordFields.hide();
    userId = $(this).attr('data-id');
    axios.get(`/api/admin/user/${userId}`).then(result => {
        $('input[name="name"]').val(result.data.name);
        $('input[name="email"]').val(result.data.email);
        $(`select[name="role"] option[value="${result.data.role}"]`).attr('selected', 'selected');
        userModal.modal();
    }).catch(e => alert(JSON.parse(e.response.responseText).message));
})

userForm.submit(function (event) {
    event.preventDefault();
    let formData = Object.fromEntries(new FormData(userForm[0]));
    submitBtn.text('Processing...');
    if (userId) {
        delete formData.password;
        delete formData.password_confirmation;
        axios.put(BASE_URL + `/api/admin/user/${userId}`, formData).then(result => {
            alert(`Success! ${result.data.name} has been updated!`);
            getList();
            userModal.modal('hide');
            submitBtn.text('Submit');
        }).catch(e => alert(JSON.parse(e.response.responseText).message));
    } else {
        axios.post(BASE_URL + '/api/admin/user', formData).then(result => {
            alert(`Success! ${result.data.name} has been added!`);
            getList();
            userModal.modal('hide');
            submitBtn.text('Submit');
        }).catch(e => alert(JSON.parse(e.response.responseText).message));
    }
})

userList.on('click', '.delete-user', function () {
    if (!confirm('Are you sure you want to delete this user?')) {
        return false;
    }
    userId = $(this).attr('data-id');
    axios.delete(`/api/admin/user/${userId}`).then(result => {
        alert(`Success! ${result.data.name} has been deleted!`);
        getList();
    }).catch(e => alert(JSON.parse(e.response.responseText).message));
})

const filterKeyword = $('input[name="keyword"]');
filterKeyword.keyup(function () {
    if (filterKeyword.val().length) {
        filter.keyword = filterKeyword.val();
    } else {
        delete filter.keyword;
    }
    getList();
})
