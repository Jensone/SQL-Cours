# Chapitre 7 : Transition vers les ORM

## 7.1 Qu'est-ce qu'un ORM ?

Un ORM (Object-Relational Mapping) est une technique qui permet de transformer les données stockées dans une base de données relationnelle en objets manipulables directement dans un langage de programmation orienté objet. En utilisant un ORM, les développeurs peuvent interagir avec la base de données via des classes et des méthodes, sans avoir besoin d'écrire des requêtes SQL complexes.

### Fonctionnement d'un ORM
- Les tables de la base de données sont mappées à des classes dans le code.
- Les colonnes des tables correspondent aux attributs des classes.
- Les relations entre les tables (un-à-un, un-à-plusieurs, plusieurs-à-plusieurs) sont représentées sous forme d'associations entre les classes.
- Les ORM traduisent automatiquement les opérations sur les objets en requêtes SQL.

### Exemples d'ORM
- **PHP** : Doctrine, Eloquent (Laravel).
- **Python** : SQLAlchemy, Django ORM.
- **Java** : Hibernate.
- **JavaScript** : Sequelize, TypeORM.

## 7.2 Avantages et limites des ORM

### Avantages des ORM
1. **Abstraction** : Les développeurs peuvent manipuler des objets au lieu d'écrire des requêtes SQL, ce qui simplifie le code.
2. **Réduction des erreurs** : En évitant d'écrire manuellement des requêtes SQL, on diminue le risque d'erreurs syntaxiques.
3. **Portabilité** : Un ORM peut être configuré pour fonctionner avec différents systèmes de gestion de bases de données (MySQL, PostgreSQL, SQLite, etc.).
4. **Gains de temps** : Les tâches courantes comme les opérations CRUD sont automatisées.
5. **Gestion des relations** : Les ORM prennent en charge les relations complexes entre les entités, facilitant leur manipulation.

### Limites des ORM
1. **Performance** : Les ORM génèrent parfois des requêtes SQL inefficaces, entraînant des problèmes de performance pour les bases de données volumineuses.
2. **Courbe d'apprentissage** : L'utilisation d'un ORM nécessite de comprendre son fonctionnement et ses conventions.
3. **Complexité** : Pour des requêtes très spécifiques ou complexes, les ORM peuvent nécessiter des configurations avancées ou des contournements.
4. **Abstraction excessive** : L'abstraction peut rendre difficile le débogage ou l'optimisation des requêtes générées.

### Quand utiliser un ORM ?
Un ORM est idéal pour les projets où :
- Les relations entre les entités sont complexes.
- La base de données est manipulée régulièrement.
- Les performances ne sont pas la priorité absolue.

Pour les cas où les performances ou les requêtes spécifiques sont essentielles, une combinaison d'ORM et de SQL brut peut être préférable.

## 7.3 Premiers pas avec un ORM (exemple avec Doctrine)

Doctrine est l'un des ORM les plus populaires pour PHP. Il est souvent utilisé avec des frameworks comme Symfony.

### Installation de Doctrine
Pour utiliser Doctrine dans un projet Symfony :
```bash
composer require orm
```

### Configuration
1. **Configurer la base de données** : Dans le fichier `.env`, spécifiez les paramètres de connexion :
```dotenv
DATABASE_URL="mysql://user:password@127.0.0.1:3306/nom_base"
```

2. **Créer une entité** : Une entité représente une table dans la base de données.
```php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $prix;

    // Getters et setters...
}
```

3. **Générer le schéma de la base de données** : Doctrine peut générer les tables directement à partir des entités :
```bash
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

### Opérations CRUD avec Doctrine
1. **Créer une entité** :
```php
$produit = new Produit();
$produit->setNom('Ordinateur');
$produit->setPrix(1200.99);

$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($produit);
$entityManager->flush();
```

2. **Lire des entités** :
```php
$produit = $this->getDoctrine()
    ->getRepository(Produit::class)
    ->find($id);
```

3. **Mettre à jour une entité** :
```php
$produit = $this->getDoctrine()
    ->getRepository(Produit::class)
    ->find($id);
$produit->setPrix(999.99);

$entityManager->flush();
```

4. **Supprimer une entité** :
```php
$entityManager = $this->getDoctrine()->getManager();
$produit = $entityManager->getRepository(Produit::class)->find($id);

$entityManager->remove($produit);
$entityManager->flush();
```

Avec Doctrine, les développeurs peuvent manipuler des données relationnelles de manière intuitive et efficace, tout en réduisant considérablement la complexité des interactions avec la base de données.

