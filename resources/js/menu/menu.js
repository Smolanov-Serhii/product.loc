const { token } = require('../app.js')

$('#add_menu_item').click(function (){
    var now = Date.now()
    $('#menu tr:last').after(
        `<tr id="${now}">` +
            '<td>' +
                '<div class="form-check">' +
                    '<input type="hidden" name="model[Pages][2]" value="false">' +
                    `<input type="hidden" name="model[Menu_items][${now}][order]" value="0">` +
                    `<input class="form-check-input" type="checkbox" name="model[Menu_items][${now}][show]" value="true" checked="">` +
                '</div>' +
            '</td>' +
            '<td>' +
                '<div class="form-group">' +
                    `<input class="form-check-input" type="text" name="model[Menu_items][${now}][link_text]">` +
                '</div>' +
            '</td>' +
            '<td>' +
                '<div class="form-group">' +
                    `<input class="form-check-input" type="text" name="model[Menu_items][${now}][alias]">` +
                '</div>' +
            '</td>' +
            '<td>' +
            '</td>' +
        '</tr>');
})

// ************
// ************
// SORT AND DRAG BLOCK
// ************
// ************

function refreshSortable() {
    $class = 'menu_list';

    $( `#${$class}` ).sortable({
        revert: true,
        update: function( event, ui ) {
            var sortedIDs = $( `#${$class}` ).sortable( "toArray" );
            console.log(sortedIDs);
            $.ajax({
                method: 'POST',
                url: '/admin/menu/reorder',
                data: {
                    _token: token,
                    sequence: sortedIDs
                },
                success: function (data) {
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Статус',
                        subtitle: 'OK',
                        body: 'Последовательность пунктов меню успешно изменена',
                        autohide: true,
                        delay: 2e3,
                    })
                }
            })
        }
    }).disableSelection();
}
refreshSortable();
