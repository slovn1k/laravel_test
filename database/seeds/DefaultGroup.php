<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => "Default",
            'create' => \App\Group::ALLOW_CREATE,
            'edit' => \App\Group::ALLOW_EDIT,
            'block' => \App\Group::ALLOW_BLOCK,
            'delete' => \App\Group::ALLOW_DELETE,
        ]);
    }
}
