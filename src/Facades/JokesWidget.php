<?php

namespace SalmanAlmajali\JokesWidget\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SalmanAlmajali\JokesWidget\JokesWidget
 */
class JokesWidget extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \SalmanAlmajali\JokesWidget\JokesWidget::class;
    }
}
