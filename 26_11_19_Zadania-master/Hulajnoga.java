public class Hulajnoga extends Pojazd {
    String kolor;
    String hamulec;

    Hulajnoga(String marka, String model, String kolor, String hamulec) {
        super(marka, model);
        this.kolor = kolor;
        this.hamulec = hamulec;
    }

    @Override
    public String toString() {
        return "Hulajnoga: " +
                "kolor: '" + kolor + '\'' +
                ", hamulec: '" + hamulec + '\'' + " " + super.toString();
    }
}