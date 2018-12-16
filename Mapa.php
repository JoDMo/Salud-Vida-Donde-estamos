<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head>
	</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
	// function findDep() {
	// var $j = jQuery.noConflict();
	// 	$j(document).ready(function() {
	// 		$j( "#seldep" ).submit();
	// 	});
	// }
// 	var city = [
// 	<?php
	
// 	while ($row = mysql_fetch_row($result)){
// 	?>	
// 				{
// 		  name: "<?php echo $row[5]; ?>",
// 		  direccion: "<?php echo $row[6]; ?>",
// 		  horario: "<?php echo $row[7]; ?>",
// 		  imagen: "<?php echo $row[10]; ?>",
// 		  Status: {
// 			code: 200,
// 			request: "geocode"
// 		  },
// 		  Placemark: [
// 			{
	
// 			 name: "<?php echo $row[5]; ?>",
// 			  direccion: "<?php echo $row[6]; ?>",
// 			  horario: "<?php echo $row[7]; ?>",
// 			  Point: {
// 				coordinates: [<?php echo $row[8]; ?>,<?php echo $row[9]; ?>, 0]
// 			  } 
// 			}
// 		  ]
// 		},
// 	<?php	
// 	}
// 	?>
// ];
	
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


	<?php
			/*
		$departamento = $_GET['departamentos'];
		$dbname = 'webprincipal';
		$dbuser = 'srvmanager@saludvidasqlsrv';
		$dbpass = 'SRVPassw0rd7.';
		$dbhost = 'saludvidasqlsrv.mysql.database.azure.com:3306';
		$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");
		mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

		/*$result="SELECT * FROM sal_donde_estamos_puntos WHERE departamento = 3 order by ciudad";*/

		/*
		$rows = mysqli_query($link, $result)
		$row = mysqli_fetch_array($rows)

		if($departamento == ""){	
			$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
			$result2=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
		}else{
			$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
			$result2=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
			$resulti=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
		}
		$result3=mysql_query("SELECT * FROM sal_donde_estamos_departamento order by departamento");
		*/
		/*
		$departamento = $_GET['departamentos'];
		//echo $departamento."aqui";
		$link = mysql_connect("localhost","saludvid_Svida","saludVeps09");
		mysql_select_db("saludvid_saludvida",$link);
		mysql_query("SET NAMES 'utf8'"); 
		//$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
		
		$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
			$result2=mysql_query("SELECT * FROM sal_donde_estamos_puntos order by ciudad");
		}else{
			$result=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
			$result2=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
			$rif($departamento == ""){
			esulti=mysql_query("SELECT * FROM sal_donde_estamos_puntos WHERE departamento = $departamento order by ciudad");
		}
		$result3=mysql_query("SELECT * FROM sal_donde_estamos_departamento order by departamento");
		//$res = "SELECT * FROM sal_donde_estamos_puntos WHERE departamento =$departamento order by ciudad";
		//echo $res;
		
		*/
	?>	

<body>
  
	<div class="contbuscador" style="float:left; clear:both; background:#e16602; width:715px;">
			<div class="selector-ciudad" >
			
			<table border="0" cellspacing="5" cellpadding="2">
				<tr>
				
					<!--<td>
							<a  href="mapa.php"class="btn_cobertura activo">Cobertura Nacional</a>
					</td>
					<td class="tienda-copy" style="color:#c51015; font-family:Arial, Helvetica, sans-serif; font-size:13px;">Selecciona tu punto más cercano:</td>-->
					<!--<td>
							<form id="seldep" action="mapa.php<?php $_GET["departamentos"]?>" method="get">
							<select  style="width:162px; border:0; color:#505050; font-size:12px; height:23px;" onchange="findDep()" id="departamentos" name="departamentos">                         
									<option>Escoje el departamento</option>               
					<?php
						/*
											while ($row3 = mysql_fetch_row($result3)){
													echo "<option value=".$row3[0].">".$row3[5]."</option>";
											}
											*/
						?>          
							</select>
							</form>
						</td>
						-->
				</tr>
			</table>
			</div>
	</div>


	<div class="puntos" style="float:left; width:708px; clear:both; background-color:#f0f0f0; min-height:20px; border-right: 7px solid #c15700;">
		
		<?php
		/*
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
			*/
			?>  
			
	</div>
        
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<style>
	body{
		background-color: #fafafa;
		font-family: Helvetica, Arial, sans-serif;
		margin: 20px;
	}
	div#map {
		width: 600px;
		height: 400px;
	}
				  /* Optional: Makes the sample page fill the window. */
				  /*html, body {
					height: 100%;
					margin: 0;
					padding: 0;
				  }*/
</style>	

	<h1>Location information again</h1>
    <p id="location"></p>
	<div id="map">Loading....
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2Mvlh5R8YU-yCyt8uQdX0pCYEyMaimoM"></script>
	<script src ="script.js"></script>
	</div>
</body>
</html>