<?php

namespace Training\Test\Plugin\Block\Product\View;

use Magento\Catalog\Block\Product\View\Description;

class ProductDescription extends Description
{
    public function beforeToHtml(
        Description $subject
    ) {
        $subject->getProduct()->setData('description','Test description 1111111111111111111111111111111111');
    }

}