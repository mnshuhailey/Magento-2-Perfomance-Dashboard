<?php

namespace Alkahf\PerformanceDashboard\Block\Backend;

/**
 * Class Dashboard
 *
 * Container for the dashboard status grid.
 *
 * @package Alkahf\PerformanceDashboard\Block\Backend
 */
class Dashboard extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @inheritdoc
     *
     * phpcs --standard=MEQP2  warns because it is protected, like parent class.
     */
    protected function _construct()
    {
        $this->setData('block_group', 'Alkahf_PerformanceDashboard');
        $this->_controller = 'Backend_Dashboard';
        $this->_headerText = __('Alkahf Performance Dashboard');
        parent::_construct();
        $this->buttonList->remove('add');
    }
}
