# Rapport de stages

```Le projet
Création From scratch d'un site d'apprentissage en ligne de langues étrangères nommé "Compass Education Limited".  
```

## Tâches effectuées le Mercredi 04 Octobre 2023

- Brainstorming.
- Weekly meeting dans le cadre de la méthode Agile ( `SCRUM` ).

## Tâches effectuées le Jeudi 05 Octobre 2023

- Elaboration du product BackLog. ( définition du cadre du projet avec la liste des besoins )
- Création du `Répository Git collaboratif`.
- Création du schéma de bases de données.
- Installation de symfony et de packages dans le projet.
- Création du fichier de configuration de la base de données. (`.env.local`)
- Création de la `table User`.

## Tâches effectuées le Vendredi 06 Octobre 2023

- Brainstorming. ( sur les tâches journalières à effectuer et sur les liaisons des tables de la base de données )
- Création de la structure de base de données. ( Création des tables `Formation, Language, Student et Teacher` )
- Résolution de conflit Git. ( Branche divergentes à réconcilier, utilisation de la commande `git config pull.rebase false` # fusion)
- Création d'une partie du `Website Wireframe` avec `Figma` ( page formation / description du site web ).
- Elaboration d'une liste exhaustive de fonctionnalités par pages.

## Tâches effectuées le Lundi 09 Octobre 2023

- Weekly meeting & brainstorming.
- Test de déploiement de `React` avec les packages `UXreact et Webpack-encore` et le Framework `Tailwind CSS` et ses outils de configuration  .
- Documentation sur le `Learning Management Systems` (`LMS`) et ses `API's`.
- Révision du schéma de base de données.
- Création de la première version des relations de la base de données.

## Tâches effectuées le Mardi 10 Octobre 2023

- Révision de la structure de base de données.
- Révision des relations entre les tables de la base de données.

## Tâches effectuées le Mercredi 11 Octobre 2023

- Révision de la structure de base de données.
- création des tables de la base de données : `Resource`, `Quiz`, `Lesson`, `Flag`, `Assignment`.

## Tâches effectuées le Jeudi 12 Octobre 2023

- Documentation et recherches de solutions pour l'intégration d'images à la base de données.
- Révision finale de la structure de base de données et de son fichier `BDD.md`.
- Révision finale des relations entre les tables de la base de données et de son `Unify Modeling Language (UML) Diagram`.
- Création des relations :

    1. Many to One : `Flag` -> `Language`.
    2. Many to One : `Quiz` -> `Language`.
    3. Many to Many : `Assignment` -> `Lesson`.
    4. Many to One : `Lesson` -> `Language`.
    5. Many to One : `Payment` -> `Formation`.
    6. Many to One : `Payment` -> `Student`.
    7. One to One : `Student` -> `User`.
    8. Many to Many : `Teacher` -> `Language`.
    9. Many to Many : `Student` -> `Language`.

- Résolution de conflit Git : Défaillance de fichier de migrations.

## Tâches effectuées le Vendredi 13 Octobre 2023

- Création des données statiques et dynamiques.
- Installation de React UX.

## Tâches effectuées le Lundi 16 Octobre 2023

- Création des CRUD's pour les tables de la base de données

## Tâches effectuées le Mardi 17 Octobre 2023

- Creation de style temporaire pour le BackOffice.

## Tâches effectuées le Mercredi 18 Octobre 2023

- Création du Wireframe du Backlog Student (Dashboard).

## Tâches effectuées le Jeudi 19 Octobre 2023

- Création du Wireframe du Backlog Student (Profile, Calendar, progress, Mailbox, Payment et Edit profile).

## Tâches effectuées le Vendredi 20 Octobre 2023

- Documentation sur l'intégration d'un Mailer.

## Tâches effectuées le Lundi 23 Octobre 2023

- Définition de la liste des fonctionnalités prioritaires.

## Tâches effectuées le Mardi 24 Octobre 2023

- Mise à jour de composer et de ses plugins.

## Tâches effectuées le Mercredi 25 Octobre 2023

- Création des testController assignment, payment; quiz, resource, session et student et de leurs twig respectifs.

## Tâches effectuées le Jeudi 26 Octobre 2023

- Création des testController lesson, language, formation, flag et FAQ et de leurs twig respectifs.
