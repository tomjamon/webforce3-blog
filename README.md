# webforce3-blog
Blog WebForce

Pour reprendre le projet, faites un fork.

- Copiez-collez le fichier .env.example en .env 
- Configurer le pour qu'il utilise votre propre base de données

Générez une clé pour encrypter les mots de passe via cette commande :

// Installe les librairies dans Composer.sjon
- ''composer install''

// Crée les tables et les colonnes de la base de données
- ''php artisan migrate''

// Génére une clée permettant notamment de crypter les mots de passe 
// Visible dans APP_KEY
- ''php artisan key:generate''
