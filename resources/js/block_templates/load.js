const { token } = require('../app.js')


// ************
// ************
// LOAD TEMPLATE
// ************
// ************


$('#template').on('change', function(e) {
    if($(this).val()){
        $('#loadBlockTemplate').show()
    } else {
        $('#loadBlockTemplate').hide()
    }

    // $(document).Toasts('create', {
    //     class: 'bg-warning',
    //     title: 'В процессе...',
    //     body: 'Переменные создаются, но в шаблонах не используются',
    //     position: 'bottomRight',
    // })
    // var alert_dander = $('.alert-danger')
    // alert_dander.hide();
    // alert_dander.empty();
    // saveContent();
})

$('#loadBlockTemplate').on('click', function (e) {
    var form = $('#blockTemplateLoadForm')[0];

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
            if(data.errors) {
            //
            //     alert.show()
            //     $.each(data.errors, function (key,value) {
            //         alert.append(`<p>${value}</p>`);
            //     })
            } else if(data.status) {
                $('#templateModalLoad').modal('toggle');
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

