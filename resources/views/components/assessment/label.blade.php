@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }} 
    {{ 
        Route::currentRouteName() === 'assessment.edit' && $value === 'yes' || $value === 'no' ? "x-show=show" : '' 
    }}
>
    {{ $value ?? $slot }}
</label>
