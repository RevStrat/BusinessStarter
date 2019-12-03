<?php

namespace Revolution\Seed;

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\Forms\DropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Assets\Image;

class CardElement extends ElementContent {
    private static $db = [
        'Header' => 'HTMLText',
        'Footer' => 'HTMLText',
        'ScreenReaderMessage' => 'Text',
        'TextAlignment' => 'Enum("left,center,right", "left")',
        'TextColor' => 'Enum("default,primary,secondary,success,danger,info,white,light,dark", "default")',
        "Background" => 'Enum("default,primary,secondary,success,danger,info,white,light,dark", "default")',
        "Border" => 'Enum("default,primary,secondary,success,danger,info,white,light,dark", "default")',
        "ImageLocation" => 'Enum("top,bottom", "top")',
        'Overlay' => 'Boolean',
        'OrientationXS' => 'Enum("Default,Vertical,Horizontal", "Default")',
        'OrientationSM' => 'Enum("Default,Vertical,Horizontal", "Default")',
        'OrientationMD' => 'Enum("Default,Vertical,Horizontal", "Default")',
        'OrientationLG' => 'Enum("Default,Vertical,Horizontal", "Default")',
        'OrientationXL' => 'Enum("Default,Vertical,Horizontal", "Default")',
    ];

    private static $has_one = [
      'Image' => Image::class,
    ];

    private static $owns = [
      'Image',
    ];

    private static $icon = 'font-icon-p-article';

    private static $table_name = 'CardElements';

    private static $singular_name = 'Card';

    private static $plural_name = 'Cards';

    private static $description = 'Card';

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Appearance', [
          DropdownField::create(
              'ImageLocation',
              'Image location',
              singleton($this->ClassName)->dbObject('ImageLocation')->enumValues()
          ),
          DropdownField::create(
              'TextAlignment',
              'Text alignment',
              singleton($this->ClassName)->dbObject('TextAlignment')->enumValues()
          ),
          DropdownField::create(
              'TextColor',
              'Text color',
              singleton($this->ClassName)->dbObject('TextColor')->enumValues()
          ),
          DropdownField::create(
              'Background',
              'Background',
              singleton($this->ClassName)->dbObject('Background')->enumValues()
          ),
          DropdownField::create(
              'Border',
              'Border',
              singleton($this->ClassName)->dbObject('Border')->enumValues()
          ),
          CheckboxField::create(
            'Overlay',
            'Overlay content over image'
          ),
        ]);

        $fields->addFieldToTab(
          'Root.Layout', 
          DropdownField::create(
            'OrientationXS', 
            'Orientation', 
            singleton($this->ClassName)->dbObject('OrientationXS')->enumValues()
          )
        );

        $fields->addFieldToTab(
          'Root.SmallLayout', 
          DropdownField::create(
            'OrientationSM', 
            'Orientation', 
            singleton($this->ClassName)->dbObject('OrientationSM')->enumValues()
          )
        );

        $fields->addFieldToTab(
          'Root.MediumLayout', 
          DropdownField::create(
            'OrientationMD', 
            'Orientation', 
            singleton($this->ClassName)->dbObject('OrientationMD')->enumValues()
          )
        );

        $fields->addFieldToTab(
          'Root.LargeLayout', 
          DropdownField::create(
            'OrientationLG', 
            'Orientation', 
            singleton($this->ClassName)->dbObject('OrientationLG')->enumValues()
          )
        );

        $fields->addFieldToTab(
          'Root.ExtraLargeLayout', 
          DropdownField::create(
            'OrientationXL', 
            'Orientation', 
            singleton($this->ClassName)->dbObject('OrientationXL')->enumValues()
          )
        );

        return $fields;
    }

    public function getSummary() {
        return '';
    }

    public function getType() {
        return 'Card';
    }

    public function CardClasses() {
      $classes = [
        $this->TextAlignment !== 'left' ? 'text-' . $this->TextAlignment : '',
        $this->TextColor !== 'default' ? 'text-' . $this->TextColor : '',
        $this->Background !== 'default' ? 'bg-' . $this->Background : '',
        $this->Border !== 'default' ? 'border-' . $this->Border : '',
      ];
      return implode($classes, ' ');
    }

    public function OrientationClasses($horizontalSize = 4, $verticalSize = 12) {
      $horizontalSize = strval($horizontalSize);
      $verticalSize = strval($verticalSize);

      $breakpoints = [
        'sm' => $this->OrientationSM,
        'md' => $this->OrientationMD,
        'lg' => $this->OrientationLG,
        'xl' => $this->OrientationXL,
      ];
      $classes = 'col-' . ($this->OrientationXS === 'Vertical' ? $verticalSize : $horizontalSize);
      $lastOrientation = $this->OrientationXS;
      foreach ($breakpoints as $key => $value) {
        if ($value != $lastOrientation && $value != 'Default') {
          $classes .= " col-{$key}-" . ($value === 'Vertical' ? $verticalSize : $horizontalSize);
        }
        $lastOrientation = $value;
      }

      return $classes;
    }
}