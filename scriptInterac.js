$( document ).ready(function() {

    $('.choiceEmailPhone').click(function(){
        choice= $(this).val();

        if(choice==="email"){
            $('.email').attr('readonly', false);
            $('.cellphone').attr('readonly', true);
        }
        
        else if(choice==="cellphone"){
            $('.email').attr('readonly', true);
            $('.cellphone').attr('readonly', false);
        }
    });
    
});


