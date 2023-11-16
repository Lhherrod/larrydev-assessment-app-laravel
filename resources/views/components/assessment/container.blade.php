<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('status') === 'assessment-completed')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('Assessment Complete. Thank you.') }}
            </div>
        @endif
        @if (session('status') === 'assessment-updated')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('Assessment Updated. Thank you.') }}
            </div>
        @endif
        <div class="dark:bg-gray-800 overflow-hidden shadow-2xl shadow-[blueviolet] sm:rounded-lg">
            <div class="p-6 border-b border-[blueviolet] dark:text-gray-200">
                {{ $slot }}
            </div>
        </div> 
    </div>
</div>