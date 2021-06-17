<?php

namespace Training\Feedback\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\ManagerInterface;
use Magento\Sales\Controller\Adminhtml\Order\AddComment;
use Magento\TestFramework\Inspection\Exception;
use Psr\Log\LoggerInterface;
use Training\Feedback\Model\FeedbackFactory;
use Training\Feedback\Model\ResourceModel\Feedback;

class Save implements HttpPostActionInterface
{

    /**
     * @var ResultFactory
     */
    private $resultRawFactory;
    /**
     * @var FeedbackFactory
     */
    private $feedbackFactory;
    /**
     * @var Feedback
     */
    private $feedbackResource;
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var AddComment
     */
    private $comment;
    /**
     * @var ManagerInterface
     */
    private $messageManager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Save constructor.
     * @param ResultFactory $resultFactory
     * @param FeedbackFactory $feedbackFactory
     * @param Feedback $feedbackResource
     * @param RequestInterface $request
     * @param AddComment $comment
     */
    public function __construct(
        ResultFactory $resultFactory,
        FeedbackFactory $feedbackFactory,
        Feedback $feedbackResource,
        RequestInterface $request,
        AddComment $comment,
        ManagerInterface $messageManager,
        LoggerInterface $logger
    ) {
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackResource = $feedbackResource;
        $this->resultRawFactory = $resultFactory;
        $this->request = $request;
        $this->comment = $comment;
        $this->messageManager = $messageManager;
        $this->logger = $logger;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */

    public function execute()
    {
        $result = $this->resultRawFactory->create(ResultFactory::TYPE_RAW);
        if ($post = $this->comment->getRequest()->getPostValue()) {
            try {
                $this->validatePost($post);
                $feedback = $this->feedbackFactory->create();
                $feedback->setData($post);
                $this->messageManager->addSuccessMessage(
                    __('Thank you for your feedback.')
                );
            } catch (\Exception $e) {
                $this->logger->critical($e->getMessage());
                $this->messageManager->addErrorMessage(
                    __('An error occurred while processing your form. Please try again later.')
                );
                $result->setPath('*/*/form');
                return $result;
            }
        }
        $result->setPath('*/*/index');
    }

    /**
     * @throws LocalizedException
     * @throws Exception
     */
    private function validatePost($post)
    {
        if (!isset($post['author_name']) || trim($post['author_name']) === '') {
            throw new LocalizedException(__('Name is missing'));
        }
        if (!isset($post['message']) || trim($post['message']) === '') {
            throw new LocalizedException(__('Comment is missing'));
        }
        if (!isset($post['author_email']) || !str_contains($post['author_email'], '@')) {
            throw new LocalizedException(__('Invalid email address'));
        }
        if (trim($this->comment->getRequest()->getParam('hideit')) !== '') {
            throw new Exception();
        }
    }
}
