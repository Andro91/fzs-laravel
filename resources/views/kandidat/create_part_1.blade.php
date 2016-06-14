@extends('layouts.layout')
@section('page_heading','Унос кандидата - прва страна')
@section('section')
    <div class="col-sm-12" style="margin-bottom: 5%">
        <div class="row">
            <div class="col-lg-8">
                
                {{--GRESKE--}}
                @if (Session::get('errors'))
                    <div class="alert alert-dismissable alert-danger">
                        <h4>Greška!</h4>
                        <ul>
                            @foreach (Session::get('errors')->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::get('jmbgError'))
                    <div class="alert alert-dismissable alert-danger">
                        <h4><span class="glyphicon glyphicon-exclamation-sign"></span> Грешка!</h4>
                        <p>ЈМБГ већ постоји у систему.</p>
                        <p>{{ Session::get('status') }}</p>
                    </div>
                @endif

                <form role="form" method="post" action="{{ url('/kandidat') }}">
                    {{ csrf_field() }}
                    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
                    <input type="hidden" name="page" id="page" value="1" />

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Студијски програм</h3>
                        </div>
                        <div class="panel-body">
                            {{--<div class="form-group pull-left" style="width: 28%; margin-right: 2%">--}}
                                {{--<label for="TipStudija">Tip Studija:</label>--}}
                                {{--<select class="form-control" id="TipStudija" name="TipStudija">--}}
                                    {{--@foreach($tipStudija as $item)--}}
                                        {{--<option value="{{$item->id}}">{{$item->naziv}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                                <label for="StudijskiProgram">Студијски програм:</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 20%;">
                                <label for="SkolskeGodineUpisa">Школска година:</label>
                                <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                                    @foreach($skolskeGodineUpisa as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{--OSNOVNI PODACI--}}
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Основни подаци</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ImeKandidata">Име кандидата</label>
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata" value="{{ old('ImeKandidata') }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="PrezimeKandidata">Презиме кандидата</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata" value="{{ old('PrezimeKandidata') }}" >
                            </div>

                            <div class="form-group pull-left" style="width: 60%; margin-right: 2%;">
                                <label for="JMBG">ЈМБГ</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG" value="{{ old('JMBG') }}" >
                            </div>
                            <div class="form-group pull-left" style="width: 38%;">
                                <label for="DatumRodjenja">Датум рођења</label>
                                <input class="form-control" type="text" name="DatumRodjenja" id="DatumRodjenja" value="{{ old('DatumRodjenja') }}" >
                            </div>

                            <div class="form-group">
                                <label for="MestoRodjenja">Место рођења</label>
                                <select class="form-control" id="MestoRodjenja" name="MestoRodjenja" style="max-width: 60%" value="{{ old('MestoRodjenja') }}" >
                                    @foreach($mestoRodjenja as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KrsnaSlava">Крсна слава</label>
                                <select class="form-control" id="KrsnaSlava" name="KrsnaSlava" style="max-width: 50%">
                                    @foreach($krsnaSlava as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Контакт телефон</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon" style="max-width: 40%" value="{{ old('KontaktTelefon') }}" >
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">Адреса становања</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja" style="max-width: 80%" value="{{ old('AdresaStanovanja') }}" >
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%" value="{{ old('Email') }}" >
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ImePrezimeJednogRoditelja">Име и презиме једног родитеља</label>
                                <input class="form-control" type="text" name="ImePrezimeJednogRoditelja"
                                       id="ImePrezimeJednogRoditelja" value="{{ old('ImePrezimeJednogRoditelja') }}" >
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="KontaktTelefonRoditelja">контакт телефон родитеља</label>
                                <input class="form-control" type="text" name="KontaktTelefonRoditelja"
                                       id="KontaktTelefonRoditelja" value="{{ old('KontaktTelefonRoditelja') }}" >
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="NazivSkoleFakulteta">Назив школе или факултета</label>
                                <input class="form-control" type="text" name="NazivSkoleFakulteta"
                                       id="NazivSkoleFakulteta" value="{{ old('NazivSkoleFakulteta') }}">
                                <!-- <select class="form-control" id="NazivSkoleFakulteta" name="NazivSkoleFakulteta">
                                    @foreach($nazivSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select> -->
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="SmerZavrseneSkoleFakulteta">Смер завршене школе или факултета</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta" value="{{ old('SmerZavrseneSkoleFakulteta') }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="MestoZavrseneSkoleFakulteta">Место завршене школе или факултета</label>
                                <select class="form-control" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="GodinaStudija">Година студија</label>
                                <select class="form-control" id="GodinaStudija" name="GodinaStudija" style="max-width: 40%">
                                    @foreach($godinaStudija as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group text-center">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">Даље</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $.mask.definitions['q'] = '[0-3]';
        $.mask.definitions['w'] = '[0-9]';
        $.mask.definitions['e'] = '[0-1]';
        $('#DatumRodjenja').mask("qw.ew.9999.");

        $('#JMBG').focusout(function(){
            var jmbg = $('#JMBG').val();
            var millenia = jmbg[4] === '0' ? '2' : '1';
            $('#DatumRodjenja').val(jmbg[0] + jmbg[1] + '.' + jmbg[2] + jmbg[3] + '.' + millenia + jmbg[4] + jmbg[5] + jmbg[6] + '.' );
        });

        $(document).ready(function() {
          $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });
        });
    </script>

    <script>

  (function( $ ) {

    $.widget( "custom.combobox", {

      _create: function() {

        this.wrapper = $( "<span>" )

          .addClass( "custom-combobox" )

          .insertAfter( this.element );

 

        this.element.hide();

        this._createAutocomplete();

        this._createShowAllButton();

      },

 

      _createAutocomplete: function() {

        var selected = this.element.children( ":selected" ),

          value = selected.val() ? selected.text() : "";

 

        this.input = $( "<input>" )

          .appendTo( this.wrapper )

          .val( value )

          .attr( "title", "" )

          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )

          .autocomplete({

            delay: 0,

            minLength: 0,

            source: $.proxy( this, "_source" )

          })

          .tooltip({

            tooltipClass: "ui-state-highlight"

          });

 

        this._on( this.input, {

          autocompleteselect: function( event, ui ) {

            ui.item.option.selected = true;

            this._trigger( "select", event, {

              item: ui.item.option

            });

          },

 

          autocompletechange: "_removeIfInvalid"

        });

      },

 

      _createShowAllButton: function() {

        var input = this.input,

          wasOpen = false;

 

        $( "<a>" )

          .attr( "tabIndex", -1 )

          .attr( "title", "Show All Items" )

          .tooltip()

          .appendTo( this.wrapper )

          .button({

            icons: {

              primary: "ui-icon-triangle-1-s"

            },

            text: false

          })

          .removeClass( "ui-corner-all" )

          .addClass( "custom-combobox-toggle ui-corner-right" )

          .mousedown(function() {

            wasOpen = input.autocomplete( "widget" ).is( ":visible" );

          })

          .click(function() {

            input.focus();

 

            // Close if already visible

            if ( wasOpen ) {

              return;

            }

 

            // Pass empty string as value to search for, displaying all results

            input.autocomplete( "search", "" );

          });

      },

 

      _source: function( request, response ) {

        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );

        response( this.element.children( "option" ).map(function() {

          var text = $( this ).text();

          if ( this.value && ( !request.term || matcher.test(text) ) )

            return {

              label: text,

              value: text,

              option: this

            };

        }) );

      },

 

      _removeIfInvalid: function( event, ui ) {

 

        // Selected an item, nothing to do

        if ( ui.item ) {

          return;

        }

 

        // Search for a match (case-insensitive)

        var value = this.input.val(),

          valueLowerCase = value.toLowerCase(),

          valid = false;

        this.element.children( "option" ).each(function() {

          if ( $( this ).text().toLowerCase() === valueLowerCase ) {

            this.selected = valid = true;

            return false;

          }

        });

 

        // Found a match, nothing to do

        if ( valid ) {

          return;

        }

 

        // Remove invalid value

        this.input

          .val( "" )

          .attr( "title", value + " didn't match any item" )

          .tooltip( "open" );

        this.element.val( "" );

        this._delay(function() {

          this.input.tooltip( "close" ).attr( "title", "" );

        }, 2500 );

        this.input.autocomplete( "instance" ).term = "";

      },

 

      _destroy: function() {

        this.wrapper.remove();

        this.element.show();

      }

    });

  })( jQuery );

 

  $(function() {

    $( "#combobox" ).combobox();

    $( "#toggle" ).click(function() {

      $( "#combobox" ).toggle();

    });

  });

  </script>

</head>

<body>

 

<div class="ui-widget">

  <label>Your preferred programming language: </label>

  <select id="combobox">

    <option value="">Select one...</option>

    <option value="ActionScript">ActionScript</option>

    <option value="AppleScript">AppleScript</option>

    <option value="Asp">Asp</option>

    <option value="BASIC">BASIC</option>

    <option value="C">C</option>

    <option value="C++">C++</option>

    <option value="Clojure">Clojure</option>

    <option value="COBOL">COBOL</option>

    <option value="ColdFusion">ColdFusion</option>

    <option value="Erlang">Erlang</option>

    <option value="Fortran">Fortran</option>

    <option value="Groovy">Groovy</option>

    <option value="Haskell">Haskell</option>

    <option value="Java">Java</option>

    <option value="JavaScript">JavaScript</option>

    <option value="Lisp">Lisp</option>

    <option value="Perl">Perl</option>

    <option value="PHP">PHP</option>

    <option value="Python">Python</option>

    <option value="Ruby">Ruby</option>

    <option value="Scala">Scala</option>

    <option value="Scheme">Scheme</option>

  </select>

</div>

<button id="toggle">Show underlying select</button>


@endsection
