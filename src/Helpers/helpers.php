<?php

use MA\Noty\Noty;

if (! function_exists('noty')) {
    /**
     * Helper function.
     *
     * @param string|null $message
     * @param string      $type
     * @param string      $title
     * @param array       $options
     * @return Noty
     */
    function noty(string $message = null, string $type = 'info', string $title = '', array $options = []): Noty
    {
        if (is_null($message)) {
            return app('noty');
        }

        return app('noty')->addNotification($type, $message, $title, $options);
    }
}

if (! function_exists('noty_scripts')) {
    /**
     * Noty scripts.
     *
     * @return string
     */
    function noty_scripts(): string
    {
        $scripts = config('noty.' . config('noty.default') . '.noty_scripts');

        return '<script src="' . implode('"></script><script type="text/javascript" src="', $scripts) . '" type="text/javascript"></script>';
    }
}

if (! function_exists('noty_styles')) {
    /**
     * Noty styles.
     *
     * @return string
     */
    function noty_styles(): string
    {
        $styles = config('noty.' . config('noty.default') . '.noty_styles');

        return '<link rel="stylesheet" type="text/css" href="' . implode('"><link rel="stylesheet" type="text/css" href="', $styles) . '">';
    }
}
