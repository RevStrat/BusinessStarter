<?php

namespace Revolution\Seed;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Assets\Image;

class CarouselElement extends BaseElement {
    private static $db = [
        'ShowControls' => 'Boolean',
        'ShowIndicators' => 'Boolean',
        'Fade' => 'Boolean',
    ];

    private static $has_many = [
      'Slides' => Slide::class,
    ];

    private static $owns = [
      'Slides',
    ];

    private static $icon = 'font-icon-menu';

    private static $table_name = 'CarouselElements';

    private static $singular_name = 'Carousel';

    private static $plural_name = 'Carousels';

    private static $description = 'Carousel';

    private static $inline_editable = false;

    public function getCMSFields() {
      $fields = parent::getCMSFields();

      $conf = GridFieldConfig_RecordEditor::create(10);
      $conf->addComponent(new GridFieldSortableRows('SortOrder'));
      $fields->addFieldToTab('Root.Slides', new GridField('Slides', 'Slides', $this->Slides(), $conf));

      return $fields;
    }

    public function getSummary() {
        return '';
    }

    public function getType() {
        return 'Carousel';
    }
}

class Slide extends DataObject {
  private static $db = [
    'Title' => 'Varchar',
    'Caption' => 'HTMLText',
    'Interval' => 'Int',
    'SortOrder' => 'Int',
  ];

  private static $defaults = [
      'Interval' => '5000',
  ];

  private static $has_one = [
    'Parent' => CarouselElement::class,
    'Image' => Image::class,
  ];

  private static $owns = [
    'Image',
  ];

  private static $default_sort = "SortOrder ASC";

  private static $table_name = "Slides";
}