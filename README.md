# Gestion_ParcAuto-Laravel

### A Propos du projet
Il s'agit d'une application de gestion location de voitures à l'aide du langage PHP, du framework Laravel et d’une base de données Mysql.
    L'application permet, entre autres, de :
-    de gérer les voitures du parc (création, modification, suppression, listing)
-    de lister les individus ayant loués une voiture
-    de permettre à des individus d'emprunter et de rendre des voitures
-    La location d’un véhicule par un utilisateur est possible uniquement pour les individus ayant créé un compte  sur l’application et qui sont connectés
-    La consultation de la liste des véhicules est possible en mode non connecté mais la modification, la suppression et l’ajout de véhicules sont des fonctionnalités possibles uniquement pour les profils administrateurs.
-    Toutes les pages contiendront un menu (header) permettant de naviguer d’une page à l’autre en toute simplicité


### Etape à suivre pour execution du projet

1. ## Modification des informations de connection dans le fichier .env
    Remplacer les informations telles que :
    * DB_DATABASE = nomdelabasededonnée
    * DB_USERNAME= yourusername
    * DB_PASSWORD= yourpassword
    * etc

2. ## Migration des données dans la base de donnée
    `php artisan migrate`

3. ## Création du lien symbolique
    Ce lien est utlisé pour accéder publiquement aux fichiers stockés dans [storage/app/public/]
   
    `php artisan storage:link`

5. ## Création d'utilisateurs
    Cette fonctionnalité permet de créer automatiquement 3 utilisateurs dont un est administrateur
    - email admin : admin@carhub.com
    - mot de passe : password
      
    Le mot de passe demeure le meme pour les utilsateurs normaux
   
    `php artisan db:seed`

6. ## Ajout des voitures dans la base de donnée grâce aux seeders
    Cette fonctionnalité permet de rajouter automatique 6 voitures dans la base de donnée
    `php artisan db:seed --class=CarSeeder`

    Pour modifier le nombre de voitures à ajouter dans la base de donnée, modifier le fichier [seeders/CarSeeder]

7. ## Démarrer le serveur
    `php artisan serve`
