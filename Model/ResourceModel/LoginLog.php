<?php
/**
 Code Challenge from Trellis 2019
 */

namespace TrellisChallenge\Security\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class LoginHistory
 * @package TrellisChallenge\Security\Model\ResourceModel
 */
class LoginHistory extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('login_history', 'id');
    }
}
