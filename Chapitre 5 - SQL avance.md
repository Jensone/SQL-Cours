# Chapitre 5 : SQL avancé

## 5.1 Les sous-requêtes

Les sous-requêtes, ou requêtes imbriquées, sont des requêtes SQL placées à l'intérieur d'une autre requête. Elles permettent d'effectuer des opérations complexes en plusieurs étapes.

### Syntaxe générale
```sql
SELECT colonne1
FROM table1
WHERE colonne2 = (SELECT colonne3 FROM table2 WHERE condition);
```

### Exemple : Trouver les employés ayant un salaire supérieur à la moyenne
```sql
SELECT nom, salaire
FROM employes
WHERE salaire > (SELECT AVG(salaire) FROM employes);
```

Les sous-requêtes peuvent être utilisées dans les clauses `SELECT`, `WHERE`, ou `FROM`, selon les besoins.

## 5.2 Les vues (Views)

Les vues sont des requêtes SQL enregistrées comme des objets dans la base de données. Elles permettent de simplifier l'accès aux données complexes ou fréquemment utilisées.

### Création d'une vue
```sql
CREATE VIEW nom_vue AS
SELECT colonne1, colonne2
FROM table1
WHERE condition;
```

### Exemple : Créer une vue pour les employés actifs
```sql
CREATE VIEW employes_actifs AS
SELECT nom, poste
FROM employes
WHERE actif = 1;
```

Les vues sont particulièrement utiles pour la sécurité, car elles permettent de limiter l'accès aux colonnes sensibles tout en offrant un accès aux données nécessaires.

## 5.3 Les transactions et le contrôle de concurrence

Une transaction est un ensemble d'opérations SQL exécutées comme une unité indivisible. Les transactions permettent de garantir l'intégrité des données en cas de défaillance.

### Commandes principales
- **`BEGIN`** : Démarrer une transaction.
- **`COMMIT`** : Valider la transaction.
- **`ROLLBACK`** : Annuler la transaction.

### Exemple : Transférer des fonds entre deux comptes
```sql
BEGIN;
UPDATE comptes SET solde = solde - 100 WHERE id_compte = 1;
UPDATE comptes SET solde = solde + 100 WHERE id_compte = 2;
COMMIT;
```

### Contrôle de concurrence
Le contrôle de concurrence garantit que plusieurs utilisateurs peuvent accéder à la base de données sans conflits. Les niveaux d'isolement définissent la manière dont les transactions interagissent :
- **Read Uncommitted** : Accès aux données non validées.
- **Read Committed** : Accès uniquement aux données validées.
- **Repeatable Read** : Les données lues restent cohérentes pendant toute la transaction.
- **Serializable** : Isolation complète, empêchant tout conflit.

## 5.4 Les fonctions et procédures stockées

Les fonctions et procédures stockées sont des blocs de code SQL enregistrés dans la base de données. Elles permettent d'automatiser les tâches répétitives ou complexes.

### Création d'une fonction
```sql
CREATE FUNCTION nom_fonction(parametre TYPE)
RETURNS TYPE
AS $$
BEGIN
    -- Corps de la fonction
    RETURN valeur;
END;
$$ LANGUAGE plpgsql;
```

### Exemple : Calculer la TVA
```sql
CREATE FUNCTION calcul_tva(prix NUMERIC)
RETURNS NUMERIC
AS $$
BEGIN
    RETURN prix * 0.2;
END;
$$ LANGUAGE plpgsql;
```

### Création d'une procédure stockée
```sql
CREATE PROCEDURE nom_procedure(parametre TYPE)
LANGUAGE plpgsql
AS $$
BEGIN
    -- Corps de la procédure
END;
$$;
```

## 5.5 Les triggers (déclencheurs)

Les triggers, ou déclencheurs, sont des actions automatiques exécutées en réponse à un événement sur une table (insertion, mise à jour ou suppression).

### Création d'un trigger
```sql
CREATE TRIGGER nom_trigger
AFTER INSERT ON table1
FOR EACH ROW
EXECUTE FUNCTION nom_fonction();
```

### Exemple : Envoyer un email après l'ajout d'un employé
```sql
CREATE OR REPLACE FUNCTION notifier_ajout_employe()
RETURNS TRIGGER AS $$
BEGIN
    PERFORM envoyer_email(NEW.email);
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER ajout_employe_trigger
AFTER INSERT ON employes
FOR EACH ROW
EXECUTE FUNCTION notifier_ajout_employe();
```

Les triggers permettent d'automatiser des tâches critiques comme la journalisation ou la synchronisation des données.

Avec ces outils avancés, SQL devient un langage puissant pour répondre à des besoins complexes tout en assurant la sécurité et l'intégrité des données.

