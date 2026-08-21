<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $sqlPath = database_path('seeders/data.sql');
        if (file_exists($sqlPath)) {
            $sql = file_get_contents($sqlPath);
            DB::unprepared($sql);
            $this->command->info('Database seeded successfully from data.sql!');
        } else {
            $this->command->error('File data.sql not found! Please run the data dumper first.');
        }

        Schema::enableForeignKeyConstraints();
    }
}
