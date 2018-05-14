<?php

use Illuminate\Database\Seeder;

class geneeskrachtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $geneeskracht = [[
            'naam' => "keelpijn",

        ],
        [
            'naam' => "aspirine",

        ]];
        DB::table('geneeskracht')->insert($geneeskracht);
    }
}
