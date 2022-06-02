import { createdApp } from 'vue';
import PaginaInicio from './components/PaginaInicio.vue';

const app= createApp({})

app.component('pagina-inicio', PaginaInicio)
app.mount('#app')

import { Dropzone } from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".jpg,.png,.jpeg,.gif",
    addRemovedLinks: true,
    dictRemoveFile: 'Borrar imagen',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="img"]').value.trim()) {
            const imgPublished = {}
            imgPublished.size = 1234;
            imgPublished.name = document.querySelector('[name="img"]').value;

            this.options.addedfile.call(this, imgPublished);
            this.options.thumbnail.call(this, imgPublished, '/uploads/${imgPublished.name}')
            imgPublished.previewElement.classList.add('dz-success', 'dz-complete');
        }
    },
});

dropzone.on('success', function (file, response) {
    console.log(response.img);
    document.querySelector('[name="img"]').value = response.img;
}); 
dropzone.on("removedfile", function () { 
    document.querySelector('[name="img"]').value = "";
});
