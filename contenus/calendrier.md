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
3. Saisir **une équipe par ligne**, au format `Nom | URL`. Les 7 équipes de la
   saison 2026-2027 sont **déjà préremplies** dans le thème :

```
EDM – Seniors M (départemental) | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/championnat-seniors-m-26-27-32905/
EDF – Seniors F (1ʳᵉ div. territoriale 16 F) | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/1ere-division-territoriale-16-feminine-32962/
R3M – Honneur régional M | https://www.ffhandball.fr/competitions/saison-2026-2027-22/regional/honneur-regional-masculin-26-27-32351/
PNF – Pré-Nationale F | https://www.ffhandball.fr/competitions/saison-2026-2027-22/regional/prenationale-feminine-26-27-32353/
U11 M | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/cd36-18-championnat-u11-mixte-2026-2027-33753/poule-200733/
U11 F | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/cd36-18-championnat-u11-mixte-2026-2027-33753/poule-200740/
U15 M | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/cd36-championnat-u15m-2026-2027-33681/
```

> 💡 À chaque changement de saison, remplacer l'année dans les URLs
> (ex. `saison-2026-2027-22` → `saison-2027-2028-23`) et vérifier les identifiants
> de compétition sur ffhandball.fr.

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
