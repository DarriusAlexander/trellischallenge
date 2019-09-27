<?php
/**
 Code Challenge from Trellis 2019
 */

namespace TrellisChallenge\Security\Model\Config\Source\LoginHistory;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Status
 * @package TrellisChallenge\Security\Model\Config\Source\LoginHistory
 */
class Status implements ArrayInterface
{
    const STATUS_FAIL    = '0';
    const STATUS_SUCCESS = '1';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->toArray() as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label
            ];
        }

        return $options;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::STATUS_FAIL    => __('Failed'),
            self::STATUS_SUCCESS => __('Success'),
        ];
    }
}
