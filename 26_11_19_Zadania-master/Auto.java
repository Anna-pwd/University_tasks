public class Auto extends Pojazd {
    private String typPaliwa;
    private String moc;

    public Auto(String marka, String model, String typPaliwa, String moc) {
        super(marka, model);
        this.typPaliwa = typPaliwa;
        this.moc = moc;
    }

    @Override
    public String toString() {
        return "Auto: " +
                "typ paliwa: '" + typPaliwa + '\'' +
                ", moc: '" + moc + '\'' + " " + super.toString();
    }
}


