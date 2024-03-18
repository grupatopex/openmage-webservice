<?php
/**
 * @author Tomasz Gregorczyk <t.gregorczyk@grupatopex.com>
 */
class Gtx_Webservice_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @var string
     */
    public const XPATH_GTX_WEBSERVICE_USERNAME = 'gtx_webservice/general/username';

    /**
     * @var string
     */
    public const XPATH_GTX_WEBSERVICE_PASSWORD = 'gtx_webservice/general/password';

    /**
     * @return string
     */
    public function getUsername()
    {
        return Mage::getStoreConfig(self::XPATH_GTX_WEBSERVICE_USERNAME);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return Mage::getModel('core/encryption')->decrypt(Mage::getStoreConfig(self::XPATH_GTX_WEBSERVICE_PASSWORD));
    }
}
