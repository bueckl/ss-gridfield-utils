<?php
/**
 * Created by IntelliJ IDEA.
 * User: mwm-15R
 * Date: 27/11/2015
 * Time: 1:59 PM
 */

namespace Milkyway\SS\GridFieldUtils;

use Milkyway\SS\GridFieldUtils\Common\HasModal;
use SilverStripe\Control\Controller;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldEditButton;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\ArrayData;


class EditInModal extends GridFieldEditButton
{
    use HasModal;

    /**
     * @param GridField $gridField
     * @param DataObject $record
     * @param string $columnName
     *
     * @return string - the HTML for the column
     */
    public function getColumnContent($gridField, $record, $columnName)
    {
        $this->htmlFragments($gridField);
        return ArrayData::create([
            'Link' => Controller::join_links($this->Link($gridField), $record->ID, 'edit'),
        ])->renderWith(['GridField_EditInModal', 'GridFieldEditButton', ]);
    }
}
