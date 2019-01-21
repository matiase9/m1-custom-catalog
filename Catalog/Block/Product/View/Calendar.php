<?php
class WFS_Catalog_Block_Product_View_Calendar extends Mage_Core_Block_Template
{
    /**
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
        $this->_injectCalendarControlJsCSSInHTMLPageHead();

        return parent::_prepareLayout();
    }

    /**
     * @return $this
     */
    private function _injectCalendarControlJsCSSInHTMLPageHead()
    {
        $this->getLayout()->getBlock('head')->append(
            $this->getLayout()->createBlock(
                'Mage_Core_Block_Html_Calendar',
                'html_calendar',
                array('template' => 'page/js/calendar.phtml')
            )
        );
        return $this;
    }

}