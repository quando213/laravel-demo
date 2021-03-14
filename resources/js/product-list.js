let params = {};
let search = location.search.substring(1);
if (search) {
    params = JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
}
if (params.size) {
    params.size = decodeURIComponent(params.size).split(',');
    params.size.forEach(id => {
        $(`.select-size[data-id=${id}] span`).addClass('selected');
    })
}
if (params.color) {
    params.color = decodeURIComponent(params.color).split(',');
    params.color.forEach(id => {
        $(`.select-color[data-id=${id}] span`).addClass('selected');
    })
}
if (params.price_min) {
    $('#price-min').val(params.price_min);
}
if (params.price_max) {
    $('#price-max').val(params.price_max);
}

if (params.sort && params.order) {
    $(`.set-sort[data-sort=${params.sort}][data-order=${params.order}]`).parent().addClass('active-filter');
}
Object.keys(params).forEach(key => {
    if (key === 'price_min' || key === 'price_max') {
        key = 'price';
    }
    $(`.clear-param[data-clear=${key}]`).parent().show();
})

$('.select-size').click(function () {
    selectAttribute($(this).attr('data-id'), 'size');
});

$('.select-color').click(function () {
    selectAttribute($(this).attr('data-id'), 'color');
});

$('.set-sort').click(function () {
    params.sort = $(this).attr('data-sort');
    params.order = $(this).attr('data-order').toString();
    submitForm();
})

$('.set-price').click(function () {
    params.price_min = $('#price-min').val() || undefined;
    params.price_max = $('#price-max').val() || undefined;
    submitForm();
})

function submitForm() {
    Object.keys(params).forEach(key => {
        if (params[key] === undefined) {
            delete params[key];
        }
    })
    window.location.href = window.location.pathname+"?"+new URLSearchParams(params).toString();
}

function selectAttribute(value, param) {
    value = value.toString();
    if (!params[param] || !params[param].length) {
        params[param] = [value];
    } else if (params[param].includes(value)) {
        params[param] = params[param].filter(a => a !== value);
    } else {
        params[param].push(value);
    }
    submitForm();
}

$('.clear-param').click(function () {
    const param = $(this).attr('data-clear');
    if (param === 'price') {
        delete params['price_min'];
        delete params['price_max'];
    } else if (param === 'sort') {
        delete params['sort'];
        delete params['order']
    } else {
        delete params[param];
    }
    submitForm();
});
