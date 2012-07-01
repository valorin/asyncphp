/**
 * Asynchronous PHP
 */

// Create Object
var asyncPhp = new Object

// Trigger Function
asyncPhp.trigger = (function(flag, parameters, method) {
    // Check method
    if (!method) method = 'POST'

    // IF jQuery
    if (window.jQuery) {
        $.ajax({
            type: method,
            data: {asyncphp: 'trigger', flag: flag, parameters: parameters},
            dataType: "json",
        }).done(function( data ) {
            console.log( data );
        });
    } else {
        console.log("No compatible Javascript library found!");
    }
});
