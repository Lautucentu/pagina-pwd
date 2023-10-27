var mostrarTop = (response) => {

  const top10 = response.results.slice(0, 10);

  const listaPelis = document.getElementById("lista-pelis");
  listaPelis.innerHTML = ''; // Limpia la lista antes de mostrar las películas

  top10.forEach((pelicula) => {
  const li = document.createElement("li");
  li.className = "lipelis";
  const img = document.createElement("img");
  img.className = "pelis";
  img.src = "https://image.tmdb.org/t/p/w500/" + pelicula.poster_path;
  img.alt = pelicula.title;

  listaPelis.appendChild(li);
  li.appendChild(img);
  });
}
var cartelera = (response) => {
  const top10 = response.results.slice(0, 10);
  
  const carouselInner = document.getElementById("hola");
  
      top10.forEach((pelicula, index) => {
        const item = document.createElement("div");
        item.classList.add("carousel-item");
        if (index === 0) {
          item.classList.add("active"); // Marcar el primer elemento como activo
        }
        const img = document.createElement("img");
        img.classList.add("pelis-main");
        img.src = "https://image.tmdb.org/t/p/original/" + pelicula.backdrop_path; // Ajusta la propiedad "url" según la estructura de tus objetos de imagen.
        img.alt = pelicula.title; // Ajusta la propiedad "alt" según la estructura de tus objetos de imagen.

        const nombrepeli = document.createElement("div");
        nombrepeli.classList.add("nombre-peli");
        nombrepeli.innerText=pelicula.title;

        item.appendChild(img);
        item.appendChild(nombrepeli);
        carouselInner.appendChild(item);
      });
    };
var options = {
  method: 'GET',
  headers: {
    accept: 'application/json',
    Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0OGJlNTMzODY5ZTkwYzc1YzM0Nzk0N2UzZTM4YzQ2ZiIsInN1YiI6IjY1MzZkYTRlOTQ2MzE4MDBjNmI1NGU2ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ZWgW19RmAa8if-jOz_6HzINBtHJwl_yWJecn8MD_U_8'
  }
};
fetch('https://api.themoviedb.org/3/movie/now_playing?language=es-AR&page=1&region=ar', options)
.then(response => response.json())
.then(response => cartelera(response))
.catch(err => console.error(err));

fetch('https://api.themoviedb.org/3/movie/top_rated?language=es-AR&page=1', options)
  .then(response => response.json())
  .then(response => mostrarTop(response))
  .catch(err => console.error(err));
    

