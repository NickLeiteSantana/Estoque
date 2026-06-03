# 📦 Sistema de Controle de Estoque

 Descrição

Sistema web desenvolvido para controle de estoque, permitindo o gerenciamento de produtos, entradas e saídas, com geração de relatórios e dashboard interativo.

---

 Funcionalidades

* Cadastro de produtos
* Edição e exclusão de produtos
* Controle de entrada e saída de estoque
* Bloqueio de estoque negativo
* Histórico de movimentações
* Dashboard com métricas
* Relatórios em PDF
* Sistema de autenticação de usuários

---

 Tecnologias Utilizadas

* PHP
* Laravel
* MySQL
* Bootstrap
* Chart.js
* DomPDF

---
 Ambiente de Desenvolvimento

O projeto foi desenvolvido utilizando:

* PHP 8+
* MySQL
* Laravel

Durante o desenvolvimento, foi utilizado o XAMPP para gerenciamento do servidor local (Apache e MySQL).

O sistema pode ser executado em qualquer ambiente que suporte PHP e banco de dados MySQL.

---

Funcionalidades do Dashboard

* Total de produtos
* Total em estoque
* Total de entradas e saídas
* Alerta de estoque baixo

---

Relatórios

O sistema permite gerar relatórios em PDF com:

* Lista de produtos
* Status de estoque
* Resumo geral

---

Como Rodar o Projeto

1. Clonar o repositório:

```
git clone URL_DO_SEU_PROJETO
```

2. Entrar na pasta:

```
cd estoque
```

3. Instalar dependências:

```
composer install
```

4. Configurar o .env:

```
cp .env.example .env
```

5. Configurar o banco de dados no arquivo .env:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=estoque
DB_USERNAME=root
DB_PASSWORD=
```

6. Gerar chave da aplicação:

```
php artisan key:generate
```

7. Rodar as migrations:

```
php artisan migrate
```

8. Iniciar servidor:

```
php artisan serve
```

---

Autor

Projeto desenvolvido por Lara De Moura Sorrilha
