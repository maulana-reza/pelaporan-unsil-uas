<?php
return [
    'dashboard' => [
        'icon' => 'heroicon-o-adjustments',
        'route' => 'dashboard',
        'can' => 'admin-dashboard',
    ],
    'Laporan Masuk' => [
        'icon' => 'heroicon-o-adjustments',
        'route' => 'laporan-masuk',
        'can' => 'admin-laporan',
    ],
    'Pengaturan' => [
        'icon' => 'heroicon-o-academic-cap',
        'can' => 'manage users',
        'child' => [
            'Klasifikasi' => [
                'icon' => 'heroicon-o-adjustments',
                'route' => 'klasifikasi',
                'can' => 'admin-klasifikasi',
            ],
            'Bidang Terkait' => [
                'icon' => 'heroicon-o-adjustments',
                'route' => 'bidang-terkait',
                'can' => 'admin-bidang-terkait',
            ],
        ]
    ],
];
