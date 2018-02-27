<?php

namespace Alkahf\PerformanceDashboard\Block\Backend\Dashboard\Grid\Column;

/**
 * Class Statuses
 *
 * Column to show OK / WARNING / PROBLEM / UNKNOWN status in dashboard grid.
 *
 * @package Alkahf\PerformanceDashboard\Block\Backend\Dashboard\Grid\Column
 */
class Statuses extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateStatus'];
    }

    /**
     * Decorate status column values
     *
     * @param string $value
     * @param  \Magento\Framework\Model\AbstractModel $row
     * @param \Magento\Backend\Block\Widget\Grid\Column $column
     * @param bool $isExport
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function decorateStatus($value, $row, $column, $isExport)
    {
        // Extra check but mostly to get rid of phpcs warning about unused parameters
        if ($isExport || 'status' != $column->getId()) {
            return $value;
        }
        $cell = htmlentities($value);
        $severity = [
            \Alkahf\PerformanceDashboard\Model\DashboardRow::STATUS_OK => 'notice',
            \Alkahf\PerformanceDashboard\Model\DashboardRow::STATUS_WARNING => 'minor',
            \Alkahf\PerformanceDashboard\Model\DashboardRow::STATUS_PROBLEM => 'critical',
            \Alkahf\PerformanceDashboard\Model\DashboardRow::STATUS_UNKNOWN => 'minor'
        ];
        if (isset($severity[$row->getStatus()])) {
            $cell = sprintf(
                '<span class="grid-severity-%s"><span>%s</span></span>',
                $severity[$row->getStatus()],
                $cell
            );
        } else {
            $cell = sprintf(__("Unknown status: %s"), json_encode($value));
        }
        return $cell;
    }
}
