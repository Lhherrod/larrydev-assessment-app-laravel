<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'assessment' => 'c,r,u,d',
            'contact' => 'c,r,u,d'
        ],
        'administrator' => [
            'users' => 'r',
            'profile' => 'c,r,u',
            'assessment' => 'c,r',
            'contact' => 'c,r'
        ],
        'user' => [
            'profile' => 'r,u',
        ],
        'client' => [
            'assessment' => 'c,r,u,d'
        ],
        'potential_client' => [
            'assessment' => 'c,r,u'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
