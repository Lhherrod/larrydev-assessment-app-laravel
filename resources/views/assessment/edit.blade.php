<x-app-layout>
    <x-header header="Edit Assessment"/>
    <x-assessment.container>
        You can edit or update assessment here
        <x-application-logo-container/>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" enctype="multipart/form-data" action="{{ route('assessment.update', $assessment->ulid) }}">
            @method('PATCH')
            @csrf
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-gray-700">1. Website Pages</p>
                <p>What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer…etc</p>
                <p> Answer: {{ $assessment->as_ws_pages }}</p>
                <x-assessment.label
                    for="as_ws_pages_text"
                    :value="__('')"
                />
                <x-button class="mt-2" @click="show = !show" onclick="event.preventDefault()">
                    {{ __('Edit') }}
                </x-button>
                <x-assessment.text-input
                    class="mt-4"
                    name="as_ws_pages"
                    id="as_ws_pages_text"
                    placeholder=" What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer…etc"
                    autofocus
                    required
                    :assessment="$assessment->as_ws_pages"
                />
            </div>
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-sm text-gray-700">2. Website Style</p>
                <p>Any particular style of website that you like?</p>
                <p> Answer: {{ $assessment->as_ws_styles }}, {{ $assessment->as_ws_styles_text }}</p>
                <x-button @click="show = !show" onclick="event.preventDefault()" class="mt-2">
                    {{ __('Edit') }}
                </x-button>
                <div class="mt-2">
                    <x-assessment.radio-input
                        id="as_ws_styles_radio-yes"
                        :name="'as_ws_styles'"
                        :value="'yes'"
                        required
                        :assessment="$assessment->as_ws_styles"
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_styles_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_styles_radio-no"
                        :name="'as_ws_styles'"
                        :value="'no'"
                        :assessment="$assessment->as_ws_styles"
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_styles_radio-no"
                        :value="__('no')"
                    />
                    <x-assessment.label
                        x-show="show"
                        class="mt-4"
                        for="as_ws_styles_text"
                        :value="__('Any particular style of website that you like? or do you like a particular website\'s layout or style, and can provide website link(s) to show as an example?')"
                    />
                    <x-assessment.text-input
                        id="as_ws_styles_text"
                        :name="'as_ws_styles_text'"
                        :assessment="$assessment->as_ws_styles_text"
                        placeholder="or do you like a particular website's layout or style, and can provide website link(s) to show as an example?"
                    />
                </div>
            </div>
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-sm text-gray-700">3. Website Functions</p>
                <p>Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?</p>
                <p> Answer: {{ $assessment->as_ws_functions }}, {{ $assessment->as_ws_functions_text }}</p>
                <x-button class="mt-2" @click="show = !show" onclick="event.preventDefault()">
                    {{ __('Edit') }}
                </x-button>
                <div class="mt-2">
                    <x-assessment.radio-input
                        id="as_ws_functions_radio-yes"
                        :name="'as_ws_functions'"
                        :value="'yes'"
                        :assessment="$assessment->as_ws_functions"
                        required
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_functions_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_functions-no"
                        name="as_ws_functions"
                        :value="'no'"
                        :assessment="$assessment->as_ws_functions"
                    />
                    <x-assessment.label
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
                        :name="'as_ws_functions_text'"
                        :assessment="$assessment->as_ws_timeframe_text"
                        placeholder="Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?"
                    />
                </div>
            </div>
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-sm text-gray-700">4. Website Budget</p>
                <p>Do you have a budget?</p>
                <p>Answer: {{ $assessment->as_ws_budget }}, {{ $assessment->as_ws_budget_text }}</p>
                <x-button class="mt-2" @click="show = !show" onclick="event.preventDefault()">
                    {{ __('Edit') }}
                </x-button>
                <div class="mt-2">
                    <x-assessment.radio-input
                        id="as_ws_budget_radio-yes"
                        :name="'as_ws_budget'"
                        :value="'yes'"
                        :assessment="$assessment->as_ws_budget"
                        required
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_budget_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_budget_radio-no"
                        :name="'as_ws_budget'"
                        :value="'no'"
                        :assessment="$assessment->as_ws_budget"
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_budget_radio-no"
                        :value="__('no')"
                    />
                    <x-label
                        x-show="show"
                        class="mt-4"
                        for="as_ws_budget_text"
                        :value="__('$ please enter your budget in numbers...')"
                    />
                    <x-assessment.text-input
                        name="as_ws_budget_text"
                        id="as_ws_budget_text"
                        :assessment="$assessment->as_ws_budget_text"
                        placeholder="$ please enter your budget in numbers..."
                    />
                </div>
            </div>
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-sm text-gray-700">5. Website Timeframe</p>
                <p>Is there a time frame to when the application is needed? If so, when?</p>
                <p> Answer: {{ $assessment->as_ws_timeframe }}, {{ $assessment->as_ws_timeframe_text }}</p>
                <x-button class="mt-2" @click="show = !show" onclick="event.preventDefault()">
                    {{ __('Edit') }}
                </x-button>
                <div class="mt-2">
                    <x-assessment.radio-input
                        id="as_ws_timeframe_radio-yes"
                        :name="'as_ws_timeframe'"
                        :value="'yes'"
                        :assessment="$assessment->as_ws_timeframe"
                        required
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_timeframe_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_timeframe_radio-no"
                        :name="'as_ws_timeframe'"
                        :value="'no'"
                        :assessment="$assessment->as_ws_timeframe"
                    />
                    <x-assessment.label
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
                        :name="'as_ws_timeframe_text'"
                        :assessment="$assessment->as_ws_timeframe_text"
                        placeholder="Is there a time frame to when the application is needed? If so, when?"
                    />
                </div>
            </div>
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-sm text-gray-700">6. Website Hosting</p>
                <p>Do You need hosting?</p>
                <p>Answer: {{ $assessment->as_ws_hosting }}</p>
                <x-button class="mt-2" @click="show = !show" onclick="event.preventDefault()">
                    {{ __('Edit') }}
                </x-button>
                <div class="mt-2">
                    <x-assessment.radio-input
                        id="as_ws_hosting_radio-yes"
                        :name="'as_ws_hosting'"
                        :value="'yes'"
                        :assessment="$assessment->as_ws_hosting"
                        required
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_hosting_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_hosting_radio-no"
                        :name="'as_ws_hosting'"
                        :value="'no'"
                        :assessment="$assessment->as_ws_hosting"
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_hosting_radio-no"
                        :value="__('no')"
                    />
                </div>
            </div>
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-sm text-gray-700">7. Website Domain</p>
                <p>Do you need a domain name?</p>
                <p> Answer: {{  $assessment->as_ws_domain }}</p>
                <x-button class="mt-2" @click="show = !show" onclick="event.preventDefault()">
                    {{ __('Edit') }}
                </x-button>
                <div class="mt-2">
                    <x-assessment.radio-input
                        id="as_ws_domain_radio-yes"
                        :name="'as_ws_domain'"
                        :value="'yes'"
                        :assessment="$assessment->as_ws_domain"
                        required
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_domain_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_domain_radio-no"
                        :name="'as_ws_domain'"
                        :value="'no'"
                        :assessment="$assessment->as_ws_domain"
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_domain_radio-no"
                        :value="__('no')"
                    />
                </div>
            </div>
            <div class="mt-4" x-data="{ show: false }">
                <p class="block font-medium text-sm text-gray-700">8. Website Content</p>
                <p>
                    Do you have your own nice photos, logos, artwork that you would like added on the website? 
                    or do you have video or picture ideas?
                </p>
                <p>Answer: {{ $assessment->as_ws_content }}</p>
                <x-button class="mt-2" @click="show = !show" onclick="event.preventDefault()">
                    {{ __('Edit') }}
                </x-button>
                <div class="mt-2">
                    <x-assessment.radio-input
                        id="as_ws_content_radio-yes"
                        :name="'as_ws_content'"
                        :value="'yes'"
                        :assessment="$assessment->as_ws_content"
                        required
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_content_radio-yes"
                        :value="__('yes')"
                    />
                    <x-assessment.radio-input
                        id="as_ws_content_radio-no"
                        :name="'as_ws_content'"
                        :value="'no'"
                        :assessment="$assessment->as_ws_content"
                    />
                    <x-assessment.label
                        class="inline"
                        for="as_ws_content_radio-no"
                        :value="__('no')"
                    />
                    <x-label
                        class="mt-4"
                        x-show="show"
                        for="as_ws_content_text"
                        :value="__('Do you have your own nice photos, logos, artwork that you would like added on the website? or do you have video or picture ideas?')"
                    />
                    <x-assessment.text-input
                        id="as_ws_content_text"
                        :name="'as_ws_content'"
                        :assessment="$assessment->as_ws_content"
                        placeholder="Do you have your own nice photos, logos, artwork that you would like added on the website? or do you have video or picture ideas?"
                    />
                    <span x-show="show">upload pics, and videos below</span>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
        <form action="{{ route('media.store') }}"  enctype="multipart/form-data" class="dropzone mt-4" id="dropzone">
            @csrf
        </form>
        <x-media/>
    </x-assessment.container>
</x-app-layout>