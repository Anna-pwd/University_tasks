//Do poprawienia

class Pojazdy {
    String nrRejestracyjny;
    int cena;
    int opony;
    String kolor;
    String inne;

     void opisPojazdu() {
        System.out.println("Opis pojazdu:\n cena:" + cena + "\n ilość opon: " + opony + "\n kolor: " + kolor + "\n dodatkowe: " + inne + "\n");
    }
}

class Samochody extends Pojazdy {
    private void samochody() {
        Pojazdy osobowy = new Pojazdy();
        String rodzaj = "Samochód osobowy";
        osobowy.cena = 80000;
        osobowy.opony = 4;
        osobowy.kolor = "czerwony";
        osobowy.nrRejestracyjny = "abcd1234";
        osobowy.inne = "poduszki powietrzne";

         osobowy.opisPojazdu();
    }
}

class Ciezarowe extends Pojazdy {
    private void ciezarowe(){
        Pojazdy ciezarowy = new Pojazdy();
        String rodzaj = "Samochód cięzarowy";
        ciezarowy.cena = 1000000;
        ciezarowy.opony = 10;
        ciezarowy.kolor = "biały";
        ciezarowy.nrRejestracyjny = "efgh5678";
        ciezarowy.inne = "ładowność";

        ciezarowy.opisPojazdu();
    }
}

class Motocykle extends Pojazdy {
    private void motocykle(){
        Pojazdy motocykl = new Pojazdy();
        String rodzaj = "Motocykl";
        motocykl.cena = 6000;
        motocykl.opony = 2;
        motocykl.kolor = "czarny";
        motocykl.nrRejestracyjny = "abc123";
        motocykl.inne = "kask";

        motocykl.opisPojazdu();
    }
}

class Autobusy extends Pojazdy {
     private void autobusy() {
        Pojazdy autobus = new Pojazdy();
        String rodzaj = "Autobus";
        autobus.cena = 1100000;
        autobus.opony = 6;
        autobus.kolor = "niebieski";
        autobus.nrRejestracyjny = "mzk123";
        autobus.inne = "PKS";

        autobus.opisPojazdu();
    }
}

class Exit {
    public static void main(String[] args) {

Pojazdy pojazdy = new Pojazdy();
Autobusy autobusy = new Autobusy();
Ciezarowe ciezarowe = new Ciezarowe();
Motocykle motocykle = new Motocykle();
Samochody samochody = new Samochody();

autobusy.opisPojazdu();
ciezarowe.opisPojazdu();
motocykle.opisPojazdu();
samochody.opisPojazdu();
pojazdy.opisPojazdu();
    }
}
