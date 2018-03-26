
/**Persone Functions**/

function aggiungiPersona(){
    var data = {
        nome: $('#personaNome').val(),
        cognome: $('#personaCognome').val(),
        data_nascita: $('#personaDataNascita').val(),
        email: $('#personaEmail').val(),
        ruolo: $('#personaRuolo').val(),
        impianti: ($('#personaImpianto').val()).join(',')
    };
    $.ajax({
        type: 'POST',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=insert_persone",
        data: data,
        success: function(data) {
            console.log(data);
            if(data === "OK"){
                searchPersone();
                $('.nascondi-aggiungi-persona-btn').click();
                resetFormInputs('aggiungiPersonaForm');
                resetFormSelects('aggiungiPersonaForm');
            } else {
                alert(data);
            }
        },
        error: function(data){
            console.log(data);
            alert(data);
        }
    });
}

function searchPersone(){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=get_persone",
        success: function(data) {
            console.log(data);
            createTablePersone(data);
            createBoxMobilePersone(data, $('.persone-box'), 8);
        },
        error: function(data){
            console.log(data);
        }
    });
}

function createTablePersone(data){
    if(personeTableCreated){
        personeTable.destroy();
    }
    personeTable = $('#personeTable').DataTable({
        language: language,
        data: data,
        rowId: 'persone_id',
        columns: [
            {data: "cognome"},
            {data: "nome"},
            {data: "email"},
            {data: "data_nascita"},
            {data: "ruolo"}
        ]
    });

    personeTableCreated = true;
}

function createBoxMobilePersone(data, container, spanValue){
    container.empty();
    $.each(data, function(i, persona){
        container.append('<div class="row-fluid space-bottom-s box-mobile" ' +
            'personaId="'+ persona.persone_id +'">' +
            '<div class="span'+ spanValue +' eleva-box-mobile">' +
            '<div><div>' +
            '<a>'+ persona.cognome + " "+ persona.nome +'</a></div>' +
            '<span><a>'+ persona.email +'</a></span><br/>' +
            '<span><a>'+ persona.ruolo + " " + '</a></span><br/>' +
            '</div></div></div>');
    });
}

function getPersonaById(id){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=get_persona_by_id" + 
            "&id=" + id,
        success: function(data) {
            console.log(data);
            if(data.length > 0){
                showEditPersonaModal(data[0]);
            } else {
                alert(data);
            } 
        },
        error: function(data){
            console.log(data);
        }
    });
}

function showEditPersonaModal(data){
    $('#personaIdEdit').val(data.persone_id);
    $('#personaNomeEdit').val(data.nome);
    $('#personaCognomeEdit').val(data.cognome);
    $('#personaEmailEdit').val(data.email);
    $('#personaDataNascitaEdit').val(data.data_nascita);
    $('#personaRuoloEdit').val(data.ruolo);
    
    $('#personaEditModalBtn').click();
}

function editPersona(){
    var data = {
        id: $('#personaIdEdit').val(),
        nome: $('#personaNomeEdit').val(),
        cognome: $('#personaCognomeEdit').val(),
        data_nascita: $('#personaDataNascitaEdit').val(),
        email: $('#personaEmailEdit').val(),
        ruolo: $('#personaRuoloEdit').val()
    };
    $.ajax({
        type: 'POST',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=update_persone",
        data: data,
        success: function(data) {
            console.log(data);
            if(data === "OK"){
                console.log(data);
                searchPersone();
                $('#personaEditModal').modal('toggle');
            } else {
                alert(data);
            }
        },
        error: function(data){
            console.log(data);
            alert(data);
        }
    });
}
/**Impianti Functions**/

function aggiungiImpianto(){
    var data = {
        nome: $('#impiantoNome').val(),
        indirizzo: (($('#impiantoIndirizzo').val())
            .replace("'", ""))
            .replace(new RegExp(",", "g"), " "),
        latitudine: $('#impiantoLatitudine').val(),
        longitudine: $('#impiantoLongitudine').val()
    };
    $.ajax({
        type: 'POST',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=insert_impianti",
        data: data,
        success: function(data) {
            console.log(data);
            if(data === "OK"){
                searchImpianti();
                $('.nascondi-aggiungi-impianto-btn').click();
                resetFormInputs('aggiungiImpiantoForm');
            } else {
                alert(data);
            }
        },
        error: function(data){
            console.log(data);
            alert(data);
        }
    });
}

