Gestion Stages
==============

Pré-requis
----------

Voir les conditions de CakePHP 2.x : https://book.cakephp.org/2/fr/installation.html#conditions-requises

Installation
------------

* Cloner depuis le dépôt : 

`git clone https://github.com/kdyouri/gestion-stages-cakephp.git`

* Télécharger les composants requis : 

`composer install`

Création des tables
-------------------

Aprés création de la base de données et configuration du fichier .env :

`app\Console\cake Migrations.migration run all -app app`