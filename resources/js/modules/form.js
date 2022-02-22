const {token, summernote_config} = require('../app.js');

$(document).ready(function() {
    $('.editor').each(function (element) {
        var id = this.id;
        $(`#${id}`).summernote(summernote_config);
        $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
        $(`#${id}`).on("summernote.change", function (e) {   // callback as jquery custom event
            $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
        });
    })
})


$(document).on('click', '.add-iteration', function (e) {

    $.ajax({
        method: 'get',
        url: this.dataset.template_url,
        success: (data) => {
            let element = document.createElement('template');

            this.before(element);
            element.outerHTML = data.html;

            // $(`#content_${data.u_id}.textarea`).each(function (element) {
            //     let quill = new Quill(`#${this.id}`, {
            //         modules: {
            //             toolbar: quill_config
            //         },
            //         theme: 'snow'
            //     });
            // })
        }
    })
})

$(document).on('click', '.module-item.remove-iteration', function (e) {
    $(`#iteration_${this.dataset.iteration_id}`).remove();
    $('#module_items_form').append(`<input type="hidden" name="remove_iterations[]" value="${this.dataset.iteration_id}">`);
})

$(document).on('click', '.module-item.remove-repeater', function (e) {
    $(`#repeater_${this.dataset.iteration_id}`).remove();
})

// preload image
$(document).on('change','.module-item-file-input', function (e){
    var id = this.dataset.id;
    var fr = new FileReader();
    fr.readAsDataURL(this.files[0]);
    fr.onload = function(e) {
        var img = document.getElementById(`optionImage_${id}`)
        img.style = '';
        img.src = this.result
    }
});

$(document).on('submit','#module_items_form', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append('_token', token)

    $.ajax({
        method: this.method,
        url: this.action,
        data: formData,
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if(data.errors) {
                alert.show()
                $.each(data.errors, function (key,value) {
                    alert.append(`<p>${value}</p>`);
                })
            } else if(data.status) {
                document.location.href = data.redirectTo;
            }
        }
    })
    return ;
});
