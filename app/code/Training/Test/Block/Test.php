<?php

namespace Training\Test\Block;

use Magento\Framework\View\Element\AbstractBlock;

class Test extends AbstractBlock
{
    public function _toHtml()
    {
        return "<b>Hello world from block!</b>";
    }
}