$(document).on('change', '.type-selector', function () {
    var id = `t${Date.now()}`;

    $(`#module_attributes > .input-group:last`).after(`<div class="input-group mb-3" id="${id}">
            <label for="">${this.value}</label>
            <input type="hidden" name="attributes[${id}][type]" value="${this.value}">
            <input
                name="attributes[${id}][key]"
                type="text"
                class="form-control input"
                placeholder="Ключ аттрибута"
                autoComplete="off"
                required
            >
            <input
                name="attributes[${id}][name]"
                type="text"
                class="form-control input"
                placeholder="Название аттрибута"
                autoComplete="off"
                required
            >
            <div class="input-group-append">
                <a href="#" class="btn btn-danger remove-input">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>`);
    $(this).prop('selectedIndex', 0);
});


$(document).on('click', '.remove-input', function (e) {
    $('.module-attributes').after(`<input type="hidden" name="delete_attributes[]" value="${this.dataset.id}">`);
    $(this)
        .parent('.input-group-append')
        .parent('.input-group')
        .remove()
})

// $(document).on('click', '.remove-repeater', function(e) {
//     $('.module-attributes').after(
//         `<input type="hidden" name="delete_repeaters[${this.dataset.id}][]" value="remove">`
//     );
//     $(`#module_attributes_${this.dataset.id}`).remove()
// })