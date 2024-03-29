<?php
/**
 Code Challenge from Trellis 2019
 */

namespace Mageplaza\Security\Block\Adminhtml\Dashboard\LoginLog;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data as BackendData;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Phrase;
use TrellisChallenge\Security\Block\Widget\Grid\Column\Renderer\Status;
use TrellisChallenge\Security\Block\Widget\Grid\Column\Renderer\Time;
use TrellisChallenge\Security\Helper\Data;
use TrellisChallenge\Security\Model\ResourceModel\LoginHistory\CollectionFactory;

/**
 * Class Grid
 * @package TrellisChallenge\Security\Block\Adminhtml\Dashboard\LoginHistory
 */
class Grid extends \Magento\Backend\Block\Dashboard\Grid
{
    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * @var string
     */
    protected $_template = 'Login_History::dashboard/grid.phtml';

    /**
     * Grid constructor.
     *
     * @param Context $context
     * @param BackendData $backendHelper
     * @param CollectionFactory $collectionFactory
     * @param Data $helperData
     * @param array $data
     */
    public function __construct(
        Context $context,
        BackendData $backendHelper,
        CollectionFactory $collectionFactory,
        Data $helperData,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_helperData = $helperData;

        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('loginHistoryGrid');
    }

    /**
     * @inheritdoc
     */
    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create()->setOrder('time', 'DESC');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepares page sizes for dashboard grid with las 5 login history
     *
     * @return void
     */
    protected function _preparePage()
    {
        $this->getCollection()
            ->setPageSize($this->getParam($this->getVarNameLimit(), $this->_defaultLimit));
    }

    /**
     * @inheritdoc
     */
    protected function _prepareColumns()
    {
        $this->addColumn('search-query', [
            'header'   => __('User Name'),
            'sortable' => false,
            'index'    => 'user_name',
            'default'  => __('User Name')
        ]);

        $this->addColumn('num-result', [
            'header'   => __('Status'),
            'type'     => 'bool',
            'renderer' => Status::class,
            'sortable' => false,
            'index'    => 'status'
        ]);

        $this->addColumn('popularity', [
            'header'   => __('Time'),
            'sortable' => false,
            'renderer' => Time::class,
            'type'     => 'datetime',
            'index'    => 'time'
        ]);

        $this->setFilterVisibility(false);
        $this->setPagerVisibility(false);

        return parent::_prepareColumns();
    }

    /**
     * {@inheritdoc}
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('mpsecurity/loginlog/edit', ['id' => $row->getId()]);
    }

    /**
     * @return bool
     */
    public function canShowDetail()
    {
        return false;
    }

    /**
     * @return Phrase
     */
    public function getTitle()
    {
        return __('Security');
    }

    /**
     * @return string
     */
    public function getRate()
    {
        return '';
    }

    /**
     * @return mixed
     * @throws LocalizedException
     */
    public function getContentHtml()
    {
        return $this->getLayout()->createBlock(self::class)->setArea('adminhtml')
            ->toHtml();
    }

    /**
     * @return bool
     */
    public function isReports()
    {
        return $this->_helperData->isReports();
    }
}
