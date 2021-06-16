<?php

namespace Training\Feedback\Model\ResourceModel\Feedback;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\Feedback\Model\Feedback;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            Feedback::class,
            \Training\Feedback\Model\ResourceModel\Feedback::class
        );
    }
}
