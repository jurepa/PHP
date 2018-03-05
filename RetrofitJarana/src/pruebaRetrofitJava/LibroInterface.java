package pruebaRetrofitJava;
import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Path;
import retrofit2.http.Query;

import java.util.List;


public interface LibroInterface {
	@GET("/api/v1/libro/{id}")
	Call<Libro> getLibro (@Path("id") int id);
	@GET("/xE41xdeTIuBJtqqDHlxE")
	Call<List<Libro>>getListLibroQuery(@Query("minpag") int minpag,@Query("maxpag") int maxpag);

}
