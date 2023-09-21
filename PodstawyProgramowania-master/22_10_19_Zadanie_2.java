import java.util.Scanner;
import static java.lang.Math.pow;
import static java.lang.Math.sqrt;

public class Zadanie2 {
    public static void main(String[] args) {
        System.out.println("Ten program rozwiązuje równania kwadratowe");
        Scanner scanner = new Scanner(System.in);
        System.out.println("Wprowadź wartość parametru a");
        double a = scanner.nextDouble();
        System.out.println("Wprowadź wartość parametru b");
        double b = scanner.nextDouble();
        System.out.println("Wprowadź wartość parametru c");
        double c = scanner.nextDouble();
        double delta = pow(b,2) - (4*a*c);
        if (delta > 0){
            System.out.println("Wynikiem równania jest \n x1 = " + (- b - sqrt(delta))/2*a);
            System.out.println("oraz \n x2 = " + (- b + sqrt(delta))/2*a);
        } else if (delta == 0){
            System.out.println("Wynikiem równania jest x = " + -(b/2*a));
        } else if (delta < 0){
            System.out.println("Brak rozwiązań rzeczywistych równania");
        }
    }
}
