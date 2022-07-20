<?php
return [
    'id' => 14,
    'type' => 14,
    'folder' => 'products',
	'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'slug' => [
                'type' => 'text',
                'error_msg' => 'slug_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
          
            'desc' => [
                'type' => 'textarea',

            ],
            'text' => [
                'type' => 'textarea',
            ],
            'Measurement' => [
                'type' => 'text',
            ],
            
            'active' => [
                'type' => 'checkbox',
            ],
        ],

        'nonTrans' => [


           
            'product' =>[
                'type' => 'product',
            ],
           'Minimum_Quantity' => [
                'type' => 'text',
            ],
            'category' => [
                'type' => 'category',
            ],
            
            'images' => [
                'type' => 'images',
            ],
            
            
            

        ],
    ]
];
