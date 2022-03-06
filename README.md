Gestion Stages
==============

Pré-requis
----------

* Voir les conditions de CakePHP 2.x : 

https://book.cakephp.org/2/fr/installation.html#conditions-requises

Installation
------------

* Cloner depuis le dépôt : 

`git clone https://github.com/kdyouri/gestion-stages-cakephp.git`

* Installer les composants requis : 

`composer install`

Création des tables
-------------------

* Créer la base de données

* Créer et configurer le fichier .env :

`cp .env.sample .env`

* Exécuter la migration :

`cd app`

`Console/cake Migrations.migration run all`