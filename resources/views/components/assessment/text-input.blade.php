@props(['value' => '', 'name' => '', 'assessment' => ''])
<input 
    x-cloak
    x-show="show" 
    type="text" 
    name={{ $name }}
    {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-indigo-500 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full']) !!}
    @if (!$assessment && !old($name)) 
        value={{ '' }}        
    @elseif($assessment && !old($name))
        value="{{ $assessment }}"
    @elseif(old($name))
        value="{{ old($name) }}"
    @endif
>
