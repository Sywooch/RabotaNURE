<?php
return [
    'admin' => [
        'type' => 2,
        'description' => 'Админ панель',
    ],
    'student' => [
        'type' => 1,
        'description' => 'Студент',
        'ruleName' => 'userRole',
    ],
    'company' => [
        'type' => 1,
        'description' => 'Компания',
        'ruleName' => 'userRole',
    ],
    'administrator' => [
        'type' => 1,
        'description' => 'Администратор',
        'ruleName' => 'userRole',
        'children' => [
            'admin',
        ],
    ],
];
