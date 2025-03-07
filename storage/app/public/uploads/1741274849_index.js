    
    let dataplayer ;
    if(localStorage.product != null){
      dataplayer = JSON.parse(localStorage.product);
  }else{
    dataplayer = [
      {
        id:1,
        name: "Messi",
        photo: "../img/img-joueurs/messi.avif",
        position: "RWF",
        nationality: "../img/nationality/argentina.png",
        club: "../img/clop/Inter_Miami-removebg-preview.png",
        league: "../img/league/Major League Soccer.jpg",
        rating: 93,
        pace: 85,
        shooting: 92,
        passing: 91,
        dribbling: 95,
        defending: 35,
        physical: 65
      },
      {
        id:2,
        name: "Ronaldo",
        photo: "../img/img-joueurs/ronaldo.avif",
        position: "CF",
        nationality: "../img/nationality/portugal.png",
        club: "../img/clop/Al_Nassr-removebg-preview.png",
        league: "../img/league/saudi.jpg",
        rating: 91,
        pace: 84,
        shooting: 94,
        passing: 82,
        dribbling: 87,
        defending: 34,
        physical: 77
      },
      {
        id:3,
        name: "Bruyne",
        photo: "../img/img-joueurs/de bruyne.avif",
        position: "CMF",
        nationality: "../img/nationality/Belgium.png",
        club: "../img/clop/city-removebg-preview.png",
        league: "../img/league/premier leaghe.jpg",
        rating: 91,
        pace: 74,
        shooting: 86,
        passing: 93,
        dribbling: 88,
        defending: 64,
        physical: 78
      },
      {
        id:4,
        name: "Mbappé",
        photo: "../img/img-joueurs/mbappé.avif",
        position: "CF",
        nationality: "../img/nationality/france.png",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 92,
        pace: 97,
        shooting: 89,
        passing: 80,
        dribbling: 92,
        defending: 39,
        physical: 77
      },
      {
        id:5,
        name: "konte",
        photo: "../img/img-joueurs/konte.avif",
        position: "CA",
        nationality: "../img/nationality/Netherlands.png",
        club: "../img/clop/liverpool-removebg-preview.png",
        league: "../img/league/premier leaghe.jpg",
        rating: 90,
        pace: 75,
        shooting: 60,
        passing: 70,
        dribbling: 72,
        defending: 92,
        physical: 86
      },
      {
        id:6,
        name: "Rudiger",
        photo: "../img/img-joueurs/rudiger.avif",
        position: "CB",
        nationality: "../img/nationality/almania.png",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 88,
        pace: 82,
        shooting: 55,
        passing: 73,
        dribbling: 70,
        defending: 86,
        physical: 86
      },
      {
        id:9,
        name: "Neymar",
        photo: "../img/img-joueurs/neymar.avif",
        position: "LWF",
        nationality: "../img/nationality/Brazil.png",
        club: "../img/clop/Al-Hilal-removebg-preview.png",
        league: "../img/league/saudi.jpg",
        rating: 90,
        pace: 91,
        shooting: 83,
        passing: 86,
        dribbling: 94,
        defending: 37,
        physical: 61
      },
      {
        id:10,
        name: "Salah",
        photo: "../img/img-joueurs/salah.avif",
        position: "RWF",
        nationality: "../img/nationality/Egypt.png",
        club: "../img/clop/liverpool-removebg-preview.png",
        league: "../img/league/premier leaghe.jpg",
        rating: 89,
        pace: 93,
        shooting: 87,
        passing: 81,
        dribbling: 90,
        defending: 45,
        physical: 75
      },
      {
        id:11,
        name: "Kimmich",
        photo: "../img/img-joueurs/kimmich.avif",
        position: "CMD",
        nationality: "../img/nationality/almania.png",
        club: "../img/clop/bayern-removebg-preview.png",
        league: "../img/league/eredivisie.png",
        rating: 89,
        pace: 70,
        shooting: 75,
        passing: 88,
        dribbling: 84,
        defending: 84,
        physical: 81
      },
      {
        id:12,
        name: "Oblak",
        photo: "../img/img-joueurs/oblak.avif",
        position: "GB",
        nationality: "../img/nationality/Slovenia.png",
        club: "../img/clop/Atletico_Madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 91,
        diving: 89,
        handling: 90,
        kicking: 78,
        reflexes: 92,
        speed: 50,
        positioning: 88
      },
      {
        id:13,
        name: "Modrić",
        photo: "../img/img-joueurs/modric.avif",
        position: "CMA",
        nationality: "../img/nationality/Croatia.png",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 88,
        pace: 74,
        shooting: 78,
        passing: 89,
        dribbling: 90,
        defending: 72,
        physical: 65
      },
      {
        id:14,
        name: "Vinicius",
        photo: "../img/img-joueurs/vini.avif",
        position: "LWF",
        nationality: "../img/nationality/Brazil.png",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 89,
        pace: 91,
        shooting: 88,
        passing: 85,
        dribbling: 94,
        defending: 39,
        physical: 61
      },
      {
        id:15,
        name: "Brahim",
        photo: "../img/img-joueurs/brahim.avif",
        position: "LWR",
        nationality: "../img/nationality/moroco.jpg",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 82,
        pace: 85,
        shooting: 74,
        passing: 78,
        dribbling: 85,
        defending: 31,
        physical: 56
      },
      {
        id:16,
        name: "Benzema",
        photo: "../img/img-joueurs/brnzema.avif",
        position: "CF",
        nationality: "../img/nationality/france.png",
        club: "../img/clop/Al-Ittihad-removebg-preview.png",
        league: "../img/league/saudi.jpg",
        rating: 90,
        pace: 80,
        shooting: 87,
        passing: 82,
        dribbling: 83,
        defending: 35,
        physical: 82
      },
      {
        id:17,
          name: "Coman",
          photo: "../img/img-joueurs/coman.avif",
          position: "LWR",
          nationality: "../img/nationality/france.png",
          club: "../img/clop/bayern-removebg-preview.png",
          league: "../img/league/eredivisie.png",
          rating: 85,
          pace: 92,
          shooting: 72,
          passing: 78,
          dribbling: 88,
          defending: 34,
          physical: 72
        },
        {
          id:18,
          name: "Dier",
          photo: "../img/img-joueurs/dier.avif",
          position: "CA",
          nationality: "../img/nationality/England.png",
          club: "../img/clop/Tottenham_Hotspur-removebg-preview.png",
          league: "../img/league/premier leaghe.jpg",
          rating: 81,
          pace: 60,
          shooting: 50,
          passing: 65,
          dribbling: 55,
          defending: 85,
          physical: 79
        },
        {
          id:19,
          name: "Guirassy",
          photo: "../img/img-joueurs/guirassy.avif",
          position: "LWF",
          nationality: "../img/nationality/france.png",
          club: "../img/clop/Stade_Rennais-removebg-preview.png",
          league: "../img/league/Ligue 1.png",
          rating: 80,
          pace: 80,
          shooting: 85,
          passing: 70,
          dribbling: 76,
          defending: 40,
          physical: 78
        },
        {
          id:20,
          name: "Konte",
          photo: "../img/img-joueurs/konte.avif",
          position: "LWF",
          nationality: "../img/nationality/france.png",
          club: "../img/clop/Chelsea-removebg-preview.png",
          league: "../img/league/premier leaghe.jpg",
          rating: 85,
          pace: 75,
          shooting: 65,
          passing: 80,
          dribbling: 85,
          defending: 82,
          physical: 88
        },
        {
          id:21,
          name: "Maignan",
          photo: "../img/img-joueurs/maignan.avif",
          position: "GB",
          nationality: "../img/nationality/france.png",
          club: "../img/clop/AC_Milan-removebg-preview.png",
          league: "../img/league/Serie A.png",
          rating: 87,
          pace: 50,
          shooting: 30,
          passing: 60,
          dribbling: 65,
          defending: 90,
          physical: 82
        },
        {
          id:22,
          name: "Martinili",
          photo: "../img/img-joueurs/martinili.avif",
          position: "LWF",
          nationality: "../img/nationality/Brazil.png",
          club: "../img/clop/arsenal-removebg-preview.png",
          league: "../img/league/premier leaghe.jpg",
          rating: 82,
          pace: 80,
          shooting: 45,
          passing: 70,
          dribbling: 75,
          defending: 82,
          physical: 78
        },
        {

          id:23,
          name: "Thuram",
          photo: "../img/img-joueurs/thuram.avif",
          position: "LWR",
          nationality: "../img/nationality/france.png",
          club: "./img/clop/Borussia_Monchengladbach-removebg-preview.png",
          league: "../img/league/bundesliga.png",
          rating: 83,
          pace: 84,
          shooting: 76,
          passing: 70,
          dribbling: 80,
          defending: 40,
          physical: 82
        },
        {
          id:24,
          name: "White",
          photo: "../img/img-joueurs/white.avif",
          position: "LB",
          nationality: "../img/nationality/England.png",
          club: "../img/clop/arsenal-removebg-preview.png",

          id:10,
          name: "Salah",
          photo: "../img/img-joueurs/salah.avif",
          position: "RWF",
          nationality: "../img/nationality/Egypt.png",
          club: "../img/clop/liverpool-removebg-preview.png",

          league: "../img/league/premier leaghe.jpg",
          rating: 83,
          pace: 75,
          shooting: 60,
          passing: 70,
          dribbling: 65,
          defending: 85,
          physical: 79
        },
        {
          id:25,
          name: "Wirtz",
          photo: "../img/img-joueurs/wirtz.avif",
          position: "CMF",
          nationality: "../img/nationality/almania.png",
          club: "../img/clop/leverkusen-removebg-preview.png",
          league: "../img/league/eredivisie.png",
          rating: 85,
          pace: 78,
          shooting: 75,
          passing: 85,
          dribbling: 90,
          defending: 45,
          physical: 68
        },
        {
          id:26,
          name: "Walker",
          photo: "../img/img-joueurs/wolker.avif",
          position: "RB",
          nationality: "../img/nationality/England.png",
          club: "../img/clop/city-removebg-preview.png",
          league: "../img/league/premier leaghe.jpg",
          rating: 84,
          pace: 86,
          shooting: 60,
          passing: 70,
          dribbling: 65,
          defending: 82,
          physical: 78
        },
        {
          id:27,
          name: "casemiro",
          photo: "../img/img-joueurs/casemiro.avif",
          position: "CMD",
          nationality: "../img/nationality/England.png",
          club: "../img/clop/manchester-united-preview.png",
          league: "../img/league/premier leaghe.jpg",
          rating: 98,
          pace: 86,
          shooting: 60,
          passing: 70,
          dribbling: 65,
          defending: 82,
          physical: 78
        },
        {
          id: 28,
          name: "Lewandowski",
          photo: "../img/img-joueurs/lewandowski.avif",
          position: "CF",
          nationality: "../img/nationality/Poland.png",
          club: "../img/clop/barcalona-preview.png",
          league: "../img/league/la liga.png",
          rating: 92,
          pace: 80,
          shooting: 95,
          passing: 80,
          dribbling: 87,
          defending: 40,
          physical: 85
        },
        {
          id: 30,
          name: "Pedri",
          photo: "../img/img-joueurs/pedri.avif",
          position: "CMF",
          nationality: "../img/nationality/Spain.png",
          club: "../img/clop/barcalona-preview.png",
          league: "../img/league/la liga.png",
          rating: 89,
          pace: 75,
          shooting: 72,
          passing: 88,
          dribbling: 91,
          defending: 60,
          physical: 65
        },
        {
          id: 31,
          name: "Gavi",
          photo: "../img/img-joueurs/gavi.avif",
          position: "CMA",
          nationality: "../img/nationality/Spain.png",
          club: "../img/clop/barcalona-preview.png",
          league: "../img/league/la liga.png",
          rating: 85,
          pace: 78,
          shooting: 70,
          passing: 80,
          dribbling: 85,
          defending: 75,
          physical: 68
        },
        {

          id: 32,
          name: "Stegen",
          photo: "../img/img-joueurs/stegen.avif",
          position: "GB",
          nationality: "../img/nationality/almania.png",
          club: "../img/clop/barcalona-preview.png",
          league: "../img/league/la liga.png",
          rating: 91,

          pace: 0,
          shooting: 0,
          passing: 68,
          dribbling: 50,
          defending: 15,

          physical: 80
        },
        {
          id: 32,
          name: "Koundé",
          photo: "../img/img-joueurs/kounde.avif",
          position: "CB",
          nationality: "../img/nationality/france.png",
          club: "../img/clop/barcalona-preview.png",
          league: "../img/league/la liga.png",

          rating: 86,
          pace: 85,
          shooting: 50,
          passing: 78,
          dribbling: 78,
          defending: 85,
          physical: 82
        },
        {

        id: 33,
        name: "Courtois",
        photo: "../img/img-joueurs/courtois.avif",
        position: "GB",
        nationality: "../img/nationality/Belgium.png",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 94,
        pace: 0,
        shooting: 0,
        passing: 65,
        dribbling: 50,
        defending: 15,
        physical: 82
      },
      {
        id: 34,
        name: "van-Dijk",
        photo: "../img/img-joueurs/van-dijk.avif",
        position: "CB",
        nationality: "../img/nationality/Netherlands.png",
        club: "../img/clop/liverpool-removebg-preview.png",
        league: "../img/league/premier leaghe.jpg",
        rating: 91,
        pace: 76,
        shooting: 60,
        passing: 71,
        dribbling: 72,
        defending: 91,
        physical: 86
      },
      {
        id: 35,
        name: "Varane",
        photo: "../img/img-joueurs/varane.avif",
        position: "CB",
        nationality: "../img/nationality/France.png",
        club: "../img/clop/manchester-united-preview.png",
        league: "../img/league/premier leaghe.jpg",
        rating: 87,
        pace: 75,
        shooting: 55,
        passing: 65,
        dribbling: 70,
        defending: 88,
        physical: 80
      },
      {
        id: 36,
        name: "Koulibaly",
        photo: "../img/img-joueurs/Koulibaly.avif",
        position: "CA",
        nationality: "../img/nationality/Senegal.png",
        club: "../img/clop/Al-Hilal-removebg-preview.png",
        league: "../img/league/saudi.jpg",
        rating: 86,
        pace: 80,
        shooting: 60,
        passing: 65,
        dribbling: 70,
        defending: 90,
        physical: 85
      },
      {
        id: 37,
        name: "de-Ligt",
        photo: "../img/img-joueurs/de-ligt.avif",
        position: "CA",
        nationality: "../img/nationality/Netherlands.png",
        club: "../img/clop/bayern-removebg-preview.png",
        league: "../img/league/bundesliga.png",
        rating: 86,
        pace: 78,
        shooting: 50,
        passing: 70,
        dribbling: 75,
        defending: 87,
        physical: 82
      },
      {
        id: 38,
        name: "Dembélé",
        photo: "../img/img-joueurs/Dembélé.avif",
        position: "RWF",
        nationality: "../img/nationality/France.png",
        club: "../img/clop/PSG-preview.png",
        league: "../img/league/ligue 1.png",
        rating: 85,
        pace: 92,
        shooting: 75,
        passing: 77,
        dribbling: 90,
        defending: 30,
        physical: 60
      },
      {
        id: 39,
        name: "Ziyech",
        photo: "../img/img-joueurs/Ziyech.avif",
        position: "RWF",
        nationality: "../img/nationality/moroco.jpg",
        club: "../img/clop/galatasaray-preview.png",
        league: "../img/league/super lig.png",
        rating: 84,
        pace: 75,
        shooting: 78,
        passing: 85,
        dribbling: 82,
        defending: 40,
        physical: 60
      },
      {
        id: 40,
        name: "Hakimi",
        photo: "../img/img-joueurs/hakimi.avif",
        position: "RB",
        nationality: "../img/nationality/moroco.jpg",
        club: "../img/clop/PSG-preview.png",
        league: "../img/league/ligue 1.png",
        rating: 86,
        pace: 94,
        shooting: 70,
        passing: 78,
        dribbling: 83,
        defending: 78,
        physical: 74
      },
      {
        id: 41,
        name: "Yamal",
        photo: "../img/img-joueurs/lamine.avif",
        position: "RWF",
        nationality: "../img/nationality/Spain.png",
        club: "../img/clop/barcalona-preview.png",
        league: "../img/league/la liga.png",
        rating: 79,
        pace: 84,
        shooting: 70,
        passing: 72,
        dribbling: 85,
        defending: 30,
        physical: 50
      },
      {
        id: 42,
        name: "Zidane",
        photo: "../img/img-joueurs/zidane.avif",
        position: "CMA",
        nationality: "../img/nationality/France.png",
        club: "../img/clop/no equipe.png",
        league: "../img/carré.png",
        rating: 96,
        pace: 75,
        shooting: 85,
        passing: 92,
        dribbling: 91,
        defending: 65,
        physical: 78
      },
      {
        id: 43,
        name: "Maldini",
        photo: "../img/img-joueurs/maldini.avif",
        position: "CB",
        nationality: "../img/nationality/italie.png",
        club: "../img/clop/no equipe.png",
        league: "../img/carré.png",
        rating: 94,
        pace: 80,
        shooting: 50,
        passing: 70,
        dribbling: 65,
        defending: 95,
        physical: 85
      },
      {
        id: 44,
        name: "Kroos",
        photo: "../img/img-joueurs/kroos.avif",
        position: "CMD",
        nationality: "../img/nationality/almania.png",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 88,
        pace: 52,
        shooting: 75,
        passing: 91,
        dribbling: 81,
        defending: 68,
        physical: 65
      },
      {
        id: 45,
        name: "dybala",
        photo: "../img/img-joueurs/dybala.avif",
        position: "RWF",
        nationality: "../img/nationality/argentina.png",
        club: "../img/clop/roma-preview.png",
        league: "../img/league/Serie A.png",
        rating: 84,
        pace: 70,
        shooting: 75,
        passing: 80,
        dribbling: 83,
        defending: 60,
        physical: 86
      },
      {
        id: 46,
        name: "Mazraoui",
        photo: "../img/img-joueurs/mazraoui.avif",
        position: "RB",
        nationality: "../img/nationality/Moroco.jpg",
        club: "../img/clop/bayern-removebg-preview.png",
        league: "../img/league/bundesliga.png",
        rating: 83,
        pace: 85,
        shooting: 65,
        passing: 75,
        dribbling: 78,
        defending: 80,
        physical: 70
      },
      {
        id: 47,
        name: "Militão",
        photo: "../img/img-joueurs/militao.avif",
        position: "CA",
        nationality: "../img/nationality/Brazil.png",
        club: "../img/clop/real_madrid-removebg-preview.png",
        league: "../img/league/la liga.png",
        rating: 86,
        pace: 85,
        shooting: 45,
        passing: 68,
        dribbling: 73,
        defending: 86,
        physical: 82
      },
      {
        id: 48,
        name: "Araújo",
        photo: "../img/img-joueurs/araújo.avif",
        position: "CB",
        nationality: "../img/nationality/Uruguay.png",
        club: "../img/clop/barcalona-preview.png",
        league: "../img/league/la liga.png",
        rating: 85,
        pace: 77,
        shooting: 40,
        passing: 60,
        dribbling: 65,
        defending: 86,
        physical: 85
      },
      {
        id: 49,
        name: "Davies",
        photo: "../img/img-joueurs/davies.avif",
        position: "LB",
        nationality: "../img/nationality/canada.png",
        club: "../img/clop/bayern-removebg-preview.png",
        league: "../img/league/bundesliga.png",
        rating: 84,
        pace: 96,
        shooting: 68,
        passing: 74,
        dribbling: 85,
        defending: 77,
        physical: 72
      },
      {
        id: 64,
        name: "Robertson",
        photo: "../img/img-joueurs/robertson.avif",
        position: "LB",
        nationality: "../img/nationality/Scotland.png",
        club: "../img/clop/liverpool-removebg-preview.png",
        league: "../img/league/premier leaghe.jpg",
        rating: 86,
        pace: 80,
        shooting: 62,
        passing: 81,
        dribbling: 78,
        defending: 81,
        physical: 76
      },
      {
        id: 65,
        name: "Hernández",
        photo: "../img/img-joueurs/hernandez.avif",
        position: "LB",
        nationality: "../img/nationality/France.png",
        club: "../img/clop/AC_Milan-removebg-preview.png",
        league: "../img/league/serie A.png",
        rating: 85,
        pace: 93,
        shooting: 72,
        passing: 75,
        dribbling: 82,
        defending: 80,
        physical: 82
      }

      ];
    }

