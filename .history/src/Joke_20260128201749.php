<?php

namespace SalmanAlmajali\JokesWidget;

use Illuminate\Support\Facades\Http;

class Joke
{
    public static function tellAJoke()
    {
        $locale = app()->getLocale();

        if ($locale === 'en') {
            return static::fetchFromExternalApi();
        }

        // Fallback ke koleksi lokal untuk bahasa Indonesia (id)
        return static::formatForWeb(static::jokes()->random());
    }

    protected static function fetchFromExternalApi()
    {
        try {
            // Mengambil joke bahasa Inggris dari API eksternal
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'User-Agent' => 'Filament-Jokes-Widget-Plugin (https://github.com/SalmanAlmajali/jokes-widget)'
            ])->get('https://icanhazdadjoke.com/');

            if ($response->successful()) {
                return static::formatForWeb($response->json()['joke']);
            }
        } catch (\Exception $e) {
            // Jika API down, ambil dari cadangan lokal
        }

        return static::formatForWeb("Why did the web developer walk out of a restaurant? Because of the table layout.");
    }
}
