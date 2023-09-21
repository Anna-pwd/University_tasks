public class Motor extends Pojazd {
    String pojemnosc;
    String rodzajNapedu;

    Motor(String marka, String model, String pojemnosc, String rodzajNapedu) {
        super(marka, model);
        this.pojemnosc = pojemnosc;
        this.rodzajNapedu = rodzajNapedu;
    }

    @Override
    public String toString() {
        return "Motor: '" +
                "pojemnosc: '" + pojemnosc + '\'' +
                ", silnik: '" + rodzajNapedu + '\'' + " " + super.toString();
    }
}
