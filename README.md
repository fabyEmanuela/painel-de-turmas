# painel-de-turmas
## Como rodar o projeto localmente

1. **Pré-requisitos**
    - PHP 7.4 ou superior instalado em sua máquina.
    -Mysql

2. **Instalação**
    - Clone este repositório:
      ```bash
      git clone https://github.com/seu-usuario/painel-de-turmas.git
      cd painel-de-turmas
      ```
    - Instale as dependências:
      ```bash
      composer install
      ```
3. **Banco de dados **
   -Para replicar o banco de dados, utilize o arquivo dump.sql e importe-o para um banco chamado fiap_project em sua instância local.
   -E necessario colocar as confirguração  com senha e nome do banco nas respectivas models
4. **Executando o servidor local**
    - Utilize o servidor embutido do PHP:
      ```bash
      php -S localhost:8000 -t public
      ```
    - Acesse [http://localhost:8000](http://localhost:8000) no seu navegador.

5. **Configuração adicional**
    - Caso necessário, configure variáveis de ambiente ou arquivos de configuração conforme instruções do projeto.
6. **Para gerar Cpf para teste use o site a baixo
   -https://www.4devs.com.br/gerador_de_cpf


