<?php

use Illuminate\Database\Seeder;

class geneeskrachtKoppel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $koppeling = [[
            'kruid_id' => 1,
            'geneeskracht_id' => 1,
        ],
        [
            'kruid_id' => 1,
            'geneeskracht_id' => 2,
        ],
        [
            'kruid_id' => 2,
            'geneeskracht_id' => 2,
        ]];
        DB::table('geneeskracht_koppeling')->insert($koppeling);
    }
}
