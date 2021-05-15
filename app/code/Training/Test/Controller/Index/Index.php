<?php

namespace Training\Test\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
{
    $this->getResponse()->appendBody('simple text');
}
}
