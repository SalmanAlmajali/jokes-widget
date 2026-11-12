<?php

namespace SalmanAlmajali\JokesWidget;

use Filament\Widgets\Widget;

class JokesWidget extends Widget
{
    protected static ?int $sort = -2;

    protected string $view = 'jokes-widget::widgets.joke-widget';

    public $joke;

    public function mount()
    {
        $this->tellMeAnotherJoke();
    }

    public function tellMeAnotherJoke()
    {
        $panel = filament()->getCurrentPanel();

        $jokesFile = $panel?->hasPlugin('jokes-widget')
            ? $panel->getPlugin('jokes-widget')->getJokesFile()
            : null;

        $this->joke = Joke::tellAJoke($jokesFile);
    }
}
