
$(document).ready(function () {
    $('#btn_inscribir').on('click', function () {
        $.ajax({
            url: $('#frm_registro').attr('action'),
            type: $('#frm_registro').attr('method'),
            data: $('#frm_registro').serialize(),
            beforeSend: function() {
                $('#btn_inscribir').attr('disabled', 'disabled');
                $('#btn_inscribir').html('Guardando...');
            },
            success: function (data) {
                var obj = jQuery.parseJSON(data);
                if(obj.error) {
                    $('#msg_error').html(obj.msg);
                    $('#div_error').show('fade');
                    $('#btn_inscribir').removeProp('disabled');
                    $('#btn_inscribir').html('Inscribir');
                }
                else {
                    $('#msg_success').html(obj.msg);
                    $('#div_success').show('fade');
                    $('#btn_inscribir').html('Inscribir');
                    location.reload();
                }
            }
        });
        return false;
    });
    
    $('.close').on('click', function(){
        $(this).parent().hide('fade');
    });
});