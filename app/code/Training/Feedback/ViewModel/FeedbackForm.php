<?php

namespace Training\Feedback\ViewModel;

use Laminas\Form\View\Helper\AbstractHelper;
use Magento\Framework\UrlInterface;

class FeedbackForm extends AbstractHelper
{

    /**
     * @param UrlInterface $urlBuilder
     */
    private $urlBuilder;

    public function __construct(
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }

    public function getActionUrl()
    {
        return $this->urlBuilder->getUrl('training_feedback/index/save');
    }
}