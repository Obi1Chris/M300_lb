## M300 Lernbeurteilung 2 | Dokumentation
### von Obinna Maduabum    
---
## Inhaltsverzeichnis
* Einleitung
  * Anforderung
* VM erstellen
* Samba Dienst starten
* Samba Share erstellen
* Grafische Übersicht
* Testing
* Quellenangaben
* Angewendete Befehle
## Einleitung
___
### **Anforderungen** <p>
Um diese Setup aufzubauen habe ich folgendes zur Verfügung gestellt.
  * Vagrant
  * Git hub/lab
  * Git bash
  * Visual Studio Code
  

## Virtuelle Maschine Layout Erstellen
___
### VM Ordner für Vagrant erstellen
In gewünschtem Verzeichnis einen neuen Ordner für die VM anlegen:

  >$ ``cd Wohin/auch/immer``<br>
  >$ ``mkdir MeineVagrantVM``<br>


### Vagrantfile Vorlage erzeugen:
Ins Verzeichnis wechseln und dort die eine Vagrantfile Vorlage erzeugen.

  >$ ``cd MeineVagrantVM``<br>
  >$ ``vagrant init`` <p>
A Vagrantfile has been placed in this directory. You are now
ready to `vagrant up` your first virtual environment! Please read
the comments in the Vagrantfile as well as documentation on
[vagrantup](vagrantup.com) for more information on using Vagrant. <p>




### Vagrantfile bearbeiten:
Mit diesen Befehl wird einen Vagrant Box erstellt. Ich habe den ubuntu box von "trusty64" gewählt.
>$ ``Vagrant.configure("2") do |config|`` <br>
>$ ``config.vm.box = "ubuntu/trusty64"``

Netzwerkeinstellungen des VMs
>$ ``config.vm.network "public_network"``

VM Provider als "Virtualbox setzen"
>$ ``config.vm.provider "virtualbox" do |vb|``

GUI für den VM aktivieren
>$ ``vb.gui = true``

Memory und Anzahl CPUs des VMs bestimmen
>$ ``vb.memory = "2048"`` <br>
   ``vb.cpus = "2"``

VM Name Setzen
>$ ``vb.name = "Ubuntu Server by Vagrant"``

Disk Size Setzen
> ...

SHELL 
every command inside will be typed while the vm is provisioning. (In the Shell)
SHELL

apt-get install -y apache2 (-y don't ask option)

## Grafische Übersicht 
___
alles Relevante wird beschrieben <p>
Korrektheit der Angaben
## Testen
___
Hier werde ich das fertigte Produkt testen.

### First Try Vagrantfile 
![Vagrant Up Image](C:\Users\u70929\Documents\M300_Ordner\M300_lb\Git_Picture_Obi.png)


## Quellenangaben
[Markdown Anleitung](https://www.ionos.de/digitalguide/websites/web-entwicklung/markdown/) <p>
[VM Deployment with Vagrant](https://www.youtube.com/watch?v=sr9pUpSAexE&t=432s) <p>
[Samba Service](insert.here) <p>
[vagrant boxes](https://vagrantcloud.com/search)
[Mount Shares at Bootup](https://youtu.be/5b3lCE_I3yw)
___

## Angewendete Befehle
Hier werde ich alle Befehle dokumentieren, die ich benutzt habe.

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
|   ``vagrant init``    |   Creates a default vagrantfile for easy editing                  |


### Ubuntu Befehle
|Commands|Meaning|
|---------              |:--------                                                          |
|   ``systemctl  grep ""``    |   Dienst suchen (mit grep kann es spezifiert werden)       |
|    ``systemctl list-unit-files``     |   list systemd services.                           |
|   ``vagrant init``    |   Creates a default vagrantfile for easy editing                  |

</p>

.

.


.


.




.

.


.


.




.

.


.


.
## Markdown Cheatsheet for Documentation

Dieses **Wort** ist fett.
*Kursiver Text*<br>
_Kursiver Text_<p>
**Fetter Text** <br>
__Fetter Text__ <p>
***Kursiver und fetter Text***<br>
___Kursiver und fetter Text___


>Dies ist ein **eingerückter Bereich**.
>Der Bereich geht hier weiter.

>Dies ist ein weiterer **eingerückter Bereich**.
Auch dieser Bereich geht in der nächsten Zeile weiter.

Diese Zeile ist allerdings nicht mehr eingerückt.

Das ist `code`.

``Das ist alles code.``

>[ ] A <p>
[x] B <p>
[ ] C

### Tabellen
|Spalte 1|Spalte 2|
|--------|--------|
|    A    |    B    |
|    C    |    D    |