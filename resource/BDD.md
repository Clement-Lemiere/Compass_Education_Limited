# Base de donnée pour le projet Compass Education Limited

## **Tables principales :**

1. ***User***

   - `id_user`: L'identifiant de l'utilisateur.
   - *id_user: INT (clé primaire)*
   - `role`: Le rôle de l'utilisateur (enseignant, étudiant, etc.).
   - *role: VARCHAR(191) (pour différencier les enseignants, étudiants, etc.)*
   - `email`: L'adresse e-mail de l'utilisateur.
   - *email: VARCHAR(191)*
   - `password`: Le mot de passe de l'utilisateur (à stocker de manière sécurisée).
   - *password: VARCHAR(191)*
   - *Aucune clé étrangère*

2. ***Teacher***

   - `id_teacher`: L'identifiant de l'enseignant.
   - *id_teacher: INT (clé primaire)*
   - `firstName`: Le nom de l'enseignant.
   - *firstName VARCHAR(191)*
   - `lastName`: Le prenom de l'enseignant.
   - *lastName VARCHAR(191)*
   - `nationality`: Les qualifications de l'enseignant.
   - *nationality: VARCHAR(191)*
   - `qualifications`: Les langues que l'enseignant enseigne.
   - *qualifications: VARCHAR(191)*
   - `availability`: L'emploi du temps ou la disponibilité de l'enseignant.
   - *availability: VARCHAR(191) (nullable)*
   - `User_id`: Clé étrangère vers l'utilisateur associé
   - *User_id: INT (clé étrangère vers User)*

3. ***Student***

   - `id_student`: L'identifiant de l'étudiant.
   - *id_student: INT (clé primaire)*
   - `firstName`: Le nom de l'étudiant.
   - *firstName VARCHAR(191)*
   - `lastName`: Le prenom de l'utilisateur.
   - *lastName VARCHAR(191)*
   - `birthdate`: La date de naissance de l'étudiant.
   - *birthdate: Date*
   - `nationality`: La nationalité de l'utilisateur.
   - *nationality: VARCHAR(191)*
   - `courses`: Les cours que l'étudiant suit.
   - *courses: VARCHAR(191) (nullable)*
   - `grades`: Les notes de l'étudiant.
   - *grades: VARCHAR(191) (nullable)*
   - `level`: Le niveau de l'étudiant.
   - *level: INT*
   - `User_id`: Clé étrangère vers l'utilisateur associé
   - *User_id: INT (clé étrangère vers User)*

4. ***Language***

   - `id_language`: L'identifiant de la langue.
   - *id_language: INT (clé primaire)*
   - `name`: Le nom de la langue.
   - *name: VARCHAR(191)*
   - `teacher_language_id`: Clé étrangère vers l'enseignant associé.
   - *teacher_language_id: INT (clé étrangère vers Teacher)*
   - `lessons_language_id`: Clé étrangère vers les leçons associées
   - *lessons_language_id: INT (clé étrangère vers Lessons)*

5. ***Planning***

   - `id_planning`: L'identifiant du planning.
   - *id_planning: INT (clé primaire)*
   - `type`: Le type de planning.
   - *type: VARCHAR(191)*
   - `date`: La date du planning.
   - *date: DATETIME*
   - `time`: L'heure du planning.
   - *time: TIME*
   - `teacher_id`: Clé étrangère vers l'enseignant associé.
   - *teacher_id: INT (clé étrangère vers Teacher)*

6. ***Formation***

   - `id_formation`: L'identifiant de la formation.
   - *id_formation: INT (clé primaire)*
   - `type`: Le type de formation.
   - *type: VARCHAR(191) ( 1 séance, 2 séance, etc ...)*
   - `duration`: La durée de la formation.
   - *duration: DATETIME ( 30 minutes, 45 mintures, 1 heures etc ...)*
   - `cost`: Le coût de la formation.
   - *cost: float ( le prix )*
   - `objectives`: Les objectifs de la formation.
   - *objectives: VARCHAR(191)*
   - `satisfaction`: La satisfaction de la formation.
   - *satisfaction : VARCHAR(191)*
   - `startDate`: La date de début de la formation.
   - *startDate: DATETIME ( date de début de la formation )*
   - *Aucune clé étrangère*

