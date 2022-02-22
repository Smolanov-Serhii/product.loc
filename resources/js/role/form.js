// выбрать все права в группе
$('.check-group').change(function () {
    $(`.permission.group-${this.dataset.group_id}`).prop('checked', this.checked)
})

// выбрать все права
$('#check_all').change(function () {
    $(`.permission`).prop('checked', this.checked)
})

// убрать галочкы с "Выбрать все"
$(`.permission`).change(function () {
    $('#check_all').prop('checked', false);
    $(`#group_${this.dataset.group_id}`).prop('checked', false);
})