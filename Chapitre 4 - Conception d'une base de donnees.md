# Chapitre 4 : Conception d'une base de données

## 4.1 Les principes de la modélisation

La modélisation d'une base de données est une étape cruciale dans la conception d'un système informatique. Elle permet de représenter les données de manière claire et structurée, en tenant compte des relations et des contraintes. Les principaux objectifs de la modélisation sont :

- **Organiser les données** : Définir les entités, leurs attributs et leurs relations.
- **Assurer la cohérence** : Identifier les règles métiers et les contraintes d'intégrité.
- **Faciliter la maintenance** : Rendre la base de données évolutive et compréhensible pour les développeurs.

### Étapes de la modélisation
1. **Analyse des besoins** : Comprendre les objectifs du projet et recueillir les exigences.
2. **Identification des entités et des relations** : Déterminer les objets principaux (entités) et leurs interactions (relations).
3. **Création d'un modèle conceptuel** : Représenter les données sous forme de diagrammes ou de schémas abstraits.
4. **Validation du modèle** : Vérifier que le modèle répond aux besoins et est cohérent.

## 4.2 Les diagrammes de classe UML

Les diagrammes de classe UML (Unified Modeling Language) sont un outil puissant pour modéliser les données et leurs relations. Ils permettent de représenter les entités sous forme de classes, avec leurs attributs et leurs méthodes, ainsi que les relations entre elles.

### Composants d'un diagramme de classe
- **Classes** : Représentent les entités principales sous forme de rectangles divisés en trois sections :
  1. Nom de la classe.
  2. Attributs (propriétés de la classe).
  3. Méthodes (fonctions associées à la classe).

- **Relations** : Les connexions entre les classes, incluant :
  - **Association** : Lien simple entre deux classes.
  - **Héritage** : Une classe dérive d'une autre (relation "est un").
  - **Composition** : Une classe fait partie intégrante d'une autre.
  - **Aggrégation** : Une classe est liée à une autre sans en faire partie.

### Exemple de diagramme de classe UML
Prenons l'exemple d'un système de gestion des commandes :
- **Classes** : Client, Commande, Produit.
- **Attributs** :
  - Client : ID, nom, email.
  - Commande : ID, date, ID_Client.
  - Produit : ID, nom, prix.
- **Relations** :
  - Un Client passe plusieurs Commandes (association 1-*).
  - Une Commande contient plusieurs Produits (association *-*).

Le diagramme UML permet de représenter ces relations de manière visuelle et structurée.

## 4.3 La normalisation (1NF, 2NF, 3NF)

La normalisation est un processus qui vise à organiser les données de manière optimale pour éviter les redondances et assurer leur intégrité. Elle se divise en plusieurs formes normales :

### Première forme normale (1NF)
- Une table est en 1NF si toutes ses colonnes contiennent des valeurs atomiques (non divisibles).
- **Exemple :**
  - Non normalisée :
    | ID_Client | Nom     | Commandes         |
    |-----------|---------|-------------------|
    | 1         | Dupont  | Commande1, Cmd2  |
  - Normalisée :
    | ID_Client | Nom     | Commande         |
    |-----------|---------|------------------|
    | 1         | Dupont  | Commande1        |
    | 1         | Dupont  | Commande2        |

### Deuxième forme normale (2NF)
- Une table est en 2NF si elle est en 1NF et que tous ses attributs dépendent de la clé primaire.
- **Exemple :** Éviter les dépendances partielles dans une table contenant à la fois des informations sur les clients et les commandes.

### Troisième forme normale (3NF)
- Une table est en 3NF si elle est en 2NF et qu'aucun attribut non clé ne dépend d'une autre colonne non clé.
- **Exemple :** Séparer les données des clients et leurs adresses dans des tables distinctes.

## 4.4 Cas pratique : modélisation et création d'une base de données

### Contexte
Vous devez concevoir une base de données pour gérer les ventes d'un magasin en ligne. Les données incluent des informations sur les clients, les produits, les commandes et les stocks.

### Étapes
1. **Analyse des besoins** :
   - Les clients passent des commandes.
   - Chaque commande contient plusieurs produits.
   - Le magasin doit suivre le stock des produits.

2. **Création du modèle conceptuel** :
   - Entités : Client, Commande, Produit, Stock.
   - Relations :
     - Un Client passe plusieurs Commandes.
     - Une Commande contient plusieurs Produits.
     - Chaque Produit a une quantité en Stock.

3. **Normalisation** :
   - Séparer les données des clients, commandes, produits et stocks en tables distinctes.

4. **Création des tables** :
```sql
CREATE TABLE clients (
    id_client INT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(100)
);

CREATE TABLE produits (
    id_produit INT PRIMARY KEY,
    nom VARCHAR(100),
    prix DECIMAL(10, 2)
);

CREATE TABLE commandes (
    id_commande INT PRIMARY KEY,
    date_commande DATE,
    id_client INT,
    FOREIGN KEY (id_client) REFERENCES clients(id_client)
);

CREATE TABLE stocks (
    id_produit INT,
    quantite INT,
    PRIMARY KEY (id_produit),
    FOREIGN KEY (id_produit) REFERENCES produits(id_produit)
);

CREATE TABLE commandes_produits (
    id_commande INT,
    id_produit INT,
    quantite INT,
    PRIMARY KEY (id_commande, id_produit),
    FOREIGN KEY (id_commande) REFERENCES commandes(id_commande),
    FOREIGN KEY (id_produit) REFERENCES produits(id_produit)
);
```

Avec ces concepts et étapes, vous disposez d'une méthodologie complète pour modéliser et créer des bases de données optimales.

