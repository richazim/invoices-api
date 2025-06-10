# Laravel Invoice API

Une API RESTful développée avec Laravel permettant de créer, stocker et gérer des factures pour des clients. Le projet suit les principes SOLID et utilise une architecture propre (Service Layer, Repositories, etc.).

---

## 🚀 Fonctionnalités

- Authentification API via Sanctum
- CRUD complet des factures (`invoices`)
- CRUD des clients (`clients`)
- Génération de factures en PDF
- Envoi de factures par email
- Recherche et pagination
- Statistiques de facturation (totaux mensuels, par client, etc.)
- Documentation Swagger/Postman
- Tests unitaires et d’intégration

---

## 🧱 Tech Stack

- **Framework** : Laravel 11
- **Base de données** : MySQL
- **Auth** : Sanctum
- **PDF** : DomPDF
- **Email** : Laravel Mail
- **Tests** : PHPUnit
- **Documentation API** : Swagger (via [DarkaOnLine/L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger))

---

## 📦 Installation

```bash
git clone https://github.com/ton-username/laravel-invoice-api.git
cd laravel-invoice-api

# Installation des dépendances
composer install

# Configuration de l'environnement
cp .env.example .env
php artisan key:generate

# Lancer MySQL, puis :
php artisan migrate --seed

# Lancer le serveur
php artisan serve
