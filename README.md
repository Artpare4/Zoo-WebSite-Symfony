# SAE3-01 : Site de Gestion pour un ZOO

![Static Badge](https://img.shields.io/badge/BUT-S3-teal)
![Static Badge](https://img.shields.io/badge/SAE-301-green)
![Static Badge](https://img.shields.io/badge/Symfony-6.3-blue)
![Static Badge](https://img.shields.io/badge/Status-Finished-gold)

Ce projet est un site de gestion pour un zoo. Il permet de gérer les animaux, les enclos et les évènements. Les visiteurs peuvent réserver leurs places à des évènements.

Ce projet a été fait sous Symfony 6.3 avec tailwind CSS pour la gestion du CSS en front.

## Auteurs

- DAUNAT Romain: daun0005
- LECOMTE Erwan: leco0107
- MERIEUX Nathan: meri0031
- MONNEY Romain: monn0042
- PARENT Arthur: pare0028

## Installation / Configuration

### Installation

1. Cloner le projet
2. Installer les dépendances Composer avec `composer install`
3. Installer les dépendances JavaScript avec `npm install`
4. Initialisez tailwindCSS `npm run watch` pour générer le fichier `public/build/app.css`

### Configuration

#### Base de données

1. Copiez le fichier `.env` en `.env.local`
2. Modifiez la variable `DATABASE_URL` avec vos informations de connexion

## Scripts Composer 
Script de lancement du serveur :

```bash
composer start
```

Script d'utilisation de tailwindCSS :

```bash
composer run watch
```

Script de lancement de tous les tests:

```bash
composer test
```

Script de lancement des tests unitaires codeception:

```bash
composer test:codecept
```

Script de lancement de test phpcsfixer :

- Test sans impact :  
```bash
composer test:cs
```
- Test avec impact :  
```bash
composer fix:cs
```

### Users

#### Louise : Utilisateur X
- nom de famille: Parent
- email: louise@example.com
- password: password

#### Wilfried : Utilisateur Admin
- nom de famille: Noel
- email: Wil@example.com
- password: test

## Documentation
Les fichiers relatif au cahier des charges et à la documentation de la base de donnée si situent dans le repertoire ``/documentaiton``.
Le fichier ``bd.txt`` contient les modifications effectué à la base de donnée pour Doctrine
