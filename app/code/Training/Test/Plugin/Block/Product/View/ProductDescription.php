<?php

namespace Training\Test\Plugin\Block\Product\View;

use Magento\Catalog\Block\Product\View\Description;
//use Magento\Catalog\Model\Product;

class ProductDescription
{
    public function _beforeToHtml(
        Description $subject
    ) {
        $subject>getProduct()->setDescription('111111111111111111111111111111111111111111111111111111111111Test description');

    }

//    public function afterLoad(Product $subject, $result)
//    {
//        $subject->setData('description', $subject->getDescription() . '-ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssTest Description');
//        return $result;
//    }
}