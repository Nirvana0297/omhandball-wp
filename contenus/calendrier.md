# Page : Calendrier & résultats

URL cible : `/calendrier/`

---

## Module officiel : Score'n'co (partenaire FFHB)

Les résultats et calendriers de la FFHB sont diffusés par **Score'n'co**. Le
club y est référencé :
https://scorenco.com/hand/clubs/olympique-mehun-handball-2np2

### Méthode recommandée (le plus simple)

1. Se connecter à l'espace club sur **scorenco.com/admin** (compte « club »,
   gratuit — demander l'accès si la page du club est déjà gérée).
2. Aller dans **Widgets > Ajouter un widget** et choisir le type souhaité :
   - **Matchs de la semaine** : tous les prochains matchs du club ;
   - **Équipe(s)** : derniers résultats + prochains matchs d'une équipe ;
   - **Classement** : le classement d'une compétition.
3. Copier le **lien du widget** fourni (ou installer l'extension officielle
   WordPress « Score'n'co Widget » et coller le code d'intégration).
4. Deux façons de l'afficher :
   - **Page d'accueil** : coller le lien dans
     *Personnaliser > Page d'accueil > URL du widget Score'n'co* — la section
     « Résultats & prochains matchs » s'affiche automatiquement ;
   - **N'importe quelle page/article** : utiliser le shortcode du thème :

```
[omhb_scorenco]
[omhb_scorenco url="https://scorenco.com/..." hauteur="450"]
```

Les données (scores, calendriers, classements) se mettent à jour
**automatiquement**, sans intervention.

## Calendrier général

Intégrer ici le calendrier général du club (widget Score'n'co ou Google
Agenda, via un bloc « HTML personnalisé »).

## Calendriers et résultats par équipe

Pour chaque équipe (Seniors M1, Seniors F1, équipes jeunes…), créer un widget
sur Score'n'co et l'insérer avec le shortcode :

### Seniors masculins

```
[omhb_scorenco url="LIEN_DU_WIDGET_SENIORS_M" hauteur="500"]
```

### Seniors féminines

```
[omhb_scorenco url="LIEN_DU_WIDGET_SENIORS_F" hauteur="500"]
```

### Jeunes

```
[omhb_scorenco url="LIEN_DU_WIDGET_JEUNES" hauteur="500"]
```
