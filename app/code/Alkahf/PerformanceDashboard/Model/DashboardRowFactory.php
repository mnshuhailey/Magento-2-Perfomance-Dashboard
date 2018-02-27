<?php

namespace Alkahf\PerformanceDashboard\Model;

/**
 * Class DashboardRowFactory
 *
 * Factory for dashboard row classes.
 *
 * @package Alkahf\PerformanceDashboard\Model
 */
class DashboardRowFactory
{
    /** @var \Magento\Framework\ObjectManagerInterface */
    private $objectManager;

    /**
     * Constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Get DashboardRow Model
     *
     * @param string $instanceName
     * @param array $data
     * @return \Magento\Framework\DataObject
     * @throws \UnexpectedValueException
     */
    public function create($instanceName, array $data = [])
    {
        $instanceName = 'Alkahf\PerformanceDashboard\Model\DashboardRow\\' . $instanceName;
        $instance = $this->objectManager->create($instanceName, ['data'=>$data]);
        if (!$instance instanceof \Alkahf\PerformanceDashboard\Model\DashboardRowInterface) {
            throw new \UnexpectedValueException("Row class '{$instanceName}' has to be a Dashboard Row.");
        }
        $instance->load();
        return $instance;
    }
}
