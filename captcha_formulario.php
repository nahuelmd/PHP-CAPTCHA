<?php session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <div class="container">
        <?php include("header.php"); ?>

        
            <!-- Comienta generacion captcha PHP -->
            <?php
			function contenido_captcha()
			{
				$pattern = "1234567890abcdefghyjklmnñopqrstuvwxyz";
				$key = '';
				for ($i = 0; $i < 8; $i++) {
					$key .= $pattern{
						rand(0, 35)};
				}
				return $key;
			}
			$_SESSION['captcha'] = contenido_captcha();
			?>
            <?php
			$_SESSION
			?>

            <div class="detalle">
			<p>En este ejemplo se utiliza PHP para generar una imágen dinámica como CAPTCHA, cuya resolución es obligatoria para poder enviar el mensaje de consulta. <a target="_blank" href="https://github.com/nahuelmd/PHP-CAPTCHA">Ver código fuente en GitHub</a> </p>
		    </div>

            <!-- Termina generacion captcha PHP -->
            <div class="form">
                <form class="formulario" action="registrar.php" method="post" enctype="multipart/form-data">
                    <label>Nombre</label>
                    <input type="text" name="nombre" size="20" maxlength="100" required>

                    <label>Apellido</label>
                    <input type="text" name="apellido" size="20" maxlength="100" required>

                    <label>Email</label>
                    <input type="text" name="correo" size="20" maxlength="100" required>
                    <label>Consulta</label>

                    <textarea placeholder="Escribe aqui tu consulta " name="consulta" maxlength="400"
                        required=""></textarea>


                    <img src="captcha.php">
                    <label>Ingresa el captcha para enviar comentario</label>
                    <input type="text" name="codigo" placeholder="codigo" required>
                    <?php
                    if (isset($_GET['error']))
                        echo "<p>Codigo Incorrecto</p>"
                    ?>
                    <input type="submit" value="Enviar">
                    <?php
                    if (isset($_GET['consulta_enviada']))
                        echo "<p>Su consulta fue enviada correctamente</p>"
                    ?>
                </form>
            </div>
        

        <div class="datos-container">

            <div class="datos">

            </div>

        </div>

</body>

</html>