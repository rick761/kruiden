<?php

use Illuminate\Database\Seeder;

class kruidenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kruiden = [[
            'naam' => "Moerasspirea",
            'latin_naam' => "spiraea ulmaria syn. Filipendula ulmaria",
            'beschrijving' => "testtest 1111"
        ],
        [
            'naam' => "Sleedoorn",
            'latin_naam' => "Pranus spinosa",
            'beschrijving' => "testtest 2222"
        ]];
        DB::table('kruiden')->insert($kruiden);
    }
}
