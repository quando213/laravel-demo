<?php

use App\Enums\CommonStatus;
use App\Enums\OrderStatus;

return [
    CommonStatus::class => [
        CommonStatus::ACTIVE => 'Hoạt động',
        CommonStatus::DELETED => 'Đã xoá',
    ],
    OrderStatus::class => [
        OrderStatus::WAITING => 'Chờ xử lý',
        OrderStatus::PROCESSING => 'Đang xử lý',
        OrderStatus::SHIPPING => 'Đang vận chuyển',
        OrderStatus::DONE => 'Hoàn thành',
        OrderStatus::REJECTED => 'Đã huỷ',
    ]
];
