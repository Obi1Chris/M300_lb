## M300 Lernbeurteilung 3 | Markdown Dokumentation
### von Obinna Maduabum    
---
## Inhaltsverzeichnis
* Einleitung
  * Anforderung
* Docker VM erstellen
* PHP & Apache Dienst installieren
  * Docker-compose File
*  MySql Dienst Installieren
   *  Docker File Image
   *  Docker-Compose File
* Grafische Übersicht
* Testing
* Quellenangaben
* Angewendete Befehle
## Einleitung
___

Ich werde einen PHP mit Apache Dienst mit einen MySQL Datenbank Support verknüpfen.

### **Anforderungen** <p>
Um diese Setup aufzubauen habe ich folgendes zur Verfügung gestellt.
  * Vagrant
  * Docker (inkl. Docker-compose)
  * Git hub/lab
  * Git bash
  * Visual Studio Code
  * Virtualbox
  * Speicherplatz für die VMs
<p> 


## Docker VM Erstellen
___
### VM Ordner für Vagrant erstellen
In gewünschtem Verzeichnis einen neuen Ordner für die VM anlegen:

  > ``cd m300_lb/lb3``<br>
  > ``mkdir DockerVM``<br>

Um den Docker Virtuelle Maschine zu erzeugen habe ich Vagrant benutzt. Ich habe einen Vagrantfile verwendet den der Lehrer für uns zur Verfügung gestellt hat verwendet.<br>

Die Netzwerk Einstellung wurde vom Lehrer vorgegeben.

### Docker-Compose Kommando installieren:
Damit die "Docker-Compose" Befehl angewendet kann, muss dies im Docker VM noch installiert werden:
> ``sudo curl -L "https://github.com/docker/compose/releases/download/1.23.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose`` <p>

Danach noch die Berechtigung anpassen (ausführbar machen):<br>
>``sudo chmod +x /usr/local/bin/docker-compose``



## PHP und Apache Dienst installieren
___

### Verzeichnis für Umgebung anlegen
Für die ganze Umgebung werde ich einen neuen Verzeichnis anlegen und in dies wechseln.
 >``mkdir obi_dc_test`` <br>
 >``cd obi_dc_test/``

### Docker Compose YAML File erstellen

```Ruby
version: '3.3'
services:
    web:
       image: php:7.3-apache
       container_name: php73
       volumes:
         - ./php:/var/www/html/
       ports:
         - 8000:80
```
Den Image ist eine PHP Dienst der inklusive als Apache Webserver verwendet werden kann. <br>
Ich habe einen Volume erstellt, die den lokallen Verzeichnis "/php" auf den Remote Verzeichnis "/var/www/html/" verknüpft.<br>
Ich habe einen Port Forwarding vom Port 8000 zur Port 80 konfiguriert. Somit muss ich nur den Port 8000 angeben und es wird intern auf Port 80 weitergeleitet. <br>

  
## MySQL Dienst installieren
___

### Dockerfile Image

Anstatt den bisher verwendete php-apache Image werde ich einen Image selbst erstellen, die zusätzlich noch eine MySQL Support anbietet.<br>
Dafür werde ich einen Dockerfile erstellen:

```Ruby
FROM php:7.3.3-apache
RUN apt-update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
EXPOSE 80
```
## Grafische Übersicht 
___

Da füge ich ein Bild vom Virtuelle Maschine in der Virtualbox, den ich mit Vagrant erstellt habe.
![Grafische Übersicht](Grafische_Uebersicht.png) <p>

Hier habe ist ein Bild wo man sieht, wie der Share aussieht wenn man ihm als Netzwerklaufwerk anbindet. <br>
![Netzlaufwerk](Netzlaufwerk_Share.png)



## Testen
___


### First Try Vagrantfile 
Dies ist mein erster Versuch einer Vagrant VM vom Vagrantfile zu erstellen. Hier hat es nicht geklappt, weil er nicht auf den Box "ubuntu/trusty64" zugreifen konnte.<br>

![Vagrant Up Image](First_Test_Fail.png) <br>
Ich habe später gemerkt, das dies an einen Netzwerk Problem meines Laptops daran gelegt hat. <p>

### Second Try Vagrantfile
Beim zweiten Versuch kam eine andere Meldung. Und zwar war dies eine Meldung wegen der Namenskonvention 
![Vagrant Up Test](Test_2.png) <br>

Dies habe ich dann angepasst und nun hat es funktioniert. <p>

### Complete Vagrantfile
Dieser Test ensteht nachdem ich alle Einstellungen und Konfigurationen abgeschlossen habe. Dabei werde ich prüfen, dass der Samba Share beim aufsetzen der VM (mit "vagrant up) erstellt wird und auch aktiv ist. <br>
Danach werde ich testen ob ich mich als User "vagrant" einloggen kann und Änderungen im Share machen kann inklusiv Dateien löschen.<br>

Hier sieht man, dass der Share erstellt worden ist und ebenfalls aktiv ist:
![Vagrant Up Test](Netzlaufwerk_Share.png)

<br>
Ordner und Dateien erstellen: <br>


![Create Ordner](Cr_Ordner.png)
<br>
![Create Ordner](Cr_File.png)

Dateien und Ordner wieder löschen:
![Create Ordner](Del_Changes.png)
<br>

### Schlusswort
Mit diesen Überprüfungen kann ich bestätigen, dass alles so funktioniert wie es sollte.




## Angewendete Befehle
___
Hier werde ich Befehle dokumentieren, die ich benutzt habe.

### Git Befehle
|Commands|Meaning|
|---------              |:--------                                                          |
|   ``git add ``        |   Add a change to the staging list (to be committed)              |
|    ``git commit``     |   make all changes in the staging list permanent.|
|   ``git push``        |   Creates a default vagrantfile for easy editing                  |
### Vagrant Befehle

|Commands|Meaning|
|---------              |:--------                                                          |
|   ``vagrant init``    |   Creates a default vagrantfile for easy editing                  |
|    ``vagrant up``     |   Creates a Virtualbox VM based on the setting in the vagrantfile.|
|   ``vagrant destroy``    |   Destroys a Vagrant VM in the current folder (if there is one)                 |


### Ubuntu Befehle
|Commands|Meaning|
|---------              |:--------                                                          |
|   ``systemctl  grep ""``    |   Dienst suchen (mit grep kann es spezifiert werden)       |
|    ``systemctl list-unit-files``     |   list systemd services.                           |
|   ``USER=vagrant``    |  Creates a variable that can be used (as $USER)

</p>

## Quellenangaben
___

[Docker Images](https://hub.docker.com/search?image_filter=official&type=image)

[Markdown Anleitung](https://www.ionos.de/digitalguide/websites/web-entwicklung/markdown/) <p>
[VM Deployment with Vagrant](https://www.youtube.com/watch?v=sr9pUpSAexE&t=432s) <p>
[Samba File Sharing](https://www.youtube.com/watch?v=oRHSrnQueak&t=609s) <p>
[Folder Sharing Linux](https://www.youtube.com/watch?v=x8Lo20C19ao&t=70s) <p>
[Samba Share on Windows](https://www.youtube.com/watch?v=p2r0kIB_ItE&t=154s) <p>
[vagrant boxes](https://vagrantcloud.com/search) <p>
[Mount Shares at Bootup](https://youtu.be/5b3lCE_I3yw) <p>
[Piping Smbpasswd](https://stackoverflow.com/questions/12009/piping-password-to-smbpasswd)