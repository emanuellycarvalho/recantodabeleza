$(document).ready(function(){
	$('#cpf1').mask('000.000.000-00');
  	$('#tel1').mask('(00)00000-0000');
}); 

$("#filtro").validate({
 rules:{
   cpf1:{
     minlength: 14
   }, 
   tel1:{
     minlength: 13
   },
   email1:{
     email: true         
   },        
 }, 
 messages:{       
   cpf1:{
     minlength: "O cpf deve conter 11 dígitos."
   }, 
   tel1:{
     minlength: "O telefone deve conter, no mínimo, 10 dígitos."
   },
   email1:{
     email:"E-mail inválido!"
   },
 },
});