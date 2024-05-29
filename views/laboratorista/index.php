<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet"    href="<?php echo constant('URL'); ?>public/css/admin.css">
    <title>SPAA</title>
</head>
<body>
    <?php $this -> showMessages();?>
    <main class="main">
        <?php  $this -> navController(); ?>
        <section class="content" id="content-main">
            <h1>Inventario</h1>

            <!-- <form action="<?php echo constant('URL'); ?>admin/tableUsers" method="POST">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar..." class="search">
                <button type="submit" class="btn bg-secondary text-white btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="<?php echo constant('URL'); ?>admin" class="btn-refresh bg-secondary"><i class="fa-solid fa-rotate"></i></a>
            </form> -->
            <div class="flex justify-end mb-4">
                <button class="bg-green-600 text-black px-4 py-2 rounded">Agregar</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <td class="text-center">Id</td>
                        <td class="text-center">Marca</td>
                        <td class="text-center">Modelo</td>
                        <td class="text-center">name</td>
                        <td class="text-center">Cantidad</td>
                        <td class="text-center">folio</td>
                        <td class="text-center">Descripción</td>
                        <td class="text-center">serie</td>
                    </tr>
                </thead>
                <tbody>
                     <?php //echo $this -> d['tabla'];?>
                </tbody>
            </table>

            <div id="paginas">
                <?php 
                // echo $this -> d['page'];?>
            </div>
        </section>
    </main>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Baja del cliente <span id="num_client"></span></h2>
            </div>
            <div class="modal-body">
                <p><span>Esta acción es irreversible.</span> ¿Estás seguro que quieres dar debaja a este cliente?</p>
                <form action="<?php constant('URL');?>admin/delete" method="POST">
                    <input type="hidden" name="eliminar" id="eliminar" value="">
                    <input type="password" id="passEjecutivo" name="passEjecutivo" placeholder="Ingrese contraseña" required>               
                    <div class="content-buttons">
                        <button type="button" onclick="closedModal()" class="btn bg-error btn-cancel">Cancelar</button>
                        <button type="submit" class="btn bg-success btn-confirm">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/admin.js"></script>
</body>
</html>