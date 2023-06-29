<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Assessment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-2xl shadow-[blueviolet] sm:rounded-lg">
                <div class="p-6 border-b border-[blueviolet]">
                    You can edit or update assessment here
                    <div class="mt-4" name="logo">
                        <a href="/">
                            <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                        </a>
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" enctype="multipart/form-data" action="{{ route('assessment.update', auth()->user()->username) }}">
                        @method('PATCH')
                        @csrf

                        @foreach (auth()->user()->assessment->get() as $field)
                            @if (session('status') == 'assessment-updated')
                                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('Assessment Updated. Thank you.') }}
                                </div>
                            @endif
                            <div class="mt-4" x-data="{ show: false }">
                                <p class="block font-medium text-gray-700">1. Website Pages</p>
                                <x-label
                                    for="as_ws_pages_text"
                                    :value="__('What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer…etc')"
                                />

                               <p> Answer: {{ $field->as_ws_pages }}</p>
                                <div class="mt-2">
                                    
                                    <x-button @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-4">
                                        <x-input
                                            x-show="show"
                                            class="block  w-full"
                                            name="as_ws_pages"
                                            id="as_ws_pages_text"
                                            type="text"
                                            :value="old('as_ws_pages', $field->as_ws_pages ??null)"
                                            name="as_ws_pages"
                                            placeholder=" What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer…etc"
                                            autofocus
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4" x-data="{ show: false }">
                                <p class="block font-medium text-sm text-gray-700">2. Website Style</p>
                                <p>Any particular style of website that you like?</p>

                                <p> Answer: {{ $field->as_ws_styles }}</p>
                                <p>{{ $field->as_ws_styles_text }}</p>

                                <div class="mt-2">
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-2">
                                        <input
                                            id="as_ws_styles_radio-yes"
                                            x-show="show"
                                            @click="show = true"
                                            name="as_ws_styles"
                                            type="radio"
                                            value="yes"
                                            {{ $field->as_ws_styles === 'yes' ? 'checked' : '' }}
                                        />

                                        <x-label
                                            x-show="show"
                                            class="inline"
                                            for="as_ws_styles_radio-yes"
                                            :value="__('yes')"
                                        />

                                        <input
                                            id="as_ws_styles_radio-no"
                                            x-show="show"
                                            @click="show = true"
                                            onclick="document.getElementById('as_ws_styles_text').value = ''"
                                            name="as_ws_styles"
                                            type="radio"
                                            value="no"
                                            {{ $field->as_ws_styles === 'no' ? 'checked' : '' }}
                                        />

                                        <x-label
                                            x-show="show"
                                            class="inline"
                                            for="as_ws_styles_radio-no"
                                            :value="__('no')"
                                        />

                                        <x-label
                                            x-show="show"
                                            class="mt-4"
                                            for="as_ws_styles_text"
                                            :value="__('Any particular style of website that you like? or do you like a particular website\'s layout or style, and can provide website link(s) to show as an example?')"
                                        />
                                        <x-input
                                            x-show="show"
                                            class="block  w-full"
                                            name="as_ws_styles_text"
                                            id="as_ws_styles_text"
                                            type="text"
                                            :value="old('as_ws_styles_text', $field->as_ws_styles_text ??null)"
                                            placeholder="or do you like a particular website's layout or style, and can provide website link(s) to show as an example?"
                                            autofocus
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4" x-data="{ show: false }">
                                <p class="block font-medium text-sm text-gray-700">3. Website Functions</p>
                                <p>Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?</p>

                                <p> Answer: {{ $field->as_ws_functions }}</p>
                                <p>{{ $field->as_ws_links_functions }}</p>

                                <div class="mt-2">
                                    <x-button  @click="show = !show" onclick="event.preventDefault()">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-2">

                                        <input
                                            id="as_ws_functions_radio-yes"
                                            x-show="show"
                                            @click="show = true"
                                            name="as_ws_functions"
                                            type="radio"
                                            value="yes"
                                            {{ $field->as_ws_functions === 'yes' ? 'checked' : '' }}
                                        />

                                        <x-label
                                            x-show="show"
                                            id="as_ws_functions_radio-yes"
                                            class="inline"
                                            for="functions"
                                            :value="__('yes')"
                                        />

                                        <input
                                            @click="show = false"
                                            x-show="show"
                                            onclick="document.getElementById('as_ws_functions_text').value = ''"
                                            name="as_ws_functions"
                                            type="radio"
                                            value="no"
                                            {{ $field->as_ws_functions === 'no' ? 'checked' : '' }}
                                        />

                                        <x-label
                                            x-show="show"
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

                                        <x-input
                                            x-show="show"
                                            class="block  w-full"
                                            name="as_ws_functions_text"
                                            id="as_ws_functions_text"
                                            type="text"
                                            :value="old('as_ws_functions_text', $field->as_ws_functions_text ?? null)"
                                            placeholder="Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog?"
                                            autofocus
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4" x-data="{ show: false }">
                                <p class="block font-medium text-sm text-gray-700">4. Website Budget</p>
                                <p>Do you have a budget?</p>

                                <p>Answer: {{ $field->as_ws_budget }}</p>
                                <p>{{ $field->as_ws_budget_text }}</p>

                                <div class="mt-2">
                                    <x-button @click="show = !show" onclick="event.preventDefault()">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-2">
                                        <input
                                            x-show="show"
                                            id="as_ws_budget_radio-yes"
                                            @click="show = true"
                                            {{ old("as_ws_budget") === 'yes' ? 'checked' : '' }}
                                            name="as_ws_budget"
                                            type="radio"
                                            value="yes"
                                        />
                                        
                                        <x-label
                                            x-show="show"
                                            class="inline"
                                            for="as_ws_budget_radio-yes"
                                            :value="__('yes')"
                                        />

                                        <input
                                            x-show="show"
                                            id="as_ws_budget_radio-no"
                                            {{ old("as_ws_budget") === 'no' ? 'checked' : '' }}
                                            @click="show = false"
                                            name="as_ws_budget"
                                            onclick="document.getElementById('as_ws_budget_text').value = ''"
                                            type="radio"
                                            value="no"
                                            {{ $field->as_ws_functions === 'no' ? 'checked' : '' }}
                                        />

                                        <x-label
                                            x-show="show"
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

                                        <x-input
                                            x-show="show"
                                            class="block  w-full"
                                            name="as_ws_budget_text"
                                            id="as_ws_budget_text"
                                            type="text"
                                            :value="old('as_ws_budget_text', $field->as_ws_budget_text ??null)"
                                            placeholder="$ please enter your budget in numbers..."
                                            autofocus
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4" x-data="{ show: false }">
                                <p class="block font-medium text-sm text-gray-700">5. Website Timeframe</p>
                                <p>Is there a time frame to when the application is needed? If so, when?</p>

                                <p> Answer: {{ $field->as_ws_timeframe }}</p>
                                <p> {{ $field->as_ws_timeframe_text }}</p>

                                <div class="mt-2">
                                    <x-button @click="show = !show" onclick="event.preventDefault()">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-2">
                                        <input
                                            id="as_ws_timeframe_radio-yes"
                                            x-show="show"
                                            @click="show = true"
                                            name="as_ws_timeframe"
                                            type="radio"
                                            value="yes"
                                            {{ $field->as_ws_timeframe === 'yes' ? 'checked' : '' }}
                                        />


                                        <x-label
                                            x-show="show"
                                            class="inline"
                                            for="as_ws_timeframe_radio-yes"
                                            :value="__('yes')"
                                        />


                                        <input
                                            id="as_ws_timeframe_radio-no"
                                            @click="show = false"
                                            x-show="show"
                                            onclick="document.getElementById('as_ws_timeframe_text').value = ''"
                                            name="as_ws_timeframe"
                                            type="radio"
                                            value="no"
                                            {{ $field->as_ws_timeframe === 'no' ? 'checked' : '' }}


                                        />

                                        <x-label
                                            x-show="show"
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
                                            id="as_ws_timeframe_text"
                                            x-show="show"
                                            class="block  w-full"
                                            name="as_ws_timeframe_text"
                                            id="as_ws_timeframe_text"
                                            type="text"
                                            :value="old('as_ws_timeframe_text', $field->as_ws_timeframe_text ??null)"
                                            placeholder="Is there a time frame to when the application is needed? If so, when?"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4" x-data="{ show: false }">
                                <p class="block font-medium text-sm text-gray-700">6. Website Hosting</p>
                                <p>Do You need hosting?</p>

                                <p>Answer: {{ $field->as_ws_hosting }}</p>

                                <div class="mt-2">
                                    <x-button @click="show = !show" onclick="event.preventDefault()">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-2">
                                        <input
                                            id="as_ws_hosting_radio-yes"
                                            x-show="show"
                                            @click="show = true"
                                            name="as_ws_hosting"
                                            type="radio"
                                            value="yes"
                                            {{ $field->as_ws_hosting === 'yes' ? 'checked' : '' }}
                                        />


                                        <x-label
                                            x-show="show"
                                            class="inline"
                                            for="as_ws_hosting_radio-yes"
                                            :value="__('yes')"
                                        />

                                        <input
                                            id="as_ws_hosting_radio-no"
                                            @click="show = false"
                                            x-show="show"
                                            name="as_ws_hosting"
                                            type="radio"
                                            value="no"
                                            {{ $field->as_ws_hosting === 'no' ? 'checked' : '' }}
                                        />

                                        <x-label
                                            x-show="show"
                                            class="inline"
                                            for="as_ws_hosting_radio-no"
                                            :value="__('no')"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4" x-data="{ show: false }">
                                <p class="block font-medium text-sm text-gray-700">7. Website Domain</p>
                                <p>Do you need a domain name?</p>

                                <p> Answer: {{  $field->as_ws_domain }}</p>

                                <div class="mt-2">
                                    <x-button @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-2">
                                        <input
                                            id="as_ws_domain_radio-yes"
                                            x-show="show"
                                            @click="show = true"
                                            name="as_ws_domain"
                                            type="radio"
                                            value="yes"
                                            {{ $field->as_ws_domain === 'yes' ? 'checked' : '' }}
                                        />


                                        <x-label
                                            class="inline"
                                            x-show="show"
                                            for="as_ws_domain_radio-yes"
                                            :value="__('yes')"
                                        />

                                        <input
                                            id="as_ws_domain_radio-no"
                                            @click="show = false"
                                            x-show="show"
                                            name="as_ws_domain"
                                            type="radio"
                                            value="no"
                                            {{ $field->as_ws_domain == 'no' ? 'checked' : '' }}
                                        />

                                        <x-label
                                            class="inline"
                                            x-show="show"
                                            for="as_ws_domain_radio-no"
                                            :value="__('no')"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4" x-data="{ show: false }">

                                <p class="block font-medium text-sm text-gray-700">8. Website Content</p>
                                <p>
                                    Do you have your own nice photos, logos, artwork that you would like added on the website? 
                                    or do you have video or picture ideas?
                                </p>

                                <p>Answer: {{ $field->as_ws_content }}</p>

                                <div class="mt-2">
                                    <x-button @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>

                                    <div class="mt-2">
                                        <input
                                            id="as_ws_content_radio-yes"
                                            x-show="show"
                                            @click="show = true"
                                            name="as_ws_content"
                                            type="radio"
                                            value="yes"
                                            {{ $field->as_ws_content === 'yes' ? 'checked' : '' }}
                                        />
                                        
                                        <x-label
                                            class="inline"
                                            x-show="show"
                                            for="as_ws_content_radio-yes"
                                            :value="__('yes')"
                                        />

                                        <input
                                            id="as_ws_content_radio-no"
                                            @click="show = false"
                                            x-show="show"
                                            onclick="document.getElementById('as_ws_content_text').value = ''"
                                            name="as_ws_content"
                                            type="radio"
                                            value="no"
                                            {{ $field->as_ws_content === 'no' ? 'checked' : '' }}
                                        />

                                       <x-label
                                            class="inline"
                                            x-show="show"
                                            for="as_ws_content_radio-no"
                                            :value="__('no')"
                                        />

                                        <x-label
                                            class="mt-4"
                                            x-show="show"
                                            for="as_ws_content_text"
                                            :value="__('Do you have your own nice photos, logos, artwork that you would like added on the website? or do you have video or picture ideas?')"
                                        />

                                        <x-input
                                            x-show="show"
                                            class="block w-full"
                                            name="as_ws_content"
                                            id="as_ws_content_text"
                                            type="text"
                                            :value="old('as_ws_content_text', $field->as_ws_content_text ?? null)"
                                            name="as_ws_content_text"
                                            placeholder="Do you have your own nice photos, logos, artwork that you would like added on the website? or do you have video or picture ideas?"
                                        />
                                        <span x-show="show">upload pics, and videos below</span>
                                        <div>
                                            <div x-data="addPictureDiv()">
                                                <x-button x-show="show" class="mt-4"
                                                    onclick="event.preventDefault();"  @click="addNewFieldPicture()" > add picture
                                                </x-button>

                                                <x-button x-show="show" class="mt-4"
                                                    @click="addNewFieldVideo()"
                                                    onclick="event.preventDefault()"> add video
                                                </x-button>
                                                {{-- <template x-for="(videofield, index) in videofields" :key="videofield.id">
                                                    <div x-data="imageViewer()">
                                                        <div class="mb-2" id="videoUrl">
                                                            <template x-if="videoUrl">
                                                                <video
                                                                    :src="videoUrl"
                                                                    type="video/mp4"
                                                                    autoplay
                                                                    class="object-cover rounded border border-gray-200"
                                                                    style="width: 200px; height: 200px;">
                                                                </video>
                                                            </template>
                                                            <template x-if="!videoUrl">
                                                                <div
                                                                    id="video-div"
                                                                    class="border rounded border-gray-200 bg-gray-100"
                                                                    style="width: 100px; height: 100px;">
                                                                </div>
                                                            </template>
                                                            <input class="mt-2" id="videoInput" type="file" name="video_name[]" multiple accept="video/*" @change="fileChosenVideo">
                                                            <button type="button" @click="removeNewFieldVideo(videofield)">&times;</button>
                                                        </div>
                                                    </div>
                                                </template> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Submit') }}
                                </x-button>
                            </div>
                        @endforeach
                    </form>

                    <form action="{{ route('image.store') }}"  enctype="multipart/form-data" class="dropzone mt-4" id="dropzone">
                        @csrf
                    </form>

                    <div class="mt-4">
                        <h1 class="text-4xl text-center text-zinc-500">Media</h1>
                        @foreach(auth()->user()->images as $image)
                        <table class="mt-4">
                            <tr>
                                <td>
                                    {{ $image->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/images/') . '/' . $image->name }}" style="height:200px; width:200px"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form  method="POST" action="{{ route('image.destroy', $image->name) }}">
                                        @csrf
                                        @method('delete')
                                        <x-button  type="submit" class="mt-4">
                                            delete &times;
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        @endforeach
                        @foreach (auth()->user()->videos as $video)
                        <table>
                            <tr>
                                <td>
                                    {{ $video->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <video src="{{ asset('storage/videos/') . '/' . $video->name }}" type="mpeg/mp4" style="height:200px; width:200px"></video>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form  method="POST" action="{{ route('video.destroy', $video->path) }}">
                                        @csrf
                                        @method('delete')
                                        <x-button type="submit" class="mt-4">
                                            delete &times;
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        @endforeach
                    </div>
                </div>
            <div>
        </div>
    </div>

    <script>
        Dropzone.options.dropzone = {
            maxFilesize: 10,
            acceptedFiles: ".jpeg, .jpg, .png, .gif",
            timeout: 5000,
            addRemoveLinks: true,
            removedfile: function(file) {
                fetch('/assessment/picture/' + file.name, {
                    headers: {
                        "X-CSRF-Token": '{{ csrf_token() }}',
                        "Content-Type": "application/json"
                    },
                    method: 'DELETE',
                    // credentials: "same-origin",
                    body: file.name,
                    })
                    // .then(res => res.json())
                    .then(data => console.log(data))

                    let _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },   
            success: function(file, response){
                console.log(response);
            },
            error: function(file, response) {
                return false;
            }
        }
        function imageViewer(){
            return{
                imageUrl: '',
                videoUrl: '',

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },
                fileChosenVideo(event) {
                    this.fileToDataUrlVideo(event, src => this.videoUrl = src)
                },
                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) {
                        return
                    }

                    let file = event.target.files[0]

                    if (file.size > 3000000 ) {
                        this.imageUrl = null;
                        const pictureDiv = document.querySelector('#imageUrl');
                        const p = document.createElement("p");
                        p.style.color = "red";
                        p.innerHTML = "File size is too big maximum size 3MB";
                        setTimeout(hideElement, 3000)

                        function hideElement() {
                            p.remove();
                        }

                        pictureDiv.appendChild(p);
                        const input = document.querySelector('#pictureInput');
                        input.value= '';

                        return false;
                    }
                    else if (file.type != "image/jpeg" && file.type != "image/png") {
                        this.imageUrl = null;
                        const pictureDiv = document.querySelector('#imageUrl');
                        const p = document.createElement("p");
                        p.style.color = "red";
                        p.innerHTML = "Only jpeg,png accepted";
                        setTimeout(hideElement, 3000)

                        function hideElement() {
                            p.remove();
                        }

                        pictureDiv.appendChild(p);
                        const input = document.querySelector('#pictureInput');
                        input.value= '';

                        return false;
                    }
                    reader = new FileReader();
                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
                fileToDataUrlVideo(event, callback) {
                    if (!event.target.files.length) {
                        return
                    }

                    let file = event.target.files[0]

                    if (file.size > 3000000 ) {
                        this.videoUrl = null;
                        var videoDiv = document.querySelector('#videoUrl');
                        var p = document.createElement("p");
                        p.style.color = "red";
                        p.innerHTML = "File size is too big maximum size 3MB";
                        setTimeout(hideElement, 3000)

                        function hideElement() {
                            p.remove();
                        }

                        videoDiv.appendChild(p);
                        const input = document.querySelector('#videoInput');
                        input.value= '';

                        return false;
                    }
                    else if (file.type != "video/mp4") {
                        this.videoUrl = null;
                        var videoDiv = document.querySelector('#videoUrl');
                        var p = document.createElement("p");
                        p.style.color = "red";
                        p.innerHTML = "Only mp4 accepted";
                        setTimeout(hideElement, 3000)

                        function hideElement() {
                            p.remove();
                        }

                        videoDiv.appendChild(p);
                        const input = document.querySelector('#videoInput');
                        input.value= '';

                        return false;
                    }

                    reader = new FileReader();
                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
            }
        }

        function addPictureDiv() {
            return {
                picturefields: [],
                videofields: [],
                
                addNewFieldPicture() {
                    this.picturefields.push({id: new Date().getTime() + this.picturefields.length});
                },
                removeNewFieldPicture (picturefield) {
                    this.picturefields.splice(this.picturefields.indexOf(picturefield), 1);
                },
                addNewFieldVideo() {
                    if(this.videofields.length >= 1) {
                        this.videofields.pop({id: new Date().getTime() + this.videofields.length});
                    }
                    this.videofields.push({id: new Date().getTime() + this.videofields.length});
                },
                removeNewFieldVideo (videofield) {
                    this.videofields.splice(this.videofields.indexOf(videofield), 1);
                },
            }
        }
        Dropzone.discover();
    </script>
</x-app-layout>

