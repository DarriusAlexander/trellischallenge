<?php
/**
 Code Challenge from Trellis 2019
 */

namespace TrellisChallenge\Security\Model\ResourceModel\LoginHistory;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use TrellisChallenge\Security\Model\ResourceModel\LoginHistory;

/**
 * Class Collection
 * @package TrellisChallenge\Security\Model\ResourceModel\LoginHistory
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(\TrellisChallenge\Security\Model\LoginHistory::class, LoginHistory::class);
    }
}
