import java.util.Random;

public class Tablica3 {
    public static void main(String[] args) {
        //stworzenie tablicy
        int tablica[] = new int[10];
        //liczby "losowe"
        Random generator = new Random();
        //uzupełnienie tablicy
        for (int i = 0; i < 10; i++) {
            tablica[i] = generator.nextInt(101);
        }
        //wyświetlenie w odwrotnej kolejności
        for(int i = tablica.length-1; i >= 0; i--){
            System.out.println("Numer : " + i + " Wartość : " + tablica[i]);
        }
    }
}
