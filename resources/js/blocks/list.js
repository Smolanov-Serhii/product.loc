const { token, summernote_config } = require('../app.js');

// ************
// ************
// REMOVE BLOCK
// ************
// ************

$(document).on('click', '.remove-block', function (e) {
    e.preventDefault();
    var delete_button = $('#deleteBlock')[0];
    delete_button.dataset.url = this.dataset.url;
    delete_button.dataset.block_id = this.dataset.block_id;
    return ;
})


$('#deleteBlock').on('click', function () {
    var block_id = this.dataset.block_id;
    $.ajax({
        method: 'POST',
        url: this.dataset.url,
        data: {
            _token: token
        },
        success: function (data) {
            $('#confirmDeleteBlock').modal('hide');
            $(`#${block_id}`).remove();
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Статус',
                subtitle: 'OK',
                body: 'Блок удален',
                autohide: true,
                delay: 2e3,
            })
        }
    })
})

// ************
// ************
// EDIT BLOCK CONTENT
// ************
// ************

$(document).on('click', '.edit-content', function (e) {
    $('#form_spiner').show();
    $('.carousel').carousel()
    // console.log(e);
    // console.log(this.dataset.url);
    // return false;
    $.ajax({
        method: 'get',
        url: this.dataset.url,
        // data: method == 'post' ? {'_token': token} : {},
        success: function (data) {
            $('#form_spiner').hide();

            $('#modal_body')[0].innerHTML = data.form;
            $('.editor').each(function (element) {
                var id = this.id;
                $(`#${id}`).summernote(summernote_config);
                $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
                $(`#${id}`).on("summernote.change", function (e) {   // callback as jquery custom event
                    $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
                });
            })

            $(".iterations").sortable({
                containment: "parent",
                items: "> div",
                handle: ".move",
                tolerance: "pointer",
                cursor: "move",
                opacity: 0.7,
                revert: 300,
                placeholder: "movable-placeholder",
                start: function(e, ui) {
                    ui.placeholder.height(ui.item[0].clientHeight);
                    ui.placeholder.width(ui.item[0].clientWidth * .8);
                },
                update: function( event, ui ) {
                    for (let i = 0; i < event.target.children.length; i++) {
                        $(event.target.children[i]).find('input.order')[0].value = i+1;
                    }
                },
            });
            $(".iterations").disableSelection();
            // $(".iterations").sortable({
            //     items: "> div",
            //     tolerance: "pointer",
            //     containment: "parent",
            //     cursor: "move",
            //     opacity: 0.7,
            //     revert: 300,
            //     delay: 150,
            //     placeholder: "movable-placeholder",
            //     start: function(e, ui) {
            //         ui.placeholder.height(ui.helper.outerHeight());
            //     },
            //
            // });

        }
    })
})

// ************
// ************
// UPDATE BLOCK STATUS
// ************
// ************

$(document).on('change', '.enable-block-switcher', function (){
    var switcher = this, class_name, body;
    $(`#${this.dataset.block_id} .overlay`).show();
    $.ajax({
        method: 'POST',
        url: this.dataset.url,
        data: {
            _token: token,
            enabled: this.checked*1
        },
        success: function (data) {
            // $(`#${switcher.dataset.block_id}`)[0].outerHTML = data.html;
            if(switcher.checked) {
                class_name = 'bg-success';
                body = 'Блок включен';
            } else {
                class_name = 'bg-danger';
                body = 'Блок выключен';
            }

            $('#blockList').sortable('destroy');
            $('#blockList')[0].outerHTML = data.html;
            refreshSortable();

            $(document).Toasts('create', {
                class: class_name,
                title: 'Статус',
                subtitle: 'OK',
                body: body,
                autohide: true,
                delay: 2e3,
            })
        }
    })
})

