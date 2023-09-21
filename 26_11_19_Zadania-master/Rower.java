public class Rower extends Pojazd {
    String iloscPrzerzutek;
    String rozmiarKola;

    Rower(String marka, String model, String iloscPrzerzutek, String rozmiarKola){
        super(marka, model);
        this.iloscPrzerzutek = iloscPrzerzutek;
        this.rozmiarKola = rozmiarKola;
    }

    @Override
    public String toString() {
        return "Rower: " +
                "ilosc przerzutek: '" + iloscPrzerzutek + '\'' +
                ", rozmiar kola: '" + rozmiarKola + '\'' + " " + super.toString();
    }
}

