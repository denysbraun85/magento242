<?php

namespace Training\Test\Controller\Product;

use Magento\Catalog\Helper\Product\View as ViewHelper;
use Magento\Cms\Controller\Page\View as Page;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;

class View extends Page implements HttpGetActionInterface
{
    private Session $_customerSession;

    private RedirectFactory $_redirectFactory;

    public function __construct(
        Context $context,
        ViewHelper $viewHelper,
        ForwardFactory $resultForwardFactory,
        PageFactory $resultPageFactory,
        Session $_customerSession,
        RedirectFactory $_redirectFactory

    )
    {
        $this->_customerSession = $_customerSession;
        $this->_redirectFactory = $_redirectFactory;

        parent::__construct($context, $viewHelper, $resultForwardFactory, $resultPageFactory);
    }

    public function execute()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return $this->_redirectFactory->create()->setPath('customer/account/login');
        }

        return parent::execute();
    }
}