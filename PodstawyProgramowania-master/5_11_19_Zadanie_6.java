import java.util.Random;
import static java.lang.Math.pow;

public class Tablica6 {
    public static void main(String[] args) {
        //stworzenie tablicy
        int tablica[][] = new int[10][10];
        //liczby "losowe"
        Random generator = new Random();
        //uzupełnienie tablicy
        for (int i = 0; i < tablica.length; i++) {
            for (int j = 0; j < tablica.length; j++) {
                tablica[i][j] = generator.nextInt(101);
                //Wyświetlenie tablicy
                //System.out.println(tablica[i][j]);
            }
        }
        //liczba największa
        int ilosc = tablica.length;
        int max = tablica[0][0];
        for (int i = 0; i < ilosc; i++) {
            for (int j = 0; j < ilosc; j++) {
                if (tablica[i][j] > max)
                    max = tablica[i][j];
            }
        }
        System.out.println("Największa wartość w tablicy to : " + max);

        //liczba najmniejsza
        int min = tablica[0][0];
        for (int i = 1; i < tablica.length; i++) {
            for (int j = 0; j < tablica.length; j++) {
                if (tablica[i][j] < min)
                    min = tablica[i][j];
            }
        }
        System.out.println("Najmniejsza wartość w tablicy to : " + min);

        //suma liczb
        int suma = 0;
        for (int i = 0; i < tablica.length; i++) {
            for (int j = 0; j < tablica.length; j++) {
                suma = suma + tablica[i][j];
            }
        }
        System.out.println("Suma liczb w tablicy to : " + suma);

        //średnia liczb
        double i = tablica.length;
        double srednia = suma / pow(i, 2);
        System.out.println("Srednia liczb w tablicy to : " + srednia);
    }
}
