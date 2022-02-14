<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Assessment') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    You can edit or update assessment here

                    <br />

                    <div class="mt-4" name="logo">
                        <a href="/">
                            <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                        </a>
                    </div>

                    <form method="POST" enctype="multipart/form-data" action="<?php echo  '/assessment/' . Auth::user()->username . '/edit'?>">
                       @method('PUT')
                        @csrf
                        @foreach ($getAssessment as $assessment )
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            {{-- WEBSITE PAGES --}}
                            <div class="mt-4 " x-data="{show: false }">
                                <x-label 
                                    for="as_ws_pages" 
                                    :value="__('1. Website Pages')" 
                                />

                                What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer … etc
                                <br>
                                Answer: {{  $assessment->as_ws_pages}} 

                                <div  class="mt-2">

                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        
                                        <x-input
                                    
                                            x-show="show"
                                            class="block  w-full" 
                                            name="as_ws_pages"
                                            id="as_ws_pages_text"
                                            type="text"
                                            :value="old('as_ws_pages', $assessment->as_ws_pages ??null)"
                                            name="as_ws_pages" 
                                            placeholder=" What pages would you like? Ex: Homepage, Aboutus Page, Pages for Products/Services that you offer … etc"
                                            autofocus 
                                        />
                                        
                                    </div>
                                </div>
                                
                            </div>


                            {{-- WEBSITE ASSESSMENT STYLES --}}
                            <div class="mt-4 " x-data="{show: false }">

                                <x-label 
                                    for="as_ws_styles" 
                                    :value="__('2. Website Style')" 
                                />

                                Any particular style of website that you like? <br>
                                
                                Answer: {{  $assessment->as_ws_styles}}
                                {{  $assessment->as_ws_styles_text }} 

                                <div  class="  mt-2">
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        <input
                                            class=""
                                            x-show="show" 
                                            @click="show = true"
                                            name="as_ws_styles"
                                            type="radio"
                                            value="yes"
                                            {{ $assessment->as_ws_styles == 'yes' ? 'checked' : '' }}
                                        /><span x-show="show">yes</span>

                                    
                                        <input 
                                            {{-- @click="show = false" --}}
                                            x-show="show" 
                                            onclick="document.getElementById('as_ws_styles_text').value = ''" 
                                            name="as_ws_styles"
                                            type="radio"        
                                            value="no"
                                            {{ $assessment->as_ws_styles == 'no' ? 'checked' : '' }}
                                        /><span x-show="show">no</span>

                                        <x-input
                                    
                                            x-show="show"
                                            class="block  w-full" 
                                            name="as_ws_styles_text"
                                            id="as_ws_styles_text"
                                            type="text" 
                                            :value="old('as_ws_styles_text', $assessment->as_ws_styles_text ??null)"
                                            placeholder="or do you like a particular website's layout or style, and can provide website link(s) to show as an example?"
                                             autofocus 
                                        />
                                        
                                    </div>
                                </div>
                                
                            </div>

                            {{-- WEBSITE ASSESSMENT LINKS --}}
                            <div class="mt-4 " x-data="{show: false }">

                                <x-label 
                                    for="as_ws_links" 
                                    :value="__('3. Website Functions')" 
                                />

                                Are there any special functions that you would like implemented such as: e-commerce, a contact form, a newsletter, or blog? 
                                <br>
                                Answer: {{  $assessment->as_ws_functions}}
                                {{  $assessment->as_ws_links_functions}}

                                <div  class="  mt-2">
                                    
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        <input
                                            class=""
                                            x-show="show" 
                                            @click="show = true"
                                            name="as_ws_functions"
                                            type="radio"
                                            value="yes"
                                            {{ $assessment->as_ws_functions == 'yes' ? 'checked' : '' }}
                                        /><span x-show="show">yes</span>

                                    
                                        <input 
                                            {{-- @click="show = false" --}}
                                            x-show="show" 
                                            onclick="document.getElementById('as_ws_functions_text').value = ''" 
                                            name="as_ws_functions"
                                            type="radio"
                                            value="no"
                                            {{ $assessment->as_ws_functions == 'no' ? 'checked' : '' }}
                                        /><span x-show="show">no</span>
                                        
                                        <x-input
                                    
                                            x-show="show"
                                            class="block  w-full" 
                                            name="as_ws_functions_text"
                                            id="as_ws_functions_text"
                                            type="text" 
                                            :value="old('as_ws_functions_text', $assessment->as_ws_functions_text ??null)"
                                            placeholder=" List Website Functions"
                                            autofocus 
                                        />
                                        
                                        
                                    </div>
                                </div>
                                
                            </div>

                            {{-- WEBSITE ASSESSMENT WEBSITE BUDGET --}}
                            <div class="mt-4 " x-data="{show: false }">

                                <x-label 
                                    for="as_ws_budget" 
                                    :value="__('4. Website Budget')" 
                                />

                                Do you have a budget?  <br>
                                Answer: {{ $assessment->as_ws_budget}}
                                {{ $assessment->as_ws_budget_text}}
                               

                                <div  class="  mt-2">
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        <input
                                            class=""
                                            x-show="show" 
                                            @click="show = true"
                                            name="as_ws_budget"
                                            type="radio"
                                            value="yes"
                                            {{ $assessment->as_ws_budget == 'yes' ? 'checked' : '' }}
                                        /><span x-show="show">yes</span>

                                    
                                        <input 
                                            {{-- @click="show = false" --}}
                                            x-show="show" 
                                            onclick="document.getElementById('as_ws_budget_text').value = ''" 
                                            name="as_ws_budget"
                                            type="radio"
                                            value="no"
                                            {{ $assessment->as_ws_budget == 'no' ? 'checked' : '' }}
                                        /><span x-show="show">no</span>
                                        
                                        <x-input
                                    
                                            x-show="show"
                                            class="block  w-full" 
                                            name="as_ws_budget_text"
                                            id="as_ws_budget_text"
                                            type="text"
                                            :value="old('as_ws_budget_text', $assessment->as_ws_budget_text ??null)"
                                            placeholder="$"
                                            autofocus 
                                        />
                                        
                                    </div>
                                </div>
                                
                            </div>

                            {{-- WEBSITE ASSESSMENT TIMEFRAME --}}
                            <div class="mt-4 " x-data="{show: false }">

                                <x-label 
                                    for="as_ws_timeframe" 
                                    :value="__('5. Website Timeframe')" 
                                />

                                Is there a time frame to when the application is needed? If so, when? <br>
                                Answer: {{  $assessment->as_ws_timeframe}} {{  $assessment->as_ws_timeframe_text}}

                                <div  class="  mt-2">
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        <input
                                            class=""
                                            x-show="show" 
                                            @click="show = true"
                                            name="as_ws_timeframe"
                                            type="radio"
                                            value="yes"
                                            {{ $assessment->as_ws_timeframe == 'yes' ? 'checked' : '' }}
                                        /><span x-show="show">yes</span>

                                    
                                        <input 
                                            @click="show = false"
                                            x-show="show" 
                                            onclick="document.getElementById('as_ws_timeframe_text').value = ''" 
                                            name="as_ws_timeframe"
                                            type="radio"
                                            value="no"
                                            {{ $assessment->as_ws_timeframe == 'no' ? 'checked' : '' }}
                                        /><span x-show="show">no</span>
                                        
                                        <x-input
                                    
                                            x-show="show"
                                            class="block  w-full" 
                                            name="as_ws_timeframe_text"
                                            id="as_ws_timeframe_text"
                                            type="text"
                                            :value="old('as_ws_timeframe_text', $assessment->as_ws_timeframe_text ??null)"
                                            placeholder=" Website Timeframe"
                                            autofocus 
                                        />
                                        
                                    </div>
                                </div>
                                
                            </div>

                            {{-- WEBSITE ASSESSMENT HOSTING --}}
                            <div class="mt-4 " x-data="{show: false }">

                                <x-label 
                                    for="as_ws_hosting" 
                                    :value="__('6. Website Hosting')" 
                                />

                                Do You need hosting? <br>
                                Answer: {{  $assessment->as_ws_hosting}}

                                <div  class="  mt-2">
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        <input
                                            class=""
                                            x-show="show" 
                                            @click="show = true"
                                            name="as_ws_hosting"
                                            type="radio"
                                            value="yes"
                                            {{ $assessment->as_ws_hosting == 'yes' ? 'checked' : '' }}
                                        /><span x-show="show">yes</span>

                                    
                                        <input 
                                            @click="show = false"
                                            x-show="show" 
                                            name="as_ws_hosting"
                                            type="radio"
                                            value="no"
                                            {{ $assessment->as_ws_hosting == 'no' ? 'checked' : '' }}
                                        /><span x-show="show">no</span>
                                    
    
                                        
                                    </div>
                                </div>
                            
                            </div>

                            {{-- WEBSITE ASSESSMENT DOMAIN --}}
                            <div class="mt-4 " x-data="{show: false }">

                                <x-label 
                                    for="as_ws_domain" 
                                    :value="__('7. Website Domain')" 
                                />

                                Do you need a domain name? <br>
                                Answer: {{  $assessment->as_ws_domain}}

                                <div  class="  mt-2">
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        <input
                                            class=""
                                            x-show="show" 
                                            @click="show = true"
                                            name="as_ws_domain"
                                            type="radio"
                                            value="yes"
                                            {{ $assessment->as_ws_domain == 'yes' ? 'checked' : '' }}
                                        /><span x-show="show">yes</span>

                                    
                                        <input 
                                            @click="show = false"
                                            x-show="show" 
                                            name="as_ws_domain"
                                            type="radio"
                                            value="no"
                                            {{ $assessment->as_ws_domain == 'no' ? 'checked' : '' }}
                                        /><span x-show="show">no</span>
                                          
    
                                        
                                    </div>
                                </div>
                                
                            </div>

                            {{-- WEBSITE ASSESSMENT CONTENT--}}
                            <div class="mt-4 " x-data="{show: false }">
                                <x-label 
                                    for="as_ws_content" 
                                    :value="__('9. Website Content')" 
                                />
                                Do you have your own nice photos, logos, artwork that you would like added on the website?<br>
                                Answer: {{  $assessment->as_ws_content}}
                                <div  class="  mt-2">
                                    <x-button   @click="show = !show" onclick="event.preventDefault()" class="">
                                        {{ __('Edit') }}
                                    </x-button>
                                    
                                    <div class="mt-2">
                                        <input
                                            class=""
                                            x-show="show" 
                                            @click="show = true"
                                            name="as_ws_content"
                                            type="radio"
                                            value="yes"
                                            {{ $assessment->as_ws_content == 'yes' ? 'checked' : '' }}
                                        /><span x-show="show">yes</span>

                                    
                                        <input 
                                            @click="show = false"
                                            x-show="show" 
                                            onclick="document.getElementById('as_ws_content_text').value = ''" 
                                            name="as_ws_content"
                                            type="radio"
                                            value="no"
                                            {{ $assessment->as_ws_content == 'no' ? 'checked' : '' }}
                                        /><span x-show="show">no</span>
                                        
                                        <x-input
                                    
                                            x-show="show"
                                            class="block  w-full" 
                                            name="as_ws_content"
                                            id="as_ws_content_text"
                                            type="text"
                                            :value="old('as_ws_content_text', $assessment->as_ws_content_text ??null)"
                                            name="as_ws_content_text" 
                                            placeholder=" or do you have video or picture ideas?"
                                            autofocus 
                                        />
                                        
                                        <span x-show="show">upload pics, and videos below</span>
                                        <div>
                                            <div x-data="addPictureDiv()">

                                                <x-button x-show="show" class="mt-4" 
                                                    onclick="event.preventDefault();"  @click="addNewFieldPicture()" > add picture
                                                </x-button>   

                                              
                                                <template x-for="(picturefield, index) in picturefields" :key="picturefield.id">
                                                    <div x-data="imageViewer()">
                                                        <div class="mb-2" id="imageUrl">
        
                                                            {{-- x-if defines our {initField : initVariable} --}}
                                                            <template x-if="imageUrl">
                                                                <img :src="imageUrl"
                                                                    
                                                                    {{-- fileChosen is method we will call upload selecting an image --}}
                                                                    class="object-cover rounded border border-gray-200" 
                                                                    style="width: 100px; height: 100px;"
                                                                >
                                                            </template>
        
                                                            {{-- Show the gray box when image is not available  --}}
                                                            <template x-if="!imageUrl">
                                                                <div 
                                                                    id="picture-div"
                                                                    class="border rounded border-gray-200 bg-gray-100" 
                                                                    style="width: 100px; height: 100px;">
                                                                </div>
                                                            </template>
        
                                                            {{-- Image file selector --}}
                                                            <input class="mt-2" id="pictureInput" type="file" name="imageName[]" multiple accept="image/*" @change="fileChosen">
                                                            <button type="button" @click="removeNewFieldPicture(picturefield)">&times;</button>

        
                                                        </div>
                                                    </div>                                  
                                                </template>

                                                <x-button x-show="show" class="mt-4" 
                                                    @click="addNewFieldVideo()"
                                                    onclick="event.preventDefault()"> add video
                                                </x-button>

                                                <template x-for="(videofield, index) in videofields" :key="videofield.id">
                                                    <div x-data="imageViewer()">
                                                        <div class="mb-2" id="videoUrl">
        
                                                            {{-- x-if defines our {initField : initVariable} --}}
                                                            <template x-if="videoUrl">
                                                                <video :src="videoUrl"
                                                                        type="video/mp4"
                                                                        autoplay
        
                                                                    {{-- fileChosen is method we will call upload selecting an image --}}
                                                                    class="object-cover rounded border border-gray-200" 
                                                                    style="width: 200px; height: 200px;">
                                                                </video>
                                                            </template>
        
                                                            {{-- Show the gray box when image is not available --}}
                                                            <template x-if="!videoUrl">
                                                                <div 
                                                                    id="video-div"
                                                                    class="border rounded border-gray-200 bg-gray-100" 
                                                                    style="width: 100px; height: 100px;">
                                                                </div>
                                                            </template>
        
                                                            {{-- Image file selector --}}
                                                            <input class="mt-2 " id="videoInput" type="file" name="videoName[]" multiple accept="video/*" @change="fileChosenVideo">
                                                            <button type="button" @click="removeNewFieldVideo(videofield)">&times;</button>

                                                        </div>
                                                    </div>                                  
                                                </template>
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

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mt-4">
                        <h1 class="text-4xl text-center text-zinc-500">Media</h1>
                        @foreach($getMedias as $image)
                        <table class="mt-4">
                            <tr>
                                <td>
                                    {{$image->imageName}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/images/') . '/' . $image->imageName }}" style="height:200px; width:200px"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form  method="POST" action="<?php  echo '/assessment/' .  $image->imageName ?>">
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
                        {{-- VIDEO SHOWCASE --}}
                        @foreach ($getVideos as $video )
                        <table>
                            <tr>
                                <td>
                                    {{$video->videoName}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <video src="{{ asset('storage/videos/') . '/' . $video->videoName }}" type="mpeg/mp4" style="height:200px; width:200px"></video>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form  method="POST" action="<?php  echo '/assessment/video/'  .  $video->videoName ?>">
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
                    </div>
                </div>       
            <div>
        </div> 
    </div>

    <script>
        // returns a new Object instance return {initField: initVariable} with the init field set to the value of the init variable. This is called an "Object literal"
        function imageViewer(){
            return{
                imageUrl: '',
                videoUrl: '',

                // fileChosen will grab our selected image and turn it into a url
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
                    // 100000 is 1 mb
                    
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
                    // 100000 is 1 mb

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
                    console.log('add');
                },

                removeNewFieldPicture (picturefield) {
                    this.picturefields.splice(this.picturefields.indexOf(picturefield), 1);
                    console.log('delete')
                },

                addNewFieldVideo() {
                    if(this.videofields.length >= 1) {
                        this.videofields.pop({id: new Date().getTime() + this.videofields.length});
                    }
                    this.videofields.push({id: new Date().getTime() + this.videofields.length});
                    console.log('add');
                },

                removeNewFieldVideo (videofield) {
                    this.videofields.splice(this.videofields.indexOf(videofield), 1);
                    console.log('delete')
                },

            }

        }


    </script>      

    
       
</x-app-layout>

