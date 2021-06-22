<?php

namespace Training\FeedbackProduct\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Training\FeedbackProduct\Model\FeedbackProducts;

class LoadFeedbackProducts implements ObserverInterface
{
    private $feedbackProducts;
    public function __construct(
        FeedbackProducts $feedbackProducts
    ) {
        $this->feedbackProducts = $feedbackProducts;
    }
    public function execute(Observer $observer)
    {
        $feedback = $observer->getFeedback();
        $this->feedbackProducts->loadProductRelations($feedback);
    }
}
