# Immobilier - Core

Module de base pour la gestion immobilière pour Dolibarr ERP.

## Numéro de module
`700000`

## Dépendances
Aucune (module core)

## Installation

1. Copier le dossier dans `dolibarr/htdocs/custom/immocore/`
2. Activer le module depuis **Configuration > Modules/Applications**
3. Les tables seront créées automatiquement

## Tests

```bash
php test/phpunit/ImmoCoreConfigTest.php
```

## Structure

```
immocore/
├── core/modules/       → Fichier d'activation module
├── class/              → Classes métier
├── sql/                → Schémas de base de données
├── langs/              → Fichiers de traduction
├── test/phpunit/       → Tests automatisés
├── css/                → Feuilles de style
└── js/                 → Scripts JavaScript
```

## License

GPLv3