function searchImpianti(){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=get_impianti",
        success: function(data) {
            console.log(data);
            createTableImpianti(data);
            createBoxMobileImpianti(data);
            createImpiantiMap(data);
            createImpiantiSelect(data);
        },
        error: function(data){
            console.log(data);
            alert(data);
        }
    });
}

function createTableImpianti(data){
    if(impiantiTableCreated){
        impiantiTable.destroy();
    }
    impiantiTable = $('#impiantiTable').DataTable({
        language: language,
        data: data,
        rowId: 'impianti_id',
        columns: [
            {data: "nome"},
            {data: "indirizzo"},
            {data: "latitudine"},
            {data: "longitudine"}
        ]
    });

    impiantiTableCreated = true;
}    

function createBoxMobileImpianti(data){
    var container = $('.impianti-box');
    container.empty();
    $.each(data, function(i, impianto){
        container.append('<div class="row-fluid space-bottom-s box-mobile" ' +
            'impiantoId="'+ impianto.impianti_id +'">' +
            '<div class="span8 eleva-box-mobile">' +
            '<div><div>' +
            '<a>'+ impianto.nome + '</a></div>' +
            '<span><a>'+ impianto.indirizzo +'</a></span><br/>' +
            '</div></div></div>');
    });
}

function createImpiantiMap(data){
    $.each(data, function(i, impianto){
        var coord = {lat: impianto.latitudine, lng: impianto.longitudine};
        var latLng = new google.maps.LatLng(coord.lat, coord.lng);
        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            title: impianto.nome,
            label: impianto.nome,
            draggable: false,
            impiantoId: impianto.impianti_id
        });
        marker.addListener('click', function() {
            searchPersoneByImpianto(this.impiantoId);
        });
    });
}

function createImpiantiSelect(data){
    $('#personaImpianto').empty();
    $.each(data, function(i, impianto){
        $('#personaImpianto').append
            ('<option value="'+ impianto.impianti_id + 
            '">'+ impianto.nome +'</option>');
    });
}

function getImpiantoById(id){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=get_impianto_by_id" + 
            "&id=" + id,
        success: function(data) {
            console.log(data);
            if(data.length > 0){
                showEditImpiantoModal(data[0]);
            } else {
                alert(data);
            } 
        },
        error: function(data){
            console.log(data);
        }
    });
}

function showEditImpiantoModal(data){
    $('#impiantoIdEdit').val(data.impianti_id);
    $('#impiantoNomeEdit').val(data.nome);
    $('#impiantoIndirizzoEdit').val(data.indirizzo);
    $('#impiantoLatitudineEdit').val(data.latitudine);
    $('#impiantoLongitudineEdit').val(data.longitudine);
    
    $('#impiantoEditModalBtn').click();
}

function editImpianto(){
    var data = {
        id: $('#impiantoIdEdit').val(),
        nome: $('#impiantoNomeEdit').val(),
        indirizzo: (($('#impiantoIndirizzoEdit').val())
            .replace("'", ""))
            .replace(new RegExp(",", "g"), " "),
        latitudine: $('#impiantoLatitudineEdit').val(),
        longitudine: $('#impiantoLongitudineEdit').val()
    };
    $.ajax({
        type: 'POST',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=update_impianti",
        data: data,
        success: function(data) {
            console.log(data);
            if(data === "OK"){
                console.log(data);
                searchImpianti();
                $('#impiantoEditModal').modal('toggle');
            } else {
                alert(data);
            }
        },
        error: function(data){
            console.log(data);
            alert(data);
        }
    });
}

function searchPersoneByImpianto(id){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: window.location.origin + 
            "/PhpProject1/elevaProxy.php" +
            "?operation=get_persone_by_impianto" + 
            "&id=" + id,
        success: function(data) {
            console.log(data);
            if(data.length > 0){
                createBoxMobilePersone(data, $('.persone-modal-box'), 12);
            } else {
                $('.persone-modal-box').empty();
                $('.persone-modal-box').append
                ('<div class="center"><span class="title-eleva">' +
                    'Nessuna Persona</span></div>');
            }
            $('#personeImpiantiModalBtn').click();
        },
        error: function(data){
            console.log(data);
        }
    });
}