const Modal=document.getElementById("addModal");
const Modal1=document.getElementById("addModal1");
const jour=document.getElementById("addJour");
const joueurs=document.getElementById("addtoutmodel");
const ditayJour=document.getElementById("ditayJour");
const addmodal=document.getElementById("task-modal");
const addchengement=document.getElementById("addchengement");

const name=document.getElementById("name");
const id = document.getElementById("id");
const rating=document.getElementById("rating");
const pace=document.getElementById("pace");
const shooting=document.getElementById("shooting");
const passing=document.getElementById("passing");
const dribbling=document.getElementById("dribbling");
const defending=document.getElementById("defending");
const physical=document.getElementById("physical");
const position=document.getElementById("position");
const club=document.getElementById("club");



function toggleModalajout(){
  jour.classList.remove("hidden");
  jour.classList.add("show");
}
function returnPageajout(){
  jour.classList.add("hidden");
}


const form = document.querySelector("form"); 
form.addEventListener("submit", (event) => {
  event.preventDefault(); 
console.log(position)
 
  let newplayer = {
      name:name.value,
      rating:rating.value,
      pace:pace.value,
      shooting:shooting.value, 
      passing:passing.value,
      dribbling:dribbling.value,
      defending:defending.value,
      physical:physical.value,
      position:position.value,
      club:club.value,
  };

  clearContent();
  dataplayer.push(newplayer);
  localStorage.setItem('product', JSON.stringify(dataplayer));
  console.log(localStorage.getItem('product'));
  document.getElementById('addJour').classList.add('hidden');
});


