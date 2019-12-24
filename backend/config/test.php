<?php

return [
    'url' => [
        'prefix_admin' => 'admin',
    ],

    'format' =>[
        'long_time' => 'H:m:s d/m/Y',
        'short_time' => 'd/m/Y'
    ],

    'template' => [
        
        'form_input' => [
            'class' => 'form-control col-md-7 col-xs-12'
        ],

        'form_label' => [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ],

        'form_ckeditor' => [
            'class' => 'form-control col-md-7 col-xs-12 ckeditor'
        ],

        'status' => [
            'all' => ['name' => 'All', 'class' => 'btn-primary'],
            'active' => ['name' => 'Active', 'class' => 'btn-success'],
            'inactive' => ['name' => 'Inactive', 'class' => 'btn-info'],
            'block' => ['name' => 'Block', 'class' => 'btn-danger'],
            'default' => ['name' => 'Not define', 'class' => 'btn-primary'],
        ],

        'is_home' => [
            '1' => ['name' => 'Show', 'class' => 'btn-primary'],
            '0' => ['name' => 'Hide', 'class' => 'btn-warning'],
        ],

        'display' => [
            'list' => ['name' => 'Danh sách'],
            'grid' => ['name' => 'Lưới'],
        ],

        'type' => [
            'feature' => ['name' => 'Nổi bật'],
            'normal' => ['name' => 'Bình thường'],
        ],

        'level' => [
            'admin' => ['name' => 'Quản trị hệ thống' ],
            'member' => ['name' => 'User']
        ],


        'search' => [
            'all' => ['name' => 'Search by All'],
            'id' => ['name' => 'Search by ID'],
            'name' => ['name' => 'Search by Name'],
            'username' => ['name' => 'Search by Username'],
            'fullname' => ['name' => 'Search by Fullname'],
            'email' => ['name' => 'Search by Email'],
            'description' => ['name' => 'Search by Description'],
            'link' => ['name' => 'Search by Link'],
            'content' => ['name' => 'Search by Content'],
            'subject_id' => ['name' => 'Search by Subject'],
        ],

        'button' => [
            'edit' => ['class' => 'btn-success', 'title' => 'Edit', 'icon' => 'fa-pencil', 'route-name' => '/form'],
            'delete' => ['class' => 'btn-danger btn-delete', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name' => '/delete'],
            'info' => ['class' => 'btn-info', 'title' => 'View', 'icon' => 'fa-pencil', 'route-name' => '/delete'],
        ]
    ],

    'config' => [
        'search' => [
            'subject' => ['all', 'name', 'description'],
            'post' => ['all', 'name', 'content', 'subject_id'],
            'exam' => ['all', 'name', 'content', 'subject_id'],
            'question' => ['all', 'name'],
            'user' => ['all', 'username', 'email', 'fullname'],
            'default' => ['all', 'id', 'name']
        ],

        'button' => [
            'default' => ['edit', 'delete'],
            'subject' => ['edit', 'delete'],
            'post' => ['edit', 'delete'],
            'exam' => ['edit', 'delete'],
            'question' => ['edit', 'delete'],
            'user' => ['edit'],
        ]
    ]
];