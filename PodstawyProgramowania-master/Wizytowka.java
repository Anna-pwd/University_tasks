import java.util.InputMismatchException;
import java.util.Scanner;
import java.util.regex.Pattern;

public class Wizytowka {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        String firstName, lastName, address, number;
        //imie
        do {
            try {
                System.out.println("Podaj imię:");
                firstName = scanner.nextLine();
                if (!Pattern.matches("^[A-Z,Ł]{1}[a-zęóąśłżźćń]{1,}", firstName)) {
                    throw new InputMismatchException();
                }
            } catch (InputMismatchException e) {
                System.out.println("Imię zaczyna się wielką literą");
                firstName = scanner.nextLine();
            }
        }
        while (!Pattern.matches("^[A-Z,Ł]{1}[a-zęóąśłżźćń]{1,}", firstName)) ;
        //nazwisko
        do {
            try {
                System.out.println("Podaj nazwisko:");
                lastName = scanner.nextLine();
                if (!Pattern.matches("^[A-Z,Ł]{1}[a-zęóąśłżźćń]{1,}", lastName)) {
                    throw new InputMismatchException();
                }
            } catch (InputMismatchException e) {
                System.out.println("Nazwisko zaczyna się wielką literą");
                lastName = scanner.nextLine();
            }
        }
        while (!Pattern.matches("^[A-Z,Ł]{1}[a-zęóąśłżźćń]{1,}", lastName));
        //adres
        System.out.println("Podaj adres:");
        address = scanner.nextLine();
        //numer telefonu
        do {
            try {
                System.out.println("Podaj numer telefonu:");
                number = scanner.nextLine();
                if (!Pattern.matches("[0-9]{3}-[0-9]{3}-[0-9]{3}$", number)) {
                    throw new InputMismatchException();
                }
            } catch (InputMismatchException e) {
                System.out.println("Podaj ponownie numer telefonu w formacie XXX-XXX-XXX");
                number = scanner.nextLine();
            }
        }
        while (!Pattern.matches("[0-9]{3}-[0-9]{3}-[0-9]{3}$", number)) ;

        System.out.println(firstName + " " + lastName + "\n" + address + "\n" + "Tel." + number);

    }
}