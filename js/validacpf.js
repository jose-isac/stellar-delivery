function cpfValido(cpf) {
  // Esta função tem como propósito testar
  // Se o CPF passado como argumento é 
  // verdadeiro ou falso.
  
  //Primeiramente substitui qualquer tipo de
  // caractere indesejado
  
  cpf = cpf.replace(/[^\d] + /g,'');
  
  // Testa se o cpf tem o tamanho certo
  if (cpf.length !== 11){
    return false; // Se for, é falso!
  }
  
  // Testa se todos os digitos são iguais
  if (/^(\d)\1+$/.test(cpf)) {
    return false; // Se for é falso!
  }
  
  // Calculando o primeiro dígito verificador
  
  let soma = 0;
  for (let i = 0; i < 9; i++) {
    soma += parseInt(cpf.charAt(i)) * (10 - i);
  }
  let modulo = soma % 11;
  var digito1 = (modulo < 2) ? 0 : 11 - modulo;

   // Calculando o segundo dígito verificador
  soma = 0;
  for (let j = 0; j < 10; j++) {
    soma += parseInt(cpf.charAt(j)) * (11 - j);
  }
  modulo = soma % 11;
  var digito2 = (modulo < 2) ? 0 : 11 - modulo;
  
  // Verificando se os dígitos verificadores estão corretos
  if (parseInt(cpf.charAt(9)) !== digito1 || parseInt(cpf.charAt(10)) !== digito2) {
    return false;
  }

  return true;
}