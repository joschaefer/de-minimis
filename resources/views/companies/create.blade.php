<x-modal id="storeCompanyModal" action="{{ route('companies.store') }}" title="{{ __('Add company') }}">
    <div class="mb-3">
        <div class="form-floating">
            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('e.g. Example Company GmbH') }}" maxlength="255" value="{{ old('name') }}" autocomplete="off" autocapitalize="off" required>
            <label for="name">{{ __('Name') }}</label>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="founded_at" id="founded_at" placeholder="" value="{{ optional(old('founded_at'))->format('Y-m-d') }}">
                <label for="founded_at">{{ __('Founded at') }}</label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="register_court" id="register_court" list="register_courts" placeholder="{{ __('e.g. Amtsgericht Aachen') }}" maxlength="255" value="{{ old('register_court') }}" autocomplete="off">
                <label for="register_court">{{ __('Register court') }}</label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="register_number" id="register_number" placeholder="{{ __('e.g. HRB 12345') }}" maxlength="100" value="{{ old('register_number') }}" autocomplete="off">
                <label for="register_number">{{ __('Register number') }}</label>
            </div>
        </div>
    </div>

    <h6 class="mt-4">{{ __('Contacts') }}</h6>
    <div id="contacts">
        <template id="contactTemplate">
            <div class="row mt-3">
                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="last_names[]" id="last_name" placeholder="{{ __('Last name') }}" maxlength="100" value="" autocomplete="off" required>
                        <label for="last_name">{{ __('Last name') }}</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="first_names[]" id="first_name" placeholder="{{ __('First name') }}" maxlength="100" value="" autocomplete="off" required>
                        <label for="first_name">{{ __('First name') }}</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="emails[]" id="email" placeholder="{{ __('e.g. mail@example.com') }}" maxlength="255" value="" autocomplete="off" required>
                        <label for="email">{{ __('Email address') }}</label>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <button type="button" class="btn btn-link btn-sm float-end" id="add-contact-button">{{ __('Add another contact') }}</button>
</x-modal>

