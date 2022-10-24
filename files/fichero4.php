<HTML>
<HEAD>
<TITLE> UT3: Fichero4 </TITLE>
<meta charset="utf-8" />
<meta name="author" content="Adrian" />
</HEAD>
<style>
.error {color: #FF0000;}
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
	text-align:center;
}
td {padding: 5px}
</style>
<BODY>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<section>
				<article>
					<h1>FICHERO 4</h1>
					
					<div>
						
						
						<?php 

						 // defino variables
						
						$nom = "";
						$ap1 = "";
						$ap2 = "";
						$fec = "";
						$loc = "";
					  
						 //Lamamos a la función indicada.
						 
						files();
						
						

						function files() {
							
							//Creamos la tabla.
							
							echo "<table>";
							echo "<tr>";
							echo "<td><b>Nombre</b></td>";
							echo "<td><b>Apellidos</b></td>";
							echo "<td><b>Fecha Nacimineto</b></td>";
							echo "<td><b>Localidad</b></td>";
							echo "</tr>";
							
							//Abrimos el fichero correspondiente.
							
							$myfile=fopen("alumnos2.txt","r") or die("No se puede mostrar");
							
							while(!feof($myfile)){
							
							$data = fgets($myfile); 
							
							//sustituimos los # por " ".
							$data=str_replace("##"," ",$data);
							
							//Vamos cogiendo los datos.

							$nom=substr($data,0,strpos($data," "));
							$data=substr($data,strpos($data," "));

							$data=trim($data);
							$ap1=substr($data,0,strpos($data," "));
							$data=substr($data,strpos($data," "));
    
							$data=trim($data);
							$ap2=substr($data,0,strpos($data," "));
							$data=substr($data,strpos($data," "));
    
							$data=trim($data);
							$fec=substr($data,0,strpos($data," "));
							$data=substr($data,strpos($data," "));
    
							$data=trim($data);
							$loc=$data;
							
							//Lo mostramos en la tabla.
							
							echo "<tr><td>".$nom."</td>";
							echo "<td>".$ap1." ".$ap2."</td>";
							echo "<td>".$fec."</td>";
							echo "<td>".$loc."</td></tr>";
							}
							
							echo "</table>";
							fclose($myfile);
							
							 return;
						}

						
						?>
						
					</div>
				</article>
			</section>
		</main>
		<footer>
		</footer>
		<aside>
		</aside>
</BODY>
</HTML>