function clearContent(){
      name.value = '';
      rating.value = '';
      pace.value = '' ;
      shooting.value = '';
      passing.value = '';
      dribbling.value= '';
      defending.value= '';
      physical.value= '';
      position.value='';
      club.value='';
}




function toggleModaljour(position){
    Modal.classList.remove("hidden");
    Modal.classList.add("show");
    carte(position)
}

function returnPagejour(){
    Modal.classList.add("hidden");
}


function carte(position) {
    const playList = document.getElementById("carte1");
    let playHTML = '';

    const filteredPlayers = dataplayer.filter(player => player.position === position);
    console.log("here are the filtred players", filteredPlayers);
    

    filteredPlayers.forEach(play => {
        playHTML += `
    <div class="relative min-w-[200px] max-w-[200px] h-[300px] bg-gray-800 rounded-md overflow-hidden border shadow-lg">
        <img class="w-full h-auto" src="../img/carte.gif" alt="large image">
        <img id="playerPhoto" class="absolute bottom-9 left-6 w-[85px] h-auto" src="${play.photo}" alt="small image">
        <p id="ratingplayer" class="absolute bottom-32 left-9 font-bold text-[10px]">${play.rating}</p>
        <p id="playerPosition" class="absolute bottom-28 left-9 font-bold text-[10px]">${play.position}</p>
        <p id="playerName" class="absolute bottom-[70px] left-10 text-[15px] text-white">${play.name}</p>
        <img id="playerNationality" class="absolute left-9 bottom-14 w-[20px] h-auto" src="${play.nationality}" alt="flag">
        <img id="playerLeague" class="absolute left-[60px] bottom-9 w-[20px] h-auto rounded-3xl" src="${play.league}" alt="league">
        <img id="playerClub" class="absolute left-[75px] bottom-12 w-[20px] h-auto" src="${play.club}" alt="clob">
        <button onclick="carte()">
            <img onclick="addPlayer(this)" class="absolute w-[30%] left-12 bottom-1 h-auto" src="../img/chenge.png" alt="change">
        </button>
    </div>`;
    });

    playList.innerHTML = playHTML;
}


