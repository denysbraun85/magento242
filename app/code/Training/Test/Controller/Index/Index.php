<?php

namespace Training\Test\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Raw;

class Index extends Action
{
    private $resultRaw;

    public function __construct(
        Context $context,
        Raw $resultRaw
    ) {
        $this->resultRaw = $resultRaw;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultRaw = $this->resultRaw->create();
        $resultRaw->setContents('simple text');
    }
}
