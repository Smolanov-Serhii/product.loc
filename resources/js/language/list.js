const { token } = require('../app.js')

$('.update-status-lang-switcher').change(function () {

    $.ajax({
        method: 'POST',
        url: this.dataset.url,
        data: {
            _token: token,
            enabled: this.checked * 1,
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