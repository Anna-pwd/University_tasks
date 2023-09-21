import java.util.Random;

    public class Tablica4 {
        public static void main(String[] args) {
            //stworzenie tablicy
            int tablica[] = new int[100];
            //liczby "losowe"
            Random generator = new Random();
            //uzupełnienie tablicy
            for (int i = 0; i < 100; i++) {
                tablica[i] = generator.nextInt(101);
               }
            //liczba największa
            int dlugosc = tablica.length;
            int max = tablica[0];
            for (int i = 0; i < dlugosc; i++) {
                if (tablica[i] > max)
                    max = tablica[i];
            }
                System.out.println("Największa wartość w tablicy to : " + max);
            //liczba najmniejsza
            int min = tablica[0];
            for(int i = 1; i < tablica.length; i++) {
                if (tablica[i] < min)
                    min = tablica[i];
            }
            System.out.println("Najmniejsza wartość w tablicy to : " + min);
            //suma liczb
            int suma = 0;
            for (int i = 0 ; i < tablica.length ; i++) {
                    suma = suma + tablica[i];
                }
            System.out.println("Suma liczb w tablicy to : " + suma);
            //średnia liczb
            double i = tablica.length;
            double srednia = suma / i;
            System.out.println("Srednia liczb w tablicy to : " + srednia);

        }
}

