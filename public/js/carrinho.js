$(document).ready(function(){
    $('.count').prop('disabled', true);

       $(document).on('click','.plus',function(){

           id = $(this).attr("id");
           

           id= id.replace('plus-','');
          
        $('#seletor'+id).val(parseInt($('#seletor'+id).val()) + 1 );

    });


    $(document).on('click','.minus',function(){
        id = $(this).attr("id");
        id= id.replace('minus-','');
        $('#seletor'+id).val(parseInt($('#seletor'+id).val()) - 1 );
            if ($('#seletor'+id).val() == 0) {
                
            }
        });



        $(document).on('click','.btn-fim',function(){
            id = $(this).attr("id");
            if(id == "finalizar_compra"){
                $('#acao').val("finalizar");
            
            }
            else if(id == "cancelar_compra"){
                $('#acao').val("cancelar");
            }

            $('#form-compra').submit();
            });




 });