<?php

namespace Revolution\Seed;
use SilverStripe\ORM\DataExtension;

class UserFormExtension extends DataExtension {
    function updateForm() {
        $this->owner->addExtraClass('needs-validation');
    }

    function updateFormActions($actions) {
        $actions->each(function ($action) {
            $action->addExtraClass('btn btn-primary');
        });
    }
}