/**Geocode Functions**/

function initAutocomplete(){
    autocompleteAdd = new google.maps.places.Autocomplete(
        (document.getElementById('impiantoIndirizzo')),
        {types: ['geocode']});
    autocompleteAdd.addListener('place_changed', fillInAddressAdd);
    
    autocompleteEdit = new google.maps.places.Autocomplete(
        (document.getElementById('impiantoIndirizzoEdit')),
        {types: ['geocode']});
    autocompleteEdit.addListener('place_changed', fillInAddressEdit);
}

function initMap(){
    var pavia = {lat: 45.186614, lng: 9.156786};
    map = new google.maps.Map(document.getElementById('map'),{
        zoom: 12,
        center: pavia
    });
    createAddMap(pavia, false);
    initAutocomplete();
    searchImpianti();
}

//Unused
//Call geolocate() to get a precise position on the map center
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocompleteAdd.setBounds(circle.getBounds());
        });
    }
}

function fillInAddressAdd(){
    var place = autocompleteAdd.getPlace();
    $('#impiantoLatitudine').val(place.geometry.location.lat());
    $('#impiantoLongitudine').val(place.geometry.location.lng());

    var center = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
    createAddMap(center, true);
}

function fillInAddressEdit(){
    var place = autocompleteEdit.getPlace();
    $('#impiantoLatitudineEdit').val(place.geometry.location.lat());
    $('#impiantoLongitudineEdit').val(place.geometry.location.lng());
}

function createAddMap(center, isAddMarker){
    addMap = new google.maps.Map(document.getElementById('add-map'),{
        zoom: 15,
        center: center
    });

    google.maps.event.addListener(addMap, "click", function(evt){
        var center = {lat: evt.latLng.lat(), lng: evt.latLng.lng()};
        if(addMarker) addMarker.setMap(null);
        createAddMarker(center);
        $('#impiantoLatitudine').val(center.lat);
        $('#impiantoLongitudine').val(center.lng);
        reverseGeocode(center, $('#impiantoIndirizzo'));
    });
    if(isAddMarker){
        createAddMarker(center);
    }
}

function createAddMarker(center){
    addMarker = new google.maps.Marker({
        position: new google.maps.LatLng(center.lat, center.lng),
        map: addMap,
        draggable: false
    });
}
function reverseGeocode(latLng, input){
    var geocoder = new google.maps.Geocoder;
    geocoder.geocode({'location': latLng}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
                console.log(results[0].formatted_address);
                $(input).val(results[0].formatted_address);
          } else {
            window.alert('No results found');
          }
        } else {
          window.alert('Geocoder failed due to: ' + status);
        }
    });
}

/**Utils**/

function validateEmail(input, errorMessage){
    
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!pattern.test($(input).val())){
        $(errorMessage).removeClass('element-not-visible');
        return false;
    } else {
        $(errorMessage).addClass('element-not-visible');
        return true;
    }
}

function validatePersonaForm(id, email, errorMessage){
    var inputs = $('#'+ id + ' input');
    var selects = $('#'+ id + ' select');
    var result = true;
    result = validateEmail(email, errorMessage);
    $.each(inputs, function(i, input){
        if($(input).val() === ""){
            result = false;
        }
    });
    $.each(selects, function(i, select){
        if($(select).val() === ""){
            result = false;
        }
    });
    return result;
}

function validateImpiantoForm(id){
    var inputs = $('#'+ id + ' input');
    var result = true;
    $.each(inputs, function(i, input){
        if($(input).val() === ""){
            result = false;
        }
    });
    return result;
}

function resetFormInputs(form){
    var inputs = $('#' + form + ' input');
    $.each(inputs, function(i, input){
        $(input).val("");
    });
}

function resetFormSelects(form){
    var selects = $('#' + form + ' select');
    $.each(selects, function(i, select){
        $(select).val("");
    });
}