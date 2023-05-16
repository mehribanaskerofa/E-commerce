$(document).ready(function (){

    $('.delete-form').on('submit',function (e){
        e.preventDefault();
console.log('deleteform');
        if(confirm('delete?')){
            const url=$(this).attr('action');
            console.log(this);
            console.log($(this).serializeArray())
            const tokenInput=$(this).serializeArray().find(function (input){
                return input.name=='_token';
            })
            console.log(url,tokenInput);
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

