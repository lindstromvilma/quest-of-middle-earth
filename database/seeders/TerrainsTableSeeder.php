<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $terrains = [
				['name' => 'Rolling hills', 'segment' => 'The Shire to Bree'],
		    ['name' => 'Farmland', 'segment' => 'The Shire to Bree'],
		    ['name' => 'Small village', 'segment' => 'The Shire to Bree'],
		    ['name' => 'Forest', 'segment' => 'The Shire to Bree'],
		    ['name' => 'Swamp', 'segment' => 'Bree to Rivendell'],
		    ['name' => 'Hilly terrain', 'segment' => 'Bree to Rivendell'],
		    ['name' => 'Woodland', 'segment' => 'Bree to Rivendell'],
		    ['name' => 'Valley', 'segment' => 'Bree to Rivendell'],
		    ['name' => 'Mountain pass', 'segment' => 'Rivendell to Lothlórien'],
		    ['name' => 'Caves', 'segment' => 'Rivendell to Lothlórien'],
		    ['name' => 'Lush forest', 'segment' => 'Rivendell to Lothlórien'],
		    ['name' => 'Riverland', 'segment' => 'Lothlórien to Rauros Falls'],
		    ['name' => 'Wooded riverbank', 'segment' => 'Lothlórien to Rauros Falls'],
		    ['name' => 'Waterfall', 'segment' => 'Lothlórien to Rauros Falls'],
		    ['name' => 'Rocky hill', 'segment' => 'Rauros Falls to Emyn Muil'],
		    ['name' => 'Rough terrain', 'segment' => 'Rauros Falls to Emyn Muil'],
		    ['name' => 'Marshy terrain', 'segment' => 'Emyn Muil to the Dead Marshes'],
		    ['name' => 'Open plain', 'segment' => 'Dead Marshes to the Black Gate'],
		    ['name' => 'Barren land', 'segment' => 'Dead Marshes to the Black Gate'],
		    ['name' => 'Woodland', 'segment' => 'Black Gate to Ithilien'],
		    ['name' => 'Rolling hills', 'segment' => 'Black Gate to Ithilien'],
		    ['name' => 'Overgrown trail', 'segment' => 'Black Gate to Ithilien'],
		    ['name' => 'Rocky path', 'segment' => 'Ithilien to Cirith Ungol'],
		    ['name' => 'Steep climb', 'segment' => 'Ithilien to Cirith Ungol'],
		    ['name' => 'Eerie cavern', 'segment' => 'Ithilien to Cirith Ungol'],
		    ['name' => 'Rough terrain', 'segment' => 'Cirith Ungol to Mount Doom'],
		    ['name' => 'Rocky hill', 'segment' => 'Cirith Ungol to Mount Doom'],
      ];

      DB::table('terrains')->insert($terrains);
    }
}
