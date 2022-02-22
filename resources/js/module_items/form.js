$('.module-item.clear-value').click(function () {
    $(`#optionFile_${this.dataset.attr_id}`)[0].labels[0].innerText = '';
    $('.module-attributes').append(`<input type="hidden" name="clear_value[]" value="${this.dataset.prop_id}">`);
})