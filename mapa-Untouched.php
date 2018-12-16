<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
	$departamento = $_GET['departamentos'];
	//echo $departamento."aqui";
	$link = mysql_connect("localhost","saludvid_Svida","saludVeps09");
	mysql_select_db("saludvid_saludvida",$link);
	mysql_query("SET NAMES 'utf8'"); 
	//$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
	
	if($departamento == ""){
		$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
		$result2=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
	}else{
		$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
		$result2=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
		$resulti=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
	}
	$result3=mysql_query("SELECT * FROM sal_donde_estamos_departamento order by departamento");
	//$res = "SELECT * FROM sal_donde_estamos_puntos WHERE departamento =$departamento order by ciudad";
	//echo $res;
	

?>	


<script src="https://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAF6q0Rq6dzQuK7mhgkgfnYRQeJqsJiw_qYkhAPAn295h9yaNRghSY7WxsGUFNaMLJAblvhIDsY_-QBA" type="text/javascript"></script>


	

<script type="text/javascript">
var city = [
	<?php
	
	while ($row = mysql_fetch_row($result)){
	?>	
				{
		  name: "<?php echo $row[5]; ?>",
		  direccion: "<?php echo $row[6]; ?>",
		  horario: "<?php echo $row[7]; ?>",
		  imagen: "<?php echo $row[10]; ?>",
		  Status: {
			code: 200,
			request: "geocode"
		  },
		  Placemark: [
			{
	
			 name: "<?php echo $row[5]; ?>",
			  direccion: "<?php echo $row[6]; ?>",
			  horario: "<?php echo $row[7]; ?>",
			  Point: {
				coordinates: [<?php echo $row[8]; ?>,<?php echo $row[9]; ?>, 0]
			  } 
			}
		  ]
		},
	<?php	
	}
	?>
];

</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">

  var map;
  var geocoder;  
  var baseIcon = new GIcon(G_DEFAULT_ICON);
  
baseIcon.shadow = "images/mapa/logoHomecenterMapSombra.png";
baseIcon.iconSize = new GSize(30,32);
baseIcon.shadowSize = new GSize(56, 31);
   function CapitalCitiesCache() {
    GGeocodeCache.apply(this);
  }

  // Assigns an instance of the parent class as a prototype of the
  // child class, to make sure that all methods defined on the parent
  // class can be directly invoked on the child class.
 CapitalCitiesCache.prototype = new GGeocodeCache();

  // Override the reset method to populate the empty cache with
  // information from our array of geocode responses for capitals.
  CapitalCitiesCache.prototype.reset = function() {
    GGeocodeCache.prototype.reset.call(this);
    for (var i in city) {
      this.put(city[i].name, city[i]);
    }
  }
  
    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"), {size:"100%"});
        map.setCenter(new GLatLng(4.6351, -74.063722),6);
	map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());

		  geocoder = new GClientGeocoder();
    geocoder.setCache(new CapitalCitiesCache());


// Add 10 markers to the map at random locations
	var bounds = map.getBounds();
	var southWest = bounds.getSouthWest();
	var northEast = bounds.getNorthEast();
	var lngSpan = northEast.lng() - southWest.lng();
	var latSpan = northEast.lat() - southWest.lat()
		
		
		<?php while ($row2 = mysql_fetch_row($result2)){ ?>
		
		var point =  new GLatLng('<?php echo $row2[8]?>','<?php echo $row2[9]?>');
		map.addOverlay(createMarker(point, <?php echo $row2[0]?>,'<?php echo $row2[5]?>','<?php echo $row2[6];?>','<?php echo $row2[7]?>','<?php echo $row2[10];?>'));
		
		<?php } ?>
				
				
		      }
    }
function createMarker(point, index, almacen,direccion,horario,imagen) {
  // Create a lettered icon for this point using our icon class
  var letter = String.fromCharCode("A".charCodeAt(0) + index);
  var letteredIcon = new GIcon(baseIcon); 									
  letteredIcon.image = "https://www.saludvidaeps.com/images/punto-mapa.png";

  // Set up our GMarkerOptions object
  markerOptions = { icon:letteredIcon};
  var marker = new GMarker(point, markerOptions);
  if (imagen == ""){
	  imagen = "images/apply_f2.png";
	  }
  GEvent.addListener(marker, "click", function() {
     map.setCenter(point, 13);
	marker.openInfoWindowHtml("<div style=' background:url(ventanaMapa.png);color:#000; background-repeat:no-repeat; height:260px; width:300px; padding-top:15px; padding-left:15px; font-family:Arial, Helvetica, sans-serif;font-size:12px'><strong><img src="+imagen+" /></strong><br/><br/> <strong>"+almacen+"</strong><br/><br/>"+direccion+"<br/><br/>"+horario+"</div>");
  });
  return marker;
}	
	
	
	
