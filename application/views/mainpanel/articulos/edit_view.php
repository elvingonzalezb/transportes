<div>
  <ul class="breadcrumb">
      <li><a href="mainpanel/articulos/editTexto/articulos">Editar Texto</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/articulos/listado">Listado de Artículos</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/articulos/nuevo">Nuevo Artículo</a> <span class="divider">/</span></li>
   </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/articulos/actualizar" method="post" enctype="multipart/form-data" onsubmit="return validar_articulo()">
                <fieldset>
                    <legend>Ingrese la información que desea modificar</legend>
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
                        }   
                        ?>
               
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Título</label>
                            <div class="controls">
                                <input type="text" id="titulo" name="titulo" class="span8 typeahead" value="<?php echo $articulo->titulo;?>" onkeyup="url_amigable('titulo', 'url', 'title'); cuentaChars(this.value, 'contador1', 155)" maxlength="155">
                                <?php  
                                    $aux = 155 - strlen($articulo->titulo) + 1;  
                                 ?>
                                    <label><span id="contador1"><?php echo $articulo->titulo; ?></span> caracteres restantes</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Url</label>
                            <div class="controls">
                                <input type="text" id="url" name="url" class="span8 typeahead" value="<?php echo $articulo->url;?>"> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Imagen</label>
                            <div class="controls">
                                <div class="span6"><img src="files/articulos/medianas/<?php echo $articulo->imagen; ?>" width="370" height="275" /></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-success span10">
                                    <p><strong>La imagen a subir debe tener dimensiones de 370 x 275 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Imagen</label>
                            <div class="controls">
                                <input type="file" name="imgnovedad" id="imgnovedad"> </div>
                        </div>
                        <?php 
                        $f = explode(" ", $articulo->created);
                         $fecha = Ymd_2_dmY($f[0]);  
                        ?>
                            <div class="control-group">
                                <label class="control-label" for="fecha">Fecha</label>
                                <div class="controls">
                                    <input type="text" class="input-small datepicker" value="<?php echo $fecha; ?>" id="created" name="created"> <span class="etiqueta">*</span> </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Descripción Corta</label>
                                <div class="controls">
                                    <textarea id="introtext" name="introtext" rows="" class="span8" onkeyup="cuentaChars(this.value, 'contador2', 300)" maxlength="300"><?php echo $articulo->introtext;?></textarea>
                                    <?php 
                                      $car_intro = 300 - strlen($articulo->introtext) + 1;
                                    ?>
                                        <label><span id="contador2"><?php echo $car_intro; ?></span> caracteres restantes</label>
                                </div>
                            </div>
                         
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Descripción</label>
                                <div class="controls">
                                    <textarea id="fulltext" name="fulltext" rows="3">
                                        <?php echo $articulo->fulltext;?>
                                    </textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('fulltext', {
                                            width: '800px',
                                            height: '300px'
                                        });
                                    </script>
                                </div>
                            </div>
                               
                            <div class="control-group">
                                <label class="control-label">Estado</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="state" id="estado1" value="1"
                                         <?php if($articulo->state==1)
                                          echo ' checked="checked"';
                                         ?>> Activo
                                    </label>
                                    <div style="clear:both"></div>
                                    <label class="radio">
                                       <input type="radio" name="state" id="estado2" value="0"
                                        <?php if($articulo->state==0)
                                         echo ' checked="checked"';
                                        ?>> Inactivo 
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Destacado</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="destacado" id="destacado1" value="1"
                                         <?php if($articulo->destacado==1)
                                          echo ' checked="checked"';
                                         ?>> Activo
                                    </label>
                                    <div style="clear:both"></div>
                                    <label class="radio">
                                       <input type="radio" name="destacado" id="destacado2" value="0"
                                        <?php if($articulo->destacado==0)
                                         echo ' checked="checked"';
                                        ?>> Inactivo 
                                    </label>
                                </div>
                            </div>
                               <legend> Parámetros SEO</legend>
                         <div class="control-group">
                            <label class="control-label" for="typeahead">Title</label>
                            <div class="controls">
                                <input type="text" id="title" name="title" class="span8 typeahead" value="<?php echo $articulo->title;?>">
                            </div>
                        </div>
                           <div class="control-group">
                            <label class="control-label" for="typeahead">Description</label>
                            <div class="controls">
                                <input type="text" id="description" name="description" class="span8 typeahead" value="<?php echo $articulo->description;?>">
                            </div>
                        </div>
                         <div class="control-group">
                            <label class="control-label" for="typeahead">keywords</label>
                            <div class="controls">
                                <input type="text" id="keywords" name="keywords" class="span8 typeahead" value="<?php echo $articulo->keywords;?>">
                            </div>
                        </div>
                            <!--                    <legend>Parámetros para SEO</legend>                    <div class="control-group">                        <label class="control-label" for="typeahead">TITLE</label>                        <div class="controls">                            <input type="text" class="span10" id="title" name="title" value="<?php echo $articulo->title; ?>" >                        </div>                    </div>                    <div class="control-group">                        <label class="control-label" for="typeahead">KEYWORDS</label>                        <div class="controls">                            <input type="text" class="span10" id="metakey" name="metakey" value="<?php echo $articulo->metakey?>" >                        </div>                    </div>                    <div class="control-group">                        <label class="control-label" for="typeahead">DESCRIPTION</label>                        <div class="controls">                            <input type="text" class="span10" id="metadesc" name="metadesc" value="<?php echo $articulo->metadesc; ?>" >                        </div>                    </div>                    -->
                            <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="<?php echo $articulo->id; ?>">
                                <input type="submit" class="btn btn-primary" value="ACTUALIZAR"> <a class="btn btn-danger" href="mainpanel/articulos/listado">VOLVER AL LISTADO</a> </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
