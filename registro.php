<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stellar Delivery 🌠🍰 | Registro</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="favicon.svg" type="image/svg">
</head>

<body>
  <div class="container">
    <div class="row text-center">
      <h1>Registro</h1>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form class="form" action="php/cadastro.php" id="formRegistro" method="POST" enctype="multipart/form-data">
          <label class="form-label" for="usuario_nome_completo_reg">Nome completo</label>
          <input class="form-control" type="text" placeholder="Seu nome completo" id="usuario_nome_completo_reg" name="usuario_nome">
    
          <label class="form-label" for="usuario_cpf">CPF</label>
          <spam class="form-label" id="cpf_error_message" style="visibility: hidden; color: red; font-weight: bold;">| CPF inválido!</spam>
          <input class="form-control" type="text" required id="usuario_cpf_reg" placeholder="Digite seu CPF" name="usuario_cpf">
    
          <label class="form-label" for="usuario_email_reg">E-Mail</label>
          <input class="form-control" type="email" required id="usuario_email_reg" placeholder="Digite seu email" name="usuario_email">
    
          <label class="form-label" for="usuario_senha_reg">Senha</label>
          <input class="form-control" type="text" required id="usuario_senha_reg" placeholder="Digite sua senha" name="usuario_senha">
          <input class="form-control mt-2" type="text" required id="usuario_senha_confirm_reg" placeholder="Repita sua senha">
    
          <label class="form-label" for="usuario_telefone_reg">Telefone</label>
          <spam class="form-label" id="telefone_error_message" style="visibility: hidden; color: red; font-weight: bold;">| Telefone inválido!</spam>
          <input type="text" class="form-control" required id="usuario_telefone_reg" placeholder="Digite seu telefone" name="usuario_telefone">

          <label class="form-label" for="foto">Foto de perfil(opcional)</label>
          <input class="form-control" type="file" name="fotoPerfil" id="fotoPerfil">
    
          <label for="usuario_cep_reg">CEP</label>
          <input type="text" class="form-control" required id="usuario_cep_reg" placeholder="Digite seu CEP" name="usuario_cep">
    
          <label for="usuario_estado" class="form-label">Estado</label>
          <input type="text" class="form-control" id="usuario_estado_reg" list="user_estado_data" required placeholder="Digite seu estado" name="usuario_estado">
          <datalist id="user_estado_data">
            <option value="teste">Fictício</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AM">Amazônia</option>
            <option value="AP">Amapá</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiânia</option>
            <option value="MA">Maranhão</option>
            <option value="MG">Minas Gerais</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MT">Mato Grosso</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="PR">Paraná</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="SC">Santa Catarina</option>
            <option value="SE">Sergipe</option>
            <option value="SP">São Paulo</option>
            <option value="TO">Tocantins</option>
          </datalist>
    
          <label for="usuario_cidade_reg" class="form-label">Cidade</label>
          <input type="text" id="usuario_cidade_reg" class="form-control" list="usuario_cidade_data" placeholder="Digite o nome da cidade" name="usuario_cidade">
          <datalist id="usuario_cidade_data">
            
          </datalist>
    
    
          <label class="form-label" for="usuario_bairro_reg">Bairro</label>
          <input type="text" id="usuario_bairro_reg" class="form-control" required placeholder="Digite o nome do seu bairro" list="usuario_bairro_data" name="usuario_bairro">
          <datalist id="usuario_bairro_data">
            <option value="teste">Teste</option>
          </datalist>
    
          <label class="form-label" for="usuario_endereco_reg">Endereço</label>
          <input type="text" class="form-control" required placeholder="Digite seu endereço" id="usuario_endereco_reg" name="usuario_endereco" >
    
          <label class="form-label" for="usuario_numero_reg">Número da residência</label>
          <input type="tel" class="form-control" id="usuario_numero_reg" required placeholder="Digite o número de sua residência" name="usuario_numero">
    
          <label class="form-label" for="usuario_complemento_reg">Complemento</label>
          <input type="text" class="form-control" id="usuario_complemento_reg" required placeholder="Digite um complemento" name="usuario_complemento">
          
          <button type="submit" id="btnRegistro" class="btn btn-success mt-4">Criar Conta</button>
    
          <hr>
          <p>
            <a href="index.php?abrirLogin=true" id="aLogin">Já tem uma conta?</a>
          </p>
          <p>
            <a href="php/admin_area/login-page.php" id="a_Mrg_Administrador">Sou administrador</a>
          </p>
        </div>
      </div>
  </div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery3.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="js/validacpf.js"></script>
