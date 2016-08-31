$.mask.definitions['q'] = '[0-5]';
$.mask.definitions['w'] = '[0-9]';

var srednjaOcena1 = $('#SrednjaOcena1');
var srednjaOcena2 = $('#SrednjaOcena2');
var srednjaOcena3 = $('#SrednjaOcena3');
var srednjaOcena4 = $('#SrednjaOcena4');
var srednjaOcenaSrednjaSkola = $('#SrednjaOcenaSrednjaSkola');

srednjaOcena1.mask("q.ww");
srednjaOcena2.mask("q.ww");
srednjaOcena3.mask("q.ww");
srednjaOcena4.mask("q.ww");
srednjaOcenaSrednjaSkola.mask("q.ww");

srednjaOcena1.focusout(function(){
    var srednja = parseFloat(srednjaOcena1.val());
    var uspehId = uspeh(srednja);
    $('#prviRazred').val(uspehId);
});
srednjaOcena2.focusout(function(){
    var srednja = parseFloat(srednjaOcena2.val());
    var uspehId = uspeh(srednja);
    $('#drugiRazred').val(uspehId);
});
srednjaOcena3.focusout(function(){
    var srednja = parseFloat(srednjaOcena3.val());
    var uspehId = uspeh(srednja);
    $('#treciRazred').val(uspehId);
});
srednjaOcena4.focusout(function(){
    var srednja = parseFloat(srednjaOcena4.val());
    var uspehId = uspeh(srednja);
    $('#cetvrtiRazred').val(uspehId);
});

srednjaOcena4.focusout(function(){
    var srednja1 = parseFloat(srednjaOcena1.val());
    var srednja2 = parseFloat(srednjaOcena2.val());
    var srednja3 = parseFloat(srednjaOcena3.val());
    var srednja4 = parseFloat(srednjaOcena4.val());

    var suma = srednja1 + srednja2 + srednja3 + srednja4;
    $('#SrednjaOcenaSrednjaSkola').val((Math.round((suma/4) * 100) / 100).toFixed(2));
    $('#BrojBodovaSkola').val(Math.round((suma*3) *100) / 100);
});

srednjaOcenaSrednjaSkola.focusin(function () {
    var srednjaOcena = parseFloat($('#SrednjaOcenaSrednjaSkola').val());
    $('#OpstiUspehSrednjaSkola').val(uspeh(srednjaOcena));
});

srednjaOcenaSrednjaSkola.change(function () {
    var srednjaOcena = parseFloat($('#SrednjaOcenaSrednjaSkola').val());
    $('#OpstiUspehSrednjaSkola').val(uspeh(srednjaOcena));
});

$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});