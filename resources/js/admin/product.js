const productList = $('#product-list');
const productForm = $('#product-form');
const productModal = $('#product-modal');
const productModalTitle = $('#product-modal .modal-title');
const submitBtn = $('button[type="submit"]');
let productId;
let filter = {};

function getList() {
    axios.get('/api/admin/product', {params: filter})
        .then(result => printList(result.data))
        .catch(e => e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText));
}

window.addEventListener('DOMContentLoaded', (event) => {
    getList();
});

function printList(data) {
    let htmlContent = '';
    data.forEach(item => {
        htmlContent += `<tr>
<td>${item.name}</td>
<td>${item.price}</td>
<td>${item.description}</td>
<td>${item.username}</td>
<td>
    <button type="button" class="btn btn-primary update-product" data-id="${item.id}">Update</button>
    <button type="button" class="btn btn-danger delete-product" data-id="${item.id}">Delete</button>
</td>
</tr>`;
    })
    productList.html(htmlContent);
}

$('.create-product').click(function () {
    productForm[0].reset();
    productModalTitle.text('Create New Product');
    productId = null;
    productModal.modal();
})

productList.on('click', '.update-product', function () {
    productModalTitle.text('Update Product');
    productId = $(this).attr('data-id');
    axios.get(`/api/admin/product/${productId}`).then(result => {
        $('input[name="name"]').val(result.data.name);
        $('input[name="price"]').val(result.data.price);
        $('textarea[name="description"]').val(result.data.description);
        productModal.modal();
    }).catch(e => e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText));
})

productForm.submit(function (event) {
    event.preventDefault();
    let formData = Object.fromEntries(new FormData(productForm[0]));
    submitBtn.text('Processing...');
    if (productId) {
        axios.put(BASE_URL + `/api/admin/product/${productId}`, formData).then(result => {
            alert(`Success! ${result.data.name} has been updated!`);
            getList();
            productModal.modal('hide');
            submitBtn.text('Submit');
        }).catch(e => e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText));
    } else {
        axios.post(BASE_URL + '/api/admin/product', formData).then(result => {
            alert(`Success! ${result.data.name} has been added!`);
            getList();
            productModal.modal('hide');
            submitBtn.text('Submit');
        }).catch(e => e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText));
    }
})

productList.on('click', '.delete-product', function () {
    if (!confirm('Are you sure you want to delete this product?')) {
        return false;
    }
    productId = $(this).attr('data-id');
    axios.delete(`/api/admin/product/${productId}`).then(result => {
        alert(`Success! ${result.data.name} has been deleted!`);
        getList();
    }).catch(e => e.response.responseText ? alert(JSON.parse(e.response.responseText).message) : alert(e.response.statusText));
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
