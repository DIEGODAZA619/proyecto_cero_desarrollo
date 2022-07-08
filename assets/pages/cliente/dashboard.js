$(document).ready(function(){

    /* Inicia o clipboard */
    let clipboard = new Clipboard('.clipboard');

    clipboard.on('success', function(){

        new Noty({
            type: 'success',
            text: '<i class="fa fa-check"></i> Referral link successfully copied!',
            timeout: 3000
        }).show();
    });


    $(document).on('click', '#chave', function(){

        let binary_key = $('#chave:checked').val();

        $.ajax({
            url: baseURL+'requests/change_binary_key',
            data: {key: binary_key},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Binary key successfully changed!',
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

    if(typeof data_inicio != 'undefined'){
        
        $("#fim_plano")
          .countdown(data_inicio, function(event) {
            $(this).text(
              event.strftime('%D day(s) %H:%M:%S')
            );
        })
        .on('finish.countdown', function(){
            $('#fim_plano').html('EXPIRED PLAN!');
        }); //countdown
    }

}); /* end ready */