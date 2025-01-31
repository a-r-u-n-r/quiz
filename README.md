# Quizify - Quiz Management System

## 📌 Project Overview
**Quizify** is a modern and interactive **Quiz Management System** built with Laravel. It allows users to take quizzes, view leaderboards, track achievements, and manage quiz-related functionalities efficiently. The system is designed to provide a seamless user experience with real-time updates and an intuitive interface.

## 🚀 Features
- 📋 **Quiz Management** - Create, update, and delete quizzes with multiple questions.
- 👨‍💻 **User Authentication** - Secure login & registration (Laravel Jetstream).
- 🏆 **Leaderboard** - Displays top scorers for each quiz.
- 📊 **User Achievements** - Tracks progress and awards achievements.
- 📈 **Admin Dashboard** - Manage quizzes, users, and reports.

## 🏗️ Tech Stack
| Technology | Description |
|------------|-------------|
| **Laravel** | Backend framework |
| **MySQL** | Database management |
| **Bootstrap** | Frontend styling |
| **Blade** | Laravel templating engine |
| **JavaScript** | Dynamic frontend interactions |
| **Jetstream** | User authentication |

## 🎯 Installation Guide
Follow these steps to set up **Quizify** on your local machine:

### 1️⃣ Clone the Repository
```sh
git clone https://github.com/shahinalam10/quizify.git
cd quizify
```

### 2️⃣ Install Dependencies
```sh
composer install
npm install
```

### 3️⃣ Configure Environment Variables
```sh
cp .env.example .env
php artisan key:generate
```
Set up your database credentials in the `.env` file.

### 4️⃣ Run Migrations & Seed Database
```sh
php artisan migrate --seed
```

### 5️⃣ Start the Development Server
```sh
php artisan serve
```
Visit `http://127.0.0.1:8000` to access Quizify.

## 🔥 Usage
### 📝 Creating a Quiz
1. Log in as an admin.
2. Navigate to `Manage Quizzes`.
3. Click `Create New Quiz` and add questions.

### 🎮 Taking a Quiz
1. Browse available quizzes.
2. Click `Start Quiz`.
3. Submit answers and view results instantly.

### 🏅 Checking Leaderboard
1. Visit the `Leaderboard` section.
2. View rankings based on quiz scores.
   
## Admin Credentials
Use the following credentials to log in as an admin:
- **Email**: mdshaheenalam85@gmail.com
- **Password**: 12341234

## Video Overview
For a detailed walkthrough of the project, watch the video below:

[**Watch Video Overview**](https://youtu.be/Uf8_KfRIgfY?si=TGEZ9v8iXAlWmCHd)

## 🛠️ API Routes (Optional)
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/quizzes` | Fetch all quizzes |
| GET | `/api/quiz/{id}` | Fetch quiz details |
| POST | `/api/quiz/start` | Start a quiz |
| POST | `/api/quiz/submit` | Submit quiz answers |

## 🛡️ Security Measures
- **CSRF Protection** enabled by default.
- **Sanctum Authentication** for API security.
- **Rate Limiting** for API endpoints.
- **Role-based Access Control (RBAC)** for admin/user roles.

## 📄 License
This project is licensed under the **MIT License**.

## 📩 Contact
For any queries, reach out via email at **mshahinalam01@gmail.com**.
