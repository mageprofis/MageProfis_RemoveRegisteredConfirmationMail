<?php

trait MageProfis_RemoveRegisteredConfirmationMail_Model_Customer_Trait
{

    /**
     * Send email with new account related information
     * add ability to enable and disable some emails
     *
     * @param string $type
     * @param string $backUrl
     * @param string $storeId
     * @throws Mage_Core_Exception
     * @return Mage_Customer_Model_Customer
     */
    public function sendNewAccountEmail($type = 'registered', $backUrl = '', $storeId = '0')
    {
        if (!$storeId)
        {
            $storeId = $this->_getWebsiteStoreId($this->getSendemailStoreId());
        }
        if($type == 'registered' && !Mage::getStoreConfigFlag(MageProfis_RemoveRegisteredConfirmationMail_Helper_Data::XML_PATH_CAN_SEND_REGISTERED_MAIL, $storeId))
        {
            return $this;
        }
        if($type == 'confirmed' && !Mage::getStoreConfigFlag(MageProfis_RemoveRegisteredConfirmationMail_Helper_Data::XML_PATH_CAN_SEND_CONFIRMED_MAIL, $storeId))
        {
            return $this;
        }
        return parent::sendNewAccountEmail($type, $backUrl, $storeId);
    }
}
