<?php

namespace SalmanAlmajali\JokesWidget;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Str;

class JokesWidgetPlugin implements Plugin
{
    /** @var string|array<string, string>|null */
    protected string | array | null $jokesFile = null;

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'jokes-widget';
    }

    public function register(Panel $panel): void
    {
        $panel->widgets([
            JokesWidget::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    /**
     * @param  string|array<string, string>  $path  one file for all locales, or ['id' => ..., 'en' => ...]
     */
    public function jokesFile(string | array $path): static
    {
        $this->jokesFile = $path;

        return $this;
    }

    public function getJokesFile(?string $locale = null): ?string
    {
        if (! is_array($this->jokesFile)) {
            return $this->jokesFile;
        }

        $locale ??= app()->getLocale();

        // en_US / en-US fall back to the "en" file.
        return $this->jokesFile[$locale]
            ?? $this->jokesFile[Str::before(str_replace('-', '_', $locale), '_')]
            ?? null;
    }
}
