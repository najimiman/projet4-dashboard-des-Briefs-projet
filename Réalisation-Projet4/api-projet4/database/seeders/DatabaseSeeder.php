<?php

namespace Database\Seeders;
use App\Models\Brief;

use App\Models\Tache;


use App\Models\Groupes;
use App\Models\Apprenant;
use App\Models\Formateur;
use Illuminate\Support\Str;
use App\Models\AnneFormation;
use Illuminate\Database\Seeder;
use App\Models\GroupesApprenant;
use App\Models\PreparationBrief;
use App\Models\PreparationTache;
use Database\Factories\BriefFactory;
use Database\Factories\TacheFactory;
use Database\Factories\GroupesFactory;
use App\Models\GroupesPreparationBrief;
use Database\Factories\ApprenantFactory;
use Database\Factories\FormateurFactory;
use Database\Factories\AnneFormationFactory;
use Database\Factories\GroupesApprenantFactory;
use Database\Factories\PreparationBriefFactory;
use Database\Factories\PreparationTacheFactory;
use Database\Factories\GroupesPreparationBriefFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

                         


class DatabaseSeeder extends Seeder
{
  public function run (){
  
    // Formateur::factory(2)->create();
    // AnneFormation::factory(2)->create();
    // Groupes::factory(2)->create();
    // Apprenant::factory(5)->create();
    // GroupesApprenant::factory(2)->create();
    // PreparationBrief::factory(4)->create();
    // PreparationTache::factory(6)->create();
    // Brief::factory(4)->create();
    // Tache::factory(6)->create();
    // GroupesPreparationBrief::factory(6)->create();
      foreach (['2023', '2024'] as $i => $year) {
        // create year of study
        $annee = new AnneFormation([
          'Annee_scolaire' => $year
        ]);
        $annee->save();

        // Create new formateur.
          $formateur = new Formateur([
            'Nom_formateur' => "Formateur " . $i + 1,
          ]);
          $formateur->save();
  
        // Create new group.
          $group = new Groupes([
            'Nom_groupe' => "Soli_group " . $i + 1,
            'Annee_formation_id' => $annee->id,
            'Formateur_id' => $formateur->id,
            'Logo' => fake()->imageUrl()
          ]);
          $group->save();

          // Create new preparation project.
          for ($i = 0; $i <= 1; $i++) {
            $preparationProject = new PreparationBrief([
                'Nom_du_brief' => "Brief " . $i + 1,
                'Formateur_id' => $formateur->id,
                'Duree' => 86400 // 1 Day
            ]);
            $preparationProject->save();
            $preparationProjects[] =  $preparationProject->id;
          }
          // }
              for ($i = 0; $i <= 5; $i++) {
                $student = new Apprenant([
                  'Nom' => fake()->firstName,
                  'Prenom' => fake()->lastName,
                  'cin' => Str::random(8),
                ]);
                $student->save();
                $students[] =  $student->id;
    
                $groupesApprenant = new GroupesApprenant([
                  'Groupe_id' => $group->id,
                  'Apprenant_id' => $student->id,
                ]);
                $groupesApprenant->save();
    
                $brief = new Brief([
                  'Preparation_brief_id' => $preparationProject->id,
                  'Apprenant_id' => $student->id,
                  ]);
                  $brief->save();
                  $briefs[] = $brief->id;

                  $preTask = new PreparationTache([
                      'Nom_tache' => "Task " . $i + 1,
                      'Preparation_brief_id' => $preparationProject->id,
                  ]);
                $preTask->save();
                $preTasks[] = $preTask->id;
    
                  // Create new task.
                  $input[] = array("terminer", "en pouse", "terminer");
                  $task = new Tache([
                    'preparation_brief_id' => $preparationProject->id,
                    'preparation_tache_id' => $preTasks[$i],
                    'apprenant_P_brief_id' => $brief->id,
                    'Apprenant_id' => $student->id,
                    'Etat' => fake()->randomElement($input[$i]),
                  ]);
                  $task->save();
              
                }
          }

  }
}
