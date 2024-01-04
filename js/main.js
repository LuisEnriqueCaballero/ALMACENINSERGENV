




const bars=document.getElementById('bars');
const navegador=document.getElementById('navegador');
const barra=document.getElementById('slider');
const titulo=document.querySelectorAll('span');
const informacion=document.getElementById('informacion');
bars.addEventListener('click',function(){
    navegador.classList.toggle("desplazar");
    barra.classList.toggle("slider1");
    informacion.classList.toggle("informacion1");
    for (let i = 0; i < titulo.length; i++) {
        titulo[i].classList.toggle("span_invisible");
        
    }
})


const rigth=document.getElementsByClassName('right');
const flecha=document.getElementsByClassName('flecha')
const sub_menu=document.getElementsByClassName('none');

for(let i=0; i<rigth.length; i++ ){
rigth[i].addEventListener('click',function(){
    flecha[i].classList.toggle("right1");
    sub_menu[i].classList.toggle('link_navegadror_sub');
    
})
}

const notificacion=document.getElementById("notificacion");
const alertnotificacion=document.getElementById("alertanotificaciones");
const perfil=document.getElementById("link_usuario");
const usuario=document.getElementById("imagen_usuario");
notificacion.addEventListener("click",function(){
    if(alertnotificacion.style.display==''){
        alertnotificacion.style.display='flex';
    }else if(alertnotificacion.style.display=='flex'){
        alertnotificacion.style.display='none';
    }else if(alertnotificacion.style.display=='none'){
        alertnotificacion.style.display='flex';
    }
    
})

usuario.addEventListener("click",function(){
    if(perfil.style.display==''){
        perfil.style.display='flex';
    }else if(perfil.style.display=='flex'){
        perfil.style.display='none';
    }else if(perfil.style.display=='none'){
        perfil.style.display='flex';
    }
    
});


