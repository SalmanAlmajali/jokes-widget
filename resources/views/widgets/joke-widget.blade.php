<x-filament::section icon="heroicon-m-megaphone">
    <x-slot name="heading">
        {{ __('jokes-widget::jokes-widget.widget_heading') }}
    </x-slot>

    <x-slot name="afterHeader">
        <x-filament::icon-button
            icon="heroicon-m-arrow-path"
            wire:click="tellMeAnotherJoke"
            label="{{ __('jokes-widget::jokes-widget.refresh_button') }}" />
    </x-slot>
    
    <p style="font-size: 1.2rem; line-height: calc(1.5 / 1); font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: 400;">“ {!! $joke !!} ”</p>
</x-filament::section>