$(document).on('click', '.save-content', function (e) {
    $('#form_spiner').show();
    var close_form = this.dataset.close_form;
    var form = $('#contentForm')[0];
    // $('.textarea .ql-editor').each(function () {
    $('.editor').each(function () {
        var id = this.id;
        // console.log($(`#${id}`));
        $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
        // $(`#hidden_${this.id}`)[0].value = Quill.find(this).root.innerHTML
        // console.log(this.innerHTML)
    })

    // for(data_id in CKEDITOR.instances) {
    //     let data =  CKEDITOR.instances[data_id].getData();
    //     let textarea_element = $(`#${data_id}`)[0];
    //
    //     textarea_element.value = data;
    // }
    // CKEDITOR.instances.each(function () {
    //
    // })
    var formData = new FormData(form);
    formData.append('_token', token)
    $.ajax({
        method: 'POST',
        url: form.action,
        data: formData,
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $('#form_spiner').hide();
            // console.log(data);
            if(data.errors) {

                // alert.show()
                // $.each(data.errors, function (key,value) {
                //     alert.append(`<p>${value}</p>`);
                // })
            } else if(data.status) {
                if(close_form) {
                    $('#contentFormModal').modal('toggle');
                }
                $(document).Toasts('create', {
                    class: data.toasts.class,
                    title: data.toasts.title,
                    body: data.toasts.body,
                    position: 'bottomRight',
                })
            }
        }
    })
})

$(document).on('click', '.add-iteration', function (e) {
    $.ajax({
        method: 'GET',
        url: this.dataset.template_url,
        success: (data) => {
            let element = document.createElement('template');
            let id = `template_${parseInt(Math.random()*1e5)}`;

            this.previousElementSibling.append(element);
            element.outerHTML = data.html;

            $(`#option_editor_${data.u_id} .editor`).each(function (element) {
                var id = this.id;
                $(`#${id}`).summernote(summernote_config);
                $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
                $(`#${id}`).on("summernote.change", function (e) {   // callback as jquery custom event
                    $(`#${id}`)[0].value = $(`#${id}`).summernote('code');
                });
            })
        }
    })
})

$(document).on('change','.custom-file-input', function (){
    var id = this.dataset.id;
    var fr = new FileReader();
    var selectedFile = this.files[0];

    if (selectedFile) {
        fr.readAsDataURL(selectedFile)
        fr.onload = function(e) {
            var img = document.getElementById(`image_${id}`)
            $(img).show();
            img.src = this.result
        }
    }
})

// ************
// ************
// SORT AND DRAG BLOCK
// ************
// ************

function refreshSortable() {
    $( "#blockList" ).sortable({
        revert: true,
        update: function( event, ui ) {
            var sortedIDs = $( "#blockList" ).sortable( "toArray" );
            $.ajax({
                method: 'POST',
                url: block_update_order_form_action,
                data: {
                    _token: token,
                    sequence: sortedIDs
                },
                success: function (data) {
                    $('#blockList').sortable('destroy');
                    $('#blockList')[0].outerHTML = data.html;
                    refreshSortable();
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Статус',
                        subtitle: 'OK',
                        body: 'Последовательность блоков на странице успешно изменена',
                        autohide: true,
                        delay: 2e3,
                    })
                }
            })
        }
    }).disableSelection();
}
refreshSortable();

$( ".template-item" ).draggable({
    connectToSortable: "#blockList",
    helper: "clone",
    stop: function( event, ui ) {
        $.ajax({
            method: 'POST',
            url: block_create_content_form_action,
            data: {
                _token: token,
                enabled: 1,
                block_template_id: event.target.dataset.template_id
            },
            success: function (data) {
                if(data.errors) {

                } else if(data.status) {
                    $('#blockList').sortable('destroy');
                    ui.helper[0].innerHTML = data.html;
                    ui.helper[0].id = data.block_id;

                    refreshSortable();
                }
            }
        })
    }
});


$(document).on('click', '.content.remove-iteration', function (e) {
    e.preventDefault()

    if(confirm('Are you sure?')) {
        $.ajax({
            method: 'DELETE',
            data: {
                _token: token,
            },
            url: this.dataset.url,
            success: (data) => {
                $(`#${data.id}`).remove();
                $(document).Toasts('create', {
                    class: data.toasts.class,
                    title: data.toasts.title,
                    body: data.toasts.body,
                    position: 'bottomRight',
                })
            }
        })
    }
    return false;
})

$(document).on('click', '.content.remove-new-iteration', function (e) {
    e.preventDefault();
    $(`#${this.dataset.id}`).remove();
    return false;
})


$(document).on('click', '.block.clear-value', function () {
    $(`#optionFile_${this.dataset.attr_id}`)[0].value = '';
    $(`#image_${this.dataset.attr_id}`)[0].src = '';
    $(`#image_${this.dataset.attr_id}`).hide();
    $('#contentForm').append(`<input type="hidden" name="clear_value[]" value="${this.dataset.prop_id}">`);
})
