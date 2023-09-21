public class Main {
    public static void main(String[] args) {

        Pojazd auto = new Auto("Nissan", "Almera", "Benzyna","85 kW");
        System.out.println(auto);
        Pojazd motor = new Motor("Honda","CBR","650.0","łańcuch");
        System.out.println(motor);
        Pojazd hulajnoga = new Hulajnoga("Scooter","X540","Srebrny","ręczny");
        System.out.println(hulajnoga);
        Pojazd rower = new Rower("Romet","City","7","24");
        System.out.println(rower);
    }
}