7. ***Payment***

   - `id_payment`: L'identifiant du paiement.
   - *id_payment: INT (clé primaire)*
   - `date`: La date du paiement.
   - *date: DATETIME*
   - `amount`: Le montant du paiement.
   - *amount: float*
   - `type`: Le type de paiement.
   - *type: VARCHAR(191)*
   - `id_payment`: L'identifiant du paiement.
   - *id_payment: INT (clé primaire)*
   - `student_id`: Clé étrangère vers l'etudiant associé.
   - *student_id: INT (clé étrangère vers Student)*
   - `formation_id`: Clé étrangère vers la formation associée.
   - *Formation_id: INT (clé étrangère vers Formation)*

8. ***Resource***

   - `id_resource`: L'identifiant de la ressource.
   - *id_resource: INT (clé primaire)*
   - `type`: Le type de ressource (cours vidéo, document, etc.).
   - *type: VARCHAR(191)*
   - `title`: Le titre de la ressource.
   - *title: VARCHAR(191)*
   - `description`: La description de la ressource.
   - *description: TEXT*
   - `published_date`: La date de publication de la ressource.
   - *published_date: DATETIME*
   - `language_id`: Clé étrangère vers la langue associée.
   - *language_id: INT (clé étrangère vers Languages)*

9. ***Lesson***

   - `id_lesson`: L'identifiant de la leçon.
   - *id_lesson: INT (clé primaire)*
   - `content`: Le contenu de la leçon.
   - *content: TEXT*
   - `exercises`: Les exercices de la leçon.
   - *exercises: TEXT (nullable)*
   - `resource_id`: Clé étrangère vers la ressource associée.
   - *resource_id: INT (clé étrangère vers Resources)*
   - `language_id`: Clé étrangère vers la langue associée.
   - *language_id: INT (clé étrangère vers Languages)*
   - `teacher_id`: Clé étrangère vers l'enseignant associé.
   - *teacher_id: INT (clé étrangère vers Teacher)*

10. ***Assignment***

    - `id_assignment`: L'identifiant de l'affectation.
    - *id_assignment: INT (clé primaire)*
    - `title`: Le titre de l'affectation.
    - *title: VARCHAR(191)*
    - `content`: La description de l'affectation.
    - *content: Text*
    - `due_date`: La date d'échéance de l'affectation.
    - *due_date: Datetime*
    - `grade`: La note de l'affectation.
    - *grade: VARCHAR(191) (nullable)*
    - `lesson_id`: Clé étrangère vers la leçon associée.
    - *lesson_id: INT (clé étrangère vers Lessons)*

11. ***Quiz***

    - `id_quiz`: L'identifiant du quiz.
    - *id_quiz: INT (clé primaire)*
    - `questions`: Les questions du quiz.
    - *questions: TEXT*
    - `answers`: Les réponses aux questions.
    - *answers: TEXT*
    - `scores`: Les scores associés aux réponses.
    - *scores: INT*
    - `level`: le niveau du quiz
    - *level : INT*
    - `resource_id`: Clé étrangère vers la ressource associée.
    - *resource_id: INT (clé étrangère vers Resources)*

12. ***Flag***

    - `id_flag`: L'identifiant du drapeau.
    - *id_flag: INT (clé primaire)*
    - `country`: Le nom du drapeau.
    - *country: VARCHAR(191)*
    - `iso_code`: Le code ISO du drapeau.
    - *iso_code: VARCHAR(191)*
    - `image`: Le chemin de l'image du drapeau.
    - *image: TEXT*
    - `language_id`: Clé étrangère vers la langue associée au drapeau.
    - *language_id: INT (clé étrangère vers Languages)*

