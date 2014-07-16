<?php
/**
 *
 * This source file is subject to the Ecommerce Shift Software License, which is available at http://ecommerceshift.com/common/license-free-ru.txt.
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 *
 * NOTICE OF LICENSE
 *
 * You may not sell, sub-license, rent or lease
 * any portion of the Software or Documentation to anyone.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @category   Eshift
 * @copyright  Copyright (c) 2014 Ecommerce Shift (http://ecommerceshift.com/)
 * @contacts   support@ecommerceshift.com
 * @author     Alexander Dashkov (dashkov1@gmail.com)
 * @license    http://ecommerceshift.com/common/license-free-ru.txt
 */
class Eshift_Escommon_Block_Template extends Mage_Core_Block_Template
{

    /**
     * Set cache data
     */
    protected function _construct()
    {
        $this->addData(array(   'cache_lifetime' => false,
                                'cache_tags' => array(
                                    Mage_Core_Model_Store::CACHE_TAG
                                )));
    }

    /**
     * Get Key pieces for caching block content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $shortCacheId = array(
            'ESCOMMON',
            Mage::app()->getStore()->getId(),
            Mage::getDesign()->getPackageName(),
            Mage::getDesign()->getTheme('template'),
            'template' => $this->getTemplate(),
            'name' => $this->getNameInLayout(),
        );

        return $shortCacheId;
    }

}
