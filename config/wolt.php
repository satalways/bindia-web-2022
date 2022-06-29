<?php
return [
    'useWolt' => env('WOLT', false),

    'staging' => [
        'merchantId' => '62837fb05a1175932434f351',
        'merchantKey' => '53749c2ca6b9d858b7d3cf9d91e26f04',

        'AMG' => '62838008bb2c376d8934f352',
        'BDV' => '6283809e13a8d6a99a7cb6db',
        'ELM' => '628382824eef83351c92344d',
        'GKV' => '',
        'LHG' => '',
        'SHG' => '',
    ],
    'production' => [
        'merchantId' => '',
        'merchantKey' => '',

        'AMG' => '',
        'BDV' => '',
        'ELM' => '',
        'GKV' => '',
        'LHG' => '',
        'SHG' => '',
    ]
];
