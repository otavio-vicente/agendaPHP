function adicionarPessoa(){       
    var novaPessoa = $("#pessoasDoCompromisso").children().first().clone();   
    $("#pessoasDoCompromisso").append(novaPessoa);   
}

/**Função para o Agendar Compromissos */
function removerPessoa(botao){    
   var quantidadePessoas= document.getElementById("pessoasDoCompromisso").childElementCount;
   if(quantidadePessoas==1){
        alert("A última pessoa não pode ser removida");
    }else{
        $(botao).parent().parent().remove();
    }    
}

/**Função para o Editar Compromissos - Remove mesmo se for a última pessoa*/
function removerPessoasEdicao(botao){      
         $(botao).parent().parent().remove();        
 }
 
/**Função para o Editar Compromissos - Remover as pessoas que já estão no compromisso*/
function removerPessoaJaEstaNoCompromisso(botao){   
         $(botao).parent().remove();     
 }

function verificarPessoaRepetida(idPessoa){
    if(idPessoa!=0){
        var pessoasSelecionadas = document.getElementsByName("idPessoa[]");
        var i=0;        
        for(i=0; i<pessoasSelecionadas.length-1; i++){
       
             if(pessoasSelecionadas[i].value==idPessoa){
                console.log(pessoasSelecionadas[i]);
                alert("Essa pessoa já foi selecionada! Selecione outra ou remova-a!");
            }
    }    
    }
}

function preencherEndereco(cep){
    $("#rua").val("");
    $("#bairro").val("");
    $("#cidade").val("");

    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
        if (!("erro" in dados)) {       
            $("#rua").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);                              
            $("#estado").val(dados.estado);                              
        }else {                        
            alert("CEP não encontrado! Preencha o endereço manualmente.");
        }
     });
}
    





