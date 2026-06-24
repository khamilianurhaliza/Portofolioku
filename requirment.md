==================================================
SOFTWARE ARCHITECTURE
==================================================

Project harus mengikuti prinsip:

- Clean Code
- SOLID Principle
- DRY (Don't Repeat Yourself)
- KISS (Keep It Simple)
- Separation of Concerns
- Modular Architecture
- Reusable Components
- Maintainable Code
- Production Ready Architecture

Jangan membuat kode yang berantakan, duplikasi, atau sulit dipelihara.

==================================================
CODE QUALITY RULES
==================================================

Semua kode harus:

- Mudah dibaca
- Mudah dikembangkan
- Mudah di-debug
- Mudah di-test
- Konsisten

Gunakan:

- Meaningful variable naming
- Meaningful function naming
- Meaningful class naming
- Consistent coding style
- Consistent folder structure

Hindari:

- Spaghetti Code
- God Class
- God Function
- Hardcoded Data
- Hardcoded URL
- Duplicate Code
- Deep Nested Condition
- Magic Number
- Magic String

==================================================
PHP STANDARDS
==================================================

Ikuti standar:

- PSR-1
- PSR-4
- PSR-12

Gunakan:

- Namespace
- Autoloading
- Dependency Injection sederhana
- Service Layer
- Repository Pattern jika diperlukan

Pisahkan:

- Controller
- Service
- Repository
- Model
- View

Controller tidak boleh berisi business logic.

==================================================
FOLDER STRUCTURE
==================================================

Gunakan struktur:

project-root/

├── app/
│   ├── Controllers/
│   ├── Services/
│   ├── Repositories/
│   ├── Models/
│   ├── Middleware/
│   ├── Requests/
│   ├── Helpers/
│   └── Views/
│
├── config/
│
├── public/
│   ├── assets/
│   ├── uploads/
│   └── index.php
│
├── routes/
│
├── storage/
│   ├── logs/
│   ├── cache/
│   └── sessions/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── vendor/
│
└── composer.json

==================================================
DATABASE STANDARDS
==================================================

Gunakan:

- Foreign Key
- Index Optimization
- Proper Data Type
- Created At
- Updated At

Semua query wajib menggunakan:

PDO Prepared Statement

Tidak boleh menggunakan query raw yang rentan SQL Injection.

==================================================
FRONTEND STANDARDS
==================================================

Pisahkan:

- Components
- Layouts
- Pages
- Utilities

Gunakan:

- Reusable Component
- Modular Javascript
- Event Delegation
- Lazy Loading

Jangan membuat file javascript berukuran sangat besar.

==================================================
JAVASCRIPT RULES
==================================================

Gunakan:

- ES6 Modules
- Async Await
- Reusable Functions
- Utility Functions

Pisahkan:

assets/js/

├── pages/
├── modules/
├── services/
├── components/
└── app.js

Hindari:

- Global Variables
- Callback Hell
- Duplicate Logic

==================================================
TAILWIND RULES
==================================================

Gunakan:

- Reusable Components
- Utility First Approach
- Consistent Spacing System
- Responsive Design

Buat:

- Button Component
- Card Component
- Modal Component
- Form Component
- Table Component

==================================================
ERROR HANDLING
==================================================

Implementasikan:

- Global Exception Handler
- Error Logging
- Activity Logging
- User Friendly Error Page

Buat:

- 404 Page
- 403 Page
- 500 Page

==================================================
DOCUMENTATION
====================================================================================================
SOFTWARE ARCHITECTURE
==================================================

Project harus mengikuti prinsip:

- Clean Code
- SOLID Principle
- DRY (Don't Repeat Yourself)
- KISS (Keep It Simple)
- Separation of Concerns
- Modular Architecture
- Reusable Components
- Maintainable Code
- Production Ready Architecture

Jangan membuat kode yang berantakan, duplikasi, atau sulit dipelihara.

==================================================
CODE QUALITY RULES
==================================================

Semua kode harus:

- Mudah dibaca
- Mudah dikembangkan
- Mudah di-debug
- Mudah di-test
- Konsisten

Gunakan:

- Meaningful variable naming
- Meaningful function naming
- Meaningful class naming
- Consistent coding style
- Consistent folder structure

Hindari:

- Spaghetti Code
- God Class
- God Function
- Hardcoded Data
- Hardcoded URL
- Duplicate Code
- Deep Nested Condition
- Magic Number
- Magic String

==================================================
PHP STANDARDS
==================================================

Ikuti standar:

- PSR-1
- PSR-4
- PSR-12

Gunakan:

- Namespace
- Autoloading
- Dependency Injection sederhana
- Service Layer
- Repository Pattern jika diperlukan

Pisahkan:

- Controller
- Service
- Repository
- Model
- View

Controller tidak boleh berisi business logic.

==================================================
FOLDER STRUCTURE
==================================================

Gunakan struktur:

project-root/

├── app/
│   ├── Controllers/
│   ├── Services/
│   ├── Repositories/
│   ├── Models/
│   ├── Middleware/
│   ├── Requests/
│   ├── Helpers/
│   └── Views/
│
├── config/
│
├── public/
│   ├── assets/
│   ├── uploads/
│   └── index.php
│
├── routes/
│
├── storage/
│   ├── logs/
│   ├── cache/
│   └── sessions/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── vendor/
│
└── composer.json

==================================================
DATABASE STANDARDS
==================================================

Gunakan:

- Foreign Key
- Index Optimization
- Proper Data Type
- Created At
- Updated At

Semua query wajib menggunakan:

PDO Prepared Statement

Tidak boleh menggunakan query raw yang rentan SQL Injection.

==================================================
FRONTEND STANDARDS
==================================================

Pisahkan:

- Components
- Layouts
- Pages
- Utilities

Gunakan:

- Reusable Component
- Modular Javascript
- Event Delegation
- Lazy Loading

Jangan membuat file javascript berukuran sangat besar.

==================================================
JAVASCRIPT RULES
==================================================

Gunakan:

- ES6 Modules
- Async Await
- Reusable Functions
- Utility Functions

Pisahkan:

assets/js/

├── pages/
├── modules/
├── services/
├── components/
└── app.js

Hindari:

- Global Variables
- Callback Hell
- Duplicate Logic

==================================================
TAILWIND RULES
==================================================

Gunakan:

- Reusable Components
- Utility First Approach
- Consistent Spacing System
- Responsive Design

Buat:

- Button Component
- Card Component
- Modal Component
- Form Component
- Table Component

==================================================
ERROR HANDLING
==================================================

Implementasikan:

- Global Exception Handler
- Error Logging
- Activity Logging
- User Friendly Error Page

Buat:

- 404 Page
- 403 Page
- 500 Page

==================================================
DOCUMENTATION
==================================================

Buat dokumentasi lengkap:

- Instalasi
- Deployment
- Database Structure
- API Documentation
- Folder Structure
- Coding Standards

==================================================
AI DEVELOPMENT RULE
==================================================

Sebelum membuat kode:

1. Buat Database Design
2. Buat ERD
3. Buat Folder Structure
4. Buat Flow Diagram
5. Buat Routing Plan
6. Buat Component Mapping

Setelah itu baru generate source code.

Jangan langsung membuat kode tanpa melakukan perancangan sistem terlebih dahulu.

Semua kode yang dihasilkan harus memenuhi standar software engineer level senior dan siap digunakan pada production environment.

Buat dokumentasi lengkap:

- Instalasi
- Deployment
- Database Structure
- API Documentation
- Folder Structure
- Coding Standards

==================================================
AI DEVELOPMENT RULE
==================================================

Sebelum membuat kode:

1. Buat Database Design
2. Buat ERD
3. Buat Folder Structure
4. Buat Flow Diagram
5. Buat Routing Plan
6. Buat Component Mapping

Setelah itu baru generate source code.

Jangan langsung membuat kode tanpa melakukan perancangan sistem terlebih dahulu.

Semua kode yang dihasilkan harus memenuhi standar software engineer level senior dan siap digunakan pada production environment.