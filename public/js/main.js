function deleteMsg(id){
    if(window.confirm('Deseja realmente apagar essa mensagem?')){
        var url='/mensagens/'+id;
        $.ajax({
            url: url,
            type: 'POST',
            data:{
                '_token': $('meta[name=csrf-token]').attr("content"),
                '_method': 'DELETE',
            },
            success: function(result) {
                if(result){
                    $('#msg'+id).fadeOut();
                }else{
                    alert('Erro ao apagar mensagem');
                }
            }}
        );
    }
}
$(function(){
    $("textarea").focus();
    $("textarea").keypress(function (e) {
        if(e.which == 13 && !e.shiftKey) {
            $('form').submit();
            return false;
        }
    });
});
