var config = {
    config: {
        mixins: {
            'Magento_Catalog/js/catalog-add-to-cart': {
                'Training_Test/js/catalog-add-to-cart/mixin': true
            },
            'Magento_Checkout/js/action/place-order': {
                'Training_Test/js/checkout/action/place-order/mixin': false
            }
        }
    }
}
