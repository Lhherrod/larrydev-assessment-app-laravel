
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assessment') }}
        </h2>
    </x-slot>
    @if (! \App\Enums\Status::ASSESSMENT_STATUS_ZERO === (boolean) auth()->user()->assessment->status)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status') === 'assessment-completed')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('Assessment Complete. Thank you.') }}
                </div>
            @endif
            <div class="dark:bg-gray-800 overflow-hidden shadow-2xl shadow-[blueviolet] sm:rounded-lg">
                <div class="p-6 overflow-hidden shadow-2xl shadow-[blueviolet] sm:rounded-lg">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    You have already completed the assessment please visit <a class="underline text-green-500" href="{{ route('assessment.edit', auth()->user()) }}">Here</a> to edit your assessment.
                </div>
            </div><img src="{{ '/' }}" alt="">
        </div>
    </div>
    @elseif ((integer) !auth()->user()->checked_in)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Please check in with me before attemping to completing the assessment. Thank you.
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-2xl shadow-[blueviolet] sm:rounded-lg">
                <div class="p-6 border-b border-[blueviolet]">
                    This is your Assessment...
                    <div class="mt-4" name="logo">
                        <a href="/">
                            <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                        </a>
                    </div>
                    <x-input-error :messages="$errors->all()" class="mt-2" />
                    <form method="POST" action="{{ route('assessment.store') }}">
                        @csrf

                        <div class="mt-4">
                            <p class="block font-medium text-gray-700">1. Website Pages</p>
                            <x-label
                                for="as_ws_pages_text"
                                :value="__('What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer…etc')"
                            />
                            <x-input
                                id="as_ws_pages_text"
                                class="block mt-1 w-full"
                                name="as_ws_pages"
                                type="text"
                                name="as_ws_pages"
                                :value="old('as_ws_pages')"
                                placeholder="What pages do you want? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer…etc"
                                required 
                                autofocus
                            />
                        </div>

                        <div class="mt-4" x-data="{ show: false }">
                            <p class="block font-medium text-sm text-gray-700">2. Website Style</p>
                            <p>Any particular style of website that you like?</p>
                            <input
                                id="as_ws_styles-yes"
                                {{ old("as_ws_styles") === 'yes' ? 'checked' : '' }}
                                @click="show = true"
                                name="as_ws_styles"
                                type="radio"
                                value="yes"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_styles_radio-yes"
                                :value="__('yes')"
                            />
                            <input
                                id="as_ws_styles_radio-no"
                                {{ old("as_ws_styles") === 'no' ? 'checked' : '' }}
                                @click="show = false"
                                onclick="document.getElementById('as_ws_styles_text').value = ''"
                                name="as_ws_styles"
                                type="radio"
                                value="no"

                            />
                            <x-label
                                class="inline"
                                for="as_ws_styles_radio-no"
                                :value="__('no')"
                            />
                            <x-label
                                class="mt-4"
                                x-show="show"
                                for="as_ws_styles_text"
                                :value="__('What kinds of style? or do you like a particular website, website\'s layout, or style?, and can you provide website link(s) to show as an example?')"
                            />
                            <x-input
                                x-show="show"
                                id="as_ws_styles_text"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                type="text"
                                name="as_ws_styles_text"
                                :value="old('as_ws_styles_text')"
                                placeholder="or do you like a particular website, website's layout, or style?, and can you provide website link(s) to show as an example?"
                            />
                        </div>

                        <div class="mt-4" x-data="{ show: false }">
                            <p class="block font-medium text-sm text-gray-700">3. Website Functions</p>
                            <p>Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?</p>
                            <input
                                id="as_ws_functions_radio-yes"
                                {{ old("as_ws_functions") === 'yes' ? 'checked' : ''}}
                                @click="show = true"
                                name="as_ws_functions"
                                type="radio"
                                value="yes"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_functions_radio-yes"
                                :value="__('yes')"
                            />
                            <input
                                id="as_ws_functions_radio-no"
                                {{ old("as_ws_functions") === 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_functions"
                                onclick="document.getElementById('as_ws_functions_text').value = ''"
                                type="radio"
                                value="no"

                            />
                            <x-label
                                class="inline"
                                for="as_ws_functions_radio-no"
                                :value="__('no')"
                            />
                            <x-label
                                class="mt-4"
                                x-show="show"
                                for="as_ws_functions_text"
                                :value="__('Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?')"
                            />
                            <x-input
                                x-show="show"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                id="as_ws_functions_text"
                                type="text"
                                name="as_ws_functions_text"
                                :value="old('as_ws_functions_text')"
                                placeholder="Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?"
                            />
                        </div>

                        <div class="mt-4" x-data="{ show: false }">
                            <p class="block font-medium text-sm text-gray-700">4. Website Budget</p>
                            <p>Do you have a budget?</p>
                            <input
                                id="as_ws_budget_radio-yes"
                                @click="show = true"
                                {{ old("as_ws_budget") === 'yes' ? 'checked' : '' }}
                                name="as_ws_budget"
                                type="radio"
                                value="yes"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_budget_radio-yes"
                                :value="__('yes')"
                            />
                            <input
                                id="as_ws_budget_radio-no"
                                {{ old("as_ws_budget") === 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_budget"
                                onclick="document.getElementById('as_ws_budget_text').value = ''"
                                type="radio"
                                value="no"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_budget_radio-no"
                                :value="__('no')"
                            />
                            <x-label
                                class="mt-4"
                                x-show="show"
                                for="as_ws_budget_text"
                                :value="__('$ please enter your budget in numbers...')"
                            />
                            <x-input
                                x-show="show"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                id="as_ws_budget_text"
                                type="text"
                                name="as_ws_budget_text"
                                :value="old('as_ws_budget_text')"
                                placeholder="$ please enter your budget in numbers..."
                            />
                        </div>

                        <div class="mt-4" x-data="{ show: false }">
                            <p class="block font-medium text-sm text-gray-700">5. Website Timeframe</p>
                            <p>Is there a time frame to when the application is needed? If so, when?</p>
                            <input
                                id="as_ws_timeframe_radio-yes"
                                @click="show = true"
                                {{ old("as_ws_timeframe") === 'yes' ? 'checked' : ''}}
                                name="as_ws_timeframe"
                                type="radio"
                                value="yes"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_timeframe_radio-yes"
                                :value="__('yes')"
                            />
                            <input
                                id="as_ws_timeframe_radio-no"
                                {{ old("as_ws_timeframe") === 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_timeframe"
                                onclick="document.getElementById('as_ws_timeframe_text').value = ''"
                                type="radio"
                                value="no"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_timeframe_radio-no"
                                :value="__('no')"
                            />
                            <x-label
                                x-show="show"
                                class="mt-4"
                                for="as_ws_timeframe_text"
                                :value="__('Is there a time frame to when the application is needed? If so, when?')"
                            />
                            <x-input
                                x-show="show"
                                @click.away="show = false"
                                class="block mt-1 w-full"
                                id="as_ws_timeframe_text"
                                type="text"
                                name="as_ws_timeframe_text"
                                :value="old('as_ws_timeframe_text')"
                                placeholder="Is there a time frame to when the application is needed? If so, when?"
                            />
                        </div>

                        <div class="mt-4" x-data="{ show: false }">
                            <p class="block font-medium text-sm text-gray-700">6. Website Hosting</p>
                            <p>Do You need hosting?</p>
                            <input
                                id="as_ws_hosting_radio-yes"
                                @click="show = true"
                                {{ old("as_ws_hosting") === 'yes' ? 'checked' : ''}}
                                id="as_ws_styles_hosting"
                                name="as_ws_hosting"
                                type="radio"
                                value="yes"
                            />
                            <x-label
                                class="inline"
                                id="as_ws_hosting_radio-yes"
                                for="as_ws_hosting"
                                :value="__('yes')"
                            />
                            <input
                                id="as_ws_hosting_radio-no"
                                {{ old("as_ws_hosting") === 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_hosting"
                                type="radio"
                                value="no"

                            />
                            <x-label
                                class="inline"
                                id="as_ws_hosting_radio-no"
                                for="as_ws_hosting"
                                :value="__('no')"
                            />
                        </div>

                        <div class="mt-4" x-data="{ show: false }">
                            <p class="block font-medium text-sm text-gray-700">7. Website Domain</p>
                            <p>Do you need a domain name?</p>
                            <input
                                id="as_ws_domain_radio-yes"
                                @click="show = true"
                                {{ old("as_ws_domain") === 'yes' ? 'checked' : '' }}
                                name="as_ws_domain"
                                type="radio"
                                value="yes"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_domain_radio-yes"
                                :value="__('yes')"
                            />
                            <input
                                {{ old("as_ws_domain") === 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_domain"
                                type="radio"
                                value="no"

                            />
                            <x-label
                                class="inline"
                                for="as_ws_domain_radio-no"
                                :value="__('no')"
                            />
                        </div>

                        <div class="mt-4" x-data="{ show: false }">
                            <p class="block font-medium text-sm text-gray-700">8. Website Content</p>
                            <p>
                                Do you have your own nice photos, logos, artwork that you would like added on the website? 
                                or do you have video or picture ideas?
                            </p>
                            <input
                                id="as_ws_content_radio-yes"
                                @click="show = true"
                                {{ old("as_ws_content") === 'yes' ? 'checked' : ''}}
                                name="as_ws_content"
                                type="radio"
                                value="yes"
                            />
                            <x-label
                                class="inline"
                                for="as_ws_content_radio-yes"
                                :value="__('yes')"
                            />
                            <input
                                id="as_ws_content_radio-no"
                                {{ old("as_ws_content") === 'no' ? 'checked' : '' }}
                                @click="show = false"
                                name="as_ws_content"
                                onclick="document.getElementById('as_ws_content_text').value = ''"
                                type="radio"
                                value="no"

                            />
                            <x-label
                                class="inline"
                                for="as_ws_content_radio-no"
                                :value="__('no')"
                            />
                            <x-label
                                x-show="show"
                                class="mt-4"
                                for="as_ws_content_text"
                                :value="__('Do you have your own nice photos, logos, artwork that you would like added on the website? or do you have video or picture ideas?')"
                            />
                            <x-input
                                x-show="show"
                                class="block mt-1 w-full"
                                id="as_ws_content_text"
                                type="text"
                                name="as_ws_content_text"
                                :value="old('as_ws_content_text')"
                                placeholder="Do you have your own nice photos, logos, artwork that you would like added on the website? or do you have video or picture ideas?"
                            />
                            <span x-show="show" class="block font-medium text-sm text-gray-700">
                                you will have an opportunity to upload media upon completion of the assessment
                            </span>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
