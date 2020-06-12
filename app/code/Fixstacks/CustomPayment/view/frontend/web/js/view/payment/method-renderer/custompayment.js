

define(
    [
        'jquery',
        'Magento_Checkout/js/view/payment/default'
    ],
    function (Component) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Fixstacks_CustomPayment/payment/custompayment'
            },
                context: function() {
                return this;
                },
                getCode: function() {
                return 'fixstacks_custompayment';
                },
                isActive: function() {
                return true;
            }
        });
    }
);
