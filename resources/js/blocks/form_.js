const { token } = require('../app.js')

// ************
// ************
// CREATE BLOCK
// ************
// ************

$('#blockModalCreate').on('hidden.bs.modal', function (e) {
    $('#blockCreateForm')[0].reset();
})
$('#blockModalCreate').on('shown.bs.modal', function () {
    $('#blockModalCreate').Toasts('create', {
        class: 'bg-success',
        title: 'Создание блока',
        subtitle: 'OK',
        body: 'Нужно выбрать шаблон и отметить "Показывать на сайте"',
        autohide: true,
        delay: 1e4,
    })
})
$('#contentFormModal').on('hidden.bs.modal', function (e) {
    $('#contentForm')[0].reset();
})

$(document).on('click', '.show-content-form', function (){

    loadForm(this.dataset.url, 'GET')
    $('#contentFormModal').modal('show');
    $('#contentFormModal').Toasts('create', {
        class: 'bg-success',
        title: 'Создание контента',
        subtitle: 'OK',
        body: `Контент имеет заранее определенный список полей.
        Кроме того, чего можно расширить опциональными полями, выбрав тип поля внизу формы.
        Колличество опицональных полей неограничено`,
        position: 'topRight',
    })
})

$(document).on('click', '.edit-content', function () {
    loadForm(this.dataset.url);
    $('#contentFormModal').modal('show');
})

$(document).on('click', '.remove-input', function(e) {
    var type_selector = $('#type')

    type_selector.selectedIndex = -1;
    type_selector.val('-1').change();

    $(this)
        .parent('.input-group-append')
        .parent('.input-group')
        .remove()
})

$('#saveBlock').on('click', function() {
    var alert_dander = $('.alert-danger')
    alert_dander.hide();
    alert_dander.empty();
    $.ajax({
        method: 'POST',
        url: $('#blockCreateForm')[0].action,
        data: {
            _token: token,
            enabled: $('#enabled')[0].checked*1,
            block_template_id: $('#block_template_id').val()
        },
        success: function (data) {
            if(data.errors) {
                $('#blockCreateForm .alert-danger').show()
                $.each(data.errors, function (key,value) {
                    $('#blockCreateForm .alert-danger').append(`<p>${value}</p>`)
                })
            } else if(data.status) {
                $('#blockList').sortable('destroy')
                $('#blockList')[0].outerHTML = data.html;
                refreshSortable();
                $('#blockModalCreate').modal('toggle');
                $(document).Toasts('create', createBlockData)
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Контент',
                    body: `Созданный блок нужно наполнить контентом.
                    Нажмите зеленый плюс внутри блока контента.
                    Если при создании, не поставить галочку "Показывать на сайте", то блок будет закрытим и серого цвета.
                    Чтобы открыть блок, нажмите "_" в правой части шапки блока и отметьте чек-бокс "Показывать на сайте"`,
                    position: 'bottomRight',
                })
                $(document).Toasts('create', {
                    class: 'bg-primary',
                    title: 'Настройки блока',
                    body: `В каждом блоке есть несколько кнопок управления.
                    (слева на право) создать элемент контента, удалить весь блок, изменить шаблон блока, показывать на сайте.
                    Любые изменения блока будут оповещаться информационными окнами и будут происходить без перезагрузки страницы`,
                    position: 'bottomRight',
                })
                $(document).Toasts('create', {
                    class: 'bg-primary',
                    title: 'Последовательность блоков',
                    body: 'меняется с помощью drag&drop',
                    position: 'bottomRight'
                })
            }
        }
    })
})

// ************
// ************
// UPDATE BLOCK LIST ORDER
// ************
// ************

