<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$attribute = DB::table('attributes')->where('code', 'discount_percentage')->first();
if ($attribute) {
    echo "Attribute created successfully with ID: " . $attribute->id . "\n";
    $mapping = DB::table('attribute_group_mappings')->where('attribute_id', $attribute->id)->first();
    if ($mapping) {
        echo "Mapped to group ID: " . $mapping->attribute_group_id . "\n";
    }
} else {
    echo "Attribute not found.\n";
}
