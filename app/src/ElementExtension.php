<?php

namespace Revolution\Seed;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\NumericField;

class ElementExtension extends DataExtension {
    private static $db = [
        'Animation' => "Enum('none,fade,fade-up,fade-down,fade-left,fade-right,fade-up-right,fade-up-left,fade-down-right,fade-down-left,flip-up,flip-down,flip-left,flip-right,slide-up,slide-down,slide-left,slide-right,zoom-in,zoom-in-up,zoom-in-down,zoom-in-left,zoom-in-right,zoom-out,zoom-out-up,zoom-out-down,zoom-out-left,zoom-out-right', 'none')",
        'AnimationDelay' => 'Int'
    ];

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab('Root.Animation', new DropdownField(
          'Animation',
          'Effect',
          singleton($this->owner->ClassName)->dbObject('Animation')->enumValues()
        ), 'Animation');

        $fields->addFieldToTab('Root.Animation', new NumericField(
          'AnimationDelay',
          'Delay (in milliseconds)'
        ));
    }

    public function afterUpdateFormField($field) {
      $reflect = new \ReflectionClass($field);
      //error_log($reflect->getShortName());
      switch ($reflect->getShortName()) {
        case 'HeaderField':
          $field->addExtraClass($this->owner->ColClasses());
          break;
        case 'CheckboxField':
          $field->addExtraClass('form-check-input');
          $field->customise([
            'ColClasses' => $this->owner->ColClasses(),
          ]);    
          break;
        case 'DropdownField':
          $field->addExtraClass('custom-select');
          $field->addExtraClass('form-control');
          $field->customise([
            'ColClasses' => $this->owner->ColClasses(),
          ]);    
          break;
        case 'FileField':
          $field->addExtraClass('custom-file-input');
          $field->addExtraClass('form-control');
          $field->customise([
            'FileField' => true,
            'ColClasses' => $this->owner->ColClasses(),
          ]);
          break;
        case 'TextField':
          $field->addExtraClass('form-control');
        default:
          $field->customise([
            'ColClasses' => $this->owner->ColClasses(),
          ]);    
      }
    }
}