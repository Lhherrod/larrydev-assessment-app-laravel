
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assessment') }}
        </h2>
    </x-slot>
    @if (!$checkAssessmentStatus == $assessmentStatus)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    You have already completed the assessment please visit <a href="{{ route('assessment.edit', $user) }}">Here</a> to edit your assessment.
                </div>
            </div><img src="{{ '/' }}" alt="">
        </div>
    </div>
    @elseif ($checkAssessmentCheckInStatus == $assessmentCheckInStatus)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Please check in with me before completing the assessment.
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    This is your Assessment.
                    <br />
                    <div class="mt-4" name="logo">
                        <a href="/">
                            <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                        </a>
                    </div>

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('assessment.store') }}">
                        @csrf
                        <div class="mt-4">
                            <x-label
                                for="as_ws_pages"
                                :value="__('1. Website Pages')"
                            />

                            What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer … etc

                            <x-input
                                class="block mt-1 w-full"
                                name="as_ws_pages"
                                type="text"
                                name="as_ws_pages"
                                :value="old('as_ws_pages')"
                                placeholder=" What pages do you want? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer … etc"
                                required autofocus
                            />
                        </div>

                        <div class="mt-4" x-data="{show: false}">
                            <x-label
                                for="as_ws_styles"
                                :value="__('2. Website Style')"
                            />

                            Any particular style of website that you like?<br>

                            <input
                                {{ old("as_ws_styles") == 'yes' ? 'checked' : '' }}
                                @click="show = true"
                                name="as_ws_styles"
                                type="radio"
                                value="yes"
                            />

                            yes

                            <input
                                {{ old("as_ws_styles") == 'no' ? 'checked' : '' }}
                                @click="show = false"
                                onclick="document.getElementById('as_ws_styles_text').value = ''"
                                name="as_ws_styles"
                                type="radio"
                                value="no"

                            />

                            no

                            <x-input
                                x-show="show"
                                id="as_ws_styles_text"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                type="text"
                                name="as_ws_styles_text"
                                :value="old('as_ws_styles_text')"
                                placeholder="or do you like a particular website's layout or style, and can provide website link(s) to show as an example?"
                                autofocus
                            />
                        </div>

                        <div class="mt-4" x-data="{show: false }">
                            <x-label
                                for="as_ws_functions"
                                :value="__('3. Website Functions')"
                            />

                            Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?<br>

                            <input
                                {{ old("as_ws_functions") == 'yes' ? 'checked' : ''}}
                                @click="show = true"
                                name="as_ws_functions"
                                type="radio"
                                value="yes"
                            />

                            yes

                            <input
                                {{ old("as_ws_functions") == 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_functions"
                                onclick="document.getElementById('as_ws_functions_text').value = ''"
                                type="radio"
                                value="no"

                            />

                            no

                            <x-input
                                x-show="show"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                id="as_ws_functions_text"
                                type="text"
                                name="as_ws_functions_text"
                                :value="old('as_ws_functions_text')"
                                placeholder=" Website Functions"
                                autofocus
                            />
                        </div>

                        <div class="mt-4" x-data="{show: false }">
                            <x-label
                                for="as_ws_budget"
                                :value="__('4. Website Budget')"
                            />

                            Do you have a budget?<br>

                            <input
                                @click="show = true"
                                {{ old("as_ws_budget") == 'yes' ? 'checked' : '' }}
                                name="as_ws_budget"
                                type="radio"
                                value="yes"
                            />

                            yes

                            <input
                                {{ old("as_ws_budget") == 'yes' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_budget"
                                onclick="document.getElementById('as_ws_budget_text').value = ''"
                                type="radio"
                                value="no"
                            />

                            no

                            <x-input
                                x-show="show"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                id="as_ws_budget_text"
                                type="text"
                                name="as_ws_budget_text"
                                :value="old('as_ws_budget_text')"
                                placeholder="$"
                                autofocus
                            />
                        </div>

                        <div class="mt-4" x-data="{show: false }">
                            <x-label
                                for="as_ws_timeframe"
                                :value="__('5. Website Timeframe')"
                            />

                            Is there a time frame to when the application is needed? If so, when?<br>

                            <input
                                @click="show = true"
                                {{ old("as_ws_timeframe") == 'yes' ? 'checked' : ''}}
                                name="as_ws_timeframe"
                                type="radio"
                                value="yes"
                            />

                            yes

                            <input
                                {{ old("as_ws_timeframe") == 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_timeframe"
                                onclick="document.getElementById('as_ws_timeframe_text').value = ''"
                                type="radio"
                                value="no"
                            />

                            no

                            <x-input
                                x-show="show"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                id="as_ws_timeframe_text"
                                type="text"
                                name="as_ws_timeframe_text"
                                :value="old('as_ws_timeframe_text')"
                                placeholder=" Website Timeframe?"
                                autofocus
                            />
                        </div>

                        <div class="mt-4" x-data="{show: false }">
                            <x-label
                                for="as_ws_hosting"
                                :value="__('6. Website Hosting')"
                            />

                            Do You need hosting?

                            <br>

                            <input
                                @click="show = true"
                                {{ old("as_ws_hosting") == 'yes' ? 'checked' : ''}}
                                id="as_ws_styles_hosting"
                                name="as_ws_hosting"
                                type="radio"
                                value="yes"
                            />

                            yes

                            <input
                                {{ old("as_ws_hosting") == 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_hosting"
                                type="radio"
                                value="no"

                            />
                            no
                        </div>

                        <div class="mt-4" x-data="{show: false }">
                            <x-label
                                for="as_ws_domain"
                                :value="__('7. Website Domain')"
                            />

                            Do you need a domain name?<br>

                            <input
                                @click="show = true"
                                {{ old("as_ws_domain") == 'yes' ? 'checked' : '' }}

                                name="as_ws_domain"
                                type="radio"
                                value="yes"
                            />yes

                            <input
                                {{ old("as_ws_domain") == 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_domain"
                                type="radio"
                                value="no"

                            />
                            no
                        </div>

                        <div class="mt-4" x-data="{show: false }">
                            <x-label
                                for="as_ws_content"
                                :value="__('8. Website Content')"
                            />

                            Do you have your own nice photos, logos, artwork that you would like added on the website?<br>

                            <input
                                @click="show = true"
                                {{ old("as_ws_content") == 'yes' ? 'checked' : ''}}
                                name="as_ws_content"
                                type="radio"
                                value="yes"
                            />

                            yes

                            <input
                                {{ old("as_ws_content") == 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_content"
                                onclick="document.getElementById('as_ws_content_text').value = ''"
                                type="radio"
                                value="no"

                            />

                            no

                            <x-input
                                x-show="show"
                                class="block mt-1 w-full"
                                id="as_ws_content_text"
                                type="text"
                                name="as_ws_content_text"
                                :value="old('as_ws_content_text')"
                                placeholder="or do you have video or picture ideas?"
                                autofocus
                            />

                            <span x-show="show" class="block font-medium text-sm text-gray-700">
                                you will have an opportunity to upload media upon completion of the assessment
                            </span>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">{{ __('Submit') }}</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
