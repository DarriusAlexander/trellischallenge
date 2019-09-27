<?php
/**
 Code Challenge from Trellis 2019
 */

namespace LoginHistory\Block\Widget\Grid\Column\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
use TrellisChallenge\Security\Model\LoginLogFactory;

/**
 * Class Ip
 * @package Mageplaza\Security\Block\Widget\Grid\Column\Renderer
 */
class Ip extends AbstractRenderer
{
    /**
     * @var LoginLogFactory
     */
    protected $_logFactory;

    /**
     * LastTimeLogin constructor.
     *
     * @param LoginLogFactory $logFactory
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        LoginLogFactory $logFactory,
        Context $context,
        array $data = []
    ) {
        $this->_logFactory = $logFactory;

        parent::__construct($context, $data);
    }

    /**
     * Renders grid column
     *
     * @param DataObject $row
     *
     * @return  string
     */
    public function render(DataObject $row)
    {
        $userName = $row->getData('username');
        $lastLog = $this->_logFactory->create()->getCollection()
            ->addFieldToFilter('user_name', $userName)
            ->addFieldToFilter('status', 1)
            ->getLastItem();

        return '<a href="http://www.geoip.com/?query=' . $lastLog->getIp() . '" target="_blank">' . $lastLog->getIp() . '</a>';
    }
}
