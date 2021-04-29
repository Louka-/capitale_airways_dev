# Analyse générale du projet

Une compagnie de vols privés propose des trajets VIP vers des capitales européenes.
Une application avec :
    - un système de login avec deux types de user( USER, ADMIN )
    - un espace privé qui affiche les vols et propose des actions pour :
        >créer un nouveau vol
        >modifier un vol
        >voir un vol
        >supprimer un vol

L'application à ce stade permet de gérer les vols de la journée en cours.

## Analyse fonctionnelle
- A faire par les élèves.
- Compréhensible par le client
- Peut donner lieu à un Use case UML

# Couche métier
- Dégager les types de données
- Ici : 
    1. Vol || Trajet
    2. Capitale
    3. User

## Modélisation BdD
- Un diagramme de classe UML basé sur l'analyse fonctionnelle.
- Nous ici, on va créer un diagramme MySQLWorkbench.
    ![Diagram DB](Diagramme.png)

# Configuration de l'application
1. Database
2. Les entités Flight et City, et leur relation (ne pas faire User)
3. Les fixtures
    - Créer un tableau d'objet de type City
    - Créer un ou deux vols
        > numero de vol statique : ex : AH2349
__NB__ : Eviter le copier/coller de code.