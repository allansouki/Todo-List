# Projeto ToDo (Laravel)

## ⚡ Como executar o projeto

```bash
# 1️⃣ Instale as dependências do PHP
composer install

# 2️⃣ Instale as dependências do frontend
npm install

# 3️⃣ Compile os assets
npm run dev

# 4️⃣ Rode as migrations
php artisan migrate

# 5️⃣ Crie um usuário no Tinker
php artisan tinker
\App\Models\User::factory()->create([
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
]);

# 6️⃣ Popule as tabelas com dados fake
\App\Models\Category::factory()->count(5)->create();
\App\Models\Task::factory()->count(5)->create();

# 7️⃣ Inicie o servidor local
php artisan serve
