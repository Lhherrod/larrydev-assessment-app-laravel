import axios from 'axios';
import './bootstrap';
import Alpine from 'alpinejs';
import Dropzone, { DropzoneFile } from 'dropzone';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('media', () => ({
        images: [],
        videos: [],
        styles: ['font-medium', 'text-sm', 'text-green-500'],
        fireOffSuccessMessage(message: string){
            let p = document.createElement('p');
            p.classList.add(...this.styles)
            p.appendChild(document.createTextNode(message))
            const currentDiv = document.getElementById('dropzone')
            currentDiv?.appendChild(p)
            setTimeout(() => {p.remove()},3000)
        },
        deletePicture(image: string, index: number) {
            this.images.splice(index,1)
            this.axios('/assessment/image/' + image, 'Image deleted successfully...')
        },
        deleteVideo(video: string, index: number) {
            this.videos.splice(index,1)
            this.axios('/assessment/video/' + video, 'Video deleted successfully...')
        },
        async axios(url: string, message: string) {
            try {
                await axios.delete(url)
                this.fireOffSuccessMessage(message)
            } catch (error) {
                console.log(error)
            }
        },
        async init() {
            const image = window.location.href.split('/')[4]
            const video = window.location.href.split('/')[4]

            try {
                const response = await axios.get(`/assessment/${image}/i/image`)
                this.images = response.data
            } catch (error) {
                console.log(error)
            }
            try {
                const response = await axios.get(`/assessment/${video}/v/video`)
                this.videos = response.data
            } catch (error) {
                console.log(error)
            }
        }
    }))
})

Alpine.start();

let url: string;

const fireOffMessage = (message: string, color = 'text-green-600'  ) => {
    let p = document.createElement('p');
    p.classList.add('font-medium', 'text-sm', color)
    let info = document.createTextNode(message)
    p.appendChild(info)
    const currentDiv = document.getElementById('dropzone')
    currentDiv?.appendChild(p)
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
            fireOffMessage(response.data.message)
        } catch (error) {
            console.log(error)
        }

        let _ref;
        (_ref = file.previewElement) != null ? _ref.parentNode?.removeChild(file.previewElement) : void 0;

        document.querySelector('#dropzone .dz-preview') ? 
        document!.getElementById('image-length')!.innerText = 'Media Items' :
        document!.getElementById('image-length')!.innerText = 'You Dont Have Any Media Items'
        return
    },   
    success: function(file: DropzoneFile){
        if(document.querySelector('#dropzone .dz-preview')) {
            document!.getElementById('image-length')!.innerText = 'Media Items'
        }
        fireOffMessage('file uploaded and saved sucessfully!')
    },
    error: function(response: DropzoneFile) {
        fireOffMessage('This file type is not supported...', 'text-red-600')
    }
}

Dropzone.discover();