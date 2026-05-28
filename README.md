# Calculadora de Propinas — PHP MVC

Aplicación web que calcula automáticamente la propina basada en el monto total de la cuenta y el porcentaje seleccionado, con opción de dividir entre varias personas.

## Características

- Botones de porcentaje rápido (10%, 15%, 18%, 20%, 25%)
- Campo de porcentaje personalizable
- División automática entre N personas
- Muestra subtotal, propina y total

## Stack

- PHP 8.x (sin frameworks)
- Arquitectura MVC
- Bootstrap 5.3 + Bootstrap Icons (CDN)

---

## Requisitos

### PHP 8.x

#### Windows
1. Descarga [XAMPP](https://www.apachefriends.org/) o [PHP standalone](https://windows.php.net/download/)
2. Con XAMPP: inicia el panel de control y activa Apache
3. Con PHP standalone: agrégalo al `PATH` del sistema

#### Linux (Ubuntu/Debian)
```bash
sudo apt update
sudo apt install php8.3 -y
php --version
```

#### macOS
```bash
brew install php
php --version
```

---

## Instalación y ejecución

```bash
# 1. Clona el repositorio
git clone https://github.com/juli366/php-mvc-calculadora-propinas.git
cd php-mvc-calculadora-propinas

# 2. Inicia el servidor de desarrollo
php -S localhost:8001

# 3. Abre en el navegador
# http://localhost:8001
```

> **Nota:** Esta aplicación no requiere base de datos.

## Estructura del proyecto

```
php-mvc-calculadora-propinas/
├── index.php                  # Front controller / router
├── controllers/
│   └── PropinasController.php
├── models/
│   └── PropinasModel.php
└── views/
    ├── layout/
    │   ├── header.php
    │   └── footer.php
    └── propinas/
        └── index.php
```
