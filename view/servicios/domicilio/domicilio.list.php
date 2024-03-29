<!--   AUTOR: ELIZALDE GAIBOR MILTON ALEXANDER  -->
<?php 
    if(!isset($_SESSION)){ 
        session_start();
    }
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ESTA PAGINA ES LA PAGINA DE ENVIOS A DOMICILIO Y CONTIENE UN FORMULARIO PARA REALIZAR SU ORDEN">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Servicio A Domicilio">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>A DOMICILIO</title>
    
    <style>
        label{
            font-weight: bold;
        }
        input{
            border-radius: 40px;
        }
        textarea{
            border-radius: 5px;
        }
        input[type="submit"],input[type="reset"]
        {
            background-color: #2e2e2e;
            color: white;
            border-radius: 100px;
            margin-top: 13px;
            width: fit-content;
            margin-left: 10px;
           
        }

        input[type="submit"]:hover{
            background-color: white;
            font-weight: bold;
            color: black;
        }

        input[type="reset"]:hover{
            background-color: red;
            font-weight: bold;
            color: white;
        }

        input[type="text"]{
            width: 26%;
        }

        #correo{
            width: 30%;
        }

        .formulario div{
            padding: 10px 0 10px 0;
        }
        .formulario{
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2B2729;
            width: 40%;
            color: white;
            border-radius: 40px;
        }

        .formulario:hover{
            box-shadow: 0 0 18px black,
            0 0 48px black,
            0 0 78px black,
            0 0 98px black;
            transition: 1s;
        }

        

        .seccion-segundo{
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: auto;
            padding: 20px 0;
        }
        img[src="assets/img/milton-domicilio.png"]{
            width: 50%; height: 60%;
            animation-name: coche;
            
            animation-timing-function: ease;
            animation-duration: 5s;
            animation-iteration-count: 1;
        }



        @keyframes coche{
            0%{
                
            }
            50%{
                transform: translateX(35%);
            }
            100%{
                transform: translateX(100%);
            }
        }

        @media (max-width:600px) {
            .formulario{
                width: 90%;
                margin: 0;
                padding: 0;
            }

        }

        @media (max-width:900px) {
            .formulario{
                width: 70%;
                margin: 0;
                padding: 0;
            }

        }
        table{
            width:100%;
        }
    </style>
