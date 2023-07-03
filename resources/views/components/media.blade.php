<div class="mt-4" x-data="media">
    <div>
        <template x-if="!images.length && !videos.length">
            <div>
                <p id="image-length" class="text-4xl text-center text-zinc-500">You Dont Have Any Media Items</p>
            </div>
        </template>
         <template x-for="(image, index) in images" :key="image.id">
            <table class="mt-4" :key="image.id">
                <tr><td x-text="image.name"></td></tr>
                <tr><td><img :src="'/images/' + image.name" style="height:200px; width:200px"/></td></tr>
                <tr>
                    <td>
                        <x-button @click.prevent="deletePicture(image.name,index)" class="mt-4">
                            delete &times;
                        </x-button>
                    </td>
                </tr>
            </table>
        </template>
        <template x-for="(video, index) in videos" :key="video.id">
            <table class="mt-4" :key="video.id">
                <tr><td x-text="video.name"></td></tr>
                <tr>
                    <td>
                        <video :src="'/videos/' + video.name" type="mpeg/mp4" style="height:200px; width:200px"></video>
                    </td>
                </tr>
                <tr>
                    <td>
                        <x-button @click.prevent="deleteVideo(video.name,index)" class="mt-4">
                            delete &times;
                        </x-button>
                    </td>
                </tr>
            </table>
        </template>
    </div>
</div>