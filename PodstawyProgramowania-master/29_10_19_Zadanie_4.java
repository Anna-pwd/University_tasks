import static java.lang.Math.pow;

public class Zadanie4 {
    public static void main(String [] args) {
        first();
        second();
        third();
    }

    public static void first() {
        double x_max = 2;
        double step = 0.5;
        double field_under = 0;

        for (double i = step; i <= x_max; i = i + step) {
            field_under += step * pow(i, 2);
        }
        double field_result = 2 * (pow(x_max, 3) - field_under);
        System.out.print("Pole powierzchni dla 0.5 = " + field_result + "\n");
    }
    public static void second() {
        double x_max = 2;
        double step = 0.1;
        double field_under = 0;

        for (double i = step; i <= x_max; i = i + step) {
            field_under += step * pow(i, 2);
        }
        double field_result = 2 * (pow(x_max, 3) - field_under);
        System.out.print("Pole powierzchni dla o.1 = " + field_result + "\n");
    }
    public static void third() {
        double x_max = 2;
        double step = 0.01;
        double field_under = 0;

        for (double i = step; i <= x_max; i = i + step) {
            field_under += step * pow(i, 2);
        }
        double field_result = 2 * (pow(x_max, 3) - field_under);
        System.out.print("Pole powierzchni dla 0.01 = " + field_result + "\n");
    }
}


