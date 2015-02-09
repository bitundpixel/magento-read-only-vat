<?php

class BitUndPixel_ReadOnlyVat_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function preserveVatId($observer)
    {
        /** @var Mage_Customer_Model_Address $address */
        $address = $observer->getEvent()->getDataObject();
        $orgAddress = Mage::getModel('customer/address')->load($address->getId());

        if ($orgAddress->hasVatId() && $address->getVatId() != $orgAddress->getVatId()) {
            $address->setData('vat_id', $orgAddress->getVatId());
        }

    }
}
