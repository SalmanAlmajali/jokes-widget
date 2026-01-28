# Filament Jokes Widget 🎤

[![Latest Version on Packagist](https://img.shields.io/packagist/v/salmanalmajali/jokes-widget.svg?style=flat-square)](https://packagist.org/packages/salmanalmajali/jokes-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/salmanalmajali/jokes-widget.svg?style=flat-square)](https://packagist.org/packages/salmanalmajali/jokes-widget)
[![License](https://img.shields.io/packagist/l/salmanalmajali/jokes-widget.svg?style=flat-square)](LICENSE.md)

Add a touch of fun and lightweight Filament PHP widget that brings "Dad Jokes" humor directly to your dashboard and make your Filament Dashboard tell a joke. This plugin is designed to add a bit of humor to the administrative experience by displaying jokes tailored to your application's language settings.

## Key Features
- **Automatic Localization**: 
    - **Bahasa Indonesia**: Displays a collection of iconic local "bapak-bapak" jokes..
    - **English**: Dynamically fetches fresh dad jokes from the `icanhazdadjoke.com` API.
- **Interactive Refresh**: Includes a button to instantly swap jokes without reloading the page using Livewire.
- **Filament V4 and V5 Ready**: Optimized to run seamlessly on the latest version of Filament.

## Installation

You can install the package via Composer:

```bash
composer require salmanalmajali/jokes-widget
```
(Optional) Publish the translation files if you wish to customize the widget text:

```bash
php artisan vendor:publish --tag="jokes-widget-translations"
```

## Usage

Register the plugin in your Filament Panel Provider (typically `AdminPanelProvider.php`):

```bash
use SalmanAlmajali\JokesWidget\JokesWidget;

public function panel(Panel $panel): Panel
{
    return $panel
        ->widgets([
            JokesWidget::class,
        ]);
}
```

## Localization and Screenshoot

The widget automatically detects your application's locale:
- If the locale is set to id, the widget uses the local joke collection.
  <img width="1269" height="732" alt="Screenshot 2026-01-28 225903" src="https://github.com/user-attachments/assets/eaf84789-4c67-44a7-b842-7cb58ffcdf59" />
- or any other locale (default en), the widget fetches data from the external API.
  <img width="1266" height="731" alt="Screenshot 2026-01-28 230135" src="https://github.com/user-attachments/assets/e6708522-0cba-4099-860a-0fd7923fd6dd" />

## Testing

Run the package tests using Pest:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email undermod007@gmail.com instead of using the issue tracker.

## Credits

- [Salman Al Majali](https://github.com/SalmanAlmajali)
- [All Contributors](../../contributors)
