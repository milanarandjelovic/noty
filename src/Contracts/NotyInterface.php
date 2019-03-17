<?php

namespace MA\Noty\Contracts;

/**
 * Interface NotyInterface
 *
 * @package MA\Noty\Contracts
 */
interface NotyInterface
{

    /**
     * Render notification.
     *
     * @param array $notification
     * @return string
     */
    public function render(array $notification): string;

    /**
     * Return allowed notification types.
     *
     * @return array
     */
    public function getAllowedNotificationTypes(): array;

    /**
     * Return notification name.
     *
     * @return string
     */
    public function getNotificationName(): string;
}
