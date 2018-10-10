---
---
Redovisning
=========================

Samlade redovisningstexter för kursen oophp.



Kmom01
-------------------------

Nu har vi börjat i oophp med objekt och klasser vilket som har varit mestadels enkelt,
framförallt den objektorienterade delen. Jag tycker om att man får en så tydlig och
rak struktur när man har klasser som man skapar instanser från eller ärver till en mer
specifik klass. Jag känner igen objektorienterad programmering framförallt från oopython
kursen. Utöver det så har jag även programmerat C# objektorienterat tidigare vilket som
hjälpte mig hur jag ska tänka på klasser. PHP är baserat på C-språken så det blev en bra
jämförelse då python skiljer sig lite.

Uppgiften "Gissa Numret" var helt okej. Jag gillade hur Guess klassen fungerade
och kunde användas. Det jobbigaste var att hantera den övriga PHP:n. Det beror nog mest
på att det var länge sedan jag skrev någonting i php. Däremot så gillade jag inte att
göra den delen som baserade sig på GET. Jag vet att det bara var en övning men det känns
verkligen inte bra alls att skicka hemligheter i dolda fält och framförallt inte
i en GET parameter.

Jag tycker jag har kommit in helt okej i strukturen och är nöjd med hur jag har förändrat
layouten och redigerat den i vyn. Utöver det är jag nöjd med stilen jag har
och att jag har frångått standardmallen för sidan och fått en ganska unik stil.
Jag valde att bara skriva CSS direkt istället för att dra in less / sass eller någon
annat som behöver kompileras då det ger ett extra steg i mitt workflow.

TIL: Anax view/layout struktur. Nice.


Kmom02
-------------------------

Att överföra 'Gissa mitt nummer' var lite av en process. Det krävdes att jag redigerade bland annat composer.json och uppdaterade
navbar config-filen. Jag behövde omstrukturera en del av spelet men med hjälp
av Mos videogenomgång och artiklar så gick det bra efter lite trial and error.

Att jämföra UML och phpDocumentor är inte helt rättvist. UML-diagram är perfekta
när man ska bygga ihop något utifrån en beskrivning. Då ser man hur allt ska sitta ihop
och vad som ska ärva av vem. Man kan säga att det fungerar bra som en ritning. phpDocumentor däremot
genereras utifrån kommentarer av kod som redan är skriven. Detta innebär att den visar exakt vad som finns
var. phpDocumentor passar bättre när man redan har skrivit koden och behöver gå igenom den igen.
Jag gillar principen att kunna autogenerera dokumentation för mitt projekt och att ha det via
make-filen är riktigt praktiskt.

Att skriva koden utanför ramverket var definitivt enklare. Däremot så föredrar resultatet när man gör det
i ramverket. Det blir mycket snyggare och blir en del av sidan. Det är ett bra sätt att integrera logik
och något dynamiskt i sin sida trots att det bygger på ett ramverk. Däremot om du behöver ett system som tar
upp 100% av sidan och inte innehåller något annat så är det självklart att man måste skriva det utanför ramverket.
Förhoppningsvis ska man inte behöva det över huvud taget.

TIL: egen php-kod dynamiskt i ramverket.


Kmom03
-------------------------

I detta kursmoment började vi med enhetstestning, det är något vi har gjort tidigare i oopython-kursen.

Att skriva enhetsteseter är ganska bra tycker jag. Då vet man att all kod mer eller mindre fungerar.
Det är förvånansvärt roligt att göra (än så länge) eftersom vi använder oss av phpunit.
Då får vi progress-bars och procent för hur bra kodtäckning vi har, Det är väldigt motiverande.
I vissa utfall är min kod inte helt testbar. Jag var till exempel tvungen att skriva om en
del från en if-sats till att få turnary operator för att kunna täcka den delen trots
slumpmässiga tärningsslag. Jag behövde även bygga om en del av ai funktionen för att kunna
testa den.

