<?php

use Filament\Facades\Filament;
use Filament\Panel;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use SalmanAlmajali\JokesWidget\Joke;
use SalmanAlmajali\JokesWidget\JokesWidget;
use SalmanAlmajali\JokesWidget\JokesWidgetPlugin;

$fixture = __DIR__ . '/fixtures/jokes.md';

it('parses every markdown list item as one joke', function () use ($fixture) {
    expect(Joke::fromMarkdown($fixture)->all())->toBe([
        'Why do programmers prefer dark mode? Because light attracts **bugs**.',
        "Second joke\ncontinues on an indented line.",
        'Numbered joke',
        '<script>alert(1)</script> joke',
    ]);
});

it('returns an empty collection for a missing file', function () {
    expect(Joke::fromMarkdown(__DIR__ . '/nope.md'))->toBeEmpty();
});

it('uses the jokes file instead of the API', function () use ($fixture) {
    app()->setLocale('en');
    Http::fake();

    expect(Joke::fromMarkdown($fixture))->toContain(Joke::tellAJoke($fixture));
    Http::assertNothingSent();
});

it('falls back to the default source when the jokes file is missing', function () {
    app()->setLocale('id');

    expect(Joke::jokes())->toContain(Joke::tellAJoke(__DIR__ . '/nope.md'));
});

it('resolves the jokes file per locale', function () {
    $plugin = JokesWidgetPlugin::make()->jokesFile(['id' => 'id.md', 'en' => 'en.md']);

    expect($plugin->getJokesFile('id'))->toBe('id.md')
        ->and($plugin->getJokesFile('en_US'))->toBe('en.md')
        ->and($plugin->getJokesFile('en-GB'))->toBe('en.md')
        ->and($plugin->getJokesFile('fr'))->toBeNull()
        ->and(JokesWidgetPlugin::make()->jokesFile('all.md')->getJokesFile('fr'))->toBe('all.md');
});

it('renders markdown formatting but escapes html', function () {
    $html = Livewire::test(JokesWidget::class)
        ->set('joke', '**bold** <script>alert(1)</script>')
        ->html();

    expect($html)->toContain('<strong>bold</strong>')
        ->not->toContain('<script>alert(1)</script>');
});

it('widget reads the jokes file from the panel plugin', function () use ($fixture) {
    $panel = Panel::make()->id('test')->plugin(JokesWidgetPlugin::make()->jokesFile($fixture));
    Filament::registerPanel($panel);
    Filament::setCurrentPanel($panel);

    $joke = Livewire::test(JokesWidget::class)->get('joke');

    expect(Joke::fromMarkdown($fixture))->toContain($joke);
});
