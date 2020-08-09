$(document).ready(function () {
    $('#formulario input,textarea, #formulario select').blur(function () {
        var tes = $(this).val();
        if ($(this).hasClass('naoValidar') == true) {
            //não valida o input
        }
        else {
            if ($(this).val() == "") {
                if ($(this).attr('type') == 'file') {
                    //$(this).closest('.form-group').removeClass('has-error has-feedback'); //.addClass('has-success has-feedback');
                    //$(this).closest('.form-group').find('i.fa').remove();
                }
                else {

                    $(this).removeClass('validate valid').addClass('validate invalid');
                }
            }
            else {
                //$(this).closest('.input-field').removeClass('validate invalid'); //.addClass('has-success has-feedback');
            }
        }
    });

    $("#btnEnviar").click(function (e, params) {
        $("#btnEnviar").prop('disabled', true);
        var cont = 0;
        $('#formulario input,textarea ,#formulario select').each(function (i) {

            var verificar = $(this).prop('disabled');
            if (verificar == false) {
                //Chosen
                if ($(this).hasClass('chosen-select') == true) {
                    //var nome = $(this).attr('name');
                    //var input = $(this).val();
                    $(this).parent().find('.chosen-container-single').css('border', '1px solid #3c763d');
                    if ($(this).val() == '' || $(this).val() == null || $(this).val() == '0') {
                        //var name = $(this).attr('name');
                        $(this).parent().find('.chosen-container-single').css('border', '1px solid #a94442');
                        cont++;
                    }

                }
                else if ($(this).hasClass('naoValidar') == true) {
                    //var tipo = $(this).attr('type');
                    //alert(tipo);
                    //não valida o input
                }
                else if ($(this).is(":hidden")) {
                    //se estiver invisivel nao valida o input.
                }
                else {

                    var attr = $(this).attr('name');

                    if (typeof attr !== typeof undefined && attr !== false) {
                        if ($(this).val() == "" || $(this).val() == null) {


                            if ($(this).attr('type') == 'file') {
                                $(this).closest('.dropify-wrapper').addClass('has-error');
                            }

                            if ($(this).attr('type') == 'text') {

                                //$(this).addClass('validate invalid');

                            }

                            //var input = $(this);
                            //alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
                            cont++;
                            $(this).removeClass('validate valid').addClass('validate invalid');
                            $("#btnEnviar").prop('disabled', false);
                        }
                        else {
                            $(this).removeClass('validate invalid').addClass('validate valid');
                            $("#btnEnviar").prop('disabled', false);
                        }
                    }
                }
            }
        });

        if (cont == 0) {
            $("#btnEnviar").prop('disabled', true);
            $("#formulario").submit();
            return;
        }
        else {
            sweetAlert("Existem Campos vazios", "Preencha os campos obrigatórios!", "error");
            return false;
        }
    });


});


