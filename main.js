let attaque= document.querySelector('.attaque');
let son= document.querySelector('audio');
let result= document.querySelector('.resultat');
let div1= document.querySelector('.div1');
let div2= document.querySelector('.div2');
attaque.addEventListener('click', function(){
    result.style.visibility='visible';
   
    div1.style.visibility='visible';
    div2.style.visibility='visible';
    son.play();   
}
)