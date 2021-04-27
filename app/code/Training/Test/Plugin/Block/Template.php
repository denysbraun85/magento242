<?php

namespace Training\Test\Plugin\Block;

class Template
{
    public function afterToHtml(
        \Magento\Framework\View\Element\Template $subject,
        $result
    ) {
        if ($subject->getNameInLayout() == 'top.search') {
            $result = '<div class="test-den"><p>' . $subject->getTemplate() . '</p>'
                . '<p>' . get_class($subject) . '</p>' . $result . '</div>';
        }
        return $result;
    }
}
