/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'uiComponent',
    'Magento_Checkout/js/model/shipping-rates-validator',
    'Magento_Checkout/js/model/shipping-rates-validation-rules',
    '../../model/shipping-rates-validator/free',
    '../../model/shipping-rates-validation-rules/free'
], function (
    Component,
    defaultShippingRatesValidator,
    defaultShippingRatesValidationRules,
    freeShippingRatesValidator,
    freeShippingRatesValidationRules
) {
    'use strict';

    defaultShippingRatesValidator.registerValidator('free', freeShippingRatesValidator);
    defaultShippingRatesValidationRules.registerRules('free', freeShippingRatesValidationRules);

    return Component;
});
