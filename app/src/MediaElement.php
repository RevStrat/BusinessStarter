<?php

namespace Revolution\Seed;

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\Assets\Image;

class MediaElement extends ElementContent {
    private static $db = [
        'ImageAlignment' => 'Enum("start,center,end", "start")',
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $icon = 'font-icon-block-banner';

    private static $table_name = 'MediaElements';

    private static $singular_name = 'Media';

    private static $plural_name = 'Media';

    private static $description = 'Media';

    public function getSummary() {
        return '';
    }

    public function getType() {
        return 'Media';
    }
}