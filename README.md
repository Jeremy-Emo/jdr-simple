# JDR Simple

L'idée de ce projet c'est de permettre de préparer des aventures simples sans avoir de mécaniques trop complexes. Un administrateur doit pouvoir :
- Créer des fiches de personnages avec de l'équipement, des statistiques et des compétences
- Créer un groupe de joueurs auquels sont assignés des personnages
- Créer une aventure, c'est à dire un ensemble de "cartes" avec informations supplémentaires
- Assigner un personnage à une carte, pour permettre la séparation d'un groupe

La partie docker du projet est pour environnement de développement UNIQUEMENT !

# TODO :
- Interface MJ (gestion de groupes & personnages, gestion de cartes)
- Interface publique (accès fiches de personnages)

## Setup du projet

Nécessite :
- Docker & docker-compose

### Installation des dépendances

```bash
docker-compose run --rm php-apache composer install 
npm install
```

### Build des dépendances

```bash
npm run build
```

### Génération de la DB

```bash
docker-compose run --rm php-apache php bin/console doctrine:database:create
docker-compose run --rm php-apache php bin/console doctrine:migrations:migrate
```

### Génération des assets EasyAdmin

```bash
docker-compose run --rm php-apache php bin/console assets:install --symlink
```

## Commandes

### Création d'un administrateur

```bash
docker-compose run --rm php-apache php bin/console admin:create
```

### Lancement des linters

```bash
# Fix automatique phpcsfixer
docker-compose run --rm php-apache php vendor/bin/php-cs-fixer fix
# phpcsfixer
docker-compose run --rm php-apache php vendor/bin/php-cs-fixer fix --dry-run --diff
# PHP_CodeSniffer
docker-compose run --rm php-apache php vendor/bin/phpcs
# PhpStan
docker-compose run --rm php-apache php vendor/bin/phpstan
```

### Lancement des tests unitaires

```bash
docker-compose run --rm php-apache composer vendor/bin/phpunit
```