<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\ORM\ArrayList;
    use SilverStripe\Forms\CheckboxField;

    class Page extends SiteTree {
        private static $db = [
            'ShowInFooter' => 'Boolean'
        ];

        public function getSettingsFields() {
            $fields = parent::getSettingsFields();
            $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowInFooter', 'Show in footer'), 'ShowInSearch');
            return $fields;
        }

        public function FooterMenu() {
            return Page::get()->filter('ShowInFooter', true);
        }

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
