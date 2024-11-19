// src/Installer.php
<?php

namespace MyLibrary;

class Installer
{
    public static function postInstall()
    {
        $composerFile = getcwd() . '/composer.json';

        if (file_exists($composerFile)) {
            // Read the existing composer.json
            $data = json_decode(file_get_contents($composerFile), true);

            // Add a new autoload namespace
            $data['autoload']['psr-4']['GeneratedNamespace\\'] = "generated-src/";

            // Write the updated composer.json
            file_put_contents($composerFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            echo "Updated composer.json: Added 'GeneratedNamespace\\' namespace.\n";

            // Regenerate Composer's autoloader
            exec('composer dump-autoload');
        } else {
            echo "No composer.json found in the current directory.\n";
        }
    }
}
