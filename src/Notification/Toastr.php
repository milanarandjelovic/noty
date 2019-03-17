<?php

namespace MA\Noty\Notification;

use MA\Noty\Contracts\NotyInterface;

/**
 * Class Toastr
 *
 * @package MA\Notify\Notification
 */
class Toastr extends AbstractNotification implements NotyInterface
{

    /**
     * @return string
     */
    public function options(): string
    {
        return 'toastr.options = ' . json_encode($this->config['options']) . ';';
    }

    /**
     * Create a single notification.
     *
     * @param string $type
     * @param string $message
     * @param string $title
     * @param string $options
     * @return string
     */
    public function noty(string $type, string $message = '', string $title = '', string $options = ''): string
    {
        return "toastr.$type('$message', '$title', $options);";
    }
}
