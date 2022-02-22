// const {token} = require("../app.js");
document.addEventListener('DOMContentLoaded', function () {

    $(document).on('submit', '.comment-form', function (e) {
        e.preventDefault();

        $.each($('form .error'), (key, label) => {
            label.innerHTML = ''
        });

        var formData = new FormData(this);

        $.ajax({
            method: 'POST',
            url: this.action,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success:  data => alert(data.message),
            error:  data => {
                $.each($.parseJSON(data.responseText).errors, (key, value) => {
                    $(`#${this.id} .error`).append(`${value[0]}`)
                })
            }
        })

        return false;
    })

    $('.answer-button').on('click', function () {
        $.get(
            this.dataset.get_form_url,
            data => {
                let wrap_element = $(`#wrap_${this.dataset.type}_${this.dataset.id}`);
                wrap_element.append(data.form);
            }
        )
    })

})



