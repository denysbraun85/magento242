<?php

namespace Training\Test\Controller\Block;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
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

    public function __construct(LayoutFactory $layoutFactory, ResultFactory $resultFactory)
    {
        $this->layoutFactory = $layoutFactory;
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock('Training\Test\Block\Test');
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        return $result->setContents($block->_toHtml());
    }
}
