<?php

namespace Magestio\Slider\Model;

/**
 * Class Status
 * @package Magestio\Slider\Model
 */
class Status
{
    const STATUS_ENABLED  = 1;
    const STATUS_DISABLED = 0;

    /**
     * Retrieve available statuses.
     *
     * @return []
     */
    public function getAllAvailableStatuses()
    {
        return [
            self::STATUS_ENABLED  => __('Enabled'),
            self::STATUS_DISABLED => __('Disabled'),
        ];
    }
}
