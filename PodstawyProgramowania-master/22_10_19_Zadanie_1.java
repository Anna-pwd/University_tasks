import java.util.Scanner;

public class Zadanie1 {
    public static void main(String[] args) {
        Scanner skaner1 = new Scanner(System.in);
        System.out.println("wprowadź zmienną a");
        double a = skaner1.nextDouble();
        System.out.println("Wprowadź zmienną b");
        double b = skaner1.nextDouble();
        System.out.println("Wprowadź zmienną c");
        double c = skaner1.nextDouble();

        if (a > b && a > c) {
            System.out.println("a = " + a + " jest największe");
        } else if (b > a && b > c) {
            System.out.println("b = " + b + " jest największe");
        } else if (c > a && c > b) {
            System.out.println("c = " + c + " jest największe");
        }
    }
}
