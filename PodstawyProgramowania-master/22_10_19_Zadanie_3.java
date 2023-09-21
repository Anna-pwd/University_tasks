import java.util.Scanner;

public class Zadanie3 {
    public static void main(String[] args) {
        char gwiazdka = '*';
        Scanner scanner = new Scanner(System.in);
        System.out.println("Podaj wysokość figury");
        int n = scanner.nextInt();
        System.out.println();

        //prostokąt
        int p = 0;
        int r = 0;
        while( p < n){
            while(r < n){
                System.out.print("*");
                r++;
            }
            System.out.println();
            r=0;
            p++;
        }

        // inna wersja prostokąta
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < n; j++) {
                System.out.print(gwiazdka);
                System.out.print("");
            }
            System.out.println();
        }*/

        //trójkąt prostokątny L
        for (int i = 0; i <= n; i++) {
            for (int j = 0; j < n; j++) {
                if (j < (n - i) || j > (n + i)) {
                    System.out.print("");
                } else {
                    System.out.print(gwiazdka);
                }
            }
            System.out.println();
        }

        //trójkąt prostokątny P
        for (int i = 0; i <= n; i++) {
            for (int j = 0; j < n; j++) {
                if (j < (n - i) || j > (n + i)) {
                    System.out.print(" ");
                } else {
                    System.out.print(gwiazdka);
                }
            }
            System.out.println();
        }

        //trójkąt równoramienny
        System.out.println();
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < n * 2; j++) {
                if (j < (n - i) || j > (n + i)) {
                    System.out.print(" ");
                } else {
                    System.out.print(gwiazdka);
                }
            }
            System.out.println();
        }
    }
}
