<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Evaluación Técnica</title>
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css" />
    <script type="text/javascript" src="./assets/jquery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <header class="text-center">
        <!--comienza navegador de menus-->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#editar">Editar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#modalAgregar">Editar</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--termina navegador de menus-->
    </header>
    <!--comienza contenido-->
    <div class="container">
        <!--comienza el contenido de editar-->
        <div id="editar">
            <br>
            <div id="tableInfo" class="row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Menú Padre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($this->dataMenu as $value){
                            $menu = new Menu();
                            $menu = $value;
                        ?>
                        <tr>
                            <th class="id"><?php echo $menu->id?></th>
                            <td class="nombre"><?php echo $menu->nombre?></td>
                            <td class="dependencia"><?php echo $menu->dependencia?></td>
                            <td class="descripcion"><?php echo $menu->descripcion?></td>
                            <td>
                                <a class="btn btn-outline-success updateMenu" data-toggle="modal" data-target="#modalAgregar">Editar</a>
                                <a class="btn btn-outline-danger deleteMenu">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="container">
                    <div id="mensajeRespuesta">
                    </div>
                </div>
            </div>
        </div>
        <!--termina el contenido de editar-->
    </div>
    <!--termina contenido-->
    <!-- Modal -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulario</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="selectMenuPadre">Menú Padre</label>
                            <select class="form-control" id="selectMenuPadre">
                                <option value="">Seleccionar...</option>
                                <?php
                                foreach($this->dataMenu as $value){
                                    $select = new MenuFather();
                                    $select = $value;
                                    echo '<option value="'.$select->id.'">'.$select->nombre.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombreMenu">Nombre</label>
                            <input type="text" class="form-control" id="nombreMenu" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcionMenu">Descripción</label>
                            <textarea class="form-control" id="descripcionMenu" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="guardarInfo" type="button" class="btn btn-primary">Guardar</button>
                    <button id="updateInfo" type="button" class="btn btn-success" hidden="hidden">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</body>

<script type="text/javascript" src="./assets/js/homepage.js"></script>

</html>