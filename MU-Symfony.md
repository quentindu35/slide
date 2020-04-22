# Dépendances

php 7.3
composer : https://getcomposer.org/
npm : https://nodejs.org

# Installation

.Etape 1 : Cloner le projet git
```
git clone https://github.com/quentindu35/slide.git
```

.Etape 2 : Creer la base de données

.Etape 3: Paramétrer le framework Vue.js et vuetify

```
composer require symfony/webpack-encore-bundle
npm install yarn -g
yarn install
# Ajouter les dépendances Vue.js et Vuetify
npm i -S vue vuetify
# Ajouter les dépendances dev
npm i -D vue-loader vuetify-loader vue-template-compiler sass sass-loader fibers
# Ou
yarn add vue vue-loader@^15.0.11
yarn add vue-template-compiler --dev
# Compiler le fichier webpack.config (contenant Vue.js)
yarn encore dev
composer require encore

```