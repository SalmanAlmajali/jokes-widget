<?php

use Illuminate\Support\Facades\Http;
use SalmanAlmajali\JokesWidget\Joke;

it('returns an english joke from API when locale is en', function () {
    app()->setLocale('en');

    Http::fake([
        'icanhazdadjoke.com/*' => Http::response(['joke' => 'Funny API Joke'], 200),
    ]);

    $joke = Joke::tellAJoke();
    expect($joke)->toContain('Funny API Joke');
});

it('returns a local bapak-bapak joke when locale is id', function () {
    app()->setLocale('id');

    $joke = Joke::tellAJoke();
    // Cek apakah output mengandung format HTML yang kita buat
    expect($joke)->toBeString()->not->toBeEmpty();
});