function addPlayer(tes) {
    const carde = tes.closest(".relative");

    let playerName = carde.querySelector("#playerName").innerHTML;
    let ratingplayer = carde.querySelector("#ratingplayer").innerHTML;
    let playerPhoto = carde.querySelector("#playerPhoto").src;
    let playerPosition = carde.querySelector("#playerPosition").innerHTML;
    let playerNationality = carde.querySelector("#playerNationality").src;
    let playerClub = carde.querySelector("#playerClub").src;
    let playerLeague = carde.querySelector("#playerLeague").src;

    let targetElement;
    if (playerPosition === "GB") {
        targetElement = document.getElementById("GB");
    } else if (playerPosition === "LB") {
        targetElement = document.getElementById("LB");
    } else if (playerPosition === "CA") {
        targetElement = document.getElementById("CA");
    } else if (playerPosition === "CB") {
        targetElement = document.getElementById("CB");
    } else if (playerPosition === "RB") {
        targetElement = document.getElementById("RB");
    } else if (playerPosition === "CMF") {
        targetElement = document.getElementById("CMF");
    } else if (playerPosition === "CMA") {
        targetElement = document.getElementById("CMA");
    } else if (playerPosition === "CMD") {
        targetElement = document.getElementById("CMD");
    } else if (playerPosition === "LWF") {
        targetElement = document.getElementById("LWF");
    } else if (playerPosition === "CF") {
        targetElement = document.getElementById("CF");
    } else if (playerPosition === "RWF") {
        targetElement = document.getElementById("RWF");
    }

    if (targetElement) {
        targetElement.innerHTML = `
        <div id="div1">
            <img class="absolute top-[45%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[80px] h-auto" src="${playerPhoto}" alt="player image">
            <p class="absolute top-[5%] left-1/3 transform -translate-x-1/2 text-white font-bold text-[10px]">${ratingplayer}</p>
            <p class="absolute top-[15%] left-1/3 transform -translate-x-1/2 text-white font-bold text-[10px]">${playerPosition}</p>
            <p class="absolute top-[45%] left-1/2 transform -translate-x-1/2 text-white font-bold text-[10px]">${playerName}</p>
            <img class="absolute top-[60%] left-1/3 transform -translate-x-1/2 -translate-y-1/2 w-[12px] h-auto" src="${playerNationality}" alt="flag">
            <img class="absolute top-[65%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[15px] h-auto rounded-3xl" src="${playerLeague}" alt="league">
            <img class="absolute top-[60%] left-[65px] transform -translate-x-1/2 -translate-y-1/2 w-[15px] h-auto" src="${playerClub}" alt="club logo">
            </div>
        `;
    }
    console.log("hbdjhdjvdsjhcsdhc",targetElement)
    Modal.classList.add("hidden");
}


