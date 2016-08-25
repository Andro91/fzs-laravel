/**
 * Created by Andrija on 18-Aug-16.
 */
$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    $.mask.definitions['q'] = '[0-3]';
    $.mask.definitions['w'] = '[0-9]';
    $.mask.definitions['e'] = '[0-1]';
    $('.dateMask').mask("qw.ew.9999.");

    $.mask.definitions['r'] = '[0-2]';
    $.mask.definitions['t'] = '[0-5]';
    $('.timeMask').mask("rw:tw");

});
