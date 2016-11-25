$(document).on("ready",inicio);

    function inicio(){
        $("span.help-block").hide();
        $("#btnValidarNombre").click(validar_nombre_p);
        $("#btnValidarComentario").click(validar_comentario);
      //  $("#btnvalidar2").click(validar_comentario);
      //  $("#btnvalidar3").click(validar_direccion);
        $("#btnValidarDia").click(validar_telefono);
        $("#btnValidarCom").click(validar_valor);
      //  $("#btnvalidar5").click(validar_email);
        
       
    }

    
////////////////////////////////////////////////////VALIDAR NOMBRE PRODUCTO
    function validar_nombre_p(){
      
        var valor = document.getElementById("texto").value;
        var reg = /^([a-z ñáéíóú]{2,60})$/i;
        if( valor == null || valor.length ==0 || /^\s+$/.test(valor)){
            $("#iconotexto").remove();
            $("#texto").parent().parent().attr("class","form-group has-error has-feedback");
            $("#texto").parent().children("span").text("Debe ingresar al menos un carácter.").show();
            $("#texto").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
               
        
        }
    
        else if(!reg.test(valor)) {
       
            $("#iconotexto").remove();
            $("#texto").parent().parent().attr("class","form-group has-error has-feedback");
            $("#texto").parent().children("span").text("Debe ingresar solo letras.").show();
            $("#texto").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
            
        }
        
        
      
        else{
            $("#texto").parent().parent().attr("class","form-group has-success has-feedback");
            $("#texto").parent().children("span").text("Debe ingresar al menos un carácter.").hide();
            $("#texto").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            document.getElementById('enviar').disabled=false;
            
        
        }
       // alert(valor);
        
    }  

    
 
   //////////////////////////////////////////////////////////////VALIDAR COMENTARIO

     function validar_comentario(){
      //  alert("validar asdasdasd");
        var valor = document.getElementById("btnValidarNombre").value;
        var reg = /^([a-z ñáéíóú]{2,60})$/i;
        if( valor == null || valor.length ==0 || /^\s+$/.test(valor)){
            $("#iconotexto").remove();
            $("#btnValidarNombre").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidarNombre").parent().children("span").text("Debe ingresar al menos un carácter.").show();
            $("#btnValidarNombre").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
               
        
        }
   
       
        
      
        else{
            $("#btnValidarNombre").parent().parent().attr("class","form-group has-success has-feedback");
            $("#btnValidarNombre").parent().children("span").text("Debe ingresar al menos un carácter.").hide();
            $("#btnValidarNombre").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            document.getElementById('enviar').disabled=false;
        
        }
       // alert(valor);
        
    }

    ////////////////////////////////////////////////VALIDAR NOMBRE SOLICITANTE
  function validar_nombre_s(){
      //  alert("validar asdasdasd");
        var valor = document.getElementById("btnvalidar").value;
        var reg = /^([a-z ñáéíóú]{2,60})$/i;
        if( valor == null || valor.length ==0 || /^\s+$/.test(valor)){
            $("#iconotexto").remove();
            $("#btnvalidar").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnvalidar").parent().children("span").text("Debe ingresar al menos un carácter.").show();
            $("#btnvalidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
               
        
        }
    
        else if(!reg.test(valor)) {
       
            $("#iconotexto").remove();
            $("#btnvalidar").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnvalidar").parent().children("span").text("Debe ingresar solo letras.").show();
            $("#btnvalidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
        }
        
        
      
        else{
            $("#btnvalidar").parent().parent().attr("class","form-group has-success has-feedback");
            $("#btnvalidar").parent().children("span").text("Debe ingresar al menos un carácter.").hide();
            $("#btnvalidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            document.getElementById('enviar').disabled=false;
        
        }
       // alert(valor);
        
    }  




    

/////////////////////////////////////////////////////7VALIDAR DIRECCION

        function validar_direccion(){
      //  alert("validar asdasdasd");
        var valor = document.getElementById("btnvalidar2").value;
        var reg = /^([a-z ñáéíóú]{2,60})$/i;
        if( valor == null || valor.length ==0 || /^\s+$/.test(valor)){
            $("#iconotexto").remove();
            $("#btnvalidar2").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnvalidar2").parent().children("span").text("Debe ingresar al menos un carácter.").show();
            $("#btnvalidar2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
               
        
        }
   
       
        
      
        else{
            $("#btnvalidar2").parent().parent().attr("class","form-group has-success has-feedback");
            $("#btnvalidar2").parent().children("span").text("Debe ingresar al menos un carácter.").hide();
            $("#btnvalidar2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            document.getElementById('enviar').disabled=false;
        
        }
       // alert(valor);
        
    } 

///////////////////////////////////////////////////////////VALIDAR TELEFONO

     function validar_telefono(){
      //  alert("validar asdasdasd");
        var valor = document.getElementById("btnValidar").value;
        var reg = /^([a-z ñáéíóú]{2,60})$/i;
        if( valor == null || valor.length ==0 || /^\s+$/.test(valor)){
            $("#iconotexto").remove();
            $("#btnValidar").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidar").parent().children("span").text("Debe ingresar al menos un carácter.").show();
            $("#btnValidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
               
        
        }
        else if( isNaN(valor) ){
            
            $("#iconotexto").remove();
            $("#btnValidar").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidar").parent().children("span").text("Debe ingresar solo números.").show();
            $("#btnValidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
            
            
        }
        else if( valor<0){
            $("#iconotexto").remove();
            $("#btnValidar").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidar").parent().children("span").text("Debe ingresar un número positivo (mayor a cero).").show();
            $("#btnValidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
        }
        
        else if(valor >100){
            $("#iconotexto").remove();
            $("#btnValidar").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidar").parent().children("span").text("La cantidad ingresada excede la cantidad de días límite.").show();
            $("#btnValidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
       
        }
        
      
        else{
            $("#btnValidar").parent().parent().attr("class","form-group has-success has-feedback");
            $("#btnValidar").parent().children("span").text("Debe ingresar al menos un carácter.").hide();
            $("#btnValidar").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            document.getElementById('enviar').disabled=false;
        
        }
       // alert(valor);
        
    }  






///////////////////////////////////////////////////////////VALIDAR VALOR

     function validar_valor(){
      //  alert("validar asdasdasd");
        var valor = document.getElementById("btnValidarDia").value;
        var reg = /^([a-z ñáéíóú]{2,60})$/i;
        if( valor == null || valor.length ==0 || /^\s+$/.test(valor)){
            $("#iconotexto").remove();
            $("#btnValidarDia").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidarDia").parent().children("span").text("Debe ingresar al menos un carácter.").show();
            $("#btnValidarDia").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
               
        
        }
        else if( isNaN(valor) ){
            
            $("#iconotexto").remove();
            $("#btnValidarDia").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidarDia").parent().children("span").text("Debe ingresar solo números.").show();
            $("#btnValidarDia").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
            
            
        }
        else if( valor<0){
            $("#iconotexto").remove();
            $("#btnValidarDia").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnValidarDia").parent().children("span").text("Debe ingresar un número positivo (mayor a cero).").show();
            $("#btnValidarDia").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
        }
        
      
        
      
        else{
            $("#btnValidarDia").parent().parent().attr("class","form-group has-success has-feedback");
            $("#btnValidarDia").parent().children("span").text("Debe ingresar al menos un carácter.").hide();
            $("#btnValidarDia").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            document.getElementById('enviar').disabled=false;
        
        }
       // alert(valor);
        
    }  

/////////////////////////////////////////////////////////////////////VALIDAR EMAIL

     function validar_email(){
      //  alert("validar asdasdasd");
        var valor = document.getElementById("btnvalidar4").value;
        var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if( valor == null || valor.length ==0 || /^\s+$/.test(valor)){
            $("#iconotexto").remove();
            $("#btnvalidar4").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnvalidar4").parent().children("span").text("Debe ingresar al menos un carácter.").show();
            $("#btnvalidar4").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
               
        
        }
    
        else if(!reg.test(valor)) {
       
            $("#iconotexto").remove();
            $("#btnvalidar4").parent().parent().attr("class","form-group has-error has-feedback");
            $("#btnvalidar4").parent().children("span").text("El correo electronico ingresado no es válido.").show();
            $("#btnvalidar4").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            enviar.disabled = true;
            return false;
        }
        
        
      
        else{
            $("#btnvalidar4").parent().parent().attr("class","form-group has-success has-feedback");
            $("#btnvalidar4").parent().children("span").text("Debe ingresar al menos un carácter.").hide();
            $("#btnvalidar4").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            
            document.getElementById('enviar').disabled=false;
        
        }
       // alert(valor);
        
    }  

