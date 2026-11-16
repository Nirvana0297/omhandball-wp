# OMHB Thème — WordPress

Thème WordPress sur mesure pour l'Olympique Mehun Handball (omhandball.fr).

## Caractéristiques

- Design moderne et responsive (mobile, tablette, ordinateur)
- Palette aux couleurs du logo officiel (rouge `#cc1517`), modifiable sans code via
  **Apparence → Personnaliser → Couleurs du club**
- Page d'accueil entièrement paramétrable (bannière, boutons, coordonnées,
  réseaux sociaux) via **Apparence → Personnaliser → Page d'accueil**
- Logo du club intégré par défaut (`assets/img/logo-club.png`), remplaçable via
  **Apparence → Personnaliser → Identité du site**
- Deux emplacements de menu : principal et pied de page
- Grille d'actualités automatique sur l'accueil
- Accessibilité (lien d'évitement, focus visible, ARIA) et performance
  (aucune dépendance externe, aucun framework)

## Installation

1. Compressez le dossier `omhb-theme` en `omhb-theme.zip`.
2. Dans WordPress : **Apparence → Thèmes → Ajouter → Téléverser un thème**.
3. Activez le thème, puis suivez le guide `../GUIDE-INSTALLATION.md`.

## Structure

```
omhb-theme/
├── style.css              Feuille de style principale + en-tête du thème
├── theme.json             Palette et typographie pour l'éditeur de blocs
├── functions.php          Configuration, scripts, couleurs dynamiques
├── inc/customizer.php     Réglages du Customizer (couleurs, accueil, contact)
├── header.php             Barre de contact + en-tête collant + menu
├── footer.php             Pied de page 3 colonnes
├── front-page.php         Accueil : bannière, accès rapides, actualités, CTA
├── index.php              Liste des articles / recherche
├── archive.php            Archives
├── page.php               Page statique
├── single.php             Article seul
├── 404.php                Page introuvable
├── searchform.php         Formulaire de recherche
├── template-parts/card-post.php  Carte d'article
└── assets/js/main.js      Menu mobile
```
