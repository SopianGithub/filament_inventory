<?php

namespace SoftyanSolutions\LayoutSoft;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SoftyanSolutions\LayoutSoft\Skeleton\SkeletonClass
 */
class LayoutSoftFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \SoftyanSolutions\LayoutSoft\LayoutSoft::class;
    }

}
