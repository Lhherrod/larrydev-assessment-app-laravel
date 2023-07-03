<x-app-layout>
    <x-header header="Assessment"/>
    @if (!auth()->user()->checked_in)
        <x-assessment.container>
            Please check in with me before attemping to completing the assessment. Thank you.
        </x-assessment.container>
    @elseif (!auth()->user()->assessment)
        <x-assessment.container>
            This is your Assessment...
            <x-application-logo-container/>
            <x-auth-validation-errors :messages="$errors" class="mt-2" />
            <form method="POST" action="{{ route('assessment.store') }}">
                @csrf
                <div class="mt-4">
                    <p class="block font-medium text-gray-700">1. Website Pages</p>
                    <p>What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer…etc</p>
                    <x-assessment.label
                        for="as_ws_pages_text"
                    />
                    <x-assessment.text-input
                        id="as_ws_pages_text"
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
                    <x-assessment.radio-input
                        id="as_ws_styles-yes"
                        :name="'as_ws_styles'"
                        :value="'yes'"
                        required
                    />
                    <x-label
                        class="inline"
                        for="as_ws_styles_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_styles_radio-no"
                        :name="'as_ws_styles'"
                        :value="'no'"
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
                    <x-assessment.text-input
                        id="as_ws_styles_text"
                        name="as_ws_styles_text"
                        :value="old('as_ws_styles_text')"
                        placeholder="or do you like a particular website, website's layout, or style?, and can you provide website link(s) to show as an example?"
                    />
                </div>
                <div class="mt-4" x-data="{ show: false }">
                    <p class="block font-medium text-sm text-gray-700">3. Website Functions</p>
                    <p>Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?</p>
                    <x-assessment.radio-input
                        id="as_ws_functions_radio-yes"
                        :name="'as_ws_functions'"
                        :value="'yes'"
                        required
                    />
                    <x-label
                        class="inline"
                        for="as_ws_functions_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_functions_radio-no"
                        :name="'as_ws_functions'"
                        :value="'no'"
                    />
                    <x-label
                        class="inline"
                        for="as_ws_functions_radio-no"
                        :value="__('no')"
                    />
                    <x-label
                        x-show="show"
                        class="mt-4"
                        for="as_ws_functions_text"
                        :value="__('Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?')"
                    />
                    <x-assessment.text-input
                        id="as_ws_functions_text"
                        name="as_ws_functions_text"
                        :value="old('as_ws_functions_text')"
                        placeholder="Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?"
                    />
                </div>
                <div class="mt-4" x-data="{ show: false }">
                    <p class="block font-medium text-sm text-gray-700">4. Website Budget</p>
                    <p>Do you have a budget?</p>
                    <x-assessment.radio-input
                        id="as_ws_budget_radio-yes"
                        :name="'as_ws_budget'"
                        :value="'yes'"
                        required
                    />
                    <x-label
                        class="inline"
                        for="as_ws_budget_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_budget_radio-no"
                        :name="'as_ws_budget'"
                        :value="'no'"
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
                    <x-assessment.text-input
                        class="block mt-1 w-full"
                        id="as_ws_budget_text"
                        name="as_ws_budget_text"
                        :value="old('as_ws_budget_text')"
                        placeholder="$ please enter your budget in numbers..."
                    />
                </div>
                <div class="mt-4" x-data="{ show: false }">
                    <p class="block font-medium text-sm text-gray-700">5. Website Timeframe</p>
                    <p>Is there a time frame to when the application is needed? If so, when?</p>
                    <x-assessment.radio-input
                        id="as_ws_timeframe_radio-yes"
                        :name="'as_ws_timeframe'"
                        :value="'yes'"
                        required
                    />
                    <x-label
                        class="inline"
                        for="as_ws_timeframe_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_timeframe_radio-no"
                        :name="'as_ws_timeframe'"
                        :value="'no'"
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
                    <x-assessment.text-input
                        id="as_ws_timeframe_text"
                        name="as_ws_timeframe_text"
                        :value="old('as_ws_timeframe_text')"
                        placeholder="Is there a time frame to when the application is needed? If so, when?"
                    />
                </div>
                <div class="mt-4" x-data="{ show: false }">
                    <p class="block font-medium text-sm text-gray-700">6. Website Hosting</p>
                    <p>Do You need hosting?</p>
                    <x-assessment.radio-input
                        id="as_ws_hosting_radio-yes"
                        :name="'as_ws_hosting'"
                        :value="'yes'"
                        required
                    />
                    <x-label
                        class="inline"
                        id="as_ws_hosting_radio-yes"
                        for="as_ws_hosting"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_hosting_radio-no"
                        :name="'as_ws_hosting'"
                        :value="'no'"
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
                    <x-assessment.radio-input
                        id="as_ws_domain_radio-yes"
                        :name="'as_ws_domain'"
                        :value="'yes'"
                        required
                    />
                    <x-label
                        class="inline"
                        for="as_ws_domain_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_domain_radio-no"
                        :name="'as_ws_domain'"
                        :value="'no'"
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
                    <x-assessment.radio-input
                        id="as_ws_content_radio-yes"
                        :name="'as_ws_content'"
                        :value="'yes'"
                        required
                    />
                    <x-label
                        class="inline"
                        for="as_ws_content_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_content_radio-no"
                        :name="'as_ws_content'"
                        :value="'no'"
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
                    <x-assessment.text-input
                        id="as_ws_content_text"
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
        </x-assessment.container>
    @else
        <x-assessment.container>
            You have already completed the assessment please visit <a class="underline text-green-500" href="{{ route('assessment.edit', auth()->user()->assessment->ulid) }}">Here</a> to edit your assessment.
        </x-assessment.container>
    @endif
</x-app-layout>