<?php

namespace Julienbourdeau\DevToolsForLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Julienbourdeau\DevToolsForLaravel\Skeleton\SkeletonClass
 */
class DevToolsForLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dev-tools-for-laravel';
    }
}
