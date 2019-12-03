<?php

namespace Revolution\Seed;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;

class CustomSiteConfig extends DataExtension {
    private static $db = [
        'Facebook' => 'Varchar',
        'Instagram' => 'Varchar',
        'LinkedIn' => 'Varchar',
        'Twitter' => 'Varchar',
    ];

    private static $has_one = [
        'Logo' => Image::class
    ];

    private static $owns = [
        'Logo'
    ];

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldsToTab('Root.Social', [
            TextField::create('Facebook', 'Facebook URL'),
            TextField::create('Instagram', 'Instagram URL'),
            TextField::create('LinkedIn', 'LinkedIn URL'),
            TextField::create('Twitter', 'Twitter URL'),
        ]);

        $fields->addFieldsToTab('Root.Appearance', [
            UploadField::create('Logo', 'Site Logo')
        ]);
    }
}