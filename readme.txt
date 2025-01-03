#Projet "Drive & Loc - Système de Gestion de Location de Voitures"
Contexte du Projet
L'agence Drive & Loc souhaite enrichir son site web en proposant un module innovant pour la gestion de location de voitures. Ce projet vise à fournir une expérience utilisateur fluide et intuitive, permettant aux clients de parcourir, réserver, et interagir avec les véhicules proposés en location.

L'objectif principal est de développer une plateforme créative, fonctionnelle et performante en utilisant les technologies PHP orienté objet (POO) et SQL. Cette solution devra répondre à des besoins spécifiques pour les clients comme pour les administrateurs du site.

Objectifs Fonctionnels (User Stories)
Connexion utilisateur
En tant que client, je dois me connecter pour accéder à la plateforme et gérer mes interactions (recherches, réservations, avis).

Exploration des véhicules

Je peux explorer les différentes catégories de véhicules disponibles, tels que voitures, motos, ou utilitaires.
Les véhicules peuvent être filtrés par catégorie sans rechargement de page pour une expérience utilisateur moderne et réactive.
Détails des véhicules
Je peux visualiser les détails d'un véhicule (modèle, prix, disponibilité, caractéristiques, etc.) en cliquant sur celui-ci.

Réservation
Je peux réserver un véhicule en précisant les dates et lieux de prise en charge et retour.

Recherche avancée
Je peux rechercher un véhicule spécifique selon des critères comme le modèle ou les caractéristiques techniques.

Avis et évaluation

Je peux ajouter un avis ou une évaluation après avoir loué un véhicule.
Je peux modifier ou supprimer mes propres avis grâce à une gestion en "Soft Delete".
Pagination

Version de base : Les véhicules disponibles peuvent être listés avec une pagination simple, réalisée en PHP.
Version avancée : Une gestion interactive de la pagination est mise en œuvre à l'aide de DataTable.
Objectifs Administratifs
Gestion des véhicules et des catégories
En tant qu'administrateur, je peux :

Ajouter plusieurs véhicules ou catégories en une seule opération (insertion en masse).
Modifier, supprimer et gérer efficacement toutes les catégories et véhicules.
Gestion des réservations et des avis
Je peux superviser et gérer les réservations, ainsi que valider ou supprimer les avis laissés par les utilisateurs.

Statistiques et tableau de bord (Dashboard)
Un tableau de bord me permet de suivre des indicateurs clés : nombre de réservations, catégories les plus populaires, véhicules les mieux notés, etc.

Extras Techniques
Vue SQL "ListeVehicules"
Une vue SQL sera créée pour centraliser les informations nécessaires à l'affichage des véhicules, en combinant :

Les détails des véhicules.
Les catégories associées.
Les évaluations moyennes et la disponibilité.
Procédure stockée "AjouterReservation"
Une procédure stockée permettra de simplifier et sécuriser le processus d'ajout d'une réservation, en prenant en compte :

Le véhicule sélectionné.
Les dates et lieux de prise en charge et retour.
Enjeux et Valeur Ajoutée
Ce projet vise à :

Améliorer l’expérience utilisateur grâce à une navigation intuitive, des recherches rapides, et des fonctionnalités modernes.
Optimiser la gestion administrative pour permettre à l'agence Drive & Loc de gagner en efficacité.
Renforcer la compétitivité de l'agence en offrant une solution technique robuste et innovante.
Avec cette plateforme, Drive & Loc pourra mieux répondre aux attentes de ses clients tout en offrant une interface professionnelle à ses équipes internes.
