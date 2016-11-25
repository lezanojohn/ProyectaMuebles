function crearMarcador(nom, dir, tel, ema, lat, lng, tipo) {
  
  if(tipo == 'mueblista'){
    var icono = '../../icons/mueblista.png';
  }
  
  if(tipo == 'proveedor'){
    var icono = '../../icons/proveedor.png';
  }
  
  var myLatLng = {lat, lng};
  
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: mapa,
    title: nom,
    icon: icono,
    animation: google.maps.Animation.DROP
  })



  google.maps.event.addListener(marker, 'click', function (event) {     
    document.getElementById("nombre").value = nom;  
    document.getElementById("direccion").value = dir; 
    document.getElementById("telefono").value = tel; 
    document.getElementById("email").value = ema; 
  
    
    toggleBounce();
    setTimeout(toggleBounce, 2000);
  });

  function toggleBounce () {
    if (marker.getAnimation() != null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
  }
}