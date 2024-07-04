Installation et Fonctionnement de l'Application Plant-Managerg Backend (Laravel)

Développeur: TADZONG MBIPE ABRAHAM

Prérequis
-PHP >= 7.4
-Composer
-MySQL ou tout autre système de gestion de base de données supporté par Laravel
-Serveur web comme Apache ou Nginx

Installation
Clonage du Projet:

git clone https://github.com/atomabraham/plant-manager-back-end.git
cd plant-manager-back-end

Installation des Dépendances:

composer install

Configuration de l'Environnement:

-Renommer le fichier .env.example en .env
-Configurer les paramètres de base de données (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD) dans le fichier .env

Génération de la Clé d'Application:

php artisan key:generate

Migration de la Base de Données:

php artisan migrate --seed
Lancement de l'Application

Pour démarrer le serveur de développement Laravel:

php artisan serve
L'API sera disponible à l'adresse : http://localhost:8000

Fonctionnement:
-L'application backend est construite avec Laravel, un framework PHP moderne.
-Elle fournit une API RESTful pour gérer les plantes d'intérieur et leurs besoins en eau.
-Les routes et les contrôleurs sont définis dans le dossier app/Http.
