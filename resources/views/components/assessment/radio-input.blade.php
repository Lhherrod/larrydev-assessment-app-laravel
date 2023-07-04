@props(['name', 'value','assessment' => ''])

<input
    x-cloak
    {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-blueviolet focus:border-blueviolet dark:focus:border-blueviolet focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}
    {{ old($name) === 'yes' && $value === 'yes' ? 'checked' : '' }}
    {{ old($name) === 'no' && $value === 'no' ? 'checked' : '' }}
    {{ $value === 'yes' ? '@click' . '=show'  . '=true' : '' }}
    {{ $value === 'no' ? '@click' . '=show'  . '=false' : '' }}
    {{ 
        $value === 'no' && 
        $name !== 'as_ws_domain' && 
        $name !== 'as_ws_hosting' ? "onclick=" . "document.getElementById" . "('$name" . "_text')" .  ".value"   . "=''" : '' 
    }}
    {{ Route::currentRouteName() === 'assessment.edit' ? "x-show=show" : '' }}
    @if (!old($name) && $value === 'yes' && $assessment === 'yes')
        {{ 'checked' }}
    @endif
    @if (!old($name) && $value === 'no' && $assessment === 'no')
        {{ 'checked' }}
    @endif
    type="radio" 
    name={{ $name }}  
    value={{ $value }}
>
