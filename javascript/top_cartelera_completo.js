let boton= document.getElementById("siguiente");
let boton2= document.getElementById("anterior")
let num=1;
let pages=1
var miURL = window.location.href;
console.log(miURL)

var completo = (response) => {
  const pelis = response.results;

  const listaPelis = document.getElementById("coleccion-pelis");
  listaPelis.innerHTML = ''; // Limpia la lista antes de mostrar las películas

  pelis.forEach((pelicula) => {
      const card=document.createElement("div");
      card.classList.add("card");
      const img = document.createElement("img");
      img.className = "pelis";
      img.src = "https://image.tmdb.org/t/p/w500/" + pelicula.poster_path;
      img.alt = pelicula.title;
      const card_cont=document.createElement("div")
      card_cont.classList.add("card__content");
      const titulo_card = document.createElement("p");
      titulo_card.classList.add("card__title");
      titulo_card.innerText="sinopsis"
      const card_desc=document.createElement("p");
      card_desc.classList.add("card__description");
      card_desc.innerText=pelicula.overview;
    
  if(pelicula.poster_path){
    listaPelis.appendChild(card);
    card.appendChild(img);
    card.appendChild(card_cont)
    card_cont.appendChild(titulo_card);
    card_cont.appendChild(card_desc);
  }
  });
}

var options = {
  method: 'GET',
  headers: {
    accept: 'application/json',
    Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0OGJlNTMzODY5ZTkwYzc1YzM0Nzk0N2UzZTM4YzQ2ZiIsInN1YiI6IjY1MzZkYTRlOTQ2MzE4MDBjNmI1NGU2ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ZWgW19RmAa8if-jOz_6HzINBtHJwl_yWJecn8MD_U_8'
  }
};


function fetchNew (valor){
  if(miURL.includes("cartelera.html"))
  {
    fetch('https://api.themoviedb.org/3/movie/now_playing?language=es-AR&page='+valor, options)
      .then(response => response.json())
      .then(response => 
        {
          pages= response.total_pages;
          completo(response)
        })
      .catch(err => console.error(err))
  }
  else
  {
    {
      fetch('https://api.themoviedb.org/3/movie/top_rated?language=es-AR&page='+valor+'&region=ar', options)
        .then(response => response.json())
        .then(response => 
          {
            pages= response.total_pages;
            completo(response)
          })
        .catch(err => console.error(err))
    }
  }
  }



boton.addEventListener("click",()=>{
  if(num < pages){
    num++;
  }
  fetchNew(num);
});
boton2.addEventListener("click",()=>
{
  if(num>1)
  {
    num--;
  }
  fetchNew(num)
})
fetchNew(1)

