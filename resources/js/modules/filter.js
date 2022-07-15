document.addEventListener("DOMContentLoaded", function () {
    $('.category__group-input').change(applyFilters)
    $('#search').click(applyFilters)
    $('#reset_button').click(function () {
        showLoader();
        this.form.reset();

        let formData = new FormData(this.form);
        var url = new URL(this.form.action);

        var params = new URLSearchParams(url.search);


        for (var pair of formData.entries()) {
            params.set(pair[0], pair[1]);
        }
        $.get(this.form.action + '/?' + params.toString(), function (data, status) {
            $('#category_result')[0].outerHTML = data.view;
            hideLoader();
        })
    })

    $(document).on('click', '.pagination__link', function (e) {
        showLoader();
        e.preventDefault();
        var url = new URL(this.href);
        var params = new URLSearchParams(url.search);

        var form = $('#courses_filter')[0];
        let formData = new FormData(form);


        for (var pair of formData.entries()) {
            params.set(pair[0], pair[1]);
        }

        $.get(form.action + '/?' + params.toString(), function (data, status) {
            $('#category_result')[0].outerHTML = data.view;
            hideLoader();
        })
        return false;
    })
})

function applyFilters(e) {

    showLoader();
    e.preventDefault();

    let formData = new FormData(this.form);
    var url = new URL(this.form.action);

    var params = new URLSearchParams(url.search);


    for (var pair of formData.entries()) {
        params.set(pair[0], pair[1]);
    }

    $.get(this.form.action + '/?' + params.toString(), function (data, status) {
        if (data.status) {
            $('#category_result')[0].outerHTML = data.view;
            hideLoader();
        }
    })

    return false;
}

function showLoader() {
//    сюда показать
}

function hideLoader() {
//   сюда убрать
}