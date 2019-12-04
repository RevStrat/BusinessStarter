<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\ORM\ArrayList;
    //use SilverStripe\Assets\Image;
    //use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class Page extends SiteTree {
        private static $db = [
            'ShowInFooter' => 'Boolean'
        ];

        public function TreePath($crumbs = null) {
            if (!$crumbs) {
                $crumbs = new ArrayList();
            }

            $crumbs->push($this);
        
            if ($this->Parent()->exists()) {
                return $this->Parent()->TreePath($crumbs);
            }

            return $crumbs->reverse();
        }
    }
}
