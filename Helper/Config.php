<?php
namespace Burst\Free\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper{
    public function __construct( 
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager)
	{
        $this->scopeConfig = $scopeConfig;
        $this->_storeManager = $storeManager;
    }
    /**
     * Get store ID
     *
     * @return string
     */
    public function getStoreID(){
        return $this->_storeManager->getStore()->getId();
        
    }
    /**
     * Get store name
     *
     * @return string
     */
    public function getStorename(){
        return $this->scopeConfig->getValue(
            'trans_email/ident_sales/name',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );   
    }
    /**
     * Get default store email
     *
     * @return string
     */
    public function getStoreEmail(){
        return $this->scopeConfig->getValue(
            'trans_email/ident_sales/email',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get activate status from modue 
     * 
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->scopeConfig->getValue('carriers/free/active', ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get module title
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->scopeConfig->getValue('carriers/free/title', ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get name from module
     * 
     * @return string
     */
    public function getName()
    {
        return $this->scopeConfig->getValue('carriers/free/name', ScopeInterface::SCOPE_STORE);
    }
    /**
     * Get handling_type from module
     * 
     * @return string
     */
    public function getHandlingType()
    {
        return $this->scopeConfig->getValue('carriers/free/handling_type', ScopeInterface::SCOPE_STORE);
    }
    /**
     * Get price from module
     * 
     * @return string
     */
    public function getPrice()
    {
        return $this->scopeConfig->getValue('carriers/free/price', ScopeInterface::SCOPE_STORE);
    }
    /**
     * Get regions from module
     * 
     * @return string
     */
    public function getRegions()
    {
        return $this->scopeConfig->getValue('carriers/free/regions', ScopeInterface::SCOPE_STORE);
    }
    /**
     * Get specificerrmsg from module
     * 
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->scopeConfig->getValue('carriers/free/specificerrmsg', ScopeInterface::SCOPE_STORE);
    }
    /**
     * Get minimum from module
     * 
     * @return string
     */
    public function getMinimum()
    {
        return $this->scopeConfig->getValue('carriers/free/minimum', ScopeInterface::SCOPE_STORE);
    }
}