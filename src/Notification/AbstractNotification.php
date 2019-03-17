<?php

namespace MA\Noty\Notification;

/**
 * Class AbstractNotification
 *
 * @package MA\Noty\Notification
 */
abstract class AbstractNotification
{

    /**
     * Notification config.
     *
     * @var array
     */
    protected $config;

    /**
     * AbstractNotification constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Render notification.
     *
     * @param array $notifications
     * @return string
     */
    public function render(array $notifications): string
    {
        return '<script>' . $this->options() . $this->notificationAsString($notifications) . '</script>';
    }

    /**
     * Get global options.a
     *
     * @return string
     */
    public function options(): string
    {
        return '';
    }

    /**
     * Return notification as string.
     *
     * @param array $notifications
     * @return string
     */
    public function notificationAsString(array $notifications): string
    {
        return implode('', $this->notifications($notifications));
    }

    /**
     * Create an array of notification.
     *
     * @param array $notifications
     * @return array
     */
    public function notifications(array $notifications): array
    {
        return array_map(function ($notification) {
            return $this->noty(
                $notification['type'],
                $notification['message'],
                $notification['title'],
                $notification['options']
            );
        }, $notifications);
    }

    /**
     * Return name.
     *
     * @return string
     */
    public function getNotificationName(): string
    {
        return basename(\get_class($this));
    }

    /**
     * Return allowed notification types.
     *
     * @return array
     */
    public function getAllowedNotificationTypes(): array
    {
        return $this->config['types'];
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
    abstract public function noty(string $type, string $message = '', string $title = '', string $options = ''): string;
}
