function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, '')
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
    return cpf
}

function formatarCNPJ(cnpj) {
  cnpj = cnpj.replace(/\D/g, '')
  cnpj = cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5')
  return cnpj
}

function formatarTelefone(telefone) {
    telefone = telefone.replace(/\D/g, '')
    if (telefone.length === 11) {
      telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3')
    } else if (telefone.length === 10) {
      telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3')
    }
    return telefone
}

function formatarPlaca(placa) {
    placa = placa.replace(/[^a-zA-Z0-9]/g, '')
    if (placa.length === 7) {
      placa = placa.replace(/([A-Za-z]{3})(\d{4})/, '$1-$2')
    } else if (placa.length === 6) {
      placa = placa.replace(/([A-Za-z]{3})(\d{3})/, '$1-$2')
    }
    return placa.toUpperCase()
}

function formatarCEP(cep) {
    cep = cep.replace(/\D/g, '')
    if (cep.length === 8) {
        cep = cep.replace(/(\d{5})(\d{3})/, '$1-$2')
    }
    return cep
}