$( "#blockList" ).sortable({
    update: function( event, ui ) {
        var sortedIDs = $( "#blockList" ).sortable( "toArray" );

        $.ajax({
            method: 'POST',
            url: '/admin/pages/content/reorder',
            data: {
                _token: token,
                sequence: sortedIDs
            },
            success: function (data) {
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

// ************
// ************
// SAVE CONTENT
// ************
// ************

$('#saveContent').on('click', function() {
    // $(document).Toasts('create', {
    //     class: 'bg-warning',
    //     title: 'В процессе...',
    //     body: 'Переменные создаются, но в шаблонах не используются',
    //     position: 'bottomRight',
    // })
    var alert_dander = $('.alert-danger')
    alert_dander.hide();
    alert_dander.empty();
    saveContent();
})

// ************
// ************
// SELECT OPTION INPUT TYPE
// ************
// ************

$(document).on('change', '#type', function (){
    if(this.value != '-1') {

        // console.log($(`#${this.value}`));
        var last = $(`#${this.value}`).clone().appendTo('.option-fields');

        last.show();
        var u_id = `${this.value}_${Date.now()}`;
        last[0].id = u_id;

        var form_group = $(`#${u_id}`)[0];

        var file_input = $(`#${last[0].id} input[type="file"]`);
        // var input = $(`#${last[0].id}`);
        // console.log(input);
        if(file_input[0]) {
            file_input[0].id = u_id;
            $(`#${last[0].id} label`)[0].htmlFor = u_id;
        }
        $(form_group.firstElementChild).one('input', function (e){
            $(e.target).unbind('input');
            var type_selector = $('#type')
            type_selector.selectedIndex = -1;
            type_selector.val('-1').change();
        });
    }
});

// $(document).one('click', '.remove-input', function(e) {
//
//     $(this)
//         .parent('.input-group-append')
//         .parent('.input-group')
//         .remove()
// })

$(document).on('change', '.custom-file-input', function (e) {

    this.labels[0].textContent = this.value;
    var type_selector = $('#type')

    type_selector.selectedIndex = -1;
    type_selector.val('-1').change();
})


$(document).Toasts('create', {
    class: 'bg-info',
    title: 'Как наполнять страницы контентом',
    body: `Если список блоков пуст, то нужно создать блок, нажав зеленый плюс вверху страницы`,
    position: 'bottomRight',
    autohide: true,
    delay: 2e4,
})

// ************
// ************
// SAVE AND CONTINUE CONTENT
// ************
// ************

$('#saveAndContinueContent').click(function (){
    // add extralage width
    // $('#modal_dialog')[0].classList.add('modal-xl');
    // $('#modal_body')[0].classList.add('row');
    // // add col-md-6 to rght and lft column
    // $('#contentForm')[0].classList.add('col-md-6');
    // $('#contentList')[0].classList.add('col-md-6');

    // send form
    saveContent(0)
})

// ************
// ************
// INIT BLOCK_ID HIDDEN INPUT VALUE
// ************
// ************

$('.content-form').on('click', function () {

    $('#block_id').val(this.dataset.block_id);
    //*************************
    //*************************
    // @debup
    //*************************
    //*************************
    // $('#block_id').val(3);
})

function refreshSortable() {
    $( "#blockList" ).sortable({
        update: function( event, ui ) {
            var sortedIDs = $( "#blockList" ).sortable( "toArray" );

            $.ajax({
                method: 'POST',
                url: '/admin/pages/content/reorder',
                data: {
                    _token: token,
                    sequence: sortedIDs
                },
                success: function (data) {
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Статус',
                        subtitle: 'OK',
                        body: 'Последовательность блоков на странице успешно изменена',
                        autohide: true,
                        delay: 5e3,
                    })
                }
            })
        }
    }).disableSelection();
}

function saveContent(exit = 1) {
    var form = $('#contentForm')[0],
        alert = $('#contentForm .alert-danger');

    var formData = new FormData(form);

    formData.append('_token', token)
    console.log(formData);
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

                alert.show()
                $.each(data.errors, function (key,value) {
                    alert.append(`<p>${value}</p>`);
                })
            } else if(data.status) {
                form.reset()
                if(exit) $('#contentFormModal').modal('toggle');
                $(document).Toasts('create', createBlockData)
                $(`#${data.block_id} .contents`)[0].innerHTML = data.content;
                loadForm(form.action, form.method)
            }
        }
    })
}

function loadForm(url,method) {
    $.ajax({
        method: method,
        url: url,
        data: method == 'post' ? {'_token': token} : {},
        success: function (data) {
            $('#modal_body')[0].innerHTML = data.form;
            $('#contentList')[0].innerHTML = data.content;
        }
    })

}

var createBlockData = {
    class: 'bg-success',
    title: 'Блок успешно добавлен.',
    subtitle: 'Subtitle',
    position: 'topRight',
    autohide: true,
    delay: 5e3,
};
