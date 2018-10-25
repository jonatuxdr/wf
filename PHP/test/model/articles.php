<?php 
    // Articles : id, pub_date, img, title, description
    //Data loading model for articles
    //TODO : Currently hardcoded, but normaly it comes from the DB/Server
    //FIXME : Return articles instead of variables declarations
    
    $articles = [
        [
            'id' => 1,
            'pub_date' => '2018-06-21 11:43:12',
            'img' => 'img/myPicture1.png',
            'title' => 'Title 1',
            'description' => 'Lorem ipsum sit amet'
        ],
        [
            'id' => 2,
            'pub_date' => '2018-06-22 09:33:17',
            'img' => 'img/myPicture2.png',
            'title' => 'Title 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse gravida orci sit amet tellus egestas, sed euismod leo dapibus. Sed faucibus arcu id purus malesuada volutpat. Vivamus rhoncus ornare tellus, eu porta purus lacinia eu viverra fusce.'
        ]
    ];
