<?php

return [
    'sections' => [
        'bn-single-meals' => [
            'name' => 'Single Meals'
        ],
        'bn-veg' => [
            'small' => '(no Sides)',
            'name' => 'Veg. & Vegan'
        ],
        'bn-curries' => [
            'small' => '(no Sides)',
            'name' => 'Curries',
        ],
        'bn-sides' => [
            'name' => 'Sides'
        ],
        'bn-drinks' => [
            'name' => 'Drinks'
        ]
    ],

    'item_filters' => [
        'veg' => 'Veg.',
        'vegan' => 'Vegan',
        'nuts' => 'No Nuts',
        'dairy' => 'No Dairy',
        'gluten' => 'No Gluten'
    ],

    'sub_sections' => [
        'Single Meals' => [
            'Tandoori Chicken'
        ],
        'Veg. & Vegan' => [
            'Dal',
            'Aloo Gobi'
        ],
        'Curries' => [
            'Butter',
            'Korma',
            'Tikka Masala',
            'Spinach',
            'Madras',
            'Jeera Masala',
            'Coconut Tamarind'
        ],
        'Sides' => [
            'Nan',
            'Paratha',
            'Raita',
            'Papadums',
        ],
        'Drinks' => [
            'Mango Lassi',
            'Lemonade',
            'Kingfisher',
        ]
    ],

    /**
     * Add 1 bag after these bag points
     */
    'points_for_one_bag' => 12,

    /**
     * Take away bag price in krone
     */
    'bag_price' => 4,

    'bag_code' => 999,

    /**
     * Order preparation time in minutes
     */
    'order_prep_time' => 20,

    /**
     * All shops are closed on these dates
     */
    'closing_dates' => [
        '24-Dec',
        '31-Dec',
    ],

    /**
     * Specific shop is closed on specific date
     */
    'closing_shop_dates' => [
        //'ELM' => '04-Nov'
    ],

    /**
     * Stop delivery orders, True will stop delivery orders.
     */
    'stop_delivery_orders' => false,

    /**
     * Delivery orders will not be available on these dates.
     */
    'stop_delivery_on_dates' => [
        '24-Dec',
        '25-Dec',
        '31-Dec',
    ],

    /**
     * Mention VAT in percentage for item implement in nets payment gateway.
     */
    'VAT' => 25,

    'nets' => [
        /**
         * This image will show on payment page
         */
        'cards' => 'https://cdn.dibspayment.com/logo/checkout/combo/horiz/DIBS_checkout_kombo_horizontal_04.png',

        'test' => [
            'url' => 'https://test.api.dibspayment.eu/v1',
            'secret_key' => 'test-secret-key-45e8d9625f1d4747b380bc6ebf998641',
            'checkout_key' => 'test-checkout-key-38cb043e8f0f46ce9e5b6b50894cc157',
            'js_file' => 'https://test.checkout.dibspayment.eu/v1/checkout.js?v=1',
        ],
        'live' => [
            'url' => 'https://api.dibspayment.eu/v1',
            'secret_key' => 'live-secret-key-73b7728ad40540f5b84c6f9666a74438',
            'checkout_key' => 'live-checkout-key-d658cc1e882f46639176dd40745c4b36',
            'js_file' => 'https://checkout.dibspayment.eu/v1/checkout.js?v=1',
        ],
        'merchant_id' => 100019422,
    ],

    /**
     * System can not generate order if total amount is minimum this amount
     */
    'min_order_amount' => 25
];
