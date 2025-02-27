# PHP URL Shortener

## 📌 Project Description

This is a simple **PHP-based URL Shortener** that allows users to shorten long URLs into shorter, manageable links. It also tracks the number of clicks and provides user authentication for managing links using tailwind and php.

---

## ⚙️ Features

- 🔗 Shorten long URLs into unique short links
- 📊 Track click counts for each shortened URL
- 🔒 User authentication (Signup/Login)
- 🗑️ Manage and delete your shortened links
- 📈 View statistics for each link

---

## 🛠️ Installation

### 1️⃣ Prerequisites

Before you start, ensure you have the following installed:

- **PHP 7.4+**
- **MySQL** (or MariaDB)
- **Apache Server** (with `mod_rewrite` enabled)
- **Composer** (for dependency management)

### 2️⃣ Clone the Repository

```bash
$ git clone https://github.com/Zaid-deve/phpshort
$ cd phpshort
```

### 3️⃣ Configure Database

1. **Create a MySQL database**:

```sql
Import the phpshort.sql from sql to you database;
```

2. **Import the SQL file**:

```bash
$ mysql -u your_username -p phpshortener < database.sql
```

3. **Set up database credentials** in `db.php`:

```php
$host = "localhost";
$user = "your_username";
$pass = "your_password";
$dbname = "phpshortener";
$conn = new mysqli($host, $user, $pass, $dbname);
```

### 4️⃣ Enable Apache Rewrite Module

Make sure **mod\_rewrite** is enabled for Apache:

```bash
$ sudo a2enmod rewrite
$ sudo systemctl restart apache2
```

Then, check your `.htaccess` file to ensure proper routing:

```apache
RewriteEngine On
RewriteRule ^([a-zA-Z0-9]+)$ redirect.php?code=$1 [L]
```

### 5️⃣ Run the Project

Start your Apache server and visit:

```
http://localhost/phpshortener/
```

---

## 📖 Usage Guide

1. **Sign up or log in** to manage your links.
2. **Enter a long URL** and click "Shorten" to generate a short link.
3. **Copy the short link** and share it.
4. **Track clicks** and manage your links from the dashboard.

---

## 📜 Dependencies

- PHP (Core)
- MySQL (Database)
- Apache (Web Server)

---

## 🏗️ Future Enhancements

- 📌 Add QR code generation for short links
- 📌 Implement API for external integration
- 📌 User dashboard improvements

---

## 🛠️ Troubleshooting

❌ *Getting 404 Not Found?* Ensure `.htaccess` and `mod_rewrite` are correctly configured.

❌ *Database connection error?* Double-check `db.php` credentials.

❌ *Links not redirecting?* Restart Apache and check your `.htaccess` settings.

---

🚀 **Now your PHP URL Shortener is ready to use!**