function toggleModalatoutjout(){
  joueurs.classList.remove("hidden");
  joueurs.classList.add("show");
  toutcarte(dataplayer)
}
function returnPageatoutjout(){
  joueurs.classList.add("hidden");
}
function toutcarte(dataplayer) {
  const playListContainer = document.getElementById("carte2");
  
  let playHTML = '';

  dataplayer.forEach(play => {
    playHTML += `
      <div class="relative min-w-[200px] max-w-[200px] max-h-[300px] min-h-[300px] bg-gray-800 rounded-md overflow-hidden border shadow-lg">
        <img class="w-full h-auto" src="../img/carte.gif" alt="large image">
        <img id="playerPhoto" class="absolute bottom-9 left-6 w-[85px] h-auto" src="${play.photo}" alt="small image">
        <p class="absolute bottom-32 left-9 font-bold text-[10px]">${play.rating}</p>
        <p id="playerPosition" class="absolute bottom-28 left-9 font-bold text-[10px]">${play.position}</p>
        <p id="playerName" class="absolute bottom-[70px] right-9 text-[15px] text-white">${play.name}</p>
        <img id="playerNationality" class="absolute left-9 bottom-14 w-[20px] h-auto" src="${play.nationality}" alt="flag">
        <img id="playerLeague" class="absolute left-[60px] bottom-9 w-[20px] h-auto rounded-3xl" src="${play.league}" alt="league">
        <img id="playerClub" class="absolute left-[75px] bottom-12 w-[20px] h-auto" src="${play.club}" alt="club logo">        
        <div >
        <button onclick="removeplaer('${play.name}')">
          <img class="absolute w-[30%] left-8 bottom-1 h-auto" src="../img/delete.png" alt="change">
        </button>
        <button onclick="details('${play.name}')" >
        <img class="absolute w-[30%] right-2 bottom-1 h-auto" src="../img/delails1.png" alt="change">
        </button>
        </div>
        
      </div>`;
  });

  playListContainer.innerHTML = playHTML;
}

function removeplaer(playername){
  const playerToRemove = dataplayer.find(player => player.name === playername);
  if (playerToRemove) {
    const index = dataplayer.indexOf(playerToRemove);
    if(index > -1) {
      dataplayer.splice(index, 1);
      localStorage.setItem('product', JSON.stringify(dataplayer));
    }
  }
  toggleModalatoutjout();
}


function ggggg(){
  // const id = element.parentElement.parentElement.firstChild.id;
  // console.log(element);
  const div = document.getElementById('div1');
  const paragraphs = div.querySelectorAll('p');
  const image = div.querySelectorAll('img');  

  paragraphs.forEach(p => p.remove());
  image.forEach(img => img.remove());
}


function details(playername){
  const player = dataplayer.find(player => player.name === playername);
  if(player){
    const playerDetailsmodal = document.getElementById('ditayJour');
    const playerDetail = document.getElementById('datails');

    playerDetailsmodal.classList.remove('hidden');

    playerDetail.innerHTML=`
    <div class="grid grid-cols-2">
                    <p>name : </p>
                    <p>${player.name}</p>
                    <p>rating :  </p>                               
                    <p>${player.rating}</p>
                    <p>pace :  </p>
                    <p>${player.pace}</p>
                    <p>shooting :  </p>
                    <p>${player.shooting}</p>
                    <p>passing :  </p>
                    <p>${player.passing}</p>
                    <p>dribbling:  </p>
                    <p>${player.dribbling}</p>
                    <p>defending :  </p>
                    <p>${player.defending}</p>
                    <p>physical :  </p>
                    <p>${player.physical}</p>
                  </div>
    `;
  }
}
function returnPageditay(){
     ditayJour.classList.add("hidden");
 }

 
 function toggleModalchengement() {
  addchengement.classList.remove("hidden");
  addchengement.classList.add("show");
}
function returnPagechengement() {
  addchengement.classList.add("hidden");
}