## **Table secondaire**

1. ***FAQ***

    - `id_faq`: L'identifiant de la FAQ.
    - *id_faq: INT (clé primaire)*
    - `questions`: Les questions de la FAQ.
    - *questions: TEXT*
    - `answers`: Les réponses aux questions de la FAQ.
    - *answers: TEXT*

2. ***Newsletter***

    - `id_newsletter`: L'identifiant de la newsletter.
    - *id_newsletter: INT (clé primaire)*
    - `firstName`: Le prenom de l'utilisateur.
    - *firstName: VARCHAR(191)*
    - `lastName`: Le nom de l'utilisateur.
    - *lastName: VARCHAR(191)*
    - `email`: L'adresse email de l'utilisateur.
    - *email: VARCHAR(191)*

## **Relations entre les tables**

- ***Table User :***

  - `id_user` (*clé primaire*) est liée à de nombreuses autres tables via des relations `OneToOne`
  
  - (Un utilisateur peut avoir plusieurs éléments associés).
  
- ***Table Teacher :***
  
  - `User_id` est une **clé étrangère** liée à User, établissant une relation `OneToOne`
  
  - (Un enseignant peut être liés à un seul utilisateur).
  
- ***Table Student :***
  
  - `User_id` est une **clé étrangère** liée à User, établissant également une relation `OneToOne`
  
  - (Un étudiant peut être liés à un seul utilisateur).
  
- ***Table Language :***
  
  - `teacher_language_id` est une **clé étrangère** liée à Teacher, établissant une relation `ManyToMany`
  
  - (Plusieurs langues peuvent être associées à plusieurs enseignants).
  
  - `student_language_id` est une **clé étrangeree** liée à Student, établissant une relation `ManyToMany`
  
  - (Plusieurs étudiants peuvent se former à plusieurs langues).
  
- ***Table Planning :***
  
  - teacher_id est une **clé étrangère** liée à Teacher, établissant une relation `ManyToOne`
  
  - (Plusieurs séances dans planning peuvent être associés à un seul enseignant).
  
- ***Table Formation :***
  
  - `formation_language_id` est une **clé étrangeree** liée à Formation, établissant une relation `OneToMany`
  
  - (Plusieurs formations peuvent être associées à une langue).

- ***Table Payment :***
  
  - `student_id` est une **clé étrangère** liée à Student, établissant une relation `ManyToOne`
  
  - (Plusieurs paiements peuvent être associés à un seul étudiant).
  
  - `formation_id` est une **clé étrangère** liée à Formation, établissant une relation `ManyToOne`
  
  - (Plusieurs paiements peuvent être associés à une seule formation).
  
- ***Table Resource :***
  
  - `resource_language_id` est une **clé étrangère** liée à Resource, établissant une relation `ManyToOne`
  
  - (Plusieurs ressources peuvent être associées à une langue).
  
- ***Table Lesson :***

  - `lessons_language_id` est une **clé étrangère** liée à Lesson, établissant une relation `OneToMany`
  
  - (Plusieurs leçons peuvent être associées à une seule langue).

    - `Assignment_id` est une **clé étrangère** liée à Lesson, établissant une relation `ManyToMany`
  
  - (Plusieurs devoir peuvent être associées à plusieurs leçons).
  
- ***Table Assignment :***
  
  - `lesson_id` est une **clé étrangère** liée à Lesson, établissant une relation `ManyToMany`
  
  - (Plusieurs leçons peuvent être associées à plusieurs devoir).
  
- ***Table Quiz :***
  
  - `quiz_language_id` est une **clé étrangeree** liée à Quiz, établissant une relation `ManyToOne`
  
  - (Plusieurs quiz peuvent être associés à une langue).
  
- ***Table Flag :***
  
  - `language_id` est une **clé étrangère** liée à Language, établissant une relation `ManyToOne`
  
  - (Plusieurs drapeaux peuvent être associés à une seule langue).
  