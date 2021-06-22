<?php


namespace Training\FeedbackProduct\Observer;


use Magento\Framework\Event\Observer;
use Training\FeedbackProduct\Model\FeedbackProducts;

class SaveFeedbackProducts implements ObserverInterface
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
        $this->feedbackProducts->saveProductRelations($feedback);
    }
}