De testerna jag har skrivit är s.k. white-box tester. Detta innebär att jag har testat
interna funktioner och strukturer av programmet med full tillgång till koden.
Black-box tester är då motsatsen där koden inte är tillgänglig. Då testar vi programmets
entry-points och ser vad vi får för svar och kontrollerar att det uppnår våra förväntningar
baserat på våra features. Kort och gott kan det beskrivas som att vi stoppar in ett värde
i en magisk låda och ser om vad den spottar ut är vad vi väntade oss.
Grey-box tester är då givetvis en kombination av de båda. Där testar man både de interna komponenterna
och de hela programmet i helhet. Detta kan bland annat hjälpa till att hitta fel-implementerade
funktioner.

För mig tog tärningsuppgiften förvånansvärt lång tid. Först skissade jag upp vilka klasser jag
ville ha och vad de skulle göra. Dock gjode jag inte ett UML-diagram än då saker och ting
enkelt kan förändras, jag ansåg att en skiss skulle räcka för att kunna skapa det formella
diagrammet när jag var färdig. Därefter började jag skapa de olika klasserna, detta gick
bra och helt utan problem. Sen var jag dock tvungen att börja bygga en sida som hanterade
user input och session och massa sådant. Samtidigt som jag testade och byggde upp den sidan
så behövde det samspela med ramverket. Detta blev för mycket i ett moment så jag valde att
skriva all kod utanför ramverket till en början. Det var inte helt lätt och tog mer tid än
väntat men jag lyckades genomföra det. Därefter så behövde jag intergrera min kod med ramverket.
Det kändes lite osäkert var jag skulle börja men när jag kom igång så gick det riktigt bra och
var riktigt enkelt.

Min kodtäckning för tärningsspelet 100 är 100% och täcker samtliga klasser.
Detta innefattar alltså inte index filen som sköter en del user-logik.

TIL: unit testing med phpunit och att gröna progress-bars och statistik är väldigt motiverande.

Kmom04
-------------------------

Trait och interface är egentligen logiskt och jag förstår det i teorin. Det är ganska smart faktiskt,
ett Trait är ungefär som att ärva av en klass och ett interface är en kontroll att klassen som använder Trait:et
faktistk har alla funktioner den ska. Det innebär att ingen funktion som borde implementeras inte lämnas odefinierad.
Med det sagt så tenderar det att bli ganska komplicerat när man väl ska använda det och vi redan har massa filer och nu
får nästan dubbelt så mycket. 7/10 i teorin, bara 4/10 i praktiken, alldeles för lätt att det blir trassligt.

Jag valde att inte ge mitt AI ett spelberoende utan istället vara kall och beräknande. Bättre än oss helt enkelt.
Mitt AI strävar slår så att den uppnår minst 15 poäng per runda. Detta är lite av en sweet-spot när man kör med en tärning.
Om det hade kört mer riskabelt så hade det oftare slagit 1, hade det kört försiktigare så hade det varit alldeles för svagt.
Det kanske inte är det mest avancerade AI:t men det har fördelen att inte tänka som en människa. Med en så dålig slumpgenerator
så är det dåligt att slå för mycket så AI:t håller tillbaka där en människa skulle sagt *bara ett slag till!*

Trots att jag har haft problem med att intergrera Histogramet i ramverket så måste jag ändå säga att jag verkligen gillar
hur anax Session och Request fungerar. De är smidiga att använda och har bra funktioner så som `session->get($key, "no value")`
vilket som i princip är en väldigt fint förkortad turnary-operator.

Jag är nöjd med hur väl jag lyckades skriva enhetstester inuti ramverket. Jag testar alla mina filer i src/DiceGame.
För att testa mitt Trait fick jag se till att alla funktioner i mitt trait var implementerade och publikt åtkomna i mina klasser
eftersom att man inte kan testa traits direkt. Jag har 100% kodtäckning på alla mina filer.

TIL: Anax Session och Request

Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