<script src="js/validarTelefone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<script>
  // Inicio do JQUERY
  $(document).ready(function () {

    $('#usuario_estado_reg').prop('disabled', true)
    $('#usuario_cidade_reg').prop('disabled', true)
    $('#usuario_bairro_reg').prop('disabled', true)
    $('#usuario_endereco_reg').prop('disabled', true)
    
    // Testando se o cpf é valido
    $('#usuario_cpf_reg').inputmask('999.999.999-99')
    $('#usuario_telefone_reg').inputmask('(99) 99999-9999')
    
    $('#usuario_cpf_reg').blur(function() {
      let cpf = $(this).val().replace(/\D/g, '')
      
      if (cpfValido(cpf)){
        $('#cpf_error_message').css('visibility', 'hidden')
      } else {
        $('#usuario_cpf_reg').val('')
        $('#cpf_error_message').css('visibility', 'visible')
      }
    })

    function mensagemErro() {
      let urlParams = new URLSearchParams(window.location.search)
      let erro = urlParams.get('erro')

      if (erro === "cpf-e-email-ja-cadastrados") {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Um usuário com este mesmo e-mail e CPF já foi cadastrado! Tente novamente com outras credenciais."
        })
      } 
      else if (erro === "cpf-ja-cadastrado") {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Um usuário com este mesmo CPF já foi cadastrado! Tente novamente com outra credencial."
        })
      }
      else if (erro === "email-ja-cadastrado") {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Um usuário com este mesmo endereço de e-mail já foi cadastrado! Tente novamente com outro endereço."
        })
      }
    }

    mensagemErro()

       
    // Função para mandar para a página index.html e abrir o modal de login
    $("#aLogin").click(function (e) {
      e.preventDefault() // Impede que redirecione normalmente
      window.location.href = $(this).attr('href') // Redireciona com javascript
    })

    $('#usuario_cep_reg').blur(function() {
      let cep = $(this).val()
      if (cep.length > 0) {
        $('#usuario_estado_reg').prop('disabled', false)
        $('#usuario_cidade_reg').prop('disabled', false)
        $('#usuario_bairro_reg').prop('disabled', false)
        $('#usuario_endereco_reg').prop('disabled', false)
      } else {
        $('#usuario_estado_reg').val('')
        $('#usuario_cidade_reg').val('')
        $('#usuario_bairro_reg').val('')
        $('#usuario_endereco_reg').val('')
        $('#usuario_estado_reg').prop('disabled', true)
        $('#usuario_cidade_reg').prop('disabled', true)
        $('#usuario_bairro_reg').prop('disabled', true)
        $('#usuario_endereco_reg').prop('disabled', true)
      }
    })

    // Função para pesquisar CEP
    $('#usuario_cep_reg').on('blur', function() {
        var cep = $(this).val().replace(/\D/g, '');

        if (cep.length === 8) {
          var url = `https://viacep.com.br/ws/${cep}/json/`;

          $.getJSON(url, function(data) {
            if (!("erro" in data)) {
              $('#usuario_estado_reg').val(data.uf);
              $('#usuario_cidade_reg').val(data.localidade);
              $('#usuario_endereco_reg').val(data.logradouro);
              $('#usuario_bairro_reg').val(data.bairro);
              $('#usuario_numero_reg').focus();
            } else {
              alert('CEP não encontrado.');
            }
          });
        }
      });

      $('#usuario_estado_reg').on('change', function() {
        var estado = $(this).val().toUpperCase();

        // Limpar o campo de cidade
        $('#usuario_cidade_reg').val('');

        // Remover todas as opções existentes
        $('#usuario_cidade_data').empty();

        // Adicionar as opções de cidades do estado selecionado
        $.getJSON(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estado}/municipios`, function(data) {
          $.each(data, function(index, cidade) {
            $('#usuario_cidade_data').append(`<option value="${cidade.nome}">${cidade.nome}</option>`);
          });
        });
      });

      // Função para verificar se as senhas são iguais

      $('#usuario_senha_confirm_reg').blur(function() {
        let senha1 = $('#usuario_senha_reg').val()
        let senha2 = $(this).val()

        if (senha2 != senha1){
          $(this).val('')
          alert('As senhas não conferem!')
        }
      })
      

  })
</script>
</body>

</html>