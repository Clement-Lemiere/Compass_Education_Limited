# Le Projet

- Ce projet est une application Web développée dans le cadre d'un stage en tant que développeur Web/Mobile.
- Ce projet a été créé par [PARSY Julien](https://github.com/ArkunLeSerein) en collaboration avec [LEMIERE Clement](https://github.com/Clement-Lemiere).
- Il s'agit de la création d'un site d'apprentissage de langue étrangère en ligne.

## Pré-requis

Afin de pouvoir utiliser ce projet, vous devez avoir :

- Linux, MacOS ou Windows
- Bash, ZSH ou autre.
- Git
- PHP 8
- Composer
- Node.js and NPM
- Symfony 6.3
- Symfony UX React
- MariaDB 10.6.12



## Fonctionnalités

- Une partie admin pour la gestion des utilisateurs et du traitement de la base de données.
- Une partie front qui permet l'affiche des informations de l'entreprise.
- une partie Dashboard qui permet l'affichage et l'édition des informations de l'utilisateur.

## Installation

1. Clonez ce dépôt `git@github.com:Clement-Lemiere/Compass_Education_Limited.git` sur votre machine locale.
2. cd `Compass_Education_Limited`
3. Exécutez la commande `npm install` et `composer install` pour installer les dépendances.
4. Créez une base de données et un utilisateur dédié pour cette base de données.
5. Configurez les variables d'environnement dans le fichier `.env`.
6. Exécutez la commande `npm run dev` et `symfony serve` pour lancer l'application.
7. Puis, rendez-vous sur [http://localhost:8000/](http://localhost:8000/).

## Configuration

Créer un fichier `.env.local` à la racine du projet.
vous pouvez configurer les variables suivantes:

```text
APP_ENV=dev
APP_DEBUG=true
APP_SECRET=f575aea9844ab15b18648ee6c7ee2823
DATABASE_URL="mysql://Compass_Education_Limited:!ChangeMe!@127.0.0.1:3306/Compass_Education_Limited?serverVersion=mariadb-10.6.12&charset=utf8mb4"
```

Pensez à adapter la variable `APP_SECRET` et les codes d'accès dans la variable `DATABASE_URL`.

**ATTENTION : `APP_SECRET` doit être une chaîne de caractère de 32 caractères en hexadécimal.**

## Migration et fixtures

Pour que l'application soit utilisable, vous devez créer le schéma de base de données et charger des données :

- [bin/dofilo.sh](bin/dofilo.sh)

```text
Exécuter la commande : bin/dofilo.sh vous donne accès aux commandes suivantes :

- php bin/console doctrine:database:drop --force --if-exists
- php bin/console doctrine:database:create --no-interaction
- php bin/console doctrine:migrations:migrate --no-interaction
- php bin/console doctrine:fixtures:load --no-interaction --group=test -vvv

```

## Contribution

Si vous souhaitez contribuer à ce projet, veuillez suivre les étapes suivantes:

1. Fork du dépôt.
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/ma-fonctionnalite`).
3. Commit et poussez vos modifications (`git commit -m "Ajouter ma fonctionnalité"`).
4. Soumettez une demande d'extraction (pull request) vers la branche principale.

## Mention légales

Ce projet est sous licence MIT. Veuillez consulter le fichier [LICENSE](./LICENSE) pour plus d'informations.
