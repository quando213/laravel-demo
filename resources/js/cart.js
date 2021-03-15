const cartEmpty = $('#cart-empty');
const cartContent = $('#cart-content');
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
                    <td class="cart-product-remove">
                        <a href="javascript:void(0)" class="remove" data-id="${item.option_id}" title="Xóa sản phẩm"><i class="icon-trash2"></i></a>
                    </td>

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
                        <div class="quantity clearfix">
                            <input type="button" value="-" class="minus" />
                            <input type="number" name="quantity" data-id="${item.option_id}" class="qty" value="${item.quantity}" />
                            <input type="button" value="+" class="plus" />
                        </div>
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
        cartContent.show();
    } else {
        cartEmpty.show();
        cartContent.hide();
    }
}

cartContent.on('click', '.remove', function () {
    cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.option_id != $(this).attr('data-id'));
    localStorage.setItem('cart', JSON.stringify(cart));
    location.reload();
})

cartContent.on('click', '#update-cart', function () {
    let currentCart = JSON.parse(localStorage.getItem('cart')) || [];
    let extraItems = currentCart.filter(item => !cart.map(a => a.option_id).includes(item.option_id));
    cart = cart.map(item => ({
        ...item,
        quantity: Number($(`[name="quantity"][data-id="${item.option_id}"]`).val()),
    }));
    extraItems.forEach(item => cart.push(item));
    cart = cart.filter(item => item.quantity > 0);
    localStorage.setItem('cart', JSON.stringify(cart));
    location.reload();
})

printCart();
