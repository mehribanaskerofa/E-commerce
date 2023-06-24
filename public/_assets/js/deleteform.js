$(document).ready(function (){

    $('.delete-form').on('submit',function (e){
        e.preventDefault();
        if(confirm('delete?')){
            const url=$(this).attr('action');
            console.log(url);
            // console.log($(this).serializeArray())
            const tokenInput=$(this).serializeArray().find(function (input){
                return input.name=='_token';
            })
            // console.log(url,tokenInput);
            $.ajax({
                method:"post",
                url:url,
                data:{
                    '_method':'delete',
                    '_token':tokenInput.value
                },
                success(){
                    window.location.reload();
                }

            })
        }

    });



});

