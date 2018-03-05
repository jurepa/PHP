package pruebaRetrofitJava;

import java.io.IOException;
import java.util.Scanner;

import com.google.gson.Gson;
import okio.*;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;





/***************************************

 README:

 - No realiza la petición, entra en el onFailure. Algo de la URL está mal
 *
 */



public class Principal {
	
	private final static String SERVER_URL = "https://putsreq.com";

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner teclado=new Scanner(System.in);
		int numMinPags,numMaxPags=0;
		do {
			System.out.println("Introduce un número mínimo de páginas");
			numMinPags = teclado.nextInt();
		}while(numMinPags<=0);
		do{
			System.out.println("Introduce un número máximo de páginas");
			numMaxPags=teclado.nextInt();
		}while (numMaxPags<=0);

		Retrofit retrofit;
		ListLibroQueryCallback callback= new ListLibroQueryCallback();

		
		retrofit = new Retrofit.Builder()
							   .baseUrl(SERVER_URL)
							   .addConverterFactory(GsonConverterFactory.create())
							   .build();
		
		LibroInterface libroInter = retrofit.create(LibroInterface.class);
		
		libroInter.getListLibroQuery(numMinPags,numMaxPags).enqueue(callback);

		

	}


	


}
