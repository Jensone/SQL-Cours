# Chapitre 2 : Manipulation des données

## 2.1 Les opérations de base (CRUD)

Le terme CRUD (Create, Read, Update, Delete) décrit les quatre opérations fondamentales qui permettent de manipuler des données dans une base relationnelle. Voici un détail de chaque opération :

### INSERT : Ajouter des données
La commande `INSERT` permet d’ajouter de nouvelles lignes dans une table.

**Syntaxe de base :**
```sql
INSERT INTO nom_table (colonne1, colonne2, colonne3)
VALUES (valeur1, valeur2, valeur3);
```

**Exemple :** Ajouter un nouvel employé dans une table `employes`.
```sql
INSERT INTO employes (nom, prenom, poste)
VALUES ('Dupont', 'Jean', 'Developpeur');
```

### SELECT : Récupérer des données
La commande `SELECT` permet de lire ou d’extraire des données stockées dans une table.

**Syntaxe de base :**
```sql
SELECT colonne1, colonne2
FROM nom_table;
```

**Exemple :** Récupérer tous les employés de la table `employes`.
```sql
SELECT * FROM employes;
```

### UPDATE : Modifier des données
La commande `UPDATE` est utilisée pour modifier des valeurs existantes dans une table.

**Syntaxe de base :**
```sql
UPDATE nom_table
SET colonne1 = valeur1, colonne2 = valeur2
WHERE condition;
```

**Exemple :** Modifier le poste de Jean Dupont.
```sql
UPDATE employes
SET poste = 'Chef de projet'
WHERE nom = 'Dupont' AND prenom = 'Jean';
```

### DELETE : Supprimer des données
La commande `DELETE` permet de supprimer des lignes dans une table.

**Syntaxe de base :**
```sql
DELETE FROM nom_table
WHERE condition;
```

**Exemple :** Supprimer l’employé Jean Dupont.
```sql
DELETE FROM employes
WHERE nom = 'Dupont' AND prenom = 'Jean';
```

## 2.2 Les filtres et conditions (WHERE, AND, OR, NOT)

La clause `WHERE` permet de filtrer les lignes en fonction de conditions spécifiques. Elle peut être combinée avec des opérateurs logiques comme `AND`, `OR` et `NOT`.

**Exemple :**
- **AND** : Récupérer les employés qui sont développeurs et travaillent à temps plein.
```sql
SELECT * FROM employes
WHERE poste = 'Developpeur' AND statut = 'Temps plein';
```
- **OR** : Récupérer les employés qui sont développeurs ou designers.
```sql
SELECT * FROM employes
WHERE poste = 'Developpeur' OR poste = 'Designer';
```
- **NOT** : Récupérer les employés qui ne sont pas développeurs.
```sql
SELECT * FROM employes
WHERE NOT poste = 'Developpeur';
```

## 2.3 Les fonctions d’agrégation (SUM, AVG, COUNT, MAX, MIN)

Les fonctions d’agrégation sont utilisées pour effectuer des calculs sur un ensemble de lignes.

### SUM : Somme des valeurs
**Exemple :** Calculer le total des salaires.
```sql
SELECT SUM(salaire) AS total_salaire
FROM employes;
```

### AVG : Moyenne des valeurs
**Exemple :** Calculer le salaire moyen.
```sql
SELECT AVG(salaire) AS salaire_moyen
FROM employes;
```

### COUNT : Nombre de lignes
**Exemple :** Compter le nombre total d’employés.
```sql
SELECT COUNT(*) AS nombre_employes
FROM employes;
```

### MAX : Valeur maximale
**Exemple :** Trouver le salaire le plus élevé.
```sql
SELECT MAX(salaire) AS salaire_max
FROM employes;
```

### MIN : Valeur minimale
**Exemple :** Trouver le salaire le plus bas.
```sql
SELECT MIN(salaire) AS salaire_min
FROM employes;
```

## 2.4 Groupement et tri des données (GROUP BY, ORDER BY)

### GROUP BY : Groupement des données
La clause `GROUP BY` est utilisée pour regrouper des lignes partageant une valeur commune et appliquer des fonctions d’agrégation sur chaque groupe.

**Exemple :** Calculer le salaire moyen par poste.
```sql
SELECT poste, AVG(salaire) AS salaire_moyen
FROM employes
GROUP BY poste;
```

### ORDER BY : Tri des données
La clause `ORDER BY` permet de trier les résultats d’une requête.

**Exemple :** Trier les employés par salaire (du plus élevé au plus bas).
```sql
SELECT nom, prenom, salaire
FROM employes
ORDER BY salaire DESC;
```

**Exemple :** Trier les employés par nom (ordre alphabétique).
```sql
SELECT nom, prenom
FROM employes
ORDER BY nom ASC;
```

Avec ces opérations et fonctions, vous disposez des bases nécessaires pour manipuler efficacement les données dans une base relationnelle.

