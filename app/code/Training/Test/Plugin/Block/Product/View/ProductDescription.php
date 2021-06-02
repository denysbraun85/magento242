<?php

namespace Training\Test\Plugin\Block\Product\View;

use Magento\Catalog\Block\Product\View\Description;

class ProductDescription extends Description
{
    public function beforeToHtml(
        Description $subject
    ) {
        $subject->setTemplate('Training_Test::description.phtml');
    }

}