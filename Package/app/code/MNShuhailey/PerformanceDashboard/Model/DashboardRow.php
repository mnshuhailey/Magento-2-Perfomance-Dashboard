<?php

namespace MNShuhailey\PerformanceDashboard\Model;

/**
 * Class DashboardRow
 *
 * @package MNShuhailey\PerformanceDashboard\Model
 */
abstract class DashboardRow extends \Magento\Framework\DataObject implements
    \MNShuhailey\PerformanceDashboard\Model\DashboardRowInterface
{
    const STATUS_OK = 0;
    const STATUS_WARNING = 1;
    const STATUS_PROBLEM = 2;
    const STATUS_UNKNOWN = 3;

    public $problems = '';
    public $warnings = '';
    public $info = '';
    public $actions = '';
    public $buttons = [];

    public function groupProcess()
    {
        if ($this->problems) {
            $this->setStatus(self::STATUS_PROBLEM);
        } elseif ($this->warnings) {
            $this->setStatus(self::STATUS_WARNING);
        } else {
            $this->setStatus(self::STATUS_OK);
        };
        $this->setInfo($this->problems . $this->warnings . $this->info);
        $this->setAction($this->actions);
        if ($this->getButtons()) {
            $existingButtons = $this->getButtons();
            if (!is_array($existingButtons) || isset($existingButtons['url'])) {
                $existingButtons = [$existingButtons];
            }
            $this->buttons = array_merge($this->buttons, $existingButtons);
        }
        $this->setButtons($this->buttons);
    }
}
