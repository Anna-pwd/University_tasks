public abstract class Pojazd {
    private String marka;
    private String model;

    public Pojazd(String marka, String model) {
        this.marka = marka;
        this.model = model;
    }

    @Override
    public String toString() {
        return "marka: '" + marka + '\'' +
                ", model: '" + model + '\'';
    }
}


