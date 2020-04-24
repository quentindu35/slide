# Dépendances

php 7.3 </br>
composer : https://getcomposer.org/ </br>
npm : https://nodejs.org </br>

# Installation

Etape 1: Cloner le projet git
```
git clone https://github.com/quentindu35/slide.git
```

Etape 3: Créer la base projetPresentation (avec MySQL par exemple)


Etape 2: Modifier le .env pour faire correspondre avec la base SQL
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