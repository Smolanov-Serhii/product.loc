const { token } = require('../app.js')

$('.moderate-comment-switcher').change(function (e) {

    $.ajax({
        method: 'POST',
        url: this.dataset.url,
        data: {
            _token: token,
            is_approved: this.checked * 1,
        },
        success: data => {
            console.log(data);
            $(document).Toasts('create', {
                class: 'bg-primary',
                title: 'Статус',
                subtitle: 'OK',
                body: data.message,
                autohide: true,
                delay: 2e3,
            })
        }
    })
})