function toggleModalatoutjoutchengement(position) {
  Modal1.classList.remove("hidden");
  Modal1.classList.add("show");
  carte1(position);
}

function returnPageatoutchengement() {
  Modal1.classList.add("hidden");
}

function carte1(position) {
  const playList = document.getElementById("carte3");
  let playHTML = '';

  const filteredPlayers = dataplayer.filter(player => player.position === position);
  console.log("here are the filtred players", filteredPlayers);
  

  filteredPlayers.forEach(play => {
      playHTML += `
  <div class="relative min-w-[200px] max-w-[200px] h-[300px] bg-gray-800 rounded-md overflow-hidden border shadow-lg">
      <img class="w-full h-auto" src="../img/carte.gif" alt="large image">
      <img id="playerPhoto" class="absolute bottom-9 left-6 w-[85px] h-auto" src="${play.photo}" alt="small image">
      <p id="ratingplayer" class="absolute bottom-32 left-9 font-bold text-[10px]">${play.rating}</p>
      <p id="playerPosition" class="absolute bottom-28 left-9 font-bold text-[10px]">${play.position}</p>
      <p id="playerName" class="absolute bottom-[70px] left-10 text-[15px] text-white">${play.name}</p>
      <img id="playerNationality" class="absolute left-9 bottom-14 w-[20px] h-auto" src="${play.nationality}" alt="flag">
      <img id="playerLeague" class="absolute left-[60px] bottom-9 w-[20px] h-auto rounded-3xl" src="${play.league}" alt="league">
      <img id="playerClub" class="absolute left-[75px] bottom-12 w-[20px] h-auto" src="${play.club}" alt="clob">
      <button onclick="carte()">
          <img onclick="addPlayer1(this)" class="absolute w-[30%] left-12 bottom-1 h-auto" src="../img/chenge.png" alt="change">
      </button>
  </div>`;
  });

  playList.innerHTML = playHTML;
 
}

