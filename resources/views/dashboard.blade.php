<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->assessmentCheckInStatus === 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Please check in with me before completing the assessment.
                    </div>
                </div>
            </div>
        </div>
    @elseif (auth()->user()->assessmentStatus === 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You have not completed the assessment, You can do so  <a href="{{ route('assessment.index') }}">Here.</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <x-auth-session-status class="mb-4" :status="session('status')" />
</x-app-layout>
