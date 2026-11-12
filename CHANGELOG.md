# Changelog

All notable changes to `jokes-widget` will be documented in this file.

## v2.0.0 - 2026-11-12

### ⚠️ Breaking Changes
- **Filament v4 & v5 Only**: Dropped Filament v3 support (`filament/filament: ^4.0|^5.0`). Refactored `$view` property to match Filament v4/v5 instance requirements.
- Updated minimum dev dependencies to support Laravel 11/12 and Pest 3.

### ✨ Features
- **Custom Markdown Jokes**: Define custom jokes using Markdown files via `JokesWidgetPlugin::make()->jokesFile(...)`. Supports single files or per-locale mappings (`['id' => '...', 'en' => '...']`). List items (`-`, `*`, `+`, `1.`) are parsed as jokes with multiline support.
- **Rich Text Support**: Jokes support inline Markdown formatting (`**bold**`, `_italic_`, links) with automatic HTML escaping.
- **Plugin Architecture**: Added `JokesWidgetPlugin` class implementing `Filament\Contracts\Plugin` for standard panel plugin registration.

### 🐛 Bug Fixes & Improvements
- **Security**: Prevented XSS by escaping raw HTML inputs in joke rendering.
- **Resilience**: Added a 3-second timeout and robust exception handling to external API calls to avoid blocking the dashboard.
- **Localization**: Aligned locale matching with documentation—`id` locales load local jokes, while other locales use the API (or custom files).
- **Test Suite**: Expanded test suite to 13 automated tests covering plugin registration, Livewire widget rendering, API fallbacks, and markdown parsing.

## v1.0.0 - Initial Release - 2026-01-28

### 🚀 Release v1.0.0 - Initial Release

We are excited to announce the first stable release of the Filament Jokes Widget! Bring some joy to your Filament dashboard with a simple yet entertaining widget that delivers jokes based on your application's language.

#### ✨ Features

- **Smart Localization:** Automatically detects your app's locale (id for local Indonesian "bapak-bapak" jokes, and en or others for English dad jokes).
- **External API Integration:** Fetches fresh, high-quality jokes from icanhazdadjoke.com for English users.
- **Interactive Livewire Widget:** Refresh jokes instantly without a page reload using the built-in refresh button.
- **Filament v4 and V5 Compatible:** Fully tested and ready for the latest Filament ecosystem.


