# 🪑 CardFort - E-commerce de Cadeiras

Um sistema de e-commerce moderno para venda de cadeiras, desenvolvido com Laravel e MySQL, aplicando princípios de Clean Code.

## 👥 Equipe

- **Bruna Peruch**
- **Guilherme Brito** 
- **Rafael Castro**

## 📋 Sobre o Projeto

Este projeto representa uma **migração e refatoração completa** de um sistema PHP puro para Laravel, aplicando princípios de Clean Code. O resultado é um e-commerce robusto, escalável e de fácil manutenção.

### ✨ Principais Funcionalidades

- 🔐 **Sistema de Autenticação** - Login e cadastro de usuários
- 👤 **Gerenciamento de Usuários** - Perfis e permissões
- 📦 **Catálogo de Produtos** - Cadastro e exibição de cadeiras
- 🛒 **Carrinho de Compras** - Adicionar/remover produtos
- 📋 **Sistema de Pedidos** - Processamento de compras
- 🔍 **Filtros de Busca** - Filtros por preço e categoria

## 🏗️ Arquitetura e Clean Code

### Separação de Responsabilidades (MVC)
- **Models** (`app/Models/`) - Representação dos dados e regras de negócio
- **Views** (`resources/views/`) - Interface do usuário com Blade Templates  
- **Controllers** (`app/Http/Controllers/`) - Lógica de controle e comunicação

### Princípios Aplicados
- ✅ **Single Responsibility Principle (SRP)** - Cada classe tem uma única responsabilidade
- ✅ **DRY (Don't Repeat Yourself)** - Eliminação de código duplicado
- ✅ **Nomenclatura Clara** - Nomes descritivos e significativos
- ✅ **Segurança** - Proteção contra SQL Injection, XSS e CSRF

### Qualidade de Código
- 🔧 **Linter**: PHP_CodeSniffer com padrão PSR-12
- 🛡️ **Segurança**: Eloquent ORM, Blade templating, CSRF protection
- 🔄 **Interface Fluente**: Métodos encadeados para melhor legibilidade

## 🚀 Instalação e Configuração

### Pré-requisitos
- PHP 8.1+
- Composer
- MySQL 5.7+
- Git

### Passo a Passo

#### 1. 📥 Clone o repositório
```bash
git clone https://github.com/guilhermebp030504/cardfort.git
cd cardfort
```

#### 2. 📦 Instale as dependências
```bash
composer install
```

#### 3. 🛠️ Configure o ambiente
```bash
cp .env.example .env
```

Edite o arquivo `.env` com suas configurações de banco:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cardfort
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

#### 4. 🗄️ Configure o banco de dados
1. Crie o banco de dados no MySQL:
```sql
CREATE DATABASE cardfort;
```

2. Importe o backup:
```bash
mysql -u root -p cardfort < completo.sql
```

#### 5. 🔑 Gere a chave da aplicação
```bash
php artisan key:generate
```

#### 6. ▶️ Execute o servidor
```bash
php artisan serve
```

Acesse: **http://localhost:8000**

## 🛠️ Ferramentas de Desenvolvimento

### Linter e Formatação
```bash
# Instalar PHP_CodeSniffer
composer require --dev squizlabs/php_codesniffer

# Verificar código
./vendor/bin/phpcs --standard=PSR12 app/

# Corrigir automaticamente
./vendor/bin/phpcbf --standard=PSR12 app/Http/Controllers
./vendor/bin/phpcbf --standard=PSR12 app/Models
```

## 📁 Estrutura do Projeto

```
cardfort/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   └── ...
├── resources/
│   ├── views/              # Templates Blade
│   └── ...
├── database/
├── public/
├── .env.example           # Configurações de ambiente
```

## 🔧 Principais Melhorias Implementadas

### Antes (PHP Puro)
- ❌ Código misturado (HTML, PHP, SQL)
- ❌ Vulnerabilidades de segurança
- ❌ Repetição de código
- ❌ Nomenclatura confusa
- ❌ Difícil manutenção

### Depois (Laravel + Clean Code)
- ✅ Arquitetura MVC organizada
- ✅ Segurança robusta (ORM, CSRF, XSS protection)
- ✅ Código reutilizável e modular
- ✅ Nomenclatura clara e significativa
- ✅ Fácil manutenção e escalabilidade

## 🤝 Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto é um trabalho acadêmico desenvolvido para demonstrar a aplicação de princípios de Clean Code.

## 🔗 Links Úteis

- [Código Original](https://github.com/guilhermebp030504/cardfort)
- [Documentação Laravel](https://laravel.com/docs)
- [PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)

---

<div align="center">
  Desenvolvido com ❤️ pela equipe CardFort
</div>
