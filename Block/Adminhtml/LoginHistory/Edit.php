<?php
/**
 Code Challenge from Trellis 2019
 */

namespace TrellisChallenge\Security\Block\Adminhtml\LoginHistory;

use Magento\Backend\Block\Widget\Form\Container;

/**
 * Class Edit
 * @package Mageplaza\Security\Block\Adminhtml\LoginHistory
 */
class Edit extends Container
{
    /**
     * Edit Form constructor.
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_loginhistory';
        $this->_blockGroup = 'Login_History';
        $this->_headerText = __('Login Log');

        parent::_construct();

        $this->buttonList->remove('save');
        $this->buttonList->remove('reset');
        $this->buttonList->remove('delete');
    }
}
