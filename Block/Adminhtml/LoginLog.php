<?php
/**
 Code Challenge from Trellis 2019
 */

namespace Trellis_Challenge\Security\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class LoginHistory
 * @package LoginHistory\Security\Block\Adminhtml
 */
class LoginHistory extends Container
{
    /**
     * Login History constructor.
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_login_history';
        $this->_blockGroup = 'login_history';
        $this->_headerText = __('Login History');

        parent::_construct();
    }
}
