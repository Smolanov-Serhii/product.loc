const { token } = require('../app.js')

// ************
// ************
// UPDATE BLOCK TEMPLATE
// ************
// ************


$(document).on('change', '.block-template-id', function (){
    var update_button = $(`#update_block_template_id_${$(this)[0].dataset.block_id}`)
    update_button[0].dataset.block_template_id = this.value;
    update_button.show();
})


$(document).on('click', '.confirm_template', function (){
    var select = this;
    $(`#${this.dataset.block_id} .overlay`).show();
    $.ajax({
        method: 'POST',
        url: this.dataset.url,
        data: {
            _token: token,
            block_template_id: this.dataset.block_template_id
        },
        success: function (data) {
            $(`#${select.dataset.block_id}`)[0].outerHTML = data.html;
            $(document).Toasts('create', {
                class: 'bg-warning',
                title: 'Статус',
                subtitle: 'OK',
                body: 'Шаблон блока изменен',
                autohide: true,
                delay: 2e3,
            })
        }
    })
})

// ************
// ************
// REMOVE BLOCK
// ************
// ************

$(document).on('click', '.remove-block', function () {
    var delete_button = $('#deleteBlock')[0];
    delete_button.dataset.url = this.dataset.url;
    delete_button.dataset.block_id = this.dataset.block_id
})


$('#deleteBlock').on('click', function () {
    var block_id = this.dataset.block_id;
    console.log(this)
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
// REMOVE CONTENT
// ************
// ************

$(document).on('click', '.remove-content', function () {
    $('#deleteBlockContent')[0].dataset.content_id = this.dataset.content_id
})



$(document).on('click', '#deleteBlockContent', function () {
    var content_id = this.dataset.content_id;
    $.ajax({
        method: 'POST',
        url: '/admin/contents/delete',
        data: {
            _token: token,
            content_id:  content_id
        },
        success: function (data) {
            $('#confirmDeleteContent').modal('hide');
            $(`.block_content_id_${content_id}`).remove()
            console.log($(`.block_content_id_${content_id}`));
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Статус',
                subtitle: 'OK',
                body: 'Элемент удален',
                autohide: true,
                delay: 2e3,
            })
        }
    })
})


// ************
// ************
// UPDATE BLOCK STATUS
// ************
// ************

$(document).on('click', '.update_block_status', function (){
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
            $(`#${switcher.dataset.block_id}`)[0].outerHTML = data.html;
            if(switcher.checked) {
                class_name = 'bg-success';
                body = 'Блок включен';
            } else {
                class_name = 'bg-danger';
                body = 'Блок выключен';
            }

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
