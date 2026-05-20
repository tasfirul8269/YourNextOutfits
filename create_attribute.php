<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Frooxi\Attribute\Repositories\AttributeRepository;

$repo = app(AttributeRepository::class);

$attribute = $repo->findOneWhere(['code' => 'discount_percentage']);
if ($attribute) {
    echo "Attribute already exists.";
} else {
    echo "Attribute not found.";
}
