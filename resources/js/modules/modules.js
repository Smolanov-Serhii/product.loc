$(document).on('change', '.type-selector', function (){
    var id = `t${Date.now()}`;
    if(this.value == 'repeater') {
        var u_id = `${this.value}_${id}`;
        var selector_element = `
            <div class="form-group">
                <label> Создать дополнительное поле</label>
                <select
                    class="custom-select form-control-border type-selector"
                    data-id="${id}"
                >
                    <option value="0" selected disabled hidden> Выберите тип </option>
                    <option value="image">Изображение</option>
                    <option value="input">Текстовое поле</option>
                    <option value="textarea">Текстовый редактор</option>
                    <option value="editor">Html редактор</option>
                    <option value="repeater">Повторитель</option>
                    <option value="time">Время</option>
                </select>
            </div>`;
        $(`#module_attributes_${this.dataset.id}>.input-group:last`).after(
            `<div class="module-attributes" id="module_attributes_${id}">
                ${selector_element}
                <input type="hidden" name="repeaters[${id}][parent_id]" value="${this.dataset.id}">
                <div class="input-group mb-3" id="${u_id}">
                    <label for="">${this.value}</label>
                    <input
                        name="repeaters[${id}][key]"
                        type="text"
                        class="form-control input"
                        placeholder="Ключ повторителя"
                        autoComplete="off"
                    >
                    <div class="input-group-append">
                        <a href="#" class="btn btn-danger remove-input">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="input-group mb-3" id="${u_id}">
                    <label for="">${this.value}</label>
                    <input
                        name="repeaters[${id}][name]"
                        type="text"
                        class="form-control input"
                        placeholder="Название повторителя"
                        autoComplete="off"
                    >
                    <div class="input-group-append">
                        <a href="#" class="btn btn-danger remove-input">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>`
        );
    } else if(this.value != '-1') {
        var u_id = `${this.value}_${Date.now()}`;
        $(`#module_attributes_${this.dataset.id}>.input-group:last`).after(
            `<div class="input-group mb-3" id="${u_id}">
                <label for="">${this.value}</label>
                <input type="hidden" name="attributes[${id}][parent_id]" value="${this.dataset.id}">
                <input type="hidden" name="attributes[${id}][type]" value="${this.value}">
                <input
                    name="attributes[${id}][key]"
                    type="text"
                    class="form-control input"
                    placeholder="Ключ аттрибута"
                    autoComplete="off"
                >
                <input
                    name="attributes[${id}][name]"
                    type="text"
                    class="form-control input"
                    placeholder="Название аттрибута"
                    autoComplete="off"
                >
                <div class="input-group-append">
                    <a href="#" class="btn btn-danger remove-input">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>`
        );
    }
    $(this).prop('selectedIndex', 0);
});


$(document).on('click', '.remove-input', function() {
    $('.module-attributes').after(
        `<input type="hidden" name="delete_attributes[${this.dataset.id}][]" value="remove">`
    );
    $(this)
        .parent('.input-group-append')
        .parent('.input-group')
        .remove()
})

$(document).on('click', '.remove-repeater', function() {
    $('.module-attributes').after(
        `<input type="hidden" name="delete_repeaters[${this.dataset.id}][]" value="remove">`
    );
    $(`#module_attributes_${this.dataset.id}`).remove()
})