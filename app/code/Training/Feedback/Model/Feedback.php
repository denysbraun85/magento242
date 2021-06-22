<?php

namespace Training\Feedback\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Training\Feedback\Api\Data\FeedbackInterface;
use Training\Feedback\Model\ResourceModel\Feedback as ResourceModel;

abstract class Feedback extends AbstractExtensibleModel implements FeedbackInterface
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @var string
     */
    protected $_eventPrefix = 'training_feedback';

    /**
     * @var string
     */
    protected $_eventObject = 'feedback';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getFeedbackId(): ?int
    {
        return $this->getData(self::FEEDBACK_ID) === null ? null
            : (int)$this->getData(self::FEEDBACK_ID);
    }

    /**
     * @inheritDoc
     */
    public function setFeedbackId(?int $feedbackId): void
    {
        $this->setData(self::FEEDBACK_ID, $feedbackId);
    }

    /**
     * @inheritDoc
     */
    public function getAuthorName(): ?string
    {
        return $this->getData(self::AUTHOR_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setAuthorName($authorName): void
    {
        $this->setData(self::AUTHOR_NAME, $authorName);
    }

    /**
     * @inheritDoc
     */
    public function getAuthorEmail(): ?string
    {
        return $this->getData(self::AUTHOR_EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setAuthorEmail($authorEmail): void
    {
        $this->setData(self::AUTHOR_EMAIL, $authorEmail);
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): ?string
    {
        return $this->getData(self::MESSAGE);
    }

    /**
     * @inheritDoc
     */
    public function setMessage($message): void
    {
        $this->setData(self::MESSAGE, $message);
    }

    /**
     * @inheritDoc
     */
    public function getCreationTime(): ?string
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * @inheritDoc
     */
    public function setCreationTime($creationTime): void
    {
        $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * @inheritDoc
     */
    public function getUpdateTime(): ?string
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * @inheritDoc
     */
    public function setUpdateTime($updateTime): void
    {
        $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * @inheritDoc
     */
    public function getIsActive(): ?bool
    {
        return $this->getData(self::IS_ACTIVE) === null ? null
            : (bool)$this->getData(self::IS_ACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setIsActive($isActive): void
    {
        $this->setData(self::IS_ACTIVE, $isActive);
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(\Training\Feedback\Api\Data\FeedbackExtensionInterface $extensionAttributes)
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}
