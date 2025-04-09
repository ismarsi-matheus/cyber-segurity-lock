# Cyber-Security-Lock

Projeto de programação desenvolvido por **Antônio Gabriel** e **Matheus Leonardo**.

## 📌 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Funcionalidades](#funcionalidades)
  - [Tela de Login](#tela-de-login)
  - [Tela de Registro](#tela-de-registro)
  - [Tela de Redefinição de Senha](#tela-de-redefinição-de-senha)
  - [Tela de Usuário](#tela-de-usuário)
  - [Tela de Gerenciamento de Senhas](#tela-de-gerenciamento-de-senhas)
  - [Outras Telas](#outras-telas)
- [Fluxo de Telas](#fluxo-de-telas)
- [Validações](#validações)
- [Rodapé e Recursos Comuns](#rodapé-e-recursos-comuns)
- [Licença](#licença)

## 🛡 Sobre o Projeto

O **Cyber-Security-Lock** é um sistema de gerenciamento de senhas projetado para ser uma solução prática e segura para o armazenamento de credenciais. Ele oferece aos usuários uma interface amigável para armazenar, organizar e proteger suas informações sensíveis, utilizando práticas modernas de segurança como autenticação e criptografia.

### Objetivo do Projeto

O objetivo principal do **Cyber-Security-Lock** é proporcionar aos usuários finais uma solução completa para gerenciar suas senhas e informações pessoais de forma segura, minimizando riscos de exposição de dados e facilitando o acesso às credenciais armazenadas. Este projeto também serve como um estudo prático de tecnologias e boas práticas de desenvolvimento web.

## 🛠 Tecnologias Utilizadas

- **Front-end:** HTML, CSS, JavaScript
- **Back-end:** PHP
- **Banco de Dados:** MySQL
- **Framework:** Bootstrap

## ⚡ Funcionalidades

### 🔐 Tela de Login
- **Campos:** Email e Senha
- **Validação:**
  - Verifica se os campos foram preenchidos.
  - Confirma se as credenciais existem no banco de dados.
- **Recursos:**
  - Opção "Esqueceu a senha?" para redefinir credenciais.

### 📝 Tela de Registro
- **Campos:** Nome de Usuário, Email, CPF, Senha e Confirmação de Senha.
- **Validação:**
  - Verifica se os campos estão preenchidos corretamente.
  - Validação de CPF.
  - Confere se a senha atende aos critérios de segurança.

### 🔄 Tela de Redefinição de Senha
- **Campos:** CPF, Email, Nova Senha e Confirmação de Senha.
- **Validação:**
  - Confere se CPF e Email pertencem a um usuário válido.
  - Exige que a nova senha tenha um formato seguro.

### 👤 Tela de Usuário
- Exibe informações do usuário (Nome, Email, CPF, etc.).
- Opção para editar perfil e alterar senha.

### 🔑 Tela de Gerenciamento de Senhas
- **Recursos:**
  - Exibe lista de senhas armazenadas com segurança.
  - Senhas mascaradas com asteriscos.
  - Opção para revelar senha ao clicar no ícone de "olho".
  - Filtros para ordenação alfabética e por data.
  - Função de pesquisa para localizar senhas rapidamente.

### 📌 Outras Telas
- **Sobre Nós:** Explica o propósito do projeto e sua equipe.
- **Suporte:** Respostas a perguntas frequentes e opção de contato.
- **Adição de Senha:** Permite cadastrar novas credenciais.
- **Detalhamento de Senha:** Exibe informações de uma senha específica.

## 🔄 Fluxo de Telas
1. **Abertura do sistema** → Exibe a **Tela de Login**
2. **Login bem-sucedido** → Redireciona para **Tela de Gerenciamento de Senhas**
3. **Clique em "Esqueceu a senha?"** → Redireciona para **Tela de Redefinição de Senha**
4. **Registro de novo usuário** → Após conclusão, redireciona para **Tela de Login**
5. **No Gerenciador de Senhas:**
   - Clique em **Adicionar Senha** → Abre a **Tela de Adição de Senha**
   - Clique em uma senha → Abre a **Tela de Detalhamento de Senha**
   - Clique em **Usuário** → Abre a **Tela de Usuário**
   - Clique em **Sobre Nós** → Abre a **Tela de Sobre Nós**
   - Clique em **Suporte** → Abre a **Tela de Suporte**

## ✅ Validações
| Campo               | Validação                                   |
|---------------------|---------------------------------------------|
| Email               | Deve ser um email válido                   |
| Senha               | Mínimo de 8 caracteres, com letras maiúsculas, minúsculas e números |
| CPF                 | Formato válido e não repetido              |
| Confirmação de Senha | Deve ser idêntica à senha informada        |

## 📌 Rodapé e Recursos Comuns
- Ícones de redes sociais:
  - WhatsApp ✅
  - Email ✅
  - Instagram ✅
- Links para **Suporte** e **Sobre Nós**.
- Direitos autorais: "Todos os direitos reservados" no rodapé de todas as páginas.

## 📜 Licença
Este projeto está licenciado sob a [MIT License](LICENSE).
