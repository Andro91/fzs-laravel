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

srednjaOcena1.change(function(){
    var srednja = parseFloat(srednjaOcena1.val());
    var uspehId = uspeh(srednja);
    $('#prviRazred').val(uspehId);

    racunajOcenu();
});

srednjaOcena2.change(function(){
    var srednja = parseFloat(srednjaOcena2.val());
    var uspehId = uspeh(srednja);
    $('#drugiRazred').val(uspehId);

    racunajOcenu();
});

srednjaOcena3.change(function(){
    var srednja = parseFloat(srednjaOcena3.val());
    var uspehId = uspeh(srednja);
    $('#treciRazred').val(uspehId);

    racunajOcenu();
});

srednjaOcena4.change(function(){
    var srednja = parseFloat(srednjaOcena4.val());
    var uspehId = uspeh(srednja);
    $('#cetvrtiRazred').val(uspehId);

    racunajOcenu();
});

function racunajOcenu(){
    var srednja1 = isNaN(parseFloat(srednjaOcena1.val())) ? 0 : parseFloat(srednjaOcena1.val());
    var srednja2 = isNaN(parseFloat(srednjaOcena2.val())) ? 0 : parseFloat(srednjaOcena2.val());
    var srednja3 = isNaN(parseFloat(srednjaOcena3.val())) ? 0 : parseFloat(srednjaOcena3.val());
    var srednja4 = isNaN(parseFloat(srednjaOcena4.val())) ? 0 : parseFloat(srednjaOcena4.val());

    var suma = srednja1 + srednja2 + srednja3 + srednja4;
    $('#SrednjaOcenaSrednjaSkola').val((Math.round((suma/4) * 100) / 100).toFixed(2));
    $('#BrojBodovaSkola').val(Math.round((suma*3) *100) / 100);

    var skola = parseFloat($('#BrojBodovaSkola').val());
    var test = parseFloat($('#BrojBodovaTest').val());

    $('#ukupniBrojBodova').val((skola + test).toFixed(2));
}

srednjaOcenaSrednjaSkola.focusin(function () {
    var srednjaOcena = parseFloat($('#SrednjaOcenaSrednjaSkola').val());
    $('#OpstiUspehSrednjaSkola').val(uspeh(srednjaOcena));
});

srednjaOcenaSrednjaSkola.change(function () {
    var srednjaOcena = parseFloat($('#SrednjaOcenaSrednjaSkola').val());
    $('#OpstiUspehSrednjaSkola').val(uspeh(srednjaOcena));
});

$('#BrojBodovaTest').change(function () {
    var skola = parseFloat($('#BrojBodovaSkola').val());
    var test = parseFloat($('#BrojBodovaTest').val());

    $('#ukupniBrojBodova').val((skola + test).toFixed(2));
});

$('#BrojBodovaSkola').change(function () {
    var skola = parseFloat($('#BrojBodovaSkola').val());
    var test = parseFloat($('#BrojBodovaTest').val());

    $('#ukupniBrojBodova').val((skola + test).toFixed(2));
});

$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});