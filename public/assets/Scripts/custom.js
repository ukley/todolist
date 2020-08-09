$(document).ready(function () {

    $('#alert_box').click(function(){
        $( "#card-alert" ).fadeOut( "slow", function() {});
    });


    if ($('#alert_box').length > 0) {

        window.setTimeout(function () {
            $("#card-alert").slideUp();
        }, 20000);
    }

    $('#back').click(function () {
        window.history.back();
    });


    $("#DtInicio").focusin(function () {
        //alert('ok');
        //$('.datepicker').trigger('open', ['focus']);

        //$('.datepicker').pickadate('picker').set('select', '21/05/2017', { format: 'dd/mm/yyyy' }).trigger("change");
    });


    if ($(".numeric").length > 0) {
        $(".numeric").on('keypress', function (e) {
            var key = event.keyCode || event.which;
            if (key < 48 || key > 57) {
                event.preventDefault();
            }
        }).bind("paste", function (e) {
            // quando colar remover todos os caracteres que não sejam números
            var idObj = e.target.id;
            setTimeout(function () {
                var Texto = $('#' + idObj).val().replace(/[^0-9]/g, '');
                $('#' + idObj).val(Texto);
            }, 100);
        });
    }



    if ($(".texto").length > 0) {
        $(".texto").bind('paste', function (e) {
            var key = e.keyCode || e.charCode
            if (key > 48 && key < 57) {
                e.preventDefault();
            }
        }).keypress(function (e) {
            var key = e.keyCode || e.charCode
            if (key > 48 && key < 57) {
                e.preventDefault();
            }
        });
    }




});