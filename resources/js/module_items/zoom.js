import ZoomMtgEmbedded from '@zoomus/websdk/embedded';

const client = ZoomMtgEmbedded.createClient();

let meetingSDKElement = document.getElementById('meetingSDKElement');

client.init({
    debug: true,
    zoomAppRoot: meetingSDKElement,
    language: 'en-US',
    customize: {
        meetingInfo: [
            'topic',
            'host',
            'mn',
            'pwd',
            'telPwd',
            'invite',
            'participant',
            'dc',
            'enctype',
        ],
        toolbar: {
            buttons: [
                {
                    text: 'Custom Button',
                    className: 'CustomButton',
                    onClick: () => {
                        console.log('custom button');
                    },
                },
            ],
        },
    },
});
document.addEventListener('DOMContentLoaded', function () {
    return;
    $.ajax({
        method: 'POST',
        url: '/api/generate_signature',
        data: {
            role: 0,
            meetingNumber: 3396757876
        },

        success: function (data) {
            client.join({
                apiKey: data.api_key,
                signature: data.signature,
                meetingNumber: 3396757876,
                password: '0ZNTJ5',
                userName: 'test',
            })
        }
    })


})



