const cartEmpty = $('#cart-empty');
const mainContent = $('#main-content');
const selectCity = $('[name="city_id"]');
const selectDistrict = $('[name="district_id"]');
const errorMessage = $('#error-message');

let cart = JSON.parse(localStorage.getItem('cart')) || [];

function printCart() {
    if (cart.length) {
        let htmlContent = '';
        let quantityTotal = 0;
        let orderTotal = 0;
        cart.forEach(item => {
            quantityTotal += item.quantity;
            orderTotal += item.product.price * item.quantity;
            const itemPath = `/${item.product.category.slug}/${item.product.slug}`;
            htmlContent += `<tr class="cart_item">
                    <td class="cart-product-thumbnail">
                        <a href="${itemPath}">
                            <img width="64" height="64" src="${item.product.thumbnail_url}" alt="${item.product.name}">
                        </a>
                    </td>

                    <td class="cart-product-name">
                        <a href="${itemPath}">${item.product.name}</a>
                        <div class="error-quantity" data-id="${item.option_id}" style="display: none;">
                            <span class="text-danger" style="font-size: 12px">Số lượng sản phẩm không đủ</span>
                        </div>
                    </td>

                    <td class="cart-product-color">
                        <span class="color-product-cart" style="background-color: ${item.option.color.code}"></span>
                    </td>

                    <td class="cart-product-size">
                        <span>${item.option.size.name}</span>
                    </td>

                    <td class="cart-product-quantity">
                        <span>${item.quantity}</span>
                    </td>

                    <td class="cart-product-price">
                        <span class="amount">${item.product.price_pretty}₫</span>
                    </td>

                    <td class="cart-product-subtotal">
                        <span class="amount">${(item.product.price * item.quantity).toLocaleString('us')}₫</span>
                    </td>
                </tr>`;
        })
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

selectCity.change(function() {
    axios.get(BASE_URL + `/api/regions/cities/${$(this).val()}/districts`)
        .then(response => {
            const districts = response.data.data;
            selectDistrict.html('<option value="">Chọn quận huyện</option>');
            districts.forEach(district => {
                selectDistrict.append(`<option value="${district.id}">${district.name}</option>`)
            })
        })
        .catch(e => console.log(e.responseText));
    selectDistrict.prop('disabled', false);
})

const billingForm = $('#billing-form');
billingForm.submit(function (e) {
    e.preventDefault();
    const formData = new FormData(billingForm[0]);
    let formObj = Object.fromEntries(formData);
    formObj.details = JSON.parse(localStorage.getItem('cart'));
    axios.post(BASE_URL + `/api/order`, formObj)
        .then(response => {console.log(response.data)})
        .catch(e => console.log(e.responseText));
})

printCart();
