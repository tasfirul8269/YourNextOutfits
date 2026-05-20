<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$groups = DB::table('attribute_groups')->get();
foreach ($groups as $group) {
    echo "ID: {$group->id}, Name: {$group->name}, Family: {$group->attribute_family_id}\n";
}
