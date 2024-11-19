<?php

// Data to be written into the JSON file
$data = [
    'name' => 'my-library',
    'version' => '1.0.0',
    'description' => 'A simple PHP library for greeting',
    'author' => 'Your Name'
];

// Path to save the generated JSON file
$filePath = __DIR__ . '/../composer.json';

// Write data to the JSON file
file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

echo "Generated JSON file at composer.json\n";

?>