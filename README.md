# PHP MVC Todo App

A minimal and clean Todo application built with pure PHP using a custom MVC architecture.
This project focuses on clean structure, separation of concerns, and a modern responsive UI.

---

## ✨ Features

* Create, update, and delete todos
* Status system (e.g. pending, planned, done)
* Component-based UI (reusable Todo cards)
* Custom MVC architecture (no framework)
* Responsive design (mobile-friendly)
* Clean and modern styling with CSS variables

---

## 🏗️ Project Structure

```
ProjektTodoApp/
│
├── src/
│   ├── components/     # Reusable UI components (e.g. TodoCard)
│   ├── controllers/    # Application logic (HomeController)
│   ├── database/       # Database connection
│   ├── models/         # Data handling (TodoModel)
│   └── router/         # Custom routing system
│
├── public/             # Public entry point
├── views/              # UI templates
├── index.php           # App bootstrap
├── autoloader.php      # Class autoloading
└── .htaccess           # URL rewriting
```

---

## ⚙️ Technologies

* PHP (no framework)
* Custom MVC pattern
* HTML5
* CSS (with variables and responsive design)

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/your-username/php-mvc-todo-app.git
cd php-mvc-todo-app
```

### 2. Setup your environment

Make sure you have:

* PHP >= 8.x
* A local server (e.g. XAMPP, Laragon, or PHP built-in server)

### 3. Start the server

Using PHP built-in server:

```bash
php -S localhost:8000
```

Then open:

```
http://localhost:8000
```

---

## 🧠 Architecture

This project follows a simple MVC pattern:

* **Model** → Handles database logic
* **View** → Responsible for rendering UI
* **Controller** → Connects logic and views
* **Router** → Maps requests to controllers

---

## 🎨 UI Highlights

* Gradient header with responsive layout
* Card-based todo system
* Hover and interaction effects
* Mobile-first improvements using `clamp()` and flexible grids

---

## 📌 Future Improvements

* AJAX (no page reload on actions)
* Drag & drop for todos
* User authentication
* Filtering & search
* API layer

---

