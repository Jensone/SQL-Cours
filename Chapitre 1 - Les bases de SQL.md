# Chapitre 1 : Les bases de SQL

## 1.1 Introduction à SQL

Le Structured Query Language (SQL) est un langage standard utilisé pour interagir avec les bases de données relationnelles. Créé dans les années 1970, SQL a rapidement été adopté comme un outil incontournable pour gérer, manipuler et interroger des bases de données. Son principal objectif est de fournir un moyen efficace de travailler avec des données stockées de manière structurée. Aujourd’hui, SQL est utilisé dans presque tous les domaines, de l’analyse de données à la gestion des systèmes d’information.

Les principales opérations réalisées avec SQL incluent :
- La création et la modification de structures de bases de données (tables, index, schémas).
- L’ajout, la mise à jour et la suppression de données.
- L’interrogation des données pour extraire des informations utiles.
- La gestion des droits et des accès aux données.

SQL est déclaratif, ce qui signifie que vous décrivez le résultat attendu sans préciser comment l'obtenir. Cette caractéristique le distingue des langages de programmation traditionnels.

## 1.2 Les bases de données relationnelles

Une base de données relationnelle est une collection organisée de données interconnectées. Le modèle relationnel, introduit par Edgar F. Codd, repose sur la théorie des ensembles et des relations. Les bases de données relationnelles stockent les données sous forme de tables, chaque table représentant une entité (comme des clients, des produits ou des commandes).

### Caractéristiques des bases de données relationnelles
- **Organisation en tables** : Les données sont organisées en lignes et colonnes.
- **Relations** : Les tables sont liées entre elles par des clés primaires et des clés étrangères.
- **Intégrité des données** : Les contraintes assurent la cohérence et la validité des données.
- **Langage normalisé** : SQL est le langage standard pour interagir avec ces bases.

Les systèmes de gestion de bases de données relationnelles (SGBDR) comme MySQL, PostgreSQL et MariaDB permettent de gérer ces bases de manière efficace.

## 1.3 Les composants d'une base de données

Pour comprendre SQL, il est essentiel de connaître les principaux composants d'une base de données relationnelle :

### Tables
Les tables sont la structure fondamentale des bases de données. Une table est un ensemble de lignes et de colonnes organisées pour stocker des données relatives à une entité particulière.
- **Colonnes** : Chaque colonne correspond à un attribut ou une propriété d'une entité (ex. : nom, adresse, téléphone).
- **Lignes** : Chaque ligne (ou enregistrement) représente une instance de l'entité.

### Clés
Les clés permettent d’assurer l’intégrité des données et de définir les relations entre les tables.
- **Clé primaire** : Identifiant unique pour chaque ligne d’une table.
- **Clé étrangère** : Colonne qui fait référence à la clé primaire d’une autre table.

### Index
Les index permettent d’améliorer les performances des requêtes en accélérant l’accès aux données.

## 1.4 Installation et configuration d'un SGBD

Avant de commencer à travailler avec SQL, il est nécessaire d’installer un SGBD. Voici les étapes générales pour installer MySQL, MariaDB ou PostgreSQL sur votre système :

### 1.4.1 Prérequis
- Un ordinateur avec un système d’exploitation compatible (Windows, macOS ou Linux).
- Les droits administratifs pour installer des logiciels.

### 1.4.2 Installation
1. **MySQL**
   - Téléchargez le programme d'installation depuis le site officiel.
   - Lancez l’installation et choisissez les options par défaut ou personnalisez-les selon vos besoins.
   - Configurez un mot de passe pour l’utilisateur ‘root’.

2. **MariaDB**
   - MariaDB est un fork de MySQL et est compatible avec la plupart des applications MySQL.
   - Installez-le en utilisant votre gestionnaire de paquets (ex. : `sudo apt install mariadb-server` sous Linux).

3. **PostgreSQL**
   - Téléchargez et installez PostgreSQL depuis son site officiel ou via un gestionnaire de paquets.
   - Suivez les étapes pour créer un utilisateur et une base de données par défaut.

### 1.4.3 Configuration de base
- Accédez au terminal ou à un outil graphique (ex. : phpMyAdmin ou PgAdmin).
- Créez une base de données :
  ```sql
  CREATE DATABASE exemple;
  ```
- Créez un utilisateur et accordez-lui des droits :
  ```sql
  CREATE USER 'utilisateur'@'localhost' IDENTIFIED BY 'motdepasse';
  GRANT ALL PRIVILEGES ON exemple.* TO 'utilisateur'@'localhost';
  ```


