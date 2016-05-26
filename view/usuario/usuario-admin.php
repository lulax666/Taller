<h1 class="page-header"><i class="fa fa-user fa-fw fa-2x"></i> Usuarios</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=usuario&a=nuevo"><i class="fa fa-plus"></i> Nuevo usuario</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $r): ?>
                            <tr>
                                <td><?php echo $r->ci; ?></td>
                                <td><?php echo $r->nombre; ?></td>
                                <td><?php echo $r->email; ?></td>
                                <td><?php echo $r->telefono; ?></td>
                                <td><?php echo $r->cargo; ?></td>
                                <td style="text-align: center">
                                    <a href="?c=usuario&a=editar&pkusuario=<?php echo $r->pkusuario; ?>" style="color: #263340"><i class="fa fa-pencil"></i> Editar</a>
                                    <a href="#" onclick="Eliminar('<?php echo $r->pkusuario; ?>','<?php echo $r->nombre;?>','usuario')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>