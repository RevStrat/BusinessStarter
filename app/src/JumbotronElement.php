<?php

namespace Revolution\Seed;

use DNADesign\Elemental\Models\ElementContent;

class JumbotronElement extends ElementContent {
    private static $db = [
        'FullWidth' => 'Boolean',
    ];

    private static $icon = 'font-icon-menu';

    private static $table_name = 'JumbotronElements';

    private static $singular_name = 'Jumbotron';

    private static $plural_name = 'Jumbotrons';

    private static $description = 'Jumbotron';

    public function getSummary() {
        return '';
    }

    public function getType() {
        return 'Jumbotron';
    }
}