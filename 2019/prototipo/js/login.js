$("#formularioLogin").validate({
   rules:{
       email:{
           required:true,
     email: true         
       }, 
       senha:{
           required:true
       },	   
   }, 
   messages:{
       email:{
           required:"Campo obrigatório",
     email:"E-mail inválido"
       },
       senha:{
           required:"Campo obrigatório"
       },	   
   },
});






