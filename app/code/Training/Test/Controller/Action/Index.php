<?php

namespace Training\Test\Controller\Action;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\LayoutFactory;

class Index implements HttpGetActionInterface
{
    /**
     * @var LayoutFactory
     */
    private $layoutFactory;

    /**
     * @var ResultFactory
     */
    private $resultFactory;

    /**
     * @param LayoutFactory $layoutFactory
     * @param ResultFactory $resultFactory
     */
    public function __construct(LayoutFactory $layoutFactory, ResultFactory $resultFactory)
    {
        $this->layoutFactory = $layoutFactory;
        $this->resultFactory = $resultFactory;
    }

    public function execute(): ResultInterface|ResponseInterface
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock('Training\Test\Block\Test');
        $block->setTemplate('test.phtml');
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        return $result->setContents($block->_toHtml());
    }
}
