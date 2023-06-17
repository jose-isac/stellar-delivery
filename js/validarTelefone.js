function validarNumeroTelefone(telefone) {
    // Expressão regular para validar o número de telefone
    var regex = /^\([1-9]{2}\)(9[1-9])[0-9]{4}\-[0-9]{4}$/;

    // Remove os caracteres especiais do número de telefone
    var numeroLimpo = telefone.replace(/[^\d]/g, '');

    // Testa se o número de telefone corresponde à expressão regular
    return regex.test(numeroLimpo);
  }