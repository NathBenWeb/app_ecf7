const titreSpans = document.querySelectorAll('h1 span');
const btns = document.querySelectorAll('.btn-first');
const logo = document.querySelector('.logo');
const medias = document.querySelectorAll('.bulle');
const l1 = document.querySelector('.l1');
const l2 = document.querySelector('.l2');


window.addEventListener('load', () => {

    //Création de la timeline avec paramètres pour qu'elle soit sur pause de base intégrée dans une constante à laquelle on appliquera ensuite des méthodes d'animation
    const TL = gsap.timeline({paused: true}); 

    // staggerFrom est une méthode qui permet d'animer des éléments et quand il y en a plusieurs de les animer les uns à la suite des autres => staggerFrom = d"un endroit 
        //Cette méthode prend en paramètres la constante intégrant l'élément html à animer, le temps d'animation (1s), ensuite ouverture d'un objet pour y insérer des caractéristiques plus précises {endroit de la page à partir duquel l'anim démarrera (top: -50), l'opâcité de l'élément au démarrage de l'anim (opacity: 0), la manière dont l'anim va se faire avec un easing de puissance 2 et plus long vers la fin avec le .out (ease: "power2.out"), et entre chaque animation il va se passer 0.3s} 
    TL
    .staggerFrom(titreSpans, 1, {top: -50, opacity: 0, ease: 'power2.out'}, 0.3)
    .staggerFrom(btns, 1, {opacity: 0, ease: 'power2.out'}, 0.3, '-=1')
    .from(l1, 1, {width: 0, ease: 'power2.out'}, '-=2')
    .from(l2, 1, {width: 0, ease: 'power2.out'}, '-=2')
    .from(logo, 0.4, {transform: 'scale(0)', ease: 'power2.out'}, '-=2')
    .staggerFrom(medias, 1, {right: -200, ease: 'power2.out'}, 0.3, '-=1');

    TL.play();
})