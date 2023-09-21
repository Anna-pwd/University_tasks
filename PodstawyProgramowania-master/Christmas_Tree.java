import java.util.Random;
import java.util.Scanner;
import java.lang.String;

public class Christmas_Tree {
    public static void main(String[] args) {
        setChristmasTree();
    }
    public static void setChristmasTree() {
        String[] bauble = {"@","O","o","*","*","*"};
        Scanner scanner = new Scanner(System.in);
        System.out.println("Podaj wysokość choinki");
        int n = scanner.nextInt();
        for (int a = 0; a <= (n - 1); a++) {
            System.out.print(" ");
        }
        System.out.println("^");
        for (int i = 1; i < n; i++) {
            for (int j = 0; j < n * 2; j++) {
                if (j < (n - i) || j > (n + i)) {
                    System.out.print(" ");
                } else {
                    Random decorate = new Random();
                    int b = decorate.nextInt(6);
                    System.out.print(bauble[b]);
                }
            }
            System.out.println();
        }
        for(int a = 0; a <= (n-1); a++){
            System.out.print(" ");
        }
        System.out.print("H");
    }
}

