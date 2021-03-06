<h1 class="page-header">Nueva Tipo Documento</h1>
<ol class="breadcrumb" style="background-color: white;">
    <li><a href="?c=tipo_documento" style="color:#0016b0;">Tipo Documento</a></li>
    <li class="active">Nuevo tipo documento</li>
</ol>

<form action="?c=tipo_documento&a=guardar" method="post" autocomplete="off" onsubmit="return confSubmit()">
    <input type="hidden" name="pk" value="<?php echo $tipo_documento->pktipo_documento; ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Sigla</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese la sigla" value="<?php echo $tipo_documento->sigla; ?>" required >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="sigla" class="form-control" placeholder="Ingrese el nombre del tipo de documento" value="<?php echo $tipo_documento->nombre; ?>" required />
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg" id="guardar"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>
