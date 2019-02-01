<?php

namespace Mantey\Laratrait;

class Laratrait
{
    /**
     * Laravel application.
     *
     * @var \Illuminate\Foundation\Application
     *
     */
    public $app;

    /**
     * LaratraitFacade constructor.
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }



}