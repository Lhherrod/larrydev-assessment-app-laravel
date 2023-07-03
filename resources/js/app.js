import axios from 'axios';
import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('alpine:init', async () => {
    Alpine.data('media', () => ({
        images: [],
        videos: [],
        styles: ['font-medium', 'text-sm', 'text-green-500'],
        fireOffSuccessMessage(message){
            let p = document.createElement('p');
            p.classList.add(...this.styles)
            p.appendChild(document.createTextNode(message))
            const currentDiv = document.getElementById('dropzone')
            currentDiv.appendChild(p)
            setTimeout(() => {p.remove()},3000)
        },
        deletePicture(image,index) {
            this.images.splice(index,1)
            this.axios('/assessment/image/' + image, 'Image deleted successfully...')
        },
        deleteVideo(video,index) {
            this.videos.splice(index,1)
            this.axios('/assessment/video/' + video, 'Video deleted successfully...')
        },
        async axios(url, message) {
            try {
                await axios.delete(url)
                this.fireOffSuccessMessage(message)
            } catch (error) {
                console.log(error)
            }
        },
        async init() {
            try {
                const response = await axios.get('/assessment/image')
                this.images = response.data
            } catch (error) {
                console.log(error)
            }
            try {
                const response = await axios.get('/assessment/video')
                this.videos = response.data
            } catch (error) {
                console.log(error)
            }
        }
    }))
})

Alpine.start();

let url;

const fireOffSuccessMessage = () => {
    let p = document.createElement('p');
    p.classList.add('font-medium', 'text-sm', 'text-green-600',)
    let info = document.createTextNode('file uploaded and saved sucessfully!')
    p.appendChild(info)
    const currentDiv = document.getElementById('dropzone')
    currentDiv.appendChild(p)
    setTimeout(() => {p.remove()},3000)
}

Dropzone.options.dropzone = {
    maxFilesize: 10,
    acceptedFiles: ".jpeg, .jpg, .png, .gif, .mp4",
    timeout: 5000,
    addRemoveLinks: true,
    removedfile: async function(file) {
        if(file.name.includes('mp4')) {
            url = '/assessment/video/'
        } else {
            url = '/assessment/image/'
        }
        try {
            const response = await axios.delete(url + file.name)
            console.log(response);
        } catch (error) {
            console.log(error)
        }

        let _ref;
        (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

        document.querySelector('#dropzone .dz-preview') ? 
        document.getElementById('image-length').innerText = 'Media Items' :
        document.getElementById('image-length').innerText = 'You Dont Have Any Media Items'
        return
    },   
    success: function(file, response){
        if(document.querySelector('#dropzone .dz-preview')) {
            document.getElementById('image-length').innerText = 'Media Items'
        }
        fireOffSuccessMessage()
    },
    error: function(file, response) {
        console.log(response);
    }
}

Dropzone.discover();