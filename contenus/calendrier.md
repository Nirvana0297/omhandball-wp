# Page : Calendrier & résultats

URL cible : `/calendrier/`

---

## Résultats et classements : liens vers les pages FFHB

> Score'n'co n'a pas été retenu : les équipes du club jouant en **entente avec
> d'autres clubs** n'y sont pas toutes remontées. À la place, chaque équipe
> pointe vers **sa propre page officielle FFHB**.

### Configuration (une seule fois)

1. Sur **ffhandball.com** (ou le site de la ligue / du district), ouvrir la
   page de chaque équipe (résultats, calendrier, classement de sa compétition)
   et copier son adresse.
2. Dans WordPress : *Personnaliser > Page d'accueil > Équipes et liens FFHB*.
3. Saisir **une équipe par ligne**, au format :

```
Séniors M1 | https://www.ffhandball.com/...
Séniors F1 | https://www.ffhandball.com/...
-13 ans (entente Mehun / Foëcy) | https://www.ffhandball.com/...
-11 ans (entente) | https://www.ffhandball.com/...
Loisirs | https://www.ffhandball.com/...
```

La section « Résultats & classements » de la **page d'accueil** affiche
automatiquement une tuile cliquable par équipe. Le lien vers une équipe est
facultatif (une ligne avec le nom seul crée une tuile sans lien).

### Sur la page « Calendrier & résultats » et ailleurs

Le shortcode du thème affiche la même grille n'importe où (page, article) :

```
[omhb_equipes_ffhb]
```

Pour ajouter des équipes sans modifier la liste globale, utiliser plutôt des
liens classiques dans la page.

## Calendrier général

Intégrer ici le calendrier général du club (Google Agenda, via un bloc
« HTML personnalisé ») si besoin en complément des liens FFHB.
