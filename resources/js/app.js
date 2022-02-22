const token = $('meta[name="csrf-token"]').attr('content');
const upload_link = '/admin/upload/image';

function uploadImage(image, editor) {

    var data = new FormData();

    data.append("image", image);
    data.append('_token', token);

    $.ajax({
        url: upload_link,
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(data) {

            let image = `<picture>
                <source srcSet="/uploads/${data.urls['webp']}" type="image/webp">
                <img src="/uploads/${data.urls['original']}" alt="описание"/>
            </picture>`;

            $(editor).summernote("pasteHTML", image);
        },
        error: function(data) {
            console.log('error', data);
        }
    });
}

const summernote_config = {
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
    popover: false,
    callbacks: {
        onImageUpload: function(files) {
            uploadImage(files[0], this);
        }
    },
};

module.exports = {
    module: {
        rules: [
            {
                // You can use `regexp`
                // test: /vendor\.js/$
                test: /\.css$/,
                loader: 'exports-loader',
                use: ['style-loader', 'css-loader']
                // options: {
                //     exports: 'myFunction',
                // },
            },
        ],
    },
    token: token,
    summernote_config: summernote_config
};

