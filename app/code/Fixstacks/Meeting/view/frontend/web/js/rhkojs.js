define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
        'use strict';
        return Component.extend({
            defaults: {
                template: '' +
                    'Fixstacks_Meeting/Meeting-test-example'
            },
            initialize: function () {
                this._super();
            }
        });
    }
);
