# Formation Api 

## Pour recuperer tous les participants :
 - GET   /participants

## Pour recuperer un participant par son ID :
 - GET   /participants/:id
 
## Pour creer un participant :
 - POST  /participants
    - nom (string)
    - prenom (string)
    - entreprise (string + NULL)

## Pour recuperer tous les formations : 
-  GET   /formations

## Pour creer une formation :
- POST  /formations
    - nom (string)
    - date_debut (date)
    - date_fin (date)
    - max_participants (integer)
    - prix (integer)
   
