---

marp: true
theme: default
paginate: true
--------------

# Décomposition des données

## Destination Guide

---

# 1. Dépendances fonctionnelles

Les dépendances fonctionnelles identifiées sont :

```text
email_tourguide → nom_complete_tourguide

email_tourguide → mot_de_passe

email_tourguide → telephone
```

---

# 2. Repérer les groupes de données

À partir des dépendances fonctionnelles, nous pouvons identifier plusieurs groupes de données.

### Groupe TourGuide

```text
email_tourguide
nom_complete_tourguide
mot_de_passe
telephone
```

### Groupe Région

```text
nom_region
```

---

### Groupe Destination

```text
nom_destination
description_destination
image
localisation
date_publication
```

---

# 3. Identifier les entités

Chaque groupe de données représente une entité du système.

### Entité 1 : TOURGUIDE

```text
email_tourguide
nom_complete_tourguide
mot_de_passe
telephone
```

### Entité 2 : REGION

```text
nom_region
```

---

### Entité 3 : DESTINATION

```text
nom_destination
description_destination
image
localisation
date_publication
```

---
Identification des clés primaires

TOURGUIDE
PK : id_tourguide

REGION
PK : id_region

DESTINATION
PK : id_destination
---
---
# 4. Déterminer les tables

Les entités identifiées correspondent aux tables suivantes :

```text
TOURGUIDE

REGION

DESTINATION
```

---

# 5. Résultat

Le système contient donc **3 entités / tables** :

```text
TOURGUIDE

REGION

DESTINATION
```


