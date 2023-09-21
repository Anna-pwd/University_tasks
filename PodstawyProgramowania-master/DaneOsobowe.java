import java.util.Calendar;

class DaneOsobowe {
    static String firstName = "Jan";
    static String lastName = "Kowalski";
    static int dataZatrudnienia = 2000;
    static int iloscLatWFirmie;

    public static void main(String[] args) {
        calendar();
        show();
    }
    static void calendar() {
        Calendar cal = Calendar.getInstance();
        int year = cal.get(Calendar.YEAR);
        iloscLatWFirmie = year - dataZatrudnienia;
    }
    static void show() {
        System.out.println("Imię: " + firstName + "\n" + "Nazwisko: " + lastName + "\n" + "Pracuje w firmie " + iloscLatWFirmie + " lat.");
  }
}
