# Pinspire 📌

A Pinterest-inspired visual discovery web app built with **Laravel**, **Tailwind CSS v4**, and **Alpine.js**. Users can browse pins, save favorites, and organize boards. Admins can upload and manage pins and users.

---

## Requirements

Before you begin, make sure you have the following installed:

- [PHP 8.2+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js 18+ and npm](https://nodejs.org/)
- [XAMPP](https://www.apachefriends.org/) (for Apache + MySQL)
- [Git](https://git-scm.com/)

---

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/pc-builder.git
cd pc-builder
```

Or if you already have the project folder, navigate into it:

```bash
cd C:\xampp\htdocs\pc-builder
```

---

### 2. Install PHP Dependencies

```bash
composer install
```

---

### 3. Install Node Dependencies

```bash
npm install
```

---

### 4. Set Up Environment File

Copy the example environment file and configure it:

```bash
cp .env.example .env
```

Then generate the application key:

```bash
php artisan key:generate
```

---

### 5. Configure the Database

Open `.env` and update these values to match your local XAMPP MySQL setup:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pinspire
DB_USERNAME=root
DB_PASSWORD=
```

> **Note:** By default, XAMPP uses `root` with no password. Create a database named `pinspire` in [phpMyAdmin](http://localhost/phpmyadmin).

---

### 6. Run Migrations

```bash
php artisan migrate
```

---

### 7. Link Storage for Image Uploads

```bash
php artisan storage:link
```

This makes uploaded images publicly accessible via the browser.

---

### 8. (Optional) Seed the Database

```bash
php artisan db:seed
```

This creates a test user:
- **Email:** `test@example.com`
- **Password:** `password`

---

### 9. Build Frontend Assets

For **development** (with hot reload):

```bash
npm run dev
```

For **production**:

```bash
npm run build
```

> Keep `npm run dev` running in a separate terminal while developing.

---

### 10. Start the Application

Make sure **XAMPP Apache and MySQL** are running, then visit:

```
http://localhost/pc-builder/public
```

Or if using Laravel's built-in server:

```bash
php artisan serve
```

Then visit: `http://127.0.0.1:8000`

---

## Creating an Admin User

After registering an account, you can promote it to admin via **phpMyAdmin** or **Tinker**:

```bash
php artisan tinker
```

```php
\App\Models\User::where('email', 'your@email.com')->update(['is_admin' => true]);
```

Then access the admin panel at:

```
/admin/dashboard
```

---

## Tech Stack

| Layer      | Technology                        |
|------------|-----------------------------------|
| Backend    | Laravel 11 (PHP)                  |
| Frontend   | Blade Templates, Alpine.js        |
| Styling    | Tailwind CSS v4 + Vite            |
| Database   | MySQL (via XAMPP)                 |
| Storage    | Laravel Local Disk (public)       |

---

## Common Issues

**`npm run dev` fails with "Can't resolve tailwindcss"**
```bash
npm install -D tailwindcss @tailwindcss/vite
```

**Images not showing after upload**
```bash
php artisan storage:link
```

**500 error on first run**
```bash
php artisan key:generate
php artisan config:clear
```

**Database connection refused**
Make sure XAMPP MySQL is running and the `DB_DATABASE` exists in phpMyAdmin.

---

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).
