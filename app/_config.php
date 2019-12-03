<?php

use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

$formats = [
    "864F54", "Solid Pink",
    "CCCDC4", "Harp Green",
    "302A2C", "Charcoal",
    "6D6E70", "Mid Grey",
    "EFF7F3", "Bubbles Green",
    "B8CFBF", "Sea Mist Green",
    "7FB8B8", "Gulf Stream Green"
];

TinyMCEConfig::get('cms')->enablePlugins('textcolor');
TinyMCEConfig::get('cms')->insertButtonsBefore('formatselect', 'forecolor backcolor');
TinyMCEConfig::get('cms')
    ->addButtonsToLine(1, 'styleselect')
    ->setOptions([
        'importcss_append' => true,
        'textcolor_map' => $formats
    ]);

