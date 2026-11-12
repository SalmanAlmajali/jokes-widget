<?php

use Filament\Panel;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use SalmanAlmajali\JokesWidget\Joke;
use SalmanAlmajali\JokesWidget\JokesWidget;
use SalmanAlmajali\JokesWidget\JokesWidgetPlugin;

it('returns an english joke from API when locale is en', function () {
    app()->setLocale('en');

    Http::fake([
        'icanhazdadjoke.com/*' => Http::response(['joke' => 'Funny API Joke'], 200),
    ]);

    $joke = Joke::tellAJoke();
    expect($joke)->toContain('Funny API Joke');
});

it('returns an english joke from API for other non-id locales', function () {
    app()->setLocale('fr');

    Http::fake([
        'icanhazdadjoke.com/*' => Http::response(['joke' => 'Bonjour Joke'], 200),
    ]);

    $joke = Joke::tellAJoke();
    expect($joke)->toBe('Bonjour Joke');
});

it('falls back to local joke when external API fails', function () {
    app()->setLocale('en');

    Http::fake([
        'icanhazdadjoke.com/*' => Http::response([], 500),
    ]);

    $joke = Joke::tellAJoke();
    expect(Joke::jokes())->toContain($joke);
});

it('returns a local bapak-bapak joke when locale is id', function () {
    app()->setLocale('id');

    $joke = Joke::tellAJoke();
    expect($joke)->toBeString()->not->toBeEmpty();
    expect(Joke::jokes())->toContain($joke);
});

it('registers the widget via plugin', function () {
    $plugin = JokesWidgetPlugin::make();
    expect($plugin->getId())->toBe('jokes-widget');

    $panel = new Panel;
    $plugin->register($panel);
    expect($panel->getWidgets())->toContain(JokesWidget::class);
});

it('renders the jokes widget and refreshes joke', function () {
    app()->setLocale('id');

    Livewire::test(JokesWidget::class)
        ->assertSuccessful()
        ->assertSee(__('jokes-widget::jokes-widget.widget_heading'))
        ->call('tellMeAnotherJoke')
        ->assertSuccessful();
});
