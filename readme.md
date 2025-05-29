# 🪑 CardFort - E-commerce de Cadeiras

Um sistema de e-commerce moderno para venda de cadeiras, desenvolvido com Laravel e MySQL, aplicando princípios de Clean Code para entregar uma solução robusta, escalável e de fácil manutenção.

## 👥 Equipe

- **Bruna Peruch**
- **Guilherme Brito** 
- **Rafael Castro**

## 📋 Sobre o Projeto

Este projeto representa uma **migração e refatoração completa** de um sistema PHP puro para Laravel, aplicando princípios de Clean Code. A migração não apenas moderniza a base tecnológica, mas também entrega um código mais preparado para futuras alterações, manutenções e aprimoramentos.

O projeto original funcionava, mas apresentava desafios típicos de sistemas desenvolvidos sem uma estrutura e padrões bem definidos, como:
- Acoplamento excessivo entre lógica de negócio, acesso a dados e apresentação
- Dificuldade na reutilização de código
- Complexidade crescente na adição de novas funcionalidades ou correção de bugs
- Vulnerabilidades de segurança
- Código misturado (HTML, PHP, SQL em um mesmo arquivo)

### ✨ Principais Funcionalidades

- 🔐 **Sistema de Autenticação** - Login e cadastro de usuários com segurança robusta
- 👤 **Gerenciamento de Usuários** - Perfis, permissões e controle de sessão
- 📦 **Catálogo de Produtos** - Cadastro e exibição de cadeiras com detalhes completos
- 🛒 **Carrinho de Compras** - Adicionar/remover produtos com persistência
- 📋 **Sistema de Pedidos** - Processamento completo de compras
- 🔍 **Filtros de Busca** - Filtros avançados por preço e categoria
- 🔒 **Middleware de Autenticação** - Proteção de rotas sensíveis
- 🎨 **Interface Responsiva** - Design adaptável para diferentes dispositivos

## 🏗️ Arquitetura e Clean Code

### Separação de Responsabilidades (MVC)

A adoção do padrão MVC no Laravel proporcionou uma organização clara das responsabilidades:

- **Models** (`app/Models/`) - Representação dos dados e regras de negócio
  - `Cadastro.php` - Gerenciamento de usuários e autenticação
  - `Cadeira.php` - Catálogo de cadeiras
  - `Categoria.php` - Categorias das cadeiras 
  - `Material.php` - Lista de materias das cadeiras

- **Views** (`resources/views/`) - Interface do usuário com Blade Templates
  - Layout principal com componentes reutilizáveis
  - Templates específicos para cada funcionalidade
  - Sistema de herança de layouts

- **Controllers** (`app/Http/Controllers/`) - Lógica de controle e comunicação
  - `LoginController` - Gerenciamento de login/logout
  - `ComprasController` - Processamento de compras e filtros

**Antes (PHP Puro):**
No código original, era comum encontrar tudo misturado em um mesmo arquivo: consultas ao banco, regras de negócio (como calcular totais ou verificar se o usuário está logado) e até o HTML e JavaScript da interface, como acontecia nos arquivos `principal.php` ou `login.php`.

**Depois (Laravel):**
A separação entre as camadas é feita de forma clara e organizada, facilitando manutenção e testes.

### Princípios de Clean Code Aplicados

#### ✅ **Single Responsibility Principle (SRP)**
Durante a refatoração, as responsabilidades foram separadas em funções e classes específicas:
- Verificação da sessão através de middlewares
- Lógica de buscar informações do usuário nos Controllers
- Filtros de busca no método `aplicarFiltroPreco()`
- Acesso ao banco de dados nas classes Model

**Exemplo:** O antigo `login_bd.php` foi substituído por um método `login` dentro do `LoginController`, deixando claro que aquela função lida especificamente com o processo de login.

#### ✅ **DRY (Don't Repeat Yourself)**
Eliminação de código duplicado através de:
- Configuração centralizada do banco de dados no `.env`
- Middleware `Authenticate` para verificação de sessão
- View Composers para dados do usuário logado
- Sistema de layouts Blade para elementos de interface

**Antes:** Código como `isset($_SESSION['logado'])` era repetido em múltiplas páginas.
**Depois:** Middleware centralizado garante autenticação de forma automática.

#### ✅ **Nomenclatura Clara e Significativa**
Transformação de nomes genéricos em descritivos:

| Antes | Depois | Melhoria |
|-------|--------|----------|
| `$r` | `$query` | Clareza sobre o propósito da variável |
| `$t` | Removido | Eliminação de variável desnecessária |
| `$cod` | `$userId` | Nome autodescritivo |
| `login_bd.php` | `AuthController::login()` | Organização e clareza de responsabilidade |

#### ✅ **Segurança Robusta**
- **Eloquent ORM**: Proteção automática contra SQL Injection através de parameter binding
- **Blade Templates**: Escape automático de variáveis com `{{ }}` prevenindo XSS
- **CSRF Protection**: Tokens automáticos em todos os formulários
- **Middleware de Autenticação**: Controle granular de acesso às rotas

**Antes:** Queries manuais vulneráveis e dados exibidos diretamente no HTML.
**Depois:** Camadas múltiplas de proteção automática.

