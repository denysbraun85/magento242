<?php

namespace Training\Feedback\Controller;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\ResponseInterface;

class Form implements HttpPostActionInterface
{
    /**
     * @var ResultFactory
     */
    private $resultRawFactory;

    public function __construct(
        ResultFactory $resultFactory
    ) {
        $this->resultRawFactory = $resultFactory;
    }

    /**
     * @return ResultInterface|ResponseInterface
     */

    public function execute() {
        return $this->resultRawFactory->create(ResultFactory::TYPE_RAW);
    }
}
