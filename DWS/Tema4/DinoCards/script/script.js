const loginTab=document.getElementById('login');
const registroTab=document.getElementById('registro');
const botonLogin=document.getElementById('boton-login');
const botonRegistro=document.getElementById('boton-registro');

registroTab.style.display='none';

botonLogin.addEventListener('click',()=>{
    registroTab.style.display='none';
    loginTab.style.display='';
}
)
botonRegistro.addEventListener('click',()=>{
    registroTab.style.display='';
    loginTab.style.display='none';
}
)