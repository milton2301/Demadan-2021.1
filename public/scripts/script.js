$(function() {
    $('.ncredito').inputmask({
      mask: "9999.9999.9999.9999"
    });

    $('.ncvv').inputmask({
        mask: "999"
      });

      $('.validade').inputmask({
        mask: "99/99"
      });

      $('#cep').inputmask({
          mask: "99999-999"
      })
  });

  function consultarCEP(){
    let cep = document.getElementById('cep').value
    let url = 'https://viacep.com.br/ws/'+cep+'/json/'

    $.ajax({
      url: url,
      type: 'GET',
      success: function(response){
        //Insere dados buscado na API do viacep com base no CEP passado pelo usuário
            document.querySelector("#rua").value = response.logradouro
            document.querySelector('#bairro').value = response.bairro;
            document.querySelector('#cidade').value = response.localidade;
            document.querySelector('#estado').value = response.uf;
        //Desabitar inputs para usar dados resgatados com base no CEP
            document.querySelector('#rua').readOnly = true;
            document.querySelector('#bairro').readOnly = true;
            document.querySelector('#cidade').readOnly = true;
            document.querySelector('#estado').readOnly = true;
      }
    })

  }

  document.getElementById('tipo').addEventListener('change', function() {
    this.form.submit();
});

document.getElementById('marca').addEventListener('change', function() {
    this.form.submit();
});

document.getElementById('tamanho').addEventListener('change', function() {
    this.form.submit();
});
