<?php

namespace Burst\Free\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Magento\Store\Model\ScopeInterface;

class RegionsList implements ArrayInterface
{
    /**
     * Get country path
     */
    const COUNTRY_CODE_PATH = 'general/country/default';
 
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Directory\Model\Country $country
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->_country=$country;
    }

    public function toOptionArray()
    {
        $arr = $this->_toArray();
        $ret = [];

        foreach ($arr as $key => $value)
        {
            $ret[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $ret;
    }

    private function _toArray()
    {
        $regions_list=[];
        $regions = $this->getRegionsOfCountry($this->getCountryByWebsite());
        foreach ($regions as $region)
        {
            $regions_list[$region->getRegionId()] = $region->getName();
        }
        return $regions_list;
    }
    /**
     * Get Country code by website scope
     *
     * @return string
     */
    public function getCountryByWebsite(): string
    {
        return $this->scopeConfig->getValue(
            self::COUNTRY_CODE_PATH,
            ScopeInterface::SCOPE_WEBSITES
        );
    }
    /** 
     * Get the list of regions present in the given Country
     * Returns empty array if no regions available for Country
     * 
     * @param String
     * @return Array/Void
    */
    public function getRegionsOfCountry($countryCode) {
        $regionCollection = $this->_country->loadByCode($countryCode)->getRegions();
        $regions = $regionCollection->loadData()->toOptionArray(false);
        return $regionCollection;
    }
}