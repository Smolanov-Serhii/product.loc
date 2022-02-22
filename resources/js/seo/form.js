const { token } = require('../app.js')
const cyrillicToTranslit = require("cyrillic-to-translit-js");

// preload image
$(document).on('change','.seo-thumbnail', function (e){
    var id = this.dataset.id;
    var fr = new FileReader();
    fr.readAsDataURL(this.files[0]);
    fr.onload = function(e) {
        var img = document.getElementById(`img_seo_thumbnail_${id}`)
        img.src = this.result
    }
})


// transform allias
$('.seo-title').on('input', function (e) {

    let transform = cyrillicToTranslit({preset: this.dataset.lang_iso})
        .transform(this.value, '_');

    let input = document.getElementById(`seo_alias_${this.dataset.id}`);
    input.value = `${transform}`;

    let valueIsValid = aliases.some(e => e == transform)

    if(valueIsValid){
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    } else {
        input.classList.add('is-valid');
        input.classList.remove('is-invalid');
    }

})
// check alias is valid
$('.seo-alias').on('input', function (e) {
    let valueIsValid = aliases.some(e => e == this.value)


    if(valueIsValid){
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
    } else {
        this.classList.add('is-valid');
        this.classList.remove('is-invalid');
    }
})
