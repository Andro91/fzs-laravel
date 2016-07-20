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
    $('#DatumRodjenja').mask("qw.ew.9999.");

    $('#JMBG').focusout(function(){
        var jmbg = $('#JMBG').val();
        if(jmbg.length < 7 || jmbg == null ){ return; }
        var millennium = jmbg[4] === '0' ? '2' : '1';
        $('#DatumRodjenja').val(jmbg[0] + jmbg[1] + '.' + jmbg[2] + jmbg[3] + '.' + millennium + jmbg[4] + jmbg[5] + jmbg[6] + '.' );
    });
  });