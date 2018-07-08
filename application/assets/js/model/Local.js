function cep(){
    var cep = $('#cep').val();
    var url = 'http://cep.correiocontrol.com.br/'+ cep +'.json';
    $.getJSON(url, function(data){
        $('[name="logradouro"]').val(data.logradouro);
        $('[name="bairro"]').val(data.bairro);
        $('[name="estado"]').val(data.uf);
        $('[name="cidade"]').val(data.localidade);
    });
}

$(function(){
    $('#btnCep').click(function(){
        cep();
    });
});
