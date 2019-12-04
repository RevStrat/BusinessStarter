<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\Requirements;
    use SilverStripe\CMS\Search\SearchForm;
    use SilverStripe\ORM\FieldType\DBField;
    use SilverStripe\Control\Controller;
    //use SilverStripe\Control\Cookie;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [
            'SearchForm'
        ];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
            if(substr(Controller::curr()->getRequest()->getURL(), 0, 6) == 'admin/') {
                //error_log('Currently in admin area');
            } else {
                Requirements::javascript('themes/custom/javascript/app.js');
                Requirements::combine_files(
                    'styles.css',
                    [
                        //'themes/custom/css/typography.css',
                        'themes/custom/css/layout.css'
                    ]
                );
            }
        }

        /* 
         * Feature function: support checking for age gate
         * /
        /*public function ShowGate() {
            return !(strlen(Cookie::get('ag-pass')) > 0);
        }*/

        public function SearchForm() {
            return SearchForm::create($this, 'SearchForm');
        }
   
        public function results($data, $form, $request) {
            //die('doing the search');
            $data = array(
                'Results' => $form->getResults(),
                'Query' => DBField::create_field('Text', $form->getSearchQuery()),
                'Title' => _t('SilverStripe\\CMS\\Search\\SearchForm.SearchResults', 'Search Results')
            );
            return $this->customise($data)->renderWith(['Page_results', 'Page']);
        }
    }
}
