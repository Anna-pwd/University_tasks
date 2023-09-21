import java.util.Random;

public class Tablica5 {
    public static void main(String[] args) {
        //stworzenie tablicy
        int tablica[][] = new int[10][10];
        //liczby "losowe"
        Random generator = new Random();
        //uzupełnienie tablicy
        for (int i = 0; i < tablica.length; i++) {
            for (int j = 0; j < tablica.length; j++) {
                tablica[i][j] = generator.nextInt(101);
                //Wygląd tablicy z wartościami
                //System.out.println("Wygląd tablicy " + i + "x" + j + " " + tablica[i][j]);
            }
        }
        //System.out.println("\n");
        int i = 0;
        int j = 0;
        System.out.println("Wartości leżące na 1. przekątnej tablicy: ");
        for (i = j; i < tablica.length; i++) {
            System.out.println(tablica[i][j]);
            j++;
        }
        System.out.println("\n Wartości leżące na 2. przekątnej tablicy: ");
        int k = 0;
        for (int l = tablica.length-1; l >= 0 ; k++) {
            System.out.println(tablica[k][l]);
            l--;
        }
    }
}