</head>
<body>
    <div class="contenedor-principal">
    <?php 
    require_once HEADER;
    ?>       
        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div  style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto; padding-top: 10px;">
                        <h2 id="encabezado">¡ADMINISTRA LOS ENVÍOS A DOMICILIO EN ECUADOR!</h2>
                        <h3  style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo" >
                            Aprovecha nuestro servicio "HASTA LA PUERTA DE TU CASA" , con nosotros vas a recibir tus productos directamente en tu domicilio
                            <strong><em>"No tienes que venir por ellos!"</em></strong>
                        <br><br><span style="font-weight: bold;">Disfruta de la comodidad de este servicio para la compra de esos productos que tanto deseas!</span> 
                        <br><img src="assets/img/milton-domicilio.png" alt="envios" >
                        </p>
                    </div>
                </div>

            </section>
            <section class="seccion-segundo">            
                <div class="row">                    
                        <div class="contenedor-buscar">
                            <input type="text" name="b" id="buscador"  placeholder="Buscar por ciudad"/>
                            <button class="btn-buscar" id="filtro" type="submit"><i class='bx bx-search' ></i>Buscar</button>
                        </div>
                    <div>
                        <a href="index.php?c=domicilios&f=view_domicilio_new"><button class="btn-nuevo" type="button"><i class='bx bx-plus' ></i>Nuevo</button></a>
                    </div>
                </div>
                <?php                
                if (!empty($_SESSION['mensaje'])) {
                    ?>
                    <div style="margin-top: 60px;" class="alert-<?php echo $_SESSION['color']; ?>">
                    <i class='bx bx-<?php if ($_SESSION['color']=="rojo") { echo "x";} else{ echo "check";} ?>'></i>
                    <?php echo $_SESSION['mensaje']; ?>  
                    </div>
                    <?php
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['color']);
                }
                ?>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>CEDULA</th>
                        <th>CELULAR</th>
                        <th>CORREO</th>
                        <th>POSTAL</th>
                        <th>REFERENCIAS</th>
                        <th>TIPO ENVIO</th>
                        <th>PRODUCTOS</th>
                        <th>CIUDAD</th>
                        <th>USUARIO ID</th>
                        <th>ACCIONES</th>
                        
                    </thead>
                    <tbody id="misDatos">
                        <?php   
                        if (isset($resultados)&&!empty($resultados)){   
    
                            foreach ($resultados as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila->domicilio_id;?></td>
                            <td><?php echo $fila->cedula;?></td>
                            <td><?php echo $fila->celular;?></td>
                            <td><?php echo $fila->correo;?></td>
                            <td><?php echo $fila->postal;?></td>
                            <td><?php echo $fila->referencias;?></td>
                            <td><?php echo $fila->tipo_envio; ?></td>
                            <td><?php echo $fila->productos; ?></td>
                            <td><?php echo $fila->ciudad; ?></td>
                            <td><?php echo $fila->usuario_id; ?></td>
                            <td>
                                <a class="accion-boton editar" href="index.php?c=domicilios&f=view_domicilio_edit&id=<?php echo $fila->domicilio_id;?>"><i class='bx bxs-pencil' ></i></a>
                                <a class="accion-boton borrar" href="index.php?c=domicilios&f=view_domicilio_delete&id=<?php echo $fila->domicilio_id;?>" 
                                onclick="if(!confirm('Estas a punto de eliminarlo, estas seguro?'))return false;"><i class='bx bxs-trash-alt' ></i></a>
                            </td>
                        </tr>
                        <?php 
                            }
                        }else{
                        ?>
                        <tr>
                        <td><?php echo "NO";?></td>
                            <td><?php echo "HAY"?></td>
                            <td><?php echo "FILAS"?></td>
                            <td><?php echo "EN"?></td>
                            <td><?php echo "ESTA"?></td>
                            <td><?php echo "TABLA"?></td>
                            <td><?php echo "DE" ?></td>
                            <td><?php echo "DATOS" ?></td>
                            <td><?php echo "INTENTA INGRESANDO ALGUNOS REGISTROS ANTES!"?></td>
                        <tr>    
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    
        

<?php require_once FOOTER; ?>
    </div>
    <script type="text/javascript">
        var buscador = document.querySelector("#buscador");
        var filtro= document.getElementById("filtro");
        filtro.addEventListener('click',filtrar);

        function filtrar() {
            var ciudad = buscador.value;
            var rasultado = "index.php?c=domicilios&f=view_domicilio_search&b="+ciudad;
            
            console.log(rasultado);
            var Peticion = new XMLHttpRequest();
            var permitir=true;
            Peticion.open("GET",rasultado, permitir);
            Peticion.send();
            
            Peticion.onreadystatechange = function () {
                if (Peticion.readyState === 4 && Peticion.status === 200) {
                    var resultado = Peticion.responseText;
                    var JsonResponse = JSON.parse(resultado);
                    console.log(JsonResponse);
                    var myBody=document.querySelector("#misDatos");
                    var result="";
                    for(var i=0;i<JsonResponse.length;i++){
                        result+="<tr>";
                        result+="<td>"+JsonResponse[i].domicilio_id+"</td>";
                        result+="<td>"+JsonResponse[i].cedula+"</td>";
                        result+="<td>"+JsonResponse[i].celular+"</td>";
                        result+="<td>"+JsonResponse[i].correo+"</td>";
                        result+="<td>"+JsonResponse[i].postal+"</td>";
                        result+="<td>"+JsonResponse[i].referencias+"</td>";
                        result+="<td>"+JsonResponse[i].tipo_envio+"</td>";
                        result+="<td>"+JsonResponse[i].productos+"</td>";
                        result+="<td>"+JsonResponse[i].ciudad+"</td>";
                        result+="<td>"+JsonResponse[i].usuario_id+"</td>";
                        result+="<td><a class='accion-boton editar' href='index.php?c=domicilios&f=view_domicilio_edit&id="+JsonResponse[i].domicilio_id+"'><i class='bx bxs-pencil'></i></a> <a class='accion-boton borrar' href='index.php?c=domicilios&f=view_domicilio_delete&id="+JsonResponse[i].domicilio_id+"'  onclick='if(!confirm('Estas a punto de eliminarlo, estas seguro?'))return false;'><i class='bx bxs-trash-alt' ></i></a></td>";
                        result+="</tr>";
                    }

                        myBody.innerHTML=result;

                        
                    }}
            }
        </script>
</body>
</html>