function addAddressToMap(response) {
    if (response && response.Status.code != 200) {
      alert("Unable to locate " + decodeURIComponent(response.name));
    } else {
      var place = response.Placemark[0];
      var point = new GLatLng(place.Point.coordinates[1],
                              place.Point.coordinates[0]);
      map.setCenter(point, 13);
      map.openInfoWindowHtml(point, "<div style=' background:url(ventanaMapa.png); background-repeat:no-repeat; color:#000; height:150px; width:215px; padding-top:50px; padding-left:15px; padding-right:15px; font-family:Arial, Helvetica, sans-serif;font-size:12px'><strong>"+place.name+"</strong><br/><br/>"+place.direccion+"<br/><br/>"+place.horario+"</div>");
    }
  }

  function findDep() {
	var $j = jQuery.noConflict();
	$j(document).ready(function() {
		$j( "#seldep" ).submit();
	});
  }
  
  function findCity(which) {

    if (which != 0) {
      geocoder.getLocations(city[which - 1].name, addAddressToMap);
    }
  }

    </script>
    
    <style>
		.btn_cobertura{
			display:block;
			padding:5px 10px ;
			font-family:Arial, Helvetica, sans-serif;
			
			background:#ac3e3f;
			border-radius:10px;
			color:#fff;
			font-size:12px;
			text-decoration:none;
		}
		
		.btn_cobertura:hover, .btn_cobertura.activo{
			background:#c51015;
		}
	</style>
  
</head> 
<body style="margin:0;" onLoad="initialize()" onUnload="GUnload()">
<div class="mapa-content" style="border-top: 4px solid #e16602; float:left;">
	     <div id="map_canvas" class="generico_left" style="width:715px; height:500px;"></div>
</div>
<div class="contbuscador" style="float:left; clear:both; background:#e16602; width:715px;">
    <div class="selector-ciudad" >
    
    <table border="0" cellspacing="5" cellpadding="2">
      <tr>
      
        <!--<td>
            <a  href="mapa.php"class="btn_cobertura activo">Cobertura Nacional</a>
        </td>
        <td class="tienda-copy" style="color:#c51015; font-family:Arial, Helvetica, sans-serif; font-size:13px;">Selecciona tu punto más cercano:</td>-->
        <td>
        
            
            <form id="seldep" action="mapa.php<?php $_GET["departamentos"]?>" method="get">
            <select  style="width:162px; border:0; color:#505050; font-size:12px; height:23px;" onchange="findDep()" id="departamentos" name="departamentos">
                                   
                <option>Escoje el departamento</option>
                            
				 <?php
                    while ($row3 = mysql_fetch_row($result3)){
                        echo "<option value=".$row3[0].">".$row3[5]."</option>";
                    }
                ?>          
            </select>
            </form>
          </td>
          
          	  
		  
      </tr>
    </table>
    </div>
</div>

<div class="puntos" style="float:left; width:708px; clear:both; background-color:#f0f0f0; min-height:20px; border-right: 7px solid #c15700;">
	
	<?php
		if($resulti == ""){
			die(mysql_error());
			}else{
			while ($rowi = mysql_fetch_row($resulti)){ ?>
				<div class="unpunto" style="float:left; padding:10px 25px; width:185px; height:110px; font-family:roboto;">
					<div class="cityDep" style="color:#ef7d00; font-size:15px;"> <?php echo $rowi[5]."</br>"; ?> </div>
					
					<div style="color:#424242; font-size:13px; font-style:italic;"> <?php echo $rowi[6]."</br>"; ?> </div>
					<div style="color:#424242; font-size:13px;"> <?php echo $rowi[7]."</br>"; ?> </div>
				</div>
					<?php
			}
		}
    ?>  
    
</div>     

 

	    