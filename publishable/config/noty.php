<?php

return [
    'default' => 'toastr',

    // https://github.com/CodeSeven/toastr
    'toastr'  => [
        'class'        => \MA\Noty\Notification\Toastr::class,
        'types'        => [
            'info',
            'success',
            'error',
            'warning',
        ],
        'noty_styles'  => [
            asset('vendor/noty/css/toastr.css'),
        ],
        'noty_scripts' => [
            asset('vendor/noty/js/jquery.js'),
            asset('vendor/noty/js/toastr.min.js'),
        ],
        'options'      => [
            "closeButton"       => false,
            'debug'             => false,
            'newestOnTop'       => true,
            'progressBar'       => true,
            'positionClass'     => 'toast-top-right',
            'preventDuplicates' => false,
            'onclick'           => null,
            'showDuration'      => '300',
            'hideDuration'      => '1000',
            'timeOut'           => '5000',
            'extendedTimeOut'   => '1000',
            'showEasing'        => 'swing',
            'hideEasing'        => 'linear',
            'showMethod'        => 'fadeIn',
            'hideMethod'        => 'fadeOut',
        ],
    ],
];
