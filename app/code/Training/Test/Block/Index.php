<?php

namespace Training\Test\Block;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\LayoutFactory;

class Index implements HttpGetActionInterface
{
    /**
     * @var LayoutFactory
     */
    private $layoutFactory;

    /**
     * @var Context
     */
    private $context;

    /**
     * Index constructor.
     * @param LayoutFactory $layoutFactory
     * @param Context $context
     */
    public function __construct(Context $context, LayoutFactory $layoutFactory)
    {
        $this->context = $context;
        $this->layoutFactory = $layoutFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock('Training\Test\Block\Test');
        $this->getResponse()->appendBody($block->toHtml());
    }
}
