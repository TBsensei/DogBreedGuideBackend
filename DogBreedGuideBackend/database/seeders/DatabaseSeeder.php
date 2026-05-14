<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // A megfelelő sorrendben hivatkozunk a kapott seeder fájlokra
        $this->call([
            GroupSeeder::class,
            TypeSeeder::class,
        ]);
    }
}
