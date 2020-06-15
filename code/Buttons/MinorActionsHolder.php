<?php
namespace Milkyway\SS\GridFieldUtils;

/**
 * Milkyway Multimedia
 * MinorActionsHolder.php
 *
 * @package milkyway-multimedia/ss-gridfield-utils
 * @author  Mellisa Hankins <mell@milkywaymultimedia.com.au>
 */

use SilverStripe\Forms\GridField\GridField_HTMLProvider;
use SilverStripe\View\ArrayData;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ViewableData;

class MinorActionsHolder implements GridField_HTMLProvider
{
    protected $targetFragment;
    protected $title;
    protected $id;
    protected $showEmptyString;

    /**
     * @param string $targetFragment
     * @param string $title
     * @param string $id
     */
    public function __construct($targetFragment = 'buttons-before-left', $title = '', $id = '')
    {
        $this->targetFragment = $targetFragment;
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return static
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getShowEmptyString()
    {
        return $this->showEmptyString;
    }

    /**
     * @param string $showEmptyString
     * @return static
     */
    public function setShowEmptyString($showEmptyString = '')
    {
        $this->showEmptyString = $showEmptyString;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getHTMLFragments($gridField)
    {
        $target = $this->id ? $this->targetFragment . '-' . $this->id : $this->targetFragment;
        return [
            $this->targetFragment => ArrayData::create([
                'Title' => $this->title,
                'ShowEmptyString' => $this->showEmptyString,
                'TargetFragmentName' => $this->targetFragment,
                'TargetFragmentID' => $target,
                'Actions'            => "\$DefineFragment(actions-{$target})",
            ])->renderWith('GridField_MinorActionsHolder'),
        ];
    }
}
