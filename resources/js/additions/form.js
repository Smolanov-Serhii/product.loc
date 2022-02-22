const { token, summernote_config } = require('../app.js')


// bind quill to editors
$(document).ready(function() {
    $('.addition-content').each(function () {
        var id = this.id;
        $(`#${id}`).summernote(summernote_config);
        $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
        $(`#${id}`).on("summernote.change", function (e) {   // callback as jquery custom event
            $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
        });
    })
})


// preload image
$(document).on('change','.addition-thumbnail', function (e){
    var id = this.dataset.id;
    var fr = new FileReader();
    fr.readAsDataURL(this.files[0]);
    fr.onload = function(e) {
        var img = document.getElementById(`img_addition_thumbnail_${id}`);
        img.style = '';
        img.src = this.result
    }
})
