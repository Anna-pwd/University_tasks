import java.util.Scanner;

public class Osoby {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Dane dane1 = new Dane();
        Dane dane2 = new Dane();

        System.out.println("Podaj imię 1. osoby:");
        dane1.firstName = scanner.nextLine();
        System.out.println("Podaj nazwisko 1. osoby:");
        dane1.lastName = scanner.nextLine();
        System.out.println("Podaj adres 1. osoby:");
        dane1.address = scanner.nextLine();
        System.out.println("Podaj rok urodzenia 1. osoby:");
        dane1.age = scanner.nextInt();
        scanner.nextLine();
        System.out.println("Podaj imię 2. osoby:");
        dane2.firstName = scanner.nextLine();
        System.out.println("Podaj nazwisko 2. osoby:");
        dane2.lastName = scanner.nextLine();
        System.out.println("Podaj adres 2. osoby:");
        dane2.address = scanner.nextLine();
        System.out.println("Podaj rok urodzenia 2. osoby:");
        dane2.age = scanner.nextInt();

        if (dane1.age > dane2.age) {
            System.out.println("Młodsza/y jest: " + dane1.firstName);
        } else {
            if (dane1.age < dane2.age) {
                System.out.println("Młodsza/y jest: " + dane2.firstName);
            } else {
                System.out.println("Osoby są w tym samym wieku");
            }
        }
    }
}