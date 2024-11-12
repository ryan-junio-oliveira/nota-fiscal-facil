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
- **Banco de Dados**: MySQL
- **Interface de Usuário**: Tailwind CSS
- **Bibliotecas de Geração de PDF**: DomPDF
- **Comunicação com SEFAZ**: API SEFAZ (via XML)

## Pré-requisitos

Para rodar este projeto, é necessário ter instalado:

- PHP (>= 8.0)
- Composer
- MySQL
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

Configuração SEFAZ

Configure no .env as credenciais e URL para comunicação com a SEFAZ.

Gere a Chave da Aplicação

php artisan key:generate


Uso
Inicie o Servidor de Desenvolvimento

php artisan serve
Acesse o Painel de Administração

Abra o navegador e acesse http://127.0.0.1:8000. Você verá o painel de administração, onde poderá realizar operações de vendas e gerar NF-e.

Cadastrar Clientes e Produtos

Antes de realizar uma venda, cadastre os clientes e produtos no sistema através das páginas de cadastro.

Criar uma Venda e Gerar NF-e

Acesse a seção de vendas e crie uma nova venda associando um cliente e os produtos desejados.
Após marcar a venda como “concluída”, a aplicação gerará automaticamente a NF-e e enviará para a SEFAZ.
O PDF da NF-e estará disponível para download após a conclusão do processo.
Estrutura de Pastas
app/Http/Controllers: Controladores principais, incluindo SaleController, ClientController, ProductController e NFeService.
resources/views: Templates de views do Laravel, incluindo o formulário de edição de NF-e e visualização.
routes/web.php: Definição de rotas da aplicação.
public/storage: Local onde o arquivo XML da NF-e será gerado e armazenado.
Notas Técnicas
Serviço de NF-e (NFeService)
O serviço NFeService é responsável por gerar o XML da NF-e e enviar para a SEFAZ:

Gerar XML: Converte os dados da venda em XML no formato exigido pela SEFAZ.
Enviar para SEFAZ: Faz a requisição para a SEFAZ, enviando o XML e recebendo a resposta.
Salvar no Banco de Dados: Registra a resposta da SEFAZ e o conteúdo do XML gerado.
Serviço de PDF (PDFService)
O PDFService utiliza o DomPDF para renderizar o modelo HTML da NF-e em um PDF que pode ser baixado ou visualizado pelo usuário.

Exemplo de Rotas Importantes
// Rota para visualizar as vendas
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');

// Rota para criar uma nova venda
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

// Rota para gerar e visualizar a NF-e de uma venda específica
Route::get('/sales/{id}/nfe', [NFeController::class, 'show'])->name('nfe.show');
Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar PRs com sugestões e melhorias.

Licença
Este projeto é licenciado sob a MIT License. Para mais detalhes, consulte o arquivo LICENSE.

Autor: [Seu Nome]


Este `README.md` fornece uma visão geral, instruções de instalação e uso, além de detalhes técnicos e exemplos de rotas, ajudando qualquer colaborador ou usuário a entender e usar seu sistema com eficiência.