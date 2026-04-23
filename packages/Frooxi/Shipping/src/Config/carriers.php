<?php

return [
    'flatrate' => [
        'code' => 'flatrate',
        'title' => 'Flat Rate',
        'description' => 'Flat Rate Shipping',
        'active' => false,
        'default_rate' => '10',
        'type' => 'per_unit',
        'class' => 'Frooxi\Shipping\Carriers\FlatRate',
    ],

    'free' => [
        'code' => 'free',
        'title' => 'Free Shipping',
        'description' => 'Free Shipping',
        'active' => false,
        'default_rate' => '0',
        'class' => 'Frooxi\Shipping\Carriers\Free',
    ],

    'customshipping' => [
        'code' => 'customshipping',
        'title' => 'Custom Shipping',
        'description' => 'Custom Shipping Methods',
        'active' => true,
        'class' => 'Frooxi\Shipping\Carriers\CustomShipping',
    ],
];
