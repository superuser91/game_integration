<?php

return [
    '_39' => [
        'name' => "Linh Kiếm Cửu Thiên",
        'server_list_api_url' => 'https://hmlvncenter.vgplay.vn/hhsy/api/server2.php?r=chenglu',
        'character_list_api' => [
            'url' => 'https://hmlvncenter.vgplay.vn/hhsy/api/role.php',
            'method' => 'GET',
            'params' => [
                'vgp_id' => 'vgpid',
                'server_id' => 'server_id'
            ],
            'pre_params' => [
                'r' => 'chenglu'
            ]
        ],
    ],
    '_42' => [
        'name' => "Song Kiếm Loạn Vũ",
        'server_list_api_url' => 'http://uc-42.vgplay.vn/api.php?s=MmoChannel/listServer',
        'character_list_api' => [
            'url' => 'http://uc-42.vgplay.vn/api.php?s=MmoChannel/getRole',
            'method' => 'POST',
            'params' => [
                'vgp_id' => 'vgpid',
                'server_id' => 'server_id'
            ]
        ],
    ],
    '_46' => [
        'name' => "Yêu Linh Giới",
        'server_list_api_url' => 'http://center-46.vgplay.vn/apip/payVN0S00/getServerList',
        'character_list_api' => [
            'url' => 'http://center-46.vgplay.vn/apip/payVN0S00/getServerRole',
            'method' => 'POST',
            'params' => [
                'vgp_id' => 'vgp_id',
                'server_id' => 'server_id'
            ]
        ],
    ],
    '_56' => [
        'name' => "Tiếu Ngạo Độc Tôn",
        'server_list_api_url' => 'http://account-56.vgplay.vn/index.php?do=api.serverList&ingor_encrypt=1&data={}',
        'character_list_api' => [
            'url' => 'http://account-56.vgplay.vn/index.php?do=api.getRole&ingor_encrypt=1&data={}',
            'method' => 'POST',
            'params' => [
                'vgp_id' => 'vgp_id',
                'server_id' => 'server_id'
            ]
        ],
    ],
    '_57' => [
        'name' => "Thanh Vân Kiếm",
        'server_list_api_url' => 'http://cls-test-57.vgplay.vn/hv1/server_list.php',
        'character_list_api' => [
            'url' => 'http://cls-test-57.vgplay.vn/hv1/role_list.php',
            'method' => 'POST',
            'params' => [
                'vgp_id' => 'vgp_id',
                'server_id' => 'server_id'
            ]
        ],
    ],
    '_59' => [
        'name' => "Clover Knights",
        'server_list_api_url' => 'http://manager-t15vn-t15-59.vgplay.vn/api/vn/server_list.php',
        'character_list_api' => [
            'url' => 'https://manager-t15vn-t15-59.vgplay.vn/api/vn/user_info.php',
            'method' => 'POST',
            'params' => [
                'vgp_id' => 'vgp_id',
                'server_id' => 'server_id'
            ]
        ],
    ],
];
