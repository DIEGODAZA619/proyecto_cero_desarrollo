$(document).ready(function(){

    $(document).on('click', '#chave_binaria', function(){

        let binary_key = $('#chave_binaria:checked').val();

        $.ajax({
            url: baseURL+'requests/change_binary_key',
            data: {key: binary_key},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Successfully changed binary key!',
                        timeout: 3000
                    }).show();

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Error changing binary key. Try again.',
                        timeout: 3000
                    }).show();
                }
            },

            error: function(message){
                console.log('Error changing binary key: ', message.responseText);
            }
        });

    });
    
}); /* ready */