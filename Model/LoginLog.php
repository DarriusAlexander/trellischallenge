<?php
/**
 Code Challenge from Trellis 2019
 */

namespace TrellisChallenge\Security\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Class LoginHistory
 * @package TrellisChallenge\Security\Model
 */
class LoginHistory extends AbstractModel
{
    /**
     * Initialize model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(ResourceModel\LoginHistory::class);
    }
}