### Interface Fluente

Implementação de métodos encadeados para melhor legibilidade:

```php
// ComprasController.php
$this->aplicarFiltroPreco($query, $request->preco)

// LoginController.php
$user = Cadastro::where('usuario', $credentials['usuario'])->first();

return back()->withErrors([
    "usuario" => "As informações inseridas não existem ou estão incorretas.",
])->onlyInput("usuario");

// Sessão
$request->session()->regenerate();
$request->session()->invalidate();
$request->session()->regenerateToken();
```

### Qualidade de Código

#### 🔧 **Linter: PHP_CodeSniffer**
Implementação de padrões de codificação PSR-12:

```bash
# Instalação
composer require --dev squizlabs/php_codesniffer

# Verificação de código
./vendor/bin/phpcs --standard=PSR12 app/

# Correção automática
./vendor/bin/phpcbf --standard=PSR12 app/Http/Controllers
./vendor/bin/phpcbf --standard=PSR12 app/Models
```

**Exemplo de correção automática:**
```
FILE: app/Models/Categoria.php
FOUND 2 ERRORS AFFECTING 2 LINES
- End of line character is invalid; expected "\n" but found "\r\n"
- Expected 1 newline at end of file; 0 found
PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
```

## 🚀 Instalação e Configuração

### Pré-requisitos
- **PHP 8.1+**
- **Composer**
- **MySQL 5.7+**
- **Git**

### Passo a Passo Detalhado

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

**4.1. Crie o banco de dados no MySQL:**
```sql
CREATE DATABASE cardfort;
```

**4.2. Importe o backup completo:**
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

#### 7. 🔑 Usuário e senha
```bash
Usuário: adm
Senha: adm
```

**Acesse:** http://localhost:8000

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

### Comparativo: Antes vs Depois

| Aspecto | Antes (PHP Puro) | Depois (Laravel + Clean Code) |
|---------|------------------|-------------------------------|
| **Organização** | ❌ Código misturado (HTML, PHP, SQL) | ✅ Arquitetura MVC organizada |
| **Segurança** | ❌ Vulnerabilidades de SQL Injection, XSS | ✅ Proteção robusta (ORM, CSRF, XSS protection) |
| **Reutilização** | ❌ Repetição excessiva de código | ✅ Código modular e reutilizável |
| **Nomenclatura** | ❌ Nomes genéricos e confusos | ✅ Nomenclatura clara e significativa |
| **Manutenibilidade** | ❌ Difícil manutenção e debugging | ✅ Fácil manutenção e escalabilidade |
| **Testes** | ❌ Impossível testar unitariamente | ✅ Testável com PHPUnit |
| **Performance** | ❌ Queries não otimizadas | ✅ Eloquent ORM com otimizações |

### Benefícios Obtidos

1. **🔒 Segurança Aprimorada**
   - Proteção automática contra vulnerabilidades comuns
   - Validação de entrada robusta
   - Controle de acesso granular

2. **📈 Escalabilidade**
   - Arquitetura preparada para crescimento
   - Separação clara de responsabilidades
   - Facilidade para adicionar novas funcionalidades

3. **🛠️ Manutenibilidade**
   - Código autodocumentado
   - Debugging simplificado
   - Refatoração segura

4. **👥 Colaboração**
   - Padrões consistentes
   - Código legível para toda a equipe
   - Onboarding facilitado

## 🧪 Testes e Qualidade

### Ferramentas de Desenvolvimento

```bash
# Verificar qualidade do código
./vendor/bin/phpcs --standard=PSR12 app/

# Corrigir automaticamente problemas de formatação
./vendor/bin/phpcbf --standard=PSR12 app/

# Executar testes 
php artisan test
```

### Padrões Implementados

- **PSR-12**: Padrão de codificação PHP
- **PSR-4**: Autoloading de classes
- **Eloquent**: ORM para operações de banco
- **Blade**: Template engine para views

## 📚 Recursos de Aprendizado

### Clean Code Principles
- **Single Responsibility**: Uma classe, uma responsabilidade
- **DRY**: Don't Repeat Yourself
- **SOLID**: Princípios de design orientado a objetos
- **Readable Code**: Código que se explica

### Laravel Features Utilizadas
- **Eloquent ORM**: Para operações de banco
- **Blade Templates**: Sistema de templates
- **Middleware**: Filtros de requisição
- **Artisan Commands**: Comandos CLI
- **Service Container**: Injeção de dependência

## 🔗 Links Úteis

- [📂 Código Original](https://github.com/guilhermebp030504/cardfort)
- [📖 Documentação Laravel](https://laravel.com/docs)
- [🎯 PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)
- [🧹 Clean Code Principles](https://clean-code-developer.com/)
- [🏗️ SOLID Principles](https://en.wikipedia.org/wiki/SOLID)

## 📄 Licença

Este projeto é um trabalho acadêmico desenvolvido para demonstrar a aplicação prática de princípios de Clean Code e migração de sistemas legados para frameworks modernos.

<div align="center">

**Desenvolvido com ❤️ pela equipe CardFort**

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)

</div>
