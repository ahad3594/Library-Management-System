# 📚 Library Management System

A web-based Library Management System developed using **PHP and MySQL**.  
This system enables administrators to manage books, issue and return books, and maintain accurate library records efficiently.

---

## 🚀 Project Overview

The Library Management System is designed to automate basic library operations.  
It replaces manual record-keeping with a digital solution that improves efficiency and accuracy.

This project demonstrates backend development, database design, and session-based authentication using core web technologies.

---

## ✨ Features

- Admin Registration & Login
- Session-Based Authentication
- Add New Books
- View Available Books
- Issue Books to Students
- Return Issued Books
- Automatic Quantity Management
- Database Integration using MySQL

---

## 🛠 Technologies Used

- PHP
- MySQL
- HTML
- CSS
- WAMP Server

---

## 🗄 Database Setup

1. Import `library_db.sql` into phpMyAdmin.
2. Ensure your database name is `library_db`.
3. Update database credentials in `db.php` if required.
4. Run the project on localhost using WAMP.

---

## 📂 Project Structure

Library-Management-System/
│── db.php
│── login.php
│── register.php
│── dashboard.php
│── add_book.php
│── view_books.php
│── issue_book.php
│── issued_books.php
│── logout.php
│── style.css
│── library_db.sql


---

## ⚠️ Current Limitations

- Passwords are stored in plain text (no hashing implemented)
- No email verification system
- No password reset functionality
- No search or filtering feature for books
- No role-based access control (Admin only)
- No input sanitization using prepared statements

---

## 🚀 Future Improvements

- Implement password hashing using bcrypt
- Add email verification during registration
- Add password reset functionality
- Implement role-based access control (Admin / Student)
- Add book search and filter feature
- Add fine calculation for late returns
- Improve UI with responsive design
- Implement prepared statements for SQL security
- Deploy system on live hosting

---

## 🔐 Security Note

This project was developed for academic purposes.  
Security enhancements can be implemented in future versions.

---

## 📌 Version

Current Version: 1.0

---

## 👨‍💻 Author

Malik Muhammad Ahad
LinkedIn: www.linkedin.com/in/malik-muhammad-ahad-a7210b308

---

## 📜 License

This project is licensed under the MIT License.
