<?php

namespace Training\Feedback\Block;

use Magento\Framework\DataObject;
use Magento\Framework\Stdlib\DateTime\Timezone;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Training\Feedback\Model\ResourceModel\Feedback;
use Training\Feedback\Model\ResourceModel\Feedback\CollectionFactory;

class FeedbackList extends Template
{
    const PAGE_SIZE = 5;
    private $collectionFactory;
    private $collection;
    private $timezone;
    private $feedback;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        Timezone $timezone,
        Feedback $feedback,
        array $data = array()
    ) {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
        $this->timezone = $timezone;
        $this->feedback = $feedback;
    }

    public function getCollection()
    {
        if (!$this->collection) {
            $this->collection = $this->collectionFactory->create();
            $this->collection->addFieldToFilter('is_active', 1);
            $this->collection->setOrder('creation_time', 'DESC');
        }
        return $this->collection;
    }

    public function getPagerHtml()
    {
        $pagerBlock = $this->getChildBlock('feedback_list_pager');
        if ($pagerBlock instanceof DataObject) {
            /* @var $pagerBlock \Magento\Theme\Block\Html\Pager */
            $pagerBlock
                ->setUseContainer(false)
                ->setShowPerPage(false)
                ->setShowAmounts(false)
                ->setLimit($this->getLimit())
                ->setCollection($this->getCollection());
            return $pagerBlock->toHtml();
        }
        return '';
    }

    public function getLimit()
    {
        return static::PAGE_SIZE;
    }

    public function getAddFeedbackUrl()
    {
        return $this->getUrl('training_feedback/index/save');
    }

    public function getFeedbackDate($feedback)
    {
        return $this->timezone->formatDateTime($feedback->getCreationTime());
    }

    public function getAllFeedbackNumber()
    {
        return $this->feedback->getAllFeedbackNumber();
    }

    public function getActiveFeedbackNumber()
    {
        return $this->feedback->getActiveFeedbackNumber();
    }

}
