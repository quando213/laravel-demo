require('./bootstrap');

let cart = JSON.parse(localStorage.getItem('cart')) || [];
let orderTotal = 0;
cart.forEach(item => {
    orderTotal += item.product.price * item.quantity;
    $('.top-cart-items').append(`<div class="top-cart-item clearfix">
                                <div class="top-cart-item-image">
                                    <a href="/${item.product.category.slug}/${item.product.slug}"><img src="${item.product.thumbnail_url}" alt="${item.product.name}" /></a>
                                </div>
                                <div class="top-cart-item-desc">
                                    <a href="#">${item.product.name}</a>
                                    <span class="top-cart-item-price">${item.product.price_pretty}₫</span>
                                    <span class="top-cart-item-quantity">x ${item.quantity}</span>
                                    <span class="top-cart-item-price">${item.option.color.name} - ${item.option.size.name}</span>
                                </div>
                            </div>`)
})
$('#top-total-order').text(orderTotal.toLocaleString('us') + '₫');
