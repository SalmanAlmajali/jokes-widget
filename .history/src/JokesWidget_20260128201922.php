<?php

namespace SalmanAlmajali\JokesWidget;

use Filament\Widgets\Widget;

class JokesWidget extends Widget
{
    protected static ?int $sort = -2;

    protected string $view = 'bapack-jokes::widgets.joke-widget';

    public $joke;

    public function mount()
    {
        $this->tellMeAnotherJoke();
    }

    public function tellMeAnotherJoke()
    {
        $this->joke = "... loading some laughs ...";
        
        $this->joke = Joke::tellAJoke();
    }
}
