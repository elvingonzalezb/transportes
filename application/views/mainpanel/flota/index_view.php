<div>
   <ul class="breadcrumb">
      <li><a href="mainpanel/flota/editTexto/flota">Editar Texto</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/flota/listado">Listado de Flota</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/flota/nuevo">Nueva Flota</a> <span class="divider">/</span></li>
   </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i>Listado de Flota</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
            </div>
        </div>

        <div class="box-content">
        <?php
            if($this->session->userdata('success'))
            {
                echo '<div class="alert alert-success">';
                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                echo $this->session->userdata('success');
                echo '</div>';
                $this->session->unset_userdata('success');
            }
            if($this->session->userdata('error'))
            {
                echo '<div class="alert alert-error">';
                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                echo $this->session->userdata('error');
                echo '</div>';
                $this->session->unset_userdata('error');
            } 
        ?>               
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th width="5%">Nro</th>
                        <th>Imagen</th>
                        <th width="20%">Título</th>
                        <th width="8%">Orden</th>
                        <th width="5%">Estado</th>
                        <th width="32%">Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    foreach($flotas as $flota)
                    {
                        $imagen = $flota->imagen;
                        if($imagen!="")
                        {
                            $pic = '<img src="files/flota/'.$imagen.'"/>';
                        }
                        else
                        {
                            $pic = '--------';
                        }                        
                        echo '<tr>';
                        echo '<td class="center">'.$orden.'</td>';
                        echo '<td class="celdaImagen">'.$pic.'</td>';
                        echo '<td>'.$flota->nombre.'</td>';
                        echo '<td>'.$flota->orden.'</td>';
                        if($flota->state==1)
                        {
                            echo '<td><span class="label label-success">ACTIVO</span></td>';
                        }
                        else
                        {
                            echo '<td><span class="label label-important">INACTIVO</span></td>';
                        }
                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/flota/edit/'.$flota->id.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger espacio" href="javascript:deleteFlota(\''.$flota->id.'\')"><i class="icon-trash icon-white"></i>Borrar</a> ';
                        //echo '<a class="btn btn-success espacio" href="mainpanel/comentarios/listado/'.$flota->id.'"><i class="icon-comment icon-white"></i>Comentarios</a> ';
                        echo '</td>';
                        echo '</tr>';
                        $orden++;
                    }
                ?>
                </tbody>
            </table>            
        </div>
     </div><!--/span-->
</div><!--/row-->