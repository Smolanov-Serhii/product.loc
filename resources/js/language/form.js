$('#iso').change(function () {
    $('#label')[0].value = this.selectedOptions[0].dataset.lang
    $('#label').focus()
})

$(document).on('change','.custom-file-input', function (){

    var fr = new FileReader();
    var selectedFile = this.files[0];

    if (selectedFile) {
        fr.readAsDataURL(selectedFile)
        fr.onload = function() {
            let img = document.getElementById(`image`)
            $(img).show();
            img.src = this.result
        }
    }
})