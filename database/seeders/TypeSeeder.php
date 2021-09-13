<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['name' => 'car']);
        Type::create(['name' => 'van']);
        Type::create(['name' => 'bike']);
        Type::create(['name' => 'suv']);

    }
}
