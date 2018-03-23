Progetto di Test per Eleva

Note

-	Rinominare la cartella del progetto in  /PhpProject1 per evitare di rompere gli endpoint REST
-	Il dump del database si trova nella cartella /dump (dump-nomedb-timestamp), uno blank con il database vuoto, l'altro con alcuni dati inseriti
-	Ho committato per sbaglio alcuni file di progetto creati da NetBeans, era troppo tardi per metterli nel gitignore


Specifiche

Dovresti realizzare una semplice web-app che permette l’inserimento/modifica di PERSONE e IMPIANTI e di collegarli tra di loro.

La web app ha tre viste:

1.       Gestione Personale

	o    Lista persone (tabellare, listing, fai cosa ritieni opportuno)

	o   Maschera di inserimento/modifica Persona

		§  Nome*

		§  Cognome*

		§  Email*

		·         Validazione formale email

		§  Data di nascita

		·         Validazione data

		§  Ruolo – Select - Addetto/Supervisore

	o   Deve essere possibile collegare una persona ad uno o più impianti  

2.       Gestione Impianti

	o   Listing impianti

	o   Maschera di inserimento/modifica Impianto

		§  Nome impianto

		§  Indirizzo

		·         Campo testuale con autocomplete google places. Andando a selezionare un indirizzo

		o   viene posizionato il marker sulla mappa corrispondente all’indirizzo selezionato (geocoding)

		o   Vengono completati i campi readonly latitudine e longitudine


		·         Mappa – Andando a cliccare un punto della mappa

		o   Viene autocompletato il campo indirizzo con l’indirizzo corrispondente al punto selezionato (reverse geocoding)

		o   Vengono completati i campi readonly latitudine e longitudine

		 

		§  Latitudine – readonly - (Si autocompleta al completamento dell’indirizzo o alla selezione di un punto sulla mpaa)

		§  Longitudine – readonly – (Si autocompleta al completamento dell’indirizzo o alla selezione di un punto sulla mappa)

3.      Vista Mappa

	a.       L’applicativo consiste in una grossa mappa (utilizzando le API di Google Maps) con dei marker che rappresentano gli impianti.

	b.       Cliccando su un impianto viene renderizzato (scelta tua dove metterlo e come farlo apparire) la lista delle persone correlate a quell’impianto.

 

La grafica deve prestare attenzione all’usabilità (e se possibile essere responsive).

