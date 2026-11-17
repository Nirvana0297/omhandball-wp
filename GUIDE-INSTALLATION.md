# Refonte du site de l'Olympique Mehun Handball — Passage de Joomla à WordPress

Ce dossier contient tout le nécessaire pour refaire omhandball.fr sous WordPress,
hébergé chez LWS, avec un design moderne inspiré du nouveau logo du club.

## Contenu du dossier

| Élément | Description |
|---|---|
| `omhb-theme/` | Thème WordPress sur mesure (à compresser en .zip et téléverser) |
| `contenus/` | Textes prêts à coller pour chaque page du nouveau site |
| `GUIDE-INSTALLATION.md` | Ce guide : installation, migration, mise en production |

## Vue d'ensemble de la démarche

1. Sauvegarder le site Joomla actuel
2. Installer WordPress dans un sous-dossier chez LWS (le site Joomla reste en ligne)
3. Installer le thème OMHB et les plugins
4. Créer les pages et menus, régler le Customizer
5. Migrer les articles Joomla avec le plugin FG Joomla to WordPress
6. Intégrer le calendrier/résultats Score'n'co
7. Basculer le domaine sur WordPress, rediriger les anciennes URLs, archiver Joomla

Aucune étape n'interrompt le site actuel avant la bascule finale.

---

## Étape 0 — Sauvegarde du site Joomla actuel

Depuis l'espace client LWS :

1. **Sauvegarde des fichiers** : gestionnaire de fichiers ou FTP (FileZilla) —
   téléchargez tout le contenu du dossier web (souvent `public_html` ou `www`).
2. **Sauvegarde de la base** : LWS > Bases de données > phpMyAdmin > onglet
   « Exporter » > format SQL. La base Joomla actuelle a un préfixe `nnwv4_`.
3. Conservez ces sauvegardes sur votre ordinateur. Elles permettent un retour
   arrière complet.