function addPlayer1(tes) {
  const carde = tes.closest(".relative");

  let playerName = carde.querySelector("#playerName").innerHTML;
  let ratingplayer = carde.querySelector("#ratingplayer").innerHTML;
  let playerPhoto = carde.querySelector("#playerPhoto").src;
  let playerPosition = carde.querySelector("#playerPosition").innerHTML;
  let playerNationality = carde.querySelector("#playerNationality").src;
  let playerClub = carde.querySelector("#playerClub").src;
  let playerLeague = carde.querySelector("#playerLeague").src;

  let targetElement;
  if (playerPosition === "GB") {
      targetElement = document.getElementById("GB1");
  } else if (playerPosition === "LB") {
      targetElement = document.getElementById("LB1");
  } else if (playerPosition === "CA") {
      targetElement = document.getElementById("CB1");
  } else if (playerPosition === "CB") {
      targetElement = document.getElementById("CB1");
  } else if (playerPosition === "RB") {
      targetElement = document.getElementById("RB1");
  } else if (playerPosition === "CMF") {
      targetElement = document.getElementById("CMF1");
  } else if (playerPosition === "CMA") {
      targetElement = document.getElementById("CMA1");
  } else if (playerPosition === "CMD") {
      targetElement = document.getElementById("CMD1");
  } else if (playerPosition === "LWF") {
      targetElement = document.getElementById("LWF1");
  } else if (playerPosition === "CF") {
      targetElement = document.getElementById("CF1");
  } else if (playerPosition === "RWF") {
      targetElement = document.getElementById("RWF1");
  }

  if (targetElement) {
      targetElement.innerHTML = `
      <div id="div1">
          <img class="absolute top-[45%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[80px] h-auto" src="${playerPhoto}" alt="player image">
          <p class="absolute top-[5%] left-1/3 transform -translate-x-1/2 text-white font-bold text-[10px]">${ratingplayer}</p>
          <p class="absolute top-[15%] left-1/3 transform -translate-x-1/2 text-white font-bold text-[10px]">${playerPosition}</p>
          <p class="absolute top-[45%] left-1/2 transform -translate-x-1/2 text-white font-bold text-[10px]">${playerName}</p>
          <img class="absolute top-[60%] left-1/3 transform -translate-x-1/2 -translate-y-1/2 w-[12px] h-auto" src="${playerNationality}" alt="flag">
          <img class="absolute top-[65%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[15px] h-auto rounded-3xl" src="${playerLeague}" alt="league">
          <img class="absolute top-[60%] left-[65px] transform -translate-x-1/2 -translate-y-1/2 w-[15px] h-auto" src="${playerClub}" alt="club logo">
          </div>
      `;
  }
  console.log("hbdjhdjvdsjhcsdhc",targetElement)
  Modal1.classList.add("hidden");
}

