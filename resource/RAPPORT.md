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

- Révision finale de la structure de base de données.
- création des tables de la base de données : `Resource`, `Quiz`, `Lesson`, `Flag`, `Assignment`.

## Tâches effectuées le Jeudi 12 Octobre 2023

- Révision finale des relations entre les tables de la base de données.
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
