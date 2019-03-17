<?php

namespace MA\Noty;

use RuntimeException;
use Illuminate\Config\Repository;
use MA\Noty\Contracts\NotyInterface;
use Illuminate\Session\SessionManager;

/**
 * Class Noty
 *
 * @package MA\Noty
 */
class Noty
{

    /**
     * Notification namespace.
     *
     * @var string
     */
    protected $notificationNamespace = 'noty:notification';

    /**
     * Array of notification.
     *
     * @var array
     */
    protected $notifications;

    /**
     * Illuminate session manager.
     *
     * @var \Illuminate\Session\SessionManager
     */
    protected $session;

    /**
     * Notify configuration.
     *
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    /**
     * Noty constructor.
     *
     * @param \MA\Noty\Contracts\NotyInterface   $notyInterface
     * @param \Illuminate\Session\SessionManager $session
     * @param \Illuminate\Config\Repository      $config
     */
    public function __construct(NotyInterface $notyInterface, SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
        $this->notyInterface = $notyInterface;
        $this->notifications = $this->session->get($this->notificationNamespace, []);
    }

    /**
     * @param $method
     * @param $arguments
     * @return Noty
     */
    public function __call($method, $arguments)
    {
        if (! in_array($method, $this->notyInterface->getAllowedNotificationTypes(), true)) {
            throw new RuntimeException('Invalid ' . $method . ' for the ' . $this->notyInterface->getNotificationName() . '.');
        }

        return $this->addNotification($method, ...$arguments);
    }

    /**
     * Add notification.
     *
     * @param string $type
     * @param string $message
     * @param string $title
     * @param array  $options
     * @return Noty
     */
    public function addNotification(string $type, string $message, string $title = '', array $options = []): self
    {
        if (! in_array($type, $this->notyInterface->getAllowedNotificationTypes(), true)) {
            throw new RuntimeException('Invalid ' . $type . ' for the ' . $this->notyInterface->getNotificationName() . '.');
        }

        $this->notifications[] = [
            'type'    => $type,
            'message' => $this->escapeSingleQuote($message),
            'title'   => $this->escapeSingleQuote($title),
            'options' => json_encode($options),
        ];

        $this->session->flash($this->notificationNamespace, $this->notifications);

        return $this;
    }

    /**
     * Clear all (notificationNamespace) notification from session.
     *
     * @return Noty
     */
    public function clearNotification(): self
    {
        $this->notifications = [];
        $this->session->forget($this->notificationNamespace);

        return $this;
    }

    /**
     * Render notification.
     *
     * @return string
     */
    public function render(): string
    {
        $notification = $this->notyInterface->render($this->notifications);
        $this->session->forget($this->notificationNamespace);

        return $notification;
    }

    /**
     * Helper function to escape single quote.
     *
     * @param string $value
     * @return string
     */
    public function escapeSingleQuote(string $value): string
    {
        return str_replace("'", "\\'", $value);
    }
}
