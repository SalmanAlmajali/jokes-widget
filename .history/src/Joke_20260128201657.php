<?php

namespace SalmanAlmajali\JokesWidget;

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
}
