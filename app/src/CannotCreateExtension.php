<?php

namespace Revolution\Seed;
use SilverStripe\ORM\DataExtension;

class CannotCreateExtension extends DataExtension {
    public function canCreate($member) {
        return false;
    }
}