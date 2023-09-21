import java.util.Random;

public class Tablica2 {
    public static void main(String[] args) {
        //stworzenie tablicy
        int tablica[] = new int[100];
        //liczby "losowe"
        Random generator = new Random();
        //uzupełnienie tablicy
        for (int i = 0; i < 100; i++) {
            int generated = generator.nextInt(1001);
            if (generated % 2 == 0) {
                tablica[i] = generated;
            } else {
                i--;
            }
        }
        //wyświetlenie zawartości tablicy
        for (int i = 0; i < 100; i++) {
            System.out.println("Numer : " + i + " wartość : " + tablica[i]);
        }
    }
}

