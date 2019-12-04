<?php

namespace Revolution\Seed;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class CardGroupElement extends BaseElement {
    private static $db = [
        'GroupStyle' => 'Enum("group,deck", "group")'
    ];

    private static $has_many = [
      'Cards' => GroupedCard::class
    ];

    private static $owns = [
      'Cards',
    ];

    private static $icon = 'font-icon-page-multiple';

    private static $table_name = 'CardGroupElements';

    private static $singular_name = 'Card group';

    private static $plural_name = 'Card groups';

    private static $description = 'Card group';

    private static $inline_editable = false;

    public function getType() {
        return 'Card group';
    }

    public function getCMSFields() {
      $fields = parent::getCMSFields();

      $conf = GridFieldConfig_RecordEditor::create(10);
      $conf->addComponent(new GridFieldSortableRows('SortOrder'));
      $fields->addFieldToTab('Root.Cards', new GridField('Cards', 'Cards', $this->Cards(), $conf));

      $this->extend('updateCMSFields', $fields);
      return $fields;
    }
}

class GroupedCard extends CardElement {
  private static $db = [
    'SortOrder' => 'Int'
  ];

  private static $has_one = [
    'Parent' => CardGroupElement::class
  ];

  private static $table_name = "GroupedCards";

  private static $extensions = [
      Versioned::class,
  ];
}