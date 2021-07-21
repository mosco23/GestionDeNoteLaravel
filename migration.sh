#!/bin/bash

table=("Etudiant" "Evaluation" "Ue" "Ecue" "Annee" "Specialite" "Mention" "Niveau"  "Semestre" "Parcours")
for i in ${!table[@]};
do 
    php artisan make:model ${table[i]} -m; 
done

assoc=("annee_parcours" "etudiant_evaluation" "etudiant_ue" "parcours_ue")
for i in ${!assoc[@]};
do 
    php artisan make:migration create_${assoc[i]};
done

# factory=("Etudiant")
# for i in ${!factory[@]};
# do
#     php artisan make:factory ${factory[i]}Factory --model=${factory[i]}
# done