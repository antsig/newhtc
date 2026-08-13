<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$sql = file_get_contents('extract_insert.sql');

if(!empty(trim($sql))) {
    Schema::disableForeignKeyConstraints();
    DB::table('halamanstatis')->truncate();
    DB::unprepared($sql);
    Schema::enableForeignKeyConstraints();
    echo 'Inserted data successfully.';
} else {
    echo 'No inserts found.';
}