<datalist id="register_courts">
    <option>Amtsgericht Aachen</option>
    <option>Amtsgericht Aalen</option>
    <option>Amtsgericht Achern</option>
    <option>Amtsgericht Achim</option>
    <option>Amtsgericht Adelsheim</option>
    <option>Amtsgericht Ahaus</option>
    <option>Amtsgericht Ahlen</option>
    <option>Amtsgericht Ahrensburg</option>
    <option>Amtsgericht Aichach</option>
    <option>Amtsgericht Albstadt</option>
    <option>Amtsgericht Alfeld (Leine)</option>
    <option>Amtsgericht Alsfeld</option>
    <option>Amtsgericht Altena</option>
    <option>Amtsgericht Altenburg</option>
    <option>Amtsgericht Altenkirchen (Westerwald)</option>
    <option>Amtsgericht Altötting</option>
    <option>Amtsgericht Alzey</option>
    <option>Amtsgericht Amberg</option>
    <option>Amtsgericht Andernach</option>
    <option>Amtsgericht Anklam</option>
    <option>Amtsgericht Annaberg</option>
    <option>Amtsgericht Ansbach</option>
    <option>Amtsgericht Apolda</option>
    <option>Amtsgericht Arnsberg</option>
    <option>Amtsgericht Arnstadt</option>
    <option>Amtsgericht Aschaffenburg</option>
    <option>Amtsgericht Aschersleben</option>
    <option>Amtsgericht Aue</option>
    <option>Amtsgericht Auerbach</option>
    <option>Amtsgericht Augsburg</option>
    <option>Amtsgericht Aurich</option>
    <option>Amtsgericht Backnang</option>
    <option>Amtsgericht Bad Arolsen</option>
    <option>Amtsgericht Bad Berleburg</option>
    <option>Amtsgericht Bad Doberan</option>
    <option>Amtsgericht Bad Dürkheim</option>
    <option>Amtsgericht Bad Freienwalde</option>
    <option>Amtsgericht Bad Gandersheim</option>
    <option>Amtsgericht Bad Hersfeld</option>
    <option>Amtsgericht Bad Homburg vor der Höhe</option>
    <option>Amtsgericht Bad Iburg</option>
    <option>Amtsgericht Bad Kissingen</option>
    <option>Amtsgericht Bad Kreuznach</option>
    <option>Amtsgericht Bad Liebenwerda</option>
    <option>Amtsgericht Bad Mergentheim</option>
    <option>Amtsgericht Bad Neuenahr-Ahrweiler</option>
    <option>Amtsgericht Bad Neustadt a. d. Saale</option>
    <option>Amtsgericht Bad Oeynhausen</option>
    <option>Amtsgericht Bad Säckingen</option>
    <option>Amtsgericht Bad Salzungen</option>
    <option>Amtsgericht Bad Saulgau</option>
    <option>Amtsgericht Bad Schwalbach</option>
    <option>Amtsgericht Bad Segeberg</option>
    <option>Amtsgericht Bad Sobernheim</option>
    <option>Amtsgericht Bad Urach</option>
    <option>Amtsgericht Bad Waldsee</option>
    <option>Amtsgericht Baden-Baden</option>
    <option>Amtsgericht Balingen</option>
    <option>Amtsgericht Bamberg</option>
    <option>Amtsgericht Bautzen</option>
    <option>Amtsgericht Bayreuth</option>
    <option>Amtsgericht Beckum</option>
    <option>Amtsgericht Bensheim</option>
    <option>Amtsgericht Bergen</option>
    <option>Amtsgericht Bergheim</option>
    <option>Amtsgericht Bergisch Gladbach</option>
    <option>Amtsgericht Bernau</option>
    <option>Amtsgericht Bernburg</option>
    <option>Amtsgericht Bernkastel-Kues</option>
    <option>Amtsgericht Bersenbrück</option>
    <option>Amtsgericht Besigheim</option>
    <option>Amtsgericht Betzdorf</option>
    <option>Amtsgericht Biberach a. d. Riß</option>
    <option>Amtsgericht Biedenkopf</option>
    <option>Amtsgericht Bielefeld</option>
    <option>Amtsgericht Bingen am Rhein</option>
    <option>Amtsgericht Bitburg</option>
    <option>Amtsgericht Bitterfeld-Wolfen</option>
    <option>Amtsgericht Blomberg</option>
    <option>Amtsgericht Böblingen</option>
    <option>Amtsgericht Bocholt</option>
    <option>Amtsgericht Bochum</option>
    <option>Amtsgericht Bonn</option>
    <option>Amtsgericht Borken</option>
    <option>Amtsgericht Borna</option>
    <option>Amtsgericht Bottrop</option>
    <option>Amtsgericht Brackenheim</option>
    <option>Amtsgericht Brake (Unterweser)</option>
    <option>Amtsgericht Brakel</option>
    <option>Amtsgericht Brandenburg an der Havel</option>
    <option>Amtsgericht Braunschweig</option>
    <option>Amtsgericht Breisach am Rhein</option>
    <option>Amtsgericht Bremen</option>
    <option>Amtsgericht Bremen-Blumenthal</option>
    <option>Amtsgericht Bremerhaven</option>
    <option>Amtsgericht Bremervörde</option>
    <option>Amtsgericht Bretten</option>
    <option>Amtsgericht Brilon</option>
    <option>Amtsgericht Bruchsal</option>
    <option>Amtsgericht Brühl</option>
    <option>Amtsgericht Buchen (Odenwald)</option>
    <option>Amtsgericht Bückeburg</option>
    <option>Amtsgericht Büdingen</option>
    <option>Amtsgericht Bühl</option>
    <option>Amtsgericht Bünde</option>
    <option>Amtsgericht Burg</option>
    <option>Amtsgericht Burgdorf</option>
    <option>Amtsgericht Burgwedel</option>
    <option>Amtsgericht Buxtehude</option>
    <option>Amtsgericht Charlottenburg</option>
    <option>Amtsgericht Köpenick</option>
    <option>Amtsgericht Lichtenberg</option>
    <option>Amtsgericht Mitte</option>
    <option>Amtsgericht Neukölln</option>
    <option>Amtsgericht Pankow/Weißensee</option>
    <option>Amtsgericht Schöneberg</option>
    <option>Amtsgericht Spandau</option>
    <option>Amtsgericht Tempelhof-Kreuzberg</option>
    <option>Amtsgericht Tiergarten</option>
    <option>Amtsgericht Wedding</option>
    <option>Amtsgericht Calw</option>
    <option>Amtsgericht Castrop-Rauxel</option>
    <option>Amtsgericht Celle</option>
    <option>Amtsgericht Cham</option>
    <option>Amtsgericht Chemnitz</option>
    <option>Amtsgericht Clausthal-Zellerfeld</option>
    <option>Amtsgericht Cloppenburg</option>
    <option>Amtsgericht Coburg</option>
    <option>Amtsgericht Cochem</option>
    <option>Amtsgericht Coesfeld</option>
    <option>Amtsgericht Cottbus</option>
    <option>Amtsgericht Crailsheim</option>
    <option>Amtsgericht Cuxhaven</option>
    <option>Amtsgericht Dachau</option>
    <option>Amtsgericht Dannenberg (Elbe)</option>
    <option>Amtsgericht Darmstadt</option>
    <option>Amtsgericht Daun</option>
    <option>Amtsgericht Deggendorf</option>
    <option>Amtsgericht Delbrück</option>
    <option>Amtsgericht Delmenhorst</option>
    <option>Amtsgericht Demmin</option>
    <option>Amtsgericht Dessau-Roßlau</option>
    <option>Amtsgericht Detmold</option>
    <option>Amtsgericht Dieburg</option>
    <option>Amtsgericht Diepholz</option>
    <option>Amtsgericht Diez</option>
    <option>Amtsgericht Dillenburg</option>
    <option>Amtsgericht Dillingen a. d. Donau</option>
    <option>Amtsgericht Dinslaken</option>
    <option>Amtsgericht Dippoldiswalde</option>
    <option>Amtsgericht Döbeln</option>
    <option>Amtsgericht Donaueschingen</option>
    <option>Amtsgericht Dorsten</option>
    <option>Amtsgericht Dortmund</option>
    <option>Amtsgericht Dresden</option>
    <option>Amtsgericht Duderstadt</option>
    <option>Amtsgericht Duisburg</option>
    <option>Amtsgericht Duisburg-Hamborn</option>
    <option>Amtsgericht Duisburg-Ruhrort</option>
    <option>Amtsgericht Dülmen</option>
    <option>Amtsgericht Düren</option>
    <option>Amtsgericht Düsseldorf</option>
    <option>Amtsgericht Ebersberg</option>
    <option>Amtsgericht Eberswalde</option>
    <option>Amtsgericht Eckernförde</option>
    <option>Amtsgericht Eggenfelden</option>
    <option>Amtsgericht Ehingen (Donau)</option>
    <option>Amtsgericht Eilenburg</option>
    <option>Amtsgericht Einbeck</option>
    <option>Amtsgericht Eisenach</option>
    <option>Amtsgericht Eisenhüttenstadt</option>
    <option>Amtsgericht Ellwangen (Jagst)</option>
    <option>Amtsgericht Elmshorn</option>
    <option>Amtsgericht Elze</option>
    <option>Amtsgericht Emden</option>
    <option>Amtsgericht Emmendingen</option>
    <option>Amtsgericht Emmerich am Rhein</option>
    <option>Amtsgericht Erding</option>
    <option>Amtsgericht Erfurt</option>
    <option>Amtsgericht Erkelenz</option>
    <option>Amtsgericht Erlangen</option>
    <option>Amtsgericht Eschwege</option>
    <option>Amtsgericht Eschweiler</option>
    <option>Amtsgericht Essen</option>
    <option>Amtsgericht Essen-Borbeck</option>
    <option>Amtsgericht Essen-Steele</option>
    <option>Amtsgericht Esslingen am Neckar</option>
    <option>Amtsgericht Ettenheim</option>
    <option>Amtsgericht Ettlingen</option>
    <option>Amtsgericht Euskirchen</option>
    <option>Amtsgericht Eutin</option>
    <option>Amtsgericht Flensburg</option>
    <option>Amtsgericht Forchheim</option>
    <option>Amtsgericht Frankenberg (Eder)</option>
    <option>Amtsgericht Frankenthal (Pfalz)</option>
    <option>Amtsgericht Frankfurt (Oder)</option>
    <option>Amtsgericht Frankfurt am Main</option>
    <option>Amtsgericht Freiberg</option>
    <option>Amtsgericht Freiburg im Breisgau</option>
    <option>Amtsgericht Freising</option>
    <option>Amtsgericht Freudenstadt</option>
    <option>Amtsgericht Freyung</option>
    <option>Amtsgericht Friedberg (Hessen)</option>
    <option>Amtsgericht Fritzlar</option>
    <option>Amtsgericht Fulda</option>
    <option>Amtsgericht Fürstenfeldbruck</option>
    <option>Amtsgericht Fürstenwalde/Spree</option>
    <option>Amtsgericht Fürth</option>
    <option>Amtsgericht Fürth i. Bay.</option>
    <option>Amtsgericht Garmisch-Partenkirchen</option>
    <option>Amtsgericht Geilenkirchen</option>
    <option>Amtsgericht Geislingen a.d. Steige</option>
    <option>Amtsgericht Geldern</option>
    <option>Amtsgericht Gelnhausen</option>
    <option>Amtsgericht Gelsenkirchen</option>
    <option>Amtsgericht Gelsenkirchen-Buer</option>
    <option>Amtsgericht Gemünden am Main</option>
    <option>Amtsgericht Gengenbach</option>
    <option>Amtsgericht Gera</option>
    <option>Amtsgericht Germersheim</option>
    <option>Amtsgericht Gernsbach</option>
    <option>Amtsgericht Gießen</option>
    <option>Amtsgericht Gifhorn</option>
    <option>Amtsgericht Gladbeck</option>
    <option>Amtsgericht Göppingen</option>
    <option>Amtsgericht Görlitz</option>
    <option>Amtsgericht Goslar</option>
    <option>Amtsgericht Gotha</option>
    <option>Amtsgericht Göttingen</option>
    <option>Amtsgericht Greifswald</option>
    <option>Amtsgericht Greiz</option>
    <option>Amtsgericht Grevenbroich</option>
    <option>Amtsgericht Grevesmühlen</option>
    <option>Amtsgericht Grimma</option>
    <option>Amtsgericht Gronau (Westf.)</option>
    <option>Amtsgericht Groß-Gerau</option>
    <option>Amtsgericht Grünstadt</option>
    <option>Amtsgericht Guben</option>
    <option>Amtsgericht Gummersbach</option>
    <option>Amtsgericht Günzburg</option>
    <option>Amtsgericht Güstrow</option>
    <option>Amtsgericht Gütersloh</option>
    <option>Amtsgericht Gardelegen</option>
    <option>Amtsgericht Hagen</option>
    <option>Amtsgericht Hagenow</option>
    <option>Amtsgericht Hainichen</option>
    <option>Amtsgericht Halberstadt</option>
    <option>Amtsgericht Haldensleben</option>
    <option>Amtsgericht Halle (Saale)</option>
    <option>Amtsgericht Halle (Westf.)</option>
    <option>Amtsgericht Hamburg</option>
    <option>Amtsgericht Hamburg- Wandsbek</option>
    <option>Amtsgericht Hamburg-Altona</option>
    <option>Amtsgericht Hamburg-Barmbek</option>
    <option>Amtsgericht Hamburg-Bergedorf</option>
    <option>Amtsgericht Hamburg-Blankenese</option>
    <option>Amtsgericht Hamburg-Harburg</option>
    <option>Amtsgericht Hamburg-St. Georg</option>
    <option>Amtsgericht Hameln</option>
    <option>Amtsgericht Hamm</option>
    <option>Amtsgericht Hanau</option>
    <option>Amtsgericht Hann. Münden</option>
    <option>Amtsgericht Hannover</option>
    <option>Amtsgericht Haßfurt</option>
    <option>Amtsgericht Hattingen</option>
    <option>Amtsgericht Hechingen</option>
    <option>Amtsgericht Heidelberg</option>
    <option>Amtsgericht Heidenheim a. d. Brenz</option>
    <option>Amtsgericht Heilbad Heiligenstadt</option>
    <option>Amtsgericht Heilbronn</option>
    <option>Amtsgericht Heinsberg</option>
    <option>Amtsgericht Helmstedt</option>
    <option>Amtsgericht Herford</option>
    <option>Amtsgericht Hermeskeil</option>
    <option>Amtsgericht Herne</option>
    <option>Amtsgericht Herne-Wanne</option>
    <option>Amtsgericht Hersbruck</option>
    <option>Amtsgericht Herzberg am Harz</option>
    <option>Amtsgericht Hildburghausen</option>
    <option>Amtsgericht Hildesheim</option>
    <option>Amtsgericht Hof/Saale</option>
    <option>Amtsgericht Hohenstein-Ernstthal</option>
    <option>Amtsgericht Holzminden</option>
    <option>Amtsgericht Homburg</option>
    <option>Amtsgericht Horb am Neckar</option>
    <option>Amtsgericht Höxter</option>
    <option>Amtsgericht Hoyerswerda</option>
    <option>Amtsgericht Hünfeld</option>
    <option>Amtsgericht Husum</option>
    <option>Amtsgericht Salzwedel</option>
    <option>Amtsgericht Ibbenbüren</option>
    <option>Amtsgericht Idar-Oberstein</option>
    <option>Amtsgericht Idstein</option>
    <option>Amtsgericht Ingolstadt</option>
    <option>Amtsgericht Iserlohn</option>
    <option>Amtsgericht Itzehoe</option>
    <option>Amtsgericht Jena</option>
    <option>Amtsgericht Jever</option>
    <option>Amtsgericht Jülich</option>
    <option>Amtsgericht Kaiserslautern</option>
    <option>Amtsgericht Kamen</option>
    <option>Amtsgericht Kamenz</option>
    <option>Amtsgericht Kandel</option>
    <option>Amtsgericht Karlsruhe</option>
    <option>Amtsgericht Karlsruhe-Durlach</option>
    <option>Amtsgericht Kassel</option>
    <option>Amtsgericht Kaufbeuren</option>
    <option>Amtsgericht Kehl</option>
    <option>Amtsgericht Kelheim</option>
    <option>Amtsgericht Kempen</option>
    <option>Amtsgericht Kempten (Allgäu)</option>
    <option>Amtsgericht Kenzingen</option>
    <option>Amtsgericht Kerpen</option>
    <option>Amtsgericht Kiel</option>
    <option>Amtsgericht Kirchhain</option>
    <option>Amtsgericht Kirchheim unter Teck</option>
    <option>Amtsgericht Kitzingen</option>
    <option>Amtsgericht Kleve</option>
    <option>Amtsgericht Koblenz</option>
    <option>Amtsgericht Köln</option>
    <option>Amtsgericht Königs Wusterhausen</option>
    <option>Amtsgericht Königstein im Taunus</option>
    <option>Amtsgericht Königswinter</option>
    <option>Amtsgericht Konstanz</option>
    <option>Amtsgericht Korbach</option>
    <option>Amtsgericht Köthen</option>
    <option>Amtsgericht Krefeld</option>
    <option>Amtsgericht Kronach</option>
    <option>Amtsgericht Kulmbach</option>
    <option>Amtsgericht Künzelsau</option>
    <option>Amtsgericht Kusel</option>
    <option>Amtsgericht Eisleben</option>
    <option>Amtsgericht Lahnstein</option>
    <option>Amtsgericht Lahr (Schwarzw.)</option>
    <option>Amtsgericht Lampertheim</option>
    <option>Amtsgericht Landau a. d. Isar</option>
    <option>Amtsgericht Landau in der Pfalz</option>
    <option>Amtsgericht Landsberg am Lech</option>
    <option>Amtsgericht Landshut</option>
    <option>Amtsgericht Landstuhl</option>
    <option>Amtsgericht Langen</option>
    <option>Amtsgericht Langen (Hessen)</option>
    <option>Amtsgericht Langenburg</option>
    <option>Amtsgericht Langenfeld (Rhld.)</option>
    <option>Amtsgericht Laufen i. OB</option>
    <option>Amtsgericht Lebach</option>
    <option>Amtsgericht Leer (Ostfriesland)</option>
    <option>Amtsgericht Lehrte</option>
    <option>Amtsgericht Leipzig</option>
    <option>Amtsgericht Lemgo</option>
    <option>Amtsgericht Lennestadt</option>
    <option>Amtsgericht Leonberg</option>
    <option>Amtsgericht Leutkirch im Allgäu</option>
    <option>Amtsgericht Leverkusen</option>
    <option>Amtsgericht Lichtenfels</option>
    <option>Amtsgericht Limburg a. d. Lahn</option>
    <option>Amtsgericht Lindau (Bodensee)</option>
    <option>Amtsgericht Lingen (Ems)</option>
    <option>Amtsgericht Linz am Rhein</option>
    <option>Amtsgericht Lippstadt</option>
    <option>Amtsgericht Löbau</option>
    <option>Amtsgericht Lörrach</option>
    <option>Amtsgericht Lübbecke</option>
    <option>Amtsgericht Lübben</option>
    <option>Amtsgericht Lübeck</option>
    <option>Amtsgericht Luckenwalde</option>
    <option>Amtsgericht Lüdenscheid</option>
    <option>Amtsgericht Lüdinghausen</option>
    <option>Amtsgericht Ludwigsburg</option>
    <option>Amtsgericht Ludwigshafen am Rhein</option>
    <option>Amtsgericht Ludwigslust</option>
    <option>Amtsgericht Lüneburg</option>
    <option>Amtsgericht Lünen</option>
    <option>Amtsgericht Wittenberg</option>
    <option>Amtsgericht Magdeburg</option>
    <option>Amtsgericht Mainz</option>
    <option>Amtsgericht Mannheim</option>
    <option>Amtsgericht Marbach am Neckar</option>
    <option>Amtsgericht Marburg</option>
    <option>Amtsgericht Marienberg</option>
    <option>Amtsgericht Marl</option>
    <option>Amtsgericht Marsberg</option>
    <option>Amtsgericht Maulbronn</option>
    <option>Amtsgericht Mayen</option>
    <option>Amtsgericht Medebach</option>
    <option>Amtsgericht Meinerzhagen</option>
    <option>Amtsgericht Meiningen</option>
    <option>Amtsgericht Meißen</option>
    <option>Amtsgericht Meldorf</option>
    <option>Amtsgericht Melsungen</option>
    <option>Amtsgericht Memmingen</option>
    <option>Amtsgericht Menden (Sauerland)</option>
    <option>Amtsgericht Meppen</option>
    <option>Amtsgericht Merseburg</option>
    <option>Amtsgericht Merzig</option>
    <option>Amtsgericht Meschede</option>
    <option>Amtsgericht Mettmann</option>
    <option>Amtsgericht Michelstadt</option>
    <option>Amtsgericht Miesbach</option>
    <option>Amtsgericht Minden</option>
    <option>Amtsgericht Moers</option>
    <option>Amtsgericht Mönchengladbach</option>
    <option>Amtsgericht Mönchengladbach-Rheydt</option>
    <option>Amtsgericht Monschau</option>
    <option>Amtsgericht Montabaur</option>
    <option>Amtsgericht Mosbach</option>
    <option>Amtsgericht Mühldorf a. Inn</option>
    <option>Amtsgericht Mühlhausen</option>
    <option>Amtsgericht Mülheim an der Ruhr</option>
    <option>Amtsgericht Müllheim</option>
    <option>Amtsgericht München</option>
    <option>Amtsgericht Münsingen</option>
    <option>Amtsgericht Münster</option>
    <option>Amtsgericht Nagold</option>
    <option>Amtsgericht Nauen</option>
    <option>Amtsgericht Naumburg</option>
    <option>Amtsgericht Neresheim</option>
    <option>Amtsgericht Nettetal</option>
    <option>Amtsgericht Neu-Ulm</option>
    <option>Amtsgericht Neubrandenburg</option>
    <option>Amtsgericht Neuburg a.d. Donau</option>
    <option>Amtsgericht Neumarkt i.d. OPf.</option>
    <option>Amtsgericht Neumünster</option>
    <option>Amtsgericht Neunkirchen</option>
    <option>Amtsgericht Neuruppin</option>
    <option>Amtsgericht Neuss</option>
    <option>Amtsgericht Neustadt a. d. Aisch</option>
    <option>Amtsgericht Neustadt a. Rübenberge</option>
    <option>Amtsgericht Neustadt an der Weinstraße</option>
    <option>Amtsgericht Neustrelitz</option>
    <option>Amtsgericht Neuwied</option>
    <option>Amtsgericht Nidda</option>
    <option>Amtsgericht Niebüll</option>
    <option>Amtsgericht Nienburg (Weser)</option>
    <option>Amtsgericht Norden</option>
    <option>Amtsgericht Nordenham</option>
    <option>Amtsgericht Norderstedt</option>
    <option>Amtsgericht Nordhausen</option>
    <option>Amtsgericht Nordhorn</option>
    <option>Amtsgericht Nördlingen</option>
    <option>Amtsgericht Northeim</option>
    <option>Amtsgericht Nürnberg</option>
    <option>Amtsgericht Nürtingen</option>
    <option>Amtsgericht Ihringen</option>
    <option>Amtsgericht Oberhausen</option>
    <option>Amtsgericht Oberkirch</option>
    <option>Amtsgericht Obernburg am Main</option>
    <option>Amtsgericht Oberndorf am Neckar</option>
    <option>Amtsgericht Offenbach am Main</option>
    <option>Amtsgericht Offenburg</option>
    <option>Amtsgericht Oldenburg (Holstein)</option>
    <option>Amtsgericht Oldenburg (Oldb.)</option>
    <option>Amtsgericht Olpe</option>
    <option>Amtsgericht Oranienburg</option>
    <option>Amtsgericht Oschatz</option>
    <option>Amtsgericht Oschersleben</option>
    <option>Amtsgericht Osnabrück</option>
    <option>Amtsgericht Osterholz-Scharmbeck</option>
    <option>Amtsgericht Osterode am Harz</option>
    <option>Amtsgericht Otterndorf</option>
    <option>Amtsgericht Ottweiler</option>
    <option>Amtsgericht Paderborn</option>
    <option>Amtsgericht Papenburg (Ems)</option>
    <option>Amtsgericht Parchim</option>
    <option>Amtsgericht Pasewalk</option>
    <option>Amtsgericht Passau</option>
    <option>Amtsgericht Peine</option>
    <option>Amtsgericht Perleberg</option>
    <option>Amtsgericht Pfaffenhofen a. d. Ilm</option>
    <option>Amtsgericht Pforzheim</option>
    <option>Amtsgericht Philippsburg</option>
    <option>Amtsgericht Pinneberg</option>
    <option>Amtsgericht Pirmasens</option>
    <option>Amtsgericht Pirna</option>
    <option>Amtsgericht Plauen</option>
    <option>Amtsgericht Plettenberg</option>
    <option>Amtsgericht Plön</option>
    <option>Amtsgericht Pößneck</option>
    <option>Amtsgericht Potsdam</option>
    <option>Amtsgericht Prenzlau</option>
    <option>Amtsgericht Prüm</option>
    <option>Amtsgericht Quedlinburg</option>
    <option>Amtsgericht Radolfzell am Bodensee</option>
    <option>Amtsgericht Rahden</option>
    <option>Amtsgericht Rastatt</option>
    <option>Amtsgericht Rathenow</option>
    <option>Amtsgericht Ratingen</option>
    <option>Amtsgericht Ratzeburg</option>
    <option>Amtsgericht Ravensburg</option>
    <option>Amtsgericht Recklinghausen</option>
    <option>Amtsgericht Regensburg</option>
    <option>Amtsgericht Reinbek</option>
    <option>Amtsgericht Remscheid</option>
    <option>Amtsgericht Rendsburg</option>
    <option>Amtsgericht Reutlingen</option>
    <option>Amtsgericht Rheda-Wiedenbrück</option>
    <option>Amtsgericht Rheinbach</option>
    <option>Amtsgericht Rheinberg</option>
    <option>Amtsgericht Rheine</option>
    <option>Amtsgericht Ribnitz-Damgarten</option>
    <option>Amtsgericht Riedlingen</option>
    <option>Amtsgericht Riesa</option>
    <option>Amtsgericht Rinteln</option>
    <option>Amtsgericht Rockenhausen</option>
    <option>Amtsgericht Rosenheim</option>
    <option>Amtsgericht Rostock</option>
    <option>Amtsgericht Rotenburg (Wümme)</option>
    <option>Amtsgericht Rotenburg a. d. Fulda</option>
    <option>Amtsgericht Rottenburg am Neckar</option>
    <option>Amtsgericht Rottweil</option>
    <option>Amtsgericht Rüdesheim am Rhein</option>
    <option>Amtsgericht Rudolstadt</option>
    <option>Amtsgericht Rüsselsheim</option>
    <option>Amtsgericht Saarbrücken</option>
    <option>Amtsgericht Saarburg</option>
    <option>Amtsgericht Saarlouis</option>
    <option>Amtsgericht Salzgitter</option>
    <option>Amtsgericht Sangerhausen</option>
    <option>Amtsgericht Sankt Goar</option>
    <option>Amtsgericht Schleiden</option>
    <option>Amtsgericht Schleswig</option>
    <option>Amtsgericht Schlüchtern</option>
    <option>Amtsgericht Schmallenberg</option>
    <option>Amtsgericht Schönau im Schwarzwald</option>
    <option>Amtsgericht Schönebeck</option>
    <option>Amtsgericht Schopfheim</option>
    <option>Amtsgericht Schorndorf</option>
    <option>Amtsgericht Schwabach</option>
    <option>Amtsgericht Schwäbisch Gmünd</option>
    <option>Amtsgericht Schwäbisch Hall</option>
    <option>Amtsgericht Schwalmstadt</option>
    <option>Amtsgericht Schwandorf</option>
    <option>Amtsgericht Schwarzenbek</option>
    <option>Amtsgericht Schwedt</option>
    <option>Amtsgericht Schweinfurt</option>
    <option>Amtsgericht Schwelm</option>
    <option>Amtsgericht Schwerin</option>
    <option>Amtsgericht Schwerte</option>
    <option>Amtsgericht Schwetzingen</option>
    <option>Amtsgericht Seesen</option>
    <option>Amtsgericht Seligenstadt</option>
    <option>Amtsgericht Senftenberg</option>
    <option>Amtsgericht Siegburg</option>
    <option>Amtsgericht Siegen</option>
    <option>Amtsgericht Sigmaringen</option>
    <option>Amtsgericht Simmern/Hunsrück</option>
    <option>Amtsgericht Singen (Hohentwiel)</option>
    <option>Amtsgericht Sinsheim</option>
    <option>Amtsgericht Sinzig</option>
    <option>Amtsgericht Soest</option>
    <option>Amtsgericht Solingen</option>
    <option>Amtsgericht Soltau</option>
    <option>Amtsgericht Sömmerda</option>
    <option>Amtsgericht Sondershausen</option>
    <option>Amtsgericht Sonneberg</option>
    <option>Amtsgericht Sonthofen</option>
    <option>Amtsgericht Spaichingen</option>
    <option>Amtsgericht Speyer</option>
    <option>Amtsgericht Springe</option>
    <option>Amtsgericht St. Blasien</option>
    <option>Amtsgericht St. Ingbert</option>
    <option>Amtsgericht St. Wendel</option>
    <option>Amtsgericht Stade</option>
    <option>Amtsgericht Stadthagen</option>
    <option>Amtsgericht Stadtroda</option>
    <option>Amtsgericht Starnberg</option>
    <option>Amtsgericht Staufen im Breisgau</option>
    <option>Amtsgericht Steinfurt</option>
    <option>Amtsgericht Stendal</option>
    <option>Amtsgericht Stockach</option>
    <option>Amtsgericht Stollberg</option>
    <option>Amtsgericht Stolzenau</option>
    <option>Amtsgericht Stralsund</option>
    <option>Amtsgericht Straubing</option>
    <option>Amtsgericht Strausberg</option>
    <option>Amtsgericht Stuttgart</option>
    <option>Amtsgericht Stuttgart- Bad Cannstatt</option>
    <option>Amtsgericht Suhl</option>
    <option>Amtsgericht Sulingen</option>
    <option>Amtsgericht Syke</option>
    <option>Amtsgericht Tauberbischofsheim</option>
    <option>Amtsgericht Tecklenburg</option>
    <option>Amtsgericht Tettnang</option>
    <option>Amtsgericht Tirschenreuth</option>
    <option>Amtsgericht Titisee-Neustadt</option>
    <option>Amtsgericht Torgau</option>
    <option>Amtsgericht Tostedt</option>
    <option>Amtsgericht Traunstein</option>
    <option>Amtsgericht Trier</option>
    <option>Amtsgericht Tübingen</option>
    <option>Amtsgericht Tuttlingen</option>
    <option>Amtsgericht Überlingen</option>
    <option>Amtsgericht Ueckermünde</option>
    <option>Amtsgericht Uelzen</option>
    <option>Amtsgericht Ulm</option>
    <option>Amtsgericht Unna</option>
    <option>Amtsgericht Usingen</option>
    <option>Amtsgericht Vaihingen a.d.Enz</option>
    <option>Amtsgericht Varel</option>
    <option>Amtsgericht Vechta</option>
    <option>Amtsgericht Velbert</option>
    <option>Amtsgericht Verden (Aller)</option>
    <option>Amtsgericht Viechtach</option>
    <option>Amtsgericht Viersen</option>
    <option>Amtsgericht Villingen-Schwenningen</option>
    <option>Amtsgericht Völklingen</option>
    <option>Amtsgericht Waiblingen</option>
    <option>Amtsgericht Waldbröl</option>
    <option>Amtsgericht Waldkirch</option>
    <option>Amtsgericht Waldshut-Tiengen</option>
    <option>Amtsgericht Walsrode</option>
    <option>Amtsgericht Wangen im Allgäu</option>
    <option>Amtsgericht Warburg</option>
    <option>Amtsgericht Waren (Müritz)</option>
    <option>Amtsgericht Warendorf</option>
    <option>Amtsgericht Warstein</option>
    <option>Amtsgericht Weiden i.d.OPf.</option>
    <option>Amtsgericht Weilburg</option>
    <option>Amtsgericht Weilheim i. OB</option>
    <option>Amtsgericht Weimar</option>
    <option>Amtsgericht Weinheim</option>
    <option>Amtsgericht Weißenburg i. Bay.</option>
    <option>Amtsgericht Weißenfels</option>
    <option>Amtsgericht Weißwasser</option>
    <option>Amtsgericht Wennigsen (Deister)</option>
    <option>Amtsgericht Werl</option>
    <option>Amtsgericht Wermelskirchen</option>
    <option>Amtsgericht Wernigerode</option>
    <option>Amtsgericht Wertheim</option>
    <option>Amtsgericht Wesel</option>
    <option>Amtsgericht Westerburg</option>
    <option>Amtsgericht Westerstede</option>
    <option>Amtsgericht Wetter</option>
    <option>Amtsgericht Wetzlar</option>
    <option>Amtsgericht Wiesbaden</option>
    <option>Amtsgericht Wiesloch</option>
    <option>Amtsgericht Wildeshausen</option>
    <option>Amtsgericht Wilhelmshaven</option>
    <option>Amtsgericht Winsen (Luhe)</option>
    <option>Amtsgericht Wipperfürth</option>
    <option>Amtsgericht Wismar</option>
    <option>Amtsgericht Witten</option>
    <option>Amtsgericht Wittlich</option>
    <option>Amtsgericht Wittmund</option>
    <option>Amtsgericht WOberlandesgerichtast</option>
    <option>Amtsgericht Wolfach</option>
    <option>Amtsgericht Wolfenbüttel</option>
    <option>Amtsgericht Wolfratshausen</option>
    <option>Amtsgericht Wolfsburg</option>
    <option>Amtsgericht Worms</option>
    <option>Amtsgericht Wunsiedel</option>
    <option>Amtsgericht Wuppertal</option>
    <option>Amtsgericht Würzburg</option>
    <option>Amtsgericht Zehdenick</option>
    <option>Amtsgericht Zeitz</option>
    <option>Amtsgericht Zerbst</option>
    <option>Amtsgericht Zeven</option>
    <option>Amtsgericht Zittau</option>
    <option>Amtsgericht Zossen</option>
    <option>Amtsgericht Zweibrücken</option>
    <option>Amtsgericht Zwickau</option>
</datalist>

<script>
    const contacts = document.getElementById('contacts');
    const template = document.getElementById('contactTemplate');
    const button = document.getElementById('add-contact-button');

    let addContact = () => {
        let clone = template.content.cloneNode(true);
        contacts.appendChild(clone);
    }

    button.addEventListener('click', addContact);
    addContact();
</script>
