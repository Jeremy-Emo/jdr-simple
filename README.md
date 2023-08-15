# JDR Simple

L'idée de ce projet c'est de permettre de préparer des aventures simples sans avoir de mécaniques trop complexes. Un administrateur doit pouvoir :
- Créer des fiches de personnages avec de l'équipement, des statistiques et des compétences
- Créer un groupe de joueurs auquels sont assignés des personnages
- Créer une aventure, c'est à dire un ensemble de "cartes" aevc informations supplémentaires
- Assigner un personnage à une carte, pour permettre la séparation d'un groupe

La partie docker du projet est pour environnement de développement UNIQUEMENT !

# TODO :
- Mettre en place des linters
- Mettre en place des tests unitaires

## Setup du projet

Nécessite :
- Docker & docker-compose

### Installation des dépendances

```bash
docker-compose run php-apache composer install 
npm install
```

### Build des dépendances

```bash
npm run build
```

### Génération de la DB

```bash
docker-compose run php-apache php bin/console doctrine:database:create
docker-compose run php-apache php bin/console doctrine:migrations:migrate
```

### Création d'un administrateur

```bash
docker-compose run php-apache php bin/console admin:create
```