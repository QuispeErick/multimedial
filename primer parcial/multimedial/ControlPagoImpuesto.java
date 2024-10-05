import java.util.Scanner;

public class ControlPagoImpuesto {

    public static void main(String[] args) {
        // Comprobar si se ha proporcionado un argumento al programa
        if (args.length == 0) {
            System.out.println("Por favor, ingrese el código catastral como argumento.");
            return;
        }

        // Obtener el código catastral del argumento
        String codigoCatastral = args[0];

        // Determinar el tipo de impuesto
        String tipoImpuesto = obtenerTipoImpuesto(codigoCatastral);

        // Mostrar el resultado
        System.out.println(tipoImpuesto);
    }

    public static String obtenerTipoImpuesto(String codigoCatastral) {
        // Validar que el código catastral no esté vacío
        if (codigoCatastral.isEmpty()) {
            return "Código catastral no válido.";
        }

        // Obtener el primer carácter del código catastral
        char primerCaracter = codigoCatastral.charAt(0);

        // Determinar el tipo de impuesto
        switch (primerCaracter) {
            case '1':
                return "Alto";
            case '2':
                return "Medio";
            case '3':
                return "Bajo";
            default:
                return "No definido"; // Manejar otros casos si es necesario
        }
    }
}
