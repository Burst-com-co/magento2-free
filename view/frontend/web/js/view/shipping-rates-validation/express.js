/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'uiComponent',
    'Magento_Checkout/js/model/shipping-rates-validator',
    'Magento_Checkout/js/model/shipping-rates-validation-rules',
    '../../model/shipping-rates-validator/express',
    '../../model/shipping-rates-validation-rules/express'
], function (
    Component,
    defaultShippingRatesValidator,
    defaultShippingRatesValidationRules,
    expressShippingRatesValidator,
    expressShippingRatesValidationRules
) {
    'use strict';

    defaultShippingRatesValidator.registerValidator('express', expressShippingRatesValidator);
    defaultShippingRatesValidationRules.registerRules('express', expressShippingRatesValidationRules);

    return Component;
});
