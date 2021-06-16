define([
    'jquery'
], function ($) {
    'use strict';

    const elem = $('#test-element');

    if (elem) {
        console.log(elem);
    } else {
        console.log('No elements');
    }

    return (function (config, element) {
        console.log(config, element);
        console.log('testing 2');
    })();
});