<x-filament::section icon="heroicon-m-megaphone">
    <x-slot name="heading">
        {{ __('bapack-jokes::translations.widget_heading') }}
    </x-slot>

    <x-slot name="afterHeader">
        <x-filament::icon-button 
            icon="heroicon-m-arrow-path" 
            wire:click="tellMeAnotherJoke" 
            label="{{ __('bapack-jokes::translations.refresh_button') }}" 
        />
    </x-slot>
    
    {!! $joke !!}
</x-filament::section>