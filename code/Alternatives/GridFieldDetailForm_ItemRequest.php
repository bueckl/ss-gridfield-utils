<?php

namespace Milkyway\SS\GridFieldUtils;

/**
 * Milkyway Multimedia
 * GridFieldDetailForm.php
 *
 * @package milkyway-multimedia/ss-gridfield-utils
 * @author Mellisa Hankins <mell@milkywaymultimedia.com.au>
 */

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;

class GridFieldDetailForm_ItemRequest extends \SilverStripe\Forms\GridField\GridFieldDetailForm_ItemRequest
{
    private static $allowed_actions = [
        'addnew',
    ];

    /*
     * Override addnew in better buttons so that it uses this link
     */
    public function addnew(HTTPRequest $r)
    {
        $currentRecord = $this->record;
        $this->record = null;
        $link = $this->Link();
        $this->record = $currentRecord;

        return Controller::curr()->redirect($link);
    }

    public function Link($action = null)
    {
        return Controller::join_links($this->gridField->Link($this->component->getUriSegment()),
            $this->record->ID ? $this->record->ID : 'new', $action);
    }
}
