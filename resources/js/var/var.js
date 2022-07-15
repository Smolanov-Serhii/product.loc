const { token } = require('../app.js')


$(document).on('change', '#type', function (){
    if(this.value != '-1') {
        // console.log($('.variable-value'));
        var selector = this;
        $('.variable-value').each(function (element) {
            $(`#option_${selector.value}`).children()[0].name = `value[${this.dataset.iso}]`
            this.innerHTML = $(`#option_${selector.value}`)[0].outerHTML;
        });
        // $('.variable-value')[0].innerHTML = $(`#option_${this.value}`)[0].outerHTML;
        var current_element_group = $('.variable-value').children();
        current_element_group.show()
        var input = current_element_group.children();
        var u_id = `${this.value}_${Date.now()}`;
        input[0].id = u_id;
        // console.log(input[0].type);
// return;
//         last.show();
//         var u_id = `${this.value}_${Date.now()}`;
//         last[0].id = u_id;
//
//         var form_group = $(`#${u_id}`)[0];
//         var input = $(`#${last[0].id} .input`);
//         var input_id = `${u_id}_input`;
//         input[0].id = input_id;

        switch (input[0].type){
            case 'file':
                // $(`#${last[0].id} label`)[0].htmlFor = input_id;
                break;
            case 'text':
                break;
            case 'textarea':
                if(this.value == 'editor')
                    CKEDITOR.replace(u_id);
                break;
        }


        // var file_input = $(`#${last[0].id} input[type="file"]`);
        // if(file_input[0]) {
        //     file_input[0].id = u_id;
        //     $(`#${last[0].id} label`)[0].htmlFor = u_id;
        // }

        // $(form_group.firstElementChild).one('input', function (e){
        //     $(e.target).unbind('input');
        //     var type_selector = $('#type')
        //     type_selector.selectedIndex = -1;
        //     type_selector.val('-1').change();
        // });
    }
});