Notez également les informations suivantes (visibles dans l'espace client LWS) :
nom de la base de données, utilisateur SQL et mot de passe — elles serviront à
la migration des articles.

## Étape 1 — Installer WordPress chez LWS

1. Espace client LWS > rubrique **CMS / Applications en 1 clic** (ou « Installer un CMS »).
2. Choisissez **WordPress**, destination : un **sous-dossier** nommé `wp`
   (n'installez pas à la racine pour l'instant).
3. Choisissez une base de données (LWS peut en créer une automatiquement).
4. Notez les identifiants d'administration WordPress générés.
5. Connectez-vous sur `https://omhandball.fr/wp/wp-admin`.

Vérifications immédiates dans **Réglages** :
- **Réglages > Général** : titre « Olympique Mehun Handball », slogan
  « La Passion du Hand depuis 1968 ».
- **Réglages > Permaliens** : choisissez « Titre de la publication »
  (URLs propres, indispensables pour le SEO).

## Étape 2 — Installer le thème OMHB

1. Compressez le dossier `omhb-theme` en `omhb-theme.zip`
   (clic droit > Compresser ; le zip doit contenir directement `style.css`, etc.).
2. WordPress : **Apparence > Thèmes > Ajouter un thème > Téléverser un thème**.
3. Installez puis **activez**. Le logo du club est déjà intégré au thème ;
   pour le remplacer, téléversez-le dans **Identité du site**.

## Étape 3 — Réglages du thème (Customizer)

**Apparence > Personnaliser** :

1. **Identité du site** : téléversez le logo du club (PNG transparent conseillé).
2. **Couleurs du club** : réglées par défaut sur celles du logo officiel
   (rouge `#cc1517`, anthracite `#16181d`), modifiables si besoin.
3. **Page d'accueil** : image de fond de la bannière (photo d'équipe ou d'action),
   titre, texte, bouton, téléphone, e-mail, adresse, liens Facebook et Instagram
   (pré-remplis avec les coordonnées actuelles du club).
4. **Menus** : créez un menu « Principal » avec Accueil, Le club, Équipes,
   Adhésion, Calendrier, Sponsoring, Contact — affectez-le à l'emplacement
   « Menu principal ». Créez aussi un menu « Pied de page ».
5. **Lecture** : « La page d'accueil affiche » > une page statique > Accueil.
   Créez aussi une page vide « Actualités » et sélectionnez-la comme page des articles.

## Étape 4 — Plugins recommandés

| Plugin | Rôle |
|---|---|
| FG Joomla to WordPress | Migration des articles, catégories et images depuis Joomla |
| WPForms Lite (ou Contact Form 7) | Formulaire de contact et pré-adhésion |
| Rank Math SEO | Référencement, sitemap, balises |
| UpdraftPlus | Sauvegardes automatiques (Google Drive ou autre) |
| SportsPress (optionnel) | Calendriers et résultats si vous ne passez pas par Score'n'co |

Installer : **Extensions > Ajouter**, recherchez, installez, activez.

## Étape 5 — Créer les pages

Créez les pages suivantes (**Pages > Ajouter**) et collez-y les contenus du
dossier `contenus/` :

| Page | Fichier | URL cible |
|---|---|---|
| Accueil | `contenus/accueil.md` | `/` (servie par le thème) |
| Le club | `contenus/le-club.md` | `/le-club/` |
| Équipes et horaires | `contenus/equipes-horaires.md` | `/equipes/` |
| Adhésion | `contenus/adhesion.md` | `/adhesion/` |
| Calendrier & résultats | `contenus/calendrier.md` | `/calendrier/` |
| Sponsoring | `contenus/sponsoring.md` | `/sponsoring/` |
| Contact | `contenus/contact.md` | `/contact/` |

⚠️ Le thème utilise ces URLs pour ses boutons d'accès rapide : vérifiez les
permaliens après création de chaque page.

⚠️ Les tarifs affichés datent de la saison 2024/2025 : mettez-les à jour pour
2026/2027 avant la mise en ligne.

## Étape 6 — Migrer les articles Joomla

1. Installez et activez **FG Joomla to WordPress**.
2. Menu **Outils > Import : Joomla (FG)**.
3. Renseignez les paramètres de la base Joomla :
   - Hôte : `localhost` (base sur le même hébergement LWS)
   - Base de données et préfixe : `nnwv4_`
   - Utilisateur / mot de passe SQL : ceux de la base Joomla (voir espace client LWS)
4. Options conseillées : importer les articles publiés, importer les images
   (téléchargement des médias dans la bibliothèque WordPress), conserver les
   catégories comme catégories WordPress.
5. Lancez l'import, puis vérifiez quelques articles (mise en forme, images).
6. Si un article contient des codes courts ou balises propres à Joomla
   (`{loadposition}`…), nettoyez-les à la main dans l'éditeur.

## Étape 7 — Calendrier et résultats (Score'n'co, partenaire FFHB)

Les résultats FFHB sont diffusés par **Score'n'co**. Le club y est référencé :
`https://scorenco.com/hand/clubs/olympique-mehun-handball-2np2`

1. Connectez-vous à l'espace club **scorenco.com/admin** (compte gratuit ; si la
   page du club est déjà gérée, demandez l'accès à Score'n'co).
2. Créez un widget : **Matchs de la semaine**, **Équipe(s)** (derniers résultats
   + prochains matchs) ou **Classement**, puis copiez le lien du widget.
3. Deux affichages possibles :
   - **Page d'accueil** : *Personnaliser > Page d'accueil > URL du widget
     Score'n'co* — la section « Résultats & prochains matchs » s'affiche
     automatiquement (laisser vide pour la masquer) ;
   - **Page « Calendrier & résultats »** : shortcode du thème
     `[omhb_scorenco url="https://scorenco.com/..." hauteur="500"]`.
4. Alternative : installer l'extension officielle WordPress
   **« Score'n'co Widget »** (Extensions > Ajouter) et coller le code
   d'intégration dans un bloc **HTML personnalisé**.
5. Les données se mettent à jour automatiquement, sans intervention.

## Étape 8 — Mise en production (bascule du domaine)

Quand le nouveau site est prêt et validé sur `https://omhandball.fr/wp/` :

1. **Réglages > Général** : adresse web de WordPress = `https://omhandball.fr`
   et adresse du site = `https://omhandball.fr`.
2. Suivez la procédure LWS « déplacer WordPress à la racine » :
   - déplacez les fichiers de `/wp` vers la racine du site (sauf `.htaccess`),
   - ou utilisez l'outil LWS dédié si disponible.
3. **Réglages > Permaliens** : enregistrez à nouveau (régénère le `.htaccess`).
4. Testez : accueil, une page, un article, le formulaire de contact, le menu mobile.

### Redirections 301 des anciennes URLs Joomla

Dans le `.htaccess` à la racine (ou via l'outil LWS de redirections), ajoutez
avant les règles WordPress :

```apache
RewriteRule ^index\.php/infos-pratiques/categories-et-tarifs/?$ /adhesion/ [R=301,L]
RewriteRule ^index\.php/contacts/?(.*)$ /contact/ [R=301,L]
RewriteRule ^index\.php/infos-pratiques/?$ /equipes/ [R=301,L]
RewriteRule ^index\.php/(.*)$ / [R=301,L]
```

Les anciens liens partagés sur Facebook continueront donc de fonctionner.

### Archivage de Joomla

Une fois la bascule validée (quelques jours après) :

1. Déplacez les fichiers Joomla dans un dossier `old-joomla/` hors du site
   (ou supprimez-les après vérification de la sauvegarde).
2. Exportez une dernière fois la base `nnwv4_` en SQL et conservez-la.

## Étape 9 — Après la mise en ligne

- **Rank Math** : vérifiez le sitemap (`/sitemap_index.xml`), soumettez-le dans
  Google Search Console.
- **UpdraftPlus** : planifiez une sauvegarde hebdomadaire de fichiers + base.
- **WPForms** : testez le formulaire de contact (réception du mail).
- Créez les utilisateurs du bureau avec des rôles adaptés
  (Administrateur pour vous, Éditeur ou Auteur pour les rédacteurs d'articles).
- Mettez à jour le lien du site sur la fiche de la Ligue Centre-Val de Loire,
  de la ville et sur les réseaux sociaux si besoin.

## Checklist finale

- [ ] Sauvegarde Joomla complète (fichiers + base SQL)
- [ ] WordPress installé et thème OMHB actif
- [ ] Logo et couleurs du club réglés dans le Customizer
- [ ] 7 pages créées avec les contenus fournis, tarifs à jour
- [ ] Menu principal et menu pied de page en place
- [ ] Articles Joomla migrés et relus
- [ ] Calendrier Score'n'co intégré
- [ ] Formulaire de contact testé
- [ ] Bascule du domaine effectuée, redirections 301 en place
- [ ] Sauvegardes automatiques planifiées
- [ ] Sitemap soumis à Google Search Console
