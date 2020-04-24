# Dépendances

php 7.3 </br>
composer : https://getcomposer.org/ </br>
npm : https://nodejs.org </br>

# Installation

Etape 1: Cloner le projet git
```
git clone https://github.com/quentindu35/slide.git
```

Etape 2: Créer la base projetPresentation (avec MySQL par exemple)
```
php bin/console doctrine:database:create
```

Etape 3: Récupérer le dump de la base dans le dossier sql à la racine du projet et importer la base sql

Etape 3(bis): Faire attention au .env pour faire correspondre avec la base SQL
```
DATABASE_URL=mysql://root:@127.0.0.1:3306/projetPresentation?serverVersion=5.7.24
```

Etape 4: Faire tourner le serveur 
```
# Avec le client
symfony server:start

# Ou sans le client
php -S 127.0.0.1:8000 -t public
```