define(['jquery'], function($) {
    return function(config, element) {

        $(element).on('click','#buttonMarks',function (){
            if( $(".notas").is(":visible")){
                $(element).find(".notas").hide();
            }else{
                $(element).find(".notas").show();
            }

        });
    }
});
