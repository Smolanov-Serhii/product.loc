const {summernote_config, JSONEditor_options} = require('../app.js');
const container = document.getElementById('jsoneditor');
var editor;


$('.editor').each(function () {

    var id = this.id;
    $(`#${id}`).summernote(summernote_config);
    $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
    $(`#${id}`).on("summernote.change", function () {   // callback as jquery custom event
        $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
    });
})

$(document).on('change', '.select-type', function () {
    $('.overlay').show();

    var u_id = this.dataset.u_id;

    var type_selector = this;

    if (this.value != '-1') {

        $.ajax({
            url: `/admin/block_templates/attributes/template/${this.value}/${u_id}`,
            method: 'GET',
            // dataType:'JSON',
            // contentType: false,
            // cache: false,
            // processData: false,
            success: function (data) {
                if (data.errors) {

                    //     alert.show()
                    //     $.each(data.errors, function (key,value) {
                    //         alert.append(`<p>${value}</p>`);
                    //     })
                } else if (data.status) {

                    $(`#attribute_fields_${u_id}`)[0].style='';
                    $(`#attribute_fields_${u_id}`).append(data.html);

                    switch (type_selector.value * 1) {
                        case 0:
                            // $(`#${last[0].id} label`)[0].htmlFor = input_id;
                            break;
                        case 1:
                            break;
                        case 2:
                            break;
                        case 3:


                            var id = data.u_id;
                            $(`#${id}`).summernote(summernote_config);
                            $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
                            $(`#${id}`).on("summernote.change", function () {   // callback as jquery custom event
                                $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
                            });
                            break;
                        case 4:
                            break;
                    }
                }
                $(type_selector).selectedIndex = -1;
                $(type_selector).val('-1').change();

                $('.overlay').hide();
            }
        })
    }
});

$(document).on('click', '.remove-input', function () {
    $(`.card-footer`).after(
        `<input type="hidden" name="delete_attribute[]" value="${this.dataset.id}">`
    );
    $(this)
        .parent('.input-group-append')
        .parent('.input-group')
        .remove();

    $(`#option_${this.dataset.u_id}`).remove();
})

$(document).on('click', '.remove-input-repeater', function () {
    $(`.card-footer`).after(
        `<input type="hidden" name="delete_repeater[]" value="${this.dataset.id}">`
    );
    $(`#option_repeater_${this.dataset.id}`).remove();
})


// preload image
$(document).on('change','.image-input', function (){
    var id = this.dataset.id;
    var fr = new FileReader();
    fr.readAsDataURL(this.files[0]);
    fr.onload = function() {
        var img = document.getElementById(`image_${id}`)
        img.style = '';
        img.src = this.result
    }
});

$(document).on('click', '.edit-setting', function (){
    var settings;

    if($(`#selector_${this.dataset.u_id}`)[0].value) {
        settings = JSON.parse($(`#selector_${this.dataset.u_id}`)[0].value);
    } else {
        settings = window[`${this.dataset.input_type}_${this.dataset.u_id}`];
    }

    editor = new JSONEditor(container, JSONEditor_options);
    editor.set(settings);
    $('#save_settings')[0].dataset.u_id = this.dataset.u_id;
})

$(document).on('click', '.save-setting',  function () {
    $(`#selector_${this.dataset.u_id}`)[0].value = JSON.stringify(editor.get());
    $('#editorFormModal').modal('toggle');
});



$('#editorFormModal').on('hidden.bs.modal', function () {
    editor.destroy();
})
