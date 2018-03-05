package pruebaRetrofitJava;


import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import java.util.List;

/**
 * Created by pjarana on 26/02/18.
 */
public class ListLibroQueryCallback implements Callback<List<Libro>> {


    @Override
    public void onResponse(Call<List<Libro>> call, Response<List<Libro>> response) {

        List<Libro> libros=response.body();

        for(int i=0;i<libros.size();i++)
        {
            System.out.println(libros.get(i).getTitulo()+" "+libros.get(i).getNumpag());
        }

    }

    @Override
    public void onFailure(Call<List<Libro>> call, Throwable throwable) {
        int i;
        i=0;
        System.out.println("Algo ha fallao");
    }
}
