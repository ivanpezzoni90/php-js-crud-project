<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
        <script 
            src="https://maxcdn.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js" 
            integrity="sha384-vOWIrgFbxIPzY09VArRHMsxned7WiY6hzIPtAIIeTFuii9y3Cr6HE6fcHXy5CFhc" 
            crossorigin="anonymous">
        </script>
        <script 
            type="text/javascript" 
            src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js">
        </script>
        <link 
            href="https://maxcdn.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" 
            rel="stylesheet" integrity="sha384-4FeI0trTH/PCsLWrGCD1mScoFu9Jf2NdknFdFoJhXZFwsvzZ3Bo5sAh7+zL8Xgnd" 
            crossorigin="anonymous">
        <link 
            rel="stylesheet" 
            type="text/css" 
            href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"  />
        <script type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <style>
            
        </style>
        <header>
            <div class="logo">
                <img src="https://www.eleva.it/img/logo_negativo.svg">
            </div>
            <h2 class="headerTitle">Eleva Impianti e Persone</h2>
        </header>
        <div class="container">
            
            <div class="mainContent">
                <ul class="nav nav-tabs eleva-tabs">
                    <li class="active"><a data-toggle="tab" href="#personeTab">Persone</a></li>
                    <li><a data-toggle="tab" href="#impiantiTab">Impianti</a></li>
                    <li><a data-toggle="tab" href="#mappaTab" id="mappaTrigger">Mappa</a></li>
                </ul>
                <div class="tab-content">
                    
                    <div id="personeTab" class="tab-pane active">
                        <div class="space-bottom-m title-eleva">
                            <h2>Le mie persone</h2>
                        </div>
                        <div class="row-fluid space-top-s space-bottom-s
                             mostra-aggiungi-persona-btn-cont">
                            <div class="span4 mobile-not-visible"></div>
                            <div class="span4">
                                <button class="btn btn-eleva-orange 
                                    mostra-aggiungi-persona-btn">
                                    Aggiungi una persona
                                </button>
                            </div>
                            <div class="span2 mobile-not-visible"></div>
                        </div>
                        <div class="row-fluid space-top-s space-bottom-s 
                             element-not-visible nascondi-aggiungi-persona-btn-cont">
                            <div class="span4 mobile-not-visible"></div>
                            <div class="span4">
                                <button class="btn btn-eleva-orange 
                                    nascondi-aggiungi-persona-btn">
                                    Indietro
                                </button>
                            </div>
                            <div class="span2 mobile-not-visible"></div>
                        </div>
                        <div class="aggiungi-persona element-not-visible">
                            <form id="aggiungiPersonaForm">
                                <div class="row-fluid space-top-s space-bottom-s">
                                    <div class="span2 mobile-not-visible"></div>
                                    <div class="span4">
                                        <label>Nome</label>
                                        <input type="text" id="personaNome" 
                                            class="wider">
                                    </div>
                                    <div class="span4">
                                        <label>Cognome</label>
                                        <input type="text" id="personaCognome" 
                                            class="wider">
                                    </div>
                                    <div class="span2 mobile-not-visible"></div>
                                </div>
                                <div class="row-fluid space-top-s space-bottom-s">
                                    <div class="span2 mobile-not-visible"></div>
                                    <div class="span4">
                                        <label>Data di nascita</label>
                                        <input type="date" id="personaDataNascita" 
                                            class="wider" placeholder="gg/mm/aaaa">
                                    </div>
                                    <div class="span4">
                                        <label>Email</label>
                                        <input type="text" id="personaEmail" 
                                            class="wider" placeholder="name@company.com">
                                    </div>
                                    <div class="span2 mobile-not-visible"></div>
                                </div>
                                <div class="row-fluid space-top-s space-bottom-s">
                                    <div class="span2 mobile-not-visible"></div>
                                    <div class="span4">
                                        <label>Ruolo</label>
                                        <select class="wider" id="personaRuolo" 
                                                placeholder="ruolo">
                                            <option value="addetto">Addetto</option>
                                            <option value="supervisore">Supervisore</option>
                                        </select>
                                    </div>
                                    <div class="span4">
                                        <label>Assegna agli impianti</label>
                                        <select multiple class="wider" 
                                                id="personaImpianto" placeholder="ruolo">
                                        </select>
                                    </div>
                                    <div class="span2 mobile-not-visible"></div>
                                </div>
                            </form><!--#/aggiungiPersonaForm-->
                            <div class="row-fluid center element-not-visible" id="personaErrorMessage">
                                <span class="title-eleva">Compilare tutti i campi prima di proseguire</span>
                            </div>
                            <div class="row-fluid center element-not-visible" id="personaErrorMessageEmail">
                                <span class="title-eleva">Email non valida</span>
                            </div>
                            <div class="row-fluid space-top-s space-bottom-s">
                                <div class="span4 mobile-not-visible"></div>
                                <div class="span4">
                                    <button class="btn btn-eleva-orange aggiungi-persona-btn">
                                        Aggiungi
                                    </button>
                                </div>
                                <div class="span2 mobile-not-visible"></div>
                            </div>
                        </div><!--./aggiungi-persona-->
                        <div class="center space-top-s">
                            <span class="title-eleva">Fai clic su una riga per modificarla</span>
                        </div>
                        <div class="persone-table datatable-container mobile-not-visible">
                            <table id="personeTable" class="table table-eleva">
                                <thead>
                                    <tr>
                                        <th>Cognome</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Data di nascita</th>
                                        <th>Ruolo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="persone-box mobile-visible space-top-s"></div>
                    </div><!--#/personeTab-->
                    
                    <div id="impiantiTab" class="tab-pane fade">
                        <div class="space-bottom-m title-eleva">
                            <h2>I miei impianti</h2>
                        </div>
                        <div class="row-fluid space-top-s space-bottom-s
                             mostra-aggiungi-impianto-btn-cont">
                            <div class="span4 mobile-not-visible"></div>
                            <div class="span4">
                                <button class="btn btn-eleva-orange 
                                    mostra-aggiungi-impianto-btn">
                                    Aggiungi un impianto
                                </button>
                            </div>
                            <div class="span2 mobile-not-visible"></div>
                        </div>
                        <div class="row-fluid space-top-s space-bottom-s 
                             element-not-visible nascondi-aggiungi-impianto-btn-cont">
                            <div class="span4 mobile-not-visible"></div>
                            <div class="span4">
                                <button class="btn btn-eleva-orange 
                                    nascondi-aggiungi-impianto-btn">
                                    Indietro
                                </button>
                            </div>
                            <div class="span2 mobile-not-visible"></div>
                        </div>
                        <div class="aggiungi-impianto element-not-visible">
                            <form id="aggiungiImpiantoForm">
                                <div class="row-fluid space-top-s space-bottom-s">
                                    <div class="span2 mobile-not-visible"></div>
                                    <div class="span4">
                                        <label>Nome</label>
                                        <input type="text" id="impiantoNome" 
                                            class="wider">
                                    </div>
                                    <div class="span4">
                                        <label>Indirizzo</label>
                                        <input type="text" id="impiantoIndirizzo" 
                                            class="wider" 
                                            placeholder="Digita un indirizzo oppure clicca sulla mappa">
                                    </div>
                                    <div class="span2 mobile-not-visible"></div>
                                </div>
                                <div class="row-fluid space-top-s space-bottom-s">
                                    <div class="span2 mobile-not-visible"></div>
                                    <div class="span4">
                                        <label>Latitudine</label>
                                        <input type="text" id="impiantoLatitudine" 
                                            class="wider" disabled>
                                    </div>
                                    <div class="span4">
                                        <label>Longitudine</label>
                                        <input type="text" id="impiantoLongitudine" 
                                            class="wider" disabled>
                                    </div>
                                    <div class="span2 mobile-not-visible"></div>
                                </div>
                            </form><!--#/aggiungiImpiantoForm-->
                            <div class="row-fluid center element-not-visible" id="impiantoErrorMessage">
                                <span class="title-eleva">Compilare tutti i campi prima di proseguire</span>
                            </div>
                            <div class="row-fluid space-top-s space-bottom-s">
                                <div class="span4 mobile-not-visible"></div>
                                <div class="span4">
                                    <button class="btn btn-eleva-orange aggiungi-impianto-btn">
                                        Aggiungi
                                    </button>
                                </div>
                                <div class="span2 mobile-not-visible"></div>
                            </div>
                            <div class="space-top-s">
                                <div id="add-map" class="google-map-add-impianti google-map"></div>
                            </div>
                        </div><!--./aggiungi-impianto-->
                        <div class="center space-top-s">
                            <span class="title-eleva">Fai clic su una riga per modificarla</span>
                        </div>
                        <div class="impianti-table datatable-container mobile-not-visible">
                            <table id="impiantiTable" class="table table-eleva">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Indirizzo</th>
                                        <th>Longitudine</th>
                                        <th>Latitudine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="impianti-box mobile-visible space-top-s"></div>
                    </div><!--#/impiantiTab-->
                    
                    <div id="mappaTab" class="tab-pane">
                        <div class="space-bottom-m title-eleva">
                            <h2>La mia mappa</h2>
                        </div>
                        <div class="space-top-s title-eleva">
                            <span>Clicca su un impianto per visualizzare le persone</span>
                        </div>
                        <div class="space-top-s">
                            <div id="map" class="google-map-impianti google-map"></div>
                        </div>
                    </div><!--#/mappaTab-->
                    
                </div><!--./tab-content-->
                
                <!--Modals-->
                
                <button id="personeImpiantiModalBtn" class="element-not-visible" 
                    data-toggle="modal" data-target="#personeImpiantiModal">
                </button>
                <div id="personeImpiantiModal" class="modal fade element-not-visible" 
                        role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" 
                                    data-dismiss="modal">&times;
                                </button>
                                <h4 class="title-eleva">Le mie persone in questo
                                    impianto
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="persone-modal-box"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-eleva-orange" 
                                    data-dismiss="modal">Chiudi
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!--#/personeImpiantiModal-->
                
                <button id="personaEditModalBtn" class="element-not-visible" 
                    data-toggle="modal" data-target="#personaEditModal">
                </button>
                <div id="personaEditModal" class="modal fade element-not-visible" 
                        role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" 
                                    data-dismiss="modal">&times;
                                </button>
                                <h4 class="title-eleva">Modifica
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form id="editPersonaForm">
                                    <input type="hidden" id="personaIdEdit">
                                    <div class="row-fluid space-top-s space-bottom-s">
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Nome</label>
                                            <input type="text" id="personaNomeEdit" 
                                                class="wider">
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Cognome</label>
                                            <input type="text" id="personaCognomeEdit" 
                                                class="wider">
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                    </div>
                                    <div class="row-fluid space-top-s space-bottom-s">
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Data di nascita</label>
                                            <input type="date" id="personaDataNascitaEdit" 
                                                class="wider" placeholder="gg/mm/aaaa">
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Email</label>
                                            <input type="text" id="personaEmailEdit" 
                                                class="wider" placeholder="name@company.com">
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                    </div>
                                    <div class="row-fluid space-top-s space-bottom-s">
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Ruolo</label>
                                            <select class="wider" id="personaRuoloEdit" 
                                                    placeholder="ruolo">
                                                <option value="addetto">Addetto</option>
                                                <option value="supervisore">Supervisore</option>
                                            </select>
                                        </div>
                                        <div class="span2 mobile-not-visible"></div>
                                    </div>
                                </form><!--#/editPersonaForm-->
                                <div class="row-fluid center element-not-visible" id="personaErrorMessageEdit">
                                    <span class="title-eleva">Compilare tutti i campi prima di proseguire</span>
                                </div>
                                <div class="row-fluid center element-not-visible" id="personaErrorMessageEmailEdit">
                                    <span class="title-eleva">Email non valida</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-eleva-orange
                                    edit-persona-btn">Salva
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!--#/personaEditModal-->
                
                <button id="impiantoEditModalBtn" class="element-not-visible" 
                    data-toggle="modal" data-target="#impiantoEditModal">
                </button>
                <div id="impiantoEditModal" class="modal fade element-not-visible" 
                        role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" 
                                    data-dismiss="modal">&times;
                                </button>
                                <h4 class="title-eleva">Modifica
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form id="editImpiantoForm">
                                    <input type="hidden" id="impiantoIdEdit">
                                    <div class="row-fluid space-top-s space-bottom-s">
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Nome</label>
                                            <input type="text" id="impiantoNomeEdit" 
                                                class="wider">
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Indirizzo</label>
                                            <input type="text" id="impiantoIndirizzoEdit" 
                                                class="wider" 
                                                placeholder="Digita un indirizzo">
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                    </div>
                                    <div class="row-fluid space-top-s space-bottom-s">
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Latitudine</label>
                                            <input type="text" id="impiantoLatitudineEdit" 
                                                class="wider" disabled>
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                        <div class="span4">
                                            <label>Longitudine</label>
                                            <input type="text" id="impiantoLongitudineEdit" 
                                                class="wider" disabled>
                                        </div>
                                        <div class="span1 mobile-not-visible"></div>
                                    </div>
                                </form><!--#/editImpiantoForm-->
                                <div class="row-fluid center element-not-visible" id="impiantoErrorMessageEdit">
                                    <span class="title-eleva">Compilare tutti i campi prima di proseguire</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-eleva-orange
                                    edit-impianto-btn">Salva
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!--#/impiantoEditModal-->
                
                <!--end modals-->
                
            </div><!--./mainContent-->
            
        </div><!--./container-->
        
        <script>
            var personeTableCreated = false;
            var personeTable;
            var impiantiTableCreated = false;
            var impiantiTable;
            var map;
            var addMap;
            var addMarker;
            
            var language = {
                "info": "Pagina  _PAGE_ di _PAGES_",
                "infoEmpty": "Nessun dato",
                "emptyTable":     "Nessun dato",
                "info":           "Visualizza da _START_ a _END_ di _TOTAL_ totali",
                "lengthMenu":     "Mostra _MENU_ dati",
                "loadingRecords": "Caricamento...",
                "processing":     "Elaborazione...",
                "search":         "Cerca:",
                "zeroRecords":    "Nessun dato",
                "infoFiltered": "(filtrato su _MAX_ dati   totali)",
                "paginate": {
                    "first":      "Prima",
                    "last":       "Ultima",
                    "next":       "Prossima",
                    "previous":   "Precedente"
                }
            };
            
            $(document).ready(function(){
                searchPersone();
                
                $('.aggiungi-persona-btn').click(function(){
                    if(validatePersonaForm
                            ('aggiungiPersonaForm', $('#personaEmail'), 
                            '#personaErrorMessageEmail')){
                        aggiungiPersona();
                        $('#personaErrorMessage').addClass('element-not-visible');
                    } else {
                        $('#personaErrorMessage').removeClass('element-not-visible');
                    }
                });
                
                $('.aggiungi-impianto-btn').click(function(){
                    if(validateImpiantoForm('aggiungiImpiantoForm')){
                        aggiungiImpianto(); 
                        $('#impiantoErrorMessage').addClass('element-not-visible');
                    } else {
                        $('#impiantoErrorMessage').removeClass('element-not-visible');
                    }
                });
                
                $('.edit-persona-btn').click(function(){
                    if(validatePersonaForm
                            ('editPersonaForm', $('#personaEmailEdit'),
                            '#personaErrorMessageEmailEdit')){
                        editPersona();
                        $('#personaErrorMessageEdit').addClass('element-not-visible');
                    } else {
                        $('#personaErrorMessageEdit').removeClass('element-not-visible');
                    }
                });
                
                $('.edit-impianto-btn').click(function(){
                    if(validateImpiantoForm('editImpiantoForm')){
                        editImpianto(); 
                        $('#impiantoErrorMessageEdit').addClass('element-not-visible');
                    } else {
                        $('#impiantoErrorMessageEdit').removeClass('element-not-visible');
                    }
                });
                
                $('#personaImpianto').change(function(){
                    var val = $(this).val();
                    var valS = val.join(",");
                    if(val.length > 1 && valS.indexOf("-1") !== -1){
                        val.splice(val.indexOf("-1"), 1);
                        $(this).val(val);
                    }
                });
                
                $('#personeTable').on('click', 'td', function(){
                    var id = $(this).closest('tr').attr('id');
                    if(id){
                        getPersonaById(id);
                    }
                });
                
                $('#impiantiTable').on('click', 'td', function(){
                    var id = $(this).closest('tr').attr('id');
                    if(id){
                        getImpiantoById(id);
                    }
                });
                
                $('#personaEmail').blur(function(){
                    validateEmail($(this));
                });
                
                $('.mostra-aggiungi-persona-btn').click(function(){
                    $('.nascondi-aggiungi-persona-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.mostra-aggiungi-persona-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.aggiungi-persona').slideToggle();
                });
                
                $('.nascondi-aggiungi-persona-btn').click(function(){
                    $('.mostra-aggiungi-persona-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.nascondi-aggiungi-persona-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.aggiungi-persona').slideToggle();
                });
                
                $('.mostra-aggiungi-impianto-btn').click(function(){
                    $('.nascondi-aggiungi-impianto-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.mostra-aggiungi-impianto-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.aggiungi-impianto').slideToggle();
                });
                
                $('.nascondi-aggiungi-impianto-btn').click(function(){
                    $('.mostra-aggiungi-impianto-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.nascondi-aggiungi-impianto-btn-cont')
                        .toggleClass('element-not-visible');
                    $('.aggiungi-impianto').slideToggle();
                });
                
                $('#mappaTrigger').click(function(){
                    searchImpianti();
                });
            }); //end document ready
            
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANIESW_c5pMRyENMydVGH394ZTdSY0l7o&libraries=places&callback=initMap">
        </script>

    </body>
</html>
