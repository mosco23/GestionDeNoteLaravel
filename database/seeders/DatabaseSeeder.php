<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Etudiant,
    Evaluation,
    Mention,
    Specialite,
    Semestre,
    Niveau,
    Ue,
    Ecue
};

class DatabaseSeeder extends Seeder
{
    // only for Model: Semestre, Specialite, Niveau, Mention
    public function modelHelpers($tab, $modelName) {
        foreach ($tab as $code => $libelle) {
            $modelName::create([
                'code' => $code,
                'libelle' => $libelle,
            ]);
        }
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Etudiant::factory()->count(3500)->create();
        $data = json_decode(file_get_contents(asset("storage/data.json")), true);

        foreach ($data as $key => $value) {
            $$key = $value;
        }

        foreach ($mentions as $code => $libelle) {
            Mention::create([
                'code' => $code,
                'libelle' => $libelle,
            ]);
        }
        foreach ($specialites as $code => $libelle) {
            Specialite::create([
                'code' => $code,
                'libelle' => $libelle,
            ]);
        }

        foreach ($niveaux as $code => $libelle) {
            Niveau::create([
                'code' => $code,
                'libelle' => $libelle,
            ]);
        }

        foreach ($semestres as $code => $libelle) {
            Semestre::create([
                'code' => $code,
                'libelle' => $libelle,
            ]);
        }
        // $this->modelHelpers($mentions, 'Mention');
        // $this->modelHelpers($specialites, 'Specialite');
        // $this->modelHelpers($niveaux, 'Niveau');
        // $this->modelHelpers($semestres, 'Semestre');

        foreach ($parcours as $key => $value) {
            Parcours::create([
                'code' => $value['code'],
                'libelle' => $value['libelle']
            ]);
        }

        foreach ($ues AS $k => $ue): //1
            $ue_id = Ue::create([
                'code' => $ue['code'],
                'libelle' => $ue['libelle']
            ])->id; // content id of ue saved

            $ecues = $ue['ecues'];
            foreach ($ecues AS $kk => $ecue):
                    Ecue::create([
                        'ue_id' => $ue_id,
                        'libelle' => $ecue['libelle'],
                        'nbreCredit' => $ecue['nbreCredit']
                    ]);
            endforeach;
        endforeach;
    }
}
