import java.util.Random;

public class Tablica{
    public static void main(String[] args) {
        //stworzenie tablicy
        int tablica[] = new int[100];
        //liczby "losowe"
        Random generator = new Random();
        //uzupełnienie tablicy
        for (int i = 0; i < 100; i++) {
            tablica[i] = generator.nextInt(1001);
        }
        //wyświetlenie co 2 wartości
        for(int i = 0; i < 100; i = i + 2) {
            System.out.println("Numer : " + i + " wartość : " + tablica[i]);
        }
    }
}
