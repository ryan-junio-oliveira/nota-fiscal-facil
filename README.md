# Sistema de Gestão de Vendas e Emissão de NF-e

Este projeto é uma aplicação web desenvolvida em Laravel para a gestão de vendas, incluindo funcionalidades como o cadastro de clientes, produtos, geração de NF-e (Nota Fiscal Eletrônica) e integração com a SEFAZ para envio de NF-e. Além disso, a aplicação permite a exportação de NF-e em PDF para download.

## Funcionalidades

- **Cadastro de Clientes e Produtos**: CRUD completo para clientes e produtos.
- **Gestão de Vendas**: Registro de vendas, associando produtos e clientes, e cálculo automático do valor total da venda.
- **Emissão de NF-e**: Geração automática de NF-e ao completar uma venda.
- **Envio para SEFAZ**: Integração com a SEFAZ para envio e autenticação da NF-e.
- **Exportação de NF-e em PDF**: Possibilidade de download de um PDF formatado da NF-e para armazenamento ou impressão.

## Tecnologias Utilizadas

- **Back-End**: Laravel (PHP)
- **Banco de Dados**: Banco de dados Relacional
- **Interface de Usuário**: Tailwind CSS, Templates blade com alpine Js.
- **Bibliotecas de Geração de PDF**: DomPDF
- **Comunicação com SEFAZ**: API SEFAZ (via XML)

## Pré-requisitos

Para rodar este projeto, é necessário ter instalado:

- PHP (>= 8.0)
- Composer
- Banco de dados relacional
- Node.js e npm
- Extensão `cURL` do PHP para comunicação com SEFAZ
- Servidor Nginx ou Apache para deploy

## Instalação e Configuração

1. **Clone o Repositório**

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

2. **Instale as dependencias do laravel**

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```
3. **Configure o Banco de Dados**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

4. **Execute as migrações**

```bash
php artisan migrate
```

5. **Faça o build dos assets e instale dependências**

```bash
npm install && npm run dev
```

6. **Configuração SEFAZ**

Configure no .env as credenciais e URL para comunicação com a SEFAZ.

7. **Gere a Chave da Aplicação**
```bash
php artisan key:generate
```

### Uso

1. **Inicie o Servidor de Desenvolvimento**

```bash
php artisan serve

npm run dev
```

2. **Cadastrar Clientes e Produtos**

- Antes de realizar uma venda, cadastre os clientes e produtos no sistema através das páginas de cadastro.

3. **Criar uma Venda e Gerar NF-e**

- Acesse a seção de vendas e crie uma nova venda associando um cliente e os produtos desejados.
- Após marcar a venda como “concluída”, a aplicação gerará automaticamente a NF-e e enviará para a SEFAZ.
- O PDF da NF-e estará disponível para download após a conclusão do processo.

### Contribuição
   
- Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar PRs com sugestões e melhorias.

### Licença

- Este projeto é licenciado sob a MIT License. Para mais detalhes, consulte o arquivo LICENSE.

### Autor: Ryan Junio Oliveira

Este `README.md` fornece uma visão geral, instruções de instalação e uso, além de detalhes técnicos e exemplos de rotas, ajudando qualquer colaborador ou usuário a entender e usar seu sistema com eficiência.
