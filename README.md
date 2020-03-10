# Projet 5 OpenClassrooms - Créez votre premier blog en PHP 

Projet 5 de mon parcours Développeur d'application PHP/Symfony chez OpenClassrooms. Création d'un Blog via une architecture MVC Orienté objet.


## Parcours Développeur d'application - PHP / Symfony

## Code Quality

La qualité du code a été validé par Codacy. Vous pouvez accéder au rapport de contrôle en cliquant sur le badge ci-dessous.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/63c13874db324946ae791de39971232c)](https://app.codacy.com/manual/WainlaiN/Projet-5?utm_source=github.com&utm_medium=referral&utm_content=WainlaiN/Projet-5&utm_campaign=Badge_Grade_Dashboard)


## Description du projet
Voici les principales fonctionnalités disponibles suivant les différents statuts utilisateur:

Le visiteur:
<ul>
<li>Visiter la page d'accueil et ouvrir les différents liens disponibles (compte GitHub, compte Linkedin, CV).</li>
<li>Envoyer un message au créateur du blog.</li>
<li>Parcourir la liste des blogs et parcourir la liste de ses commentaires.</li>
</ul>
L'utilisateur:
<ul>
<li>Prérequis: s'être enregistré via le formulaire d'inscription.</li>
<li>Accès aux mêmes fonctionnaités que le visiteur.</li>
<li>Ajout de commentaires.</li>
<li>Modification/Suppression de ses commentaires.</li>
<li>Modification du mot de passe en cas d'oubli.</li>
</ul>
Administrateur:
<ul>
<li>Prérequis: avoir le status administrateur.</li>
<li>Accès aux mêmes fonctionnalités que le visiteur.</li>
<li>Ajout/suppression/modification de blog post.</li>
<li>Validation/suppression de commentaires.</li>
<li>Changement status utilisateur.</li>
<li>Suppression utilisateur.</li>
</ul>

## Informations

Un thème de base a été choisi pour réaliser ce projet, il s'agit du thème Bootstrap Freelancer.

La version en ligne n'est pas encore disponible.

Vous pouvez directement vous identifier en tant qu'utilisateur ou administrateur:

Utilisateur:
<ul>
<li>Identifiant: Jean</li>
<li>Mot de passe: 12345</li>
</ul> 
Administrateur:
<ul>
<li>Identifiant: Nicolas</li>
<li>Mot de passe: 1234</li>
</ul>

## Prérequis
Php ainsi que Composer doivent être installés sur votre serveur afin de pouvoir correctement lancé le blog.

## Installation

**Etape 1 :** Cloner le Repositary sur votre serveur.

**Etape 2 :** Créer une base de données sur votre SGBD et importer le fichier blog.example.sql

**Etape 3 :** Remplir le fichier App/Config/config.exemple.php avec les accès à votre BDD.

**Etape 4 :** Remplir le fichier App/Config/mail.exemple.php avec les accès à votre compte email.

**Etape 4 :** Votre blog est désormais fonctionnel, vous pouvez utiliser les accès visiteur et administrateur.

## Librairies utilisées
<ul>
<li>altorouter</li>
<li>swiftmailer</li>
<li>Twig</li>
<li>Http Foundation</li>

</ul>

## Auteur

Dupriez Nicolas


