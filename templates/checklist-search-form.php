<div id="checklist-form-search" class="checklist-form-search">
    <h5 class="title"> <i class="fa fa-pagelines"></i> Checklist de la flora de Cuba - GPEC </h5>
    <section >
        <!--TABLA: SynonymsGEPC
            TABLA: SpeciesGEPC
            TABLA: referencesGEPC
            TABLA: usesGEPC
            TABLA: habitatsGEPC
            TABLA: commonnamesGEPC
            TABLA: invasiveimpactGEPC
            TABLA: invasiveentryrouteGEPC
            TABLA: protectedareasGEPC
        -->
        <!-- Codigos php para las cargas de datos -->
        <?php $obj = new Gpec_Report();  ?>
        <!-- ENd Codigos php para las cargas de datos -->
        <form action="#" method="post" class="row">
            <div class="col-md-12">
                <input autocomplete="off"  type="text" id="myInput" name="myInput" class="input-search"
                       value="<?= $_POST['myInput'];?>"
                       placeholder="Buscar por nombre cient&iacute;fico, nombre com&uacute;n &oacute; familia bot&aacute;nica"/>
                <button class="btn-new-search" type="submit" id="buscar_general" name="buscar_general">
                    <i class="fa fa-search" ></i>
                </button>
                <div class="box-advance" id="btn-advance-checklist">
                    <span class="xs-hidden">B&uacute;squeda Avanzada</span>
                    <i id="spin-search" class="fa fa-caret-down"></i>
                </div>
            </div>
            <div class="col-md-12 my-hidden advance-fields" id="advance-fields" style="margin-bottom: 40px;">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Género</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_genus'];?>"
                               class="form-control" id="species_genus"
                               name="species_genus" placeholder="nombre del género">
                    </div>
                    <div class="col-md-4">
                        <label for="">Especie</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_name_form'];?>"
                               class="form-control" id="species_name_form"
                               name="species_name_form" placeholder="nombre específico"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Nombre infraespecífico</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_infra_name_form'];?>"
                               class="form-control" id="species_infra_name_form"
                               name="species_infra_name_form" placeholder="nombre de la  subespecie o taxón infraespecífico"/>
                    </div>


                    <div class="col-md-4">
                        <label for="">Familia botánica</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_family'];?>"
                               class="form-control" id="species_family"
                               name="species_family" placeholder="Familia botánica"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Orden</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_order_form'];?>"
                               class="form-control" id="species_order_form"
                               name="species_order_form" placeholder="categoría taxonómica Orden"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Clase</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_class_form'];?>"
                               class="form-control" id="species_class_form"
                               name="species_class_form" placeholder="categoría taxonómica Clase"/>
                    </div>

                    <div class="separator col-md-12"> <label class="label label-info"> Sinónimos </label>  </div>

                    <div class="col-md-4">
                        <label for="">Género</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['syn_genus_form'];?>"
                               class="form-control" id="syn_genus_form"
                               name="syn_genus_form" placeholder="nombre de género del sinónimo conocido"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Especie </label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['syn_species_form'];?>"
                               class="form-control" id="syn_species_form"
                               name="syn_species_form" placeholder="nombre específico del sinónimo conocido"/>
                    </div>
                    <div class="separator col-md-12">  </div>
                    <div class="col-md-4">
                        <label for="">Nombre infraespecífico</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['syn_infra_rank_form'];?>"
                               class="form-control" id="syn_infra_rank_form"
                               name="syn_infra_rank_form" placeholder="nombre de la subespecie o variedad del sinónimo conocido"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Nombre del taxón infraespecífico de segundo orden o rango</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['syn_infra_rank2_form'];?>"
                               class="form-control" id="syn_infra_rank2_form"
                               name="syn_infra_rank2_form" placeholder="nombre de la variedad o forma del sinónimo conocido"/>
                    </div>

                    <div class="separator col-md-12">   </div>

                    <div class="col-md-4">
                        <label for=""> End&eacute;mico </label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="isendemism" id="isendemism" value="Yes" /> Si
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="isendemism" id="isendemism" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Estatus de la especie en Cuba según su origen biogeográfico
                            </label>
                        <?php $seleccion7 = $_POST['sel_species_origen']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_origen",
                            "-- Seleccione --","sel_species_origen",$seleccion7); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Presencia en Cuba </label>
                        <?php $seleccion7 = $_POST['sel_species_presence']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_presence",
                            "-- Seleccione --","sel_species_presence",$seleccion7); ?>
                    </div>

                    <div class="separator col-md-12">   </div>

                    <div class="col-md-4">
                        <label for="">Tipo de planta</label>
                        <?php $seleccion5 = $_POST['sel_species_grow_form']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_plant_growth_form","-- Seleccione --","sel_species_grow_form",$seleccion5); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">Tipo de habitat donde crece la planta</label>
                        <?php $seleccion = $_POST['sel_habitat_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_habitats","habitats_lookup","-- Seleccione --","sel_habitat_lookup",$seleccion); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Uso reportado para la planta  </label>
                        <?php $seleccion3 = $_POST['sel_use_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_use","use_lookup","-- Seleccione --","sel_use_lookup",$seleccion3); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="">Acciones</label><br/>
                        <button type="reset" class="btn btn-danger">Limpiar Filtros</button>
                        <button type="submit" class="btn btn-primary">Solicitar B&uacute;squeda</button>
                    </div>
                </div>
            </div>
            <?php if (  isset($_REQUEST["myInput"]) or isset($_REQUEST['pag'])  ) {
            if (!empty($_REQUEST)) {
                $singular_name = $_REQUEST["myInput"];//el campo de busqueda global
                //los demas campos POST x Orden
                $species_genus = $_REQUEST["species_genus"];
                $species_name = $_REQUEST["species_name_form"];
                $species_infra_name = $_REQUEST["species_infra_name_form"];
                $species_family = $_REQUEST["species_family"];
                $species_order = $_REQUEST["species_order_form"];
                $species_class = $_REQUEST["species_class_form"];
                $syn_genus = $_REQUEST["syn_genus_form"];
                $syn_species = $_REQUEST["syn_species_form"];
                $syn_infra_rank = $_REQUEST["syn_infra_rank_form"];
                $syn_infra_rank2 = $_REQUEST["syn_infra_rank2_form"];
                $isendemism = $_REQUEST["isendemism"];
                $sel_species_origen = $_REQUEST["sel_species_origen"];
                $sel_species_presence = $_REQUEST["sel_species_presence"];
                $sel_species_grow_form = $_REQUEST["sel_species_grow_form"];
                $sel_habitat_lookup = $_REQUEST["sel_habitat_lookup"];
                $sel_use_lookup = $_REQUEST["sel_use_lookup"];
            }
            $lefjoin = " ";
            $addsql = " WHERE 1=1 ";
            //para paginado
            $numero_pagina = (!isset($_REQUEST['pag'])) ? 1 : $_REQUEST['pag'];
            if (isset($_REQUEST["buscar_general"])){
                $numero_pagina = 1;
            }
            $limit =  (!isset($_POST['limit'])) ? 10 : $_POST['limit'];
            $offset = ($numero_pagina-1) * $limit;
            //preguntas para conformar el sql solo en la table gpec_species
            if ($singular_name != "") {//singular_name puede ser
                $addsql .= " AND ( sp.species_genus LIKE '%{$singular_name}%' 
                    OR sp.species_name LIKE '%{$singular_name}%' 
                    OR sp.species_family LIKE '%{$singular_name}%' 
                    OR sp.species_infra_rank_name LIKE '%{$singular_name}%' 
                    OR syns.synonyms_genus LIKE '%{$singular_name}%' 
                    OR syns.synonyms_species_name LIKE '%{$singular_name}%' 
                    OR syns.synonyms_infra_rank_name LIKE '%{$singular_name}%' 
                    OR syns.synonyms_infra_rank2_name LIKE '%{$singular_name}%') ";
            }
            //cuando el filtro es busqueda avanzada
            if ($species_genus != "")
                $addsql .= " AND sp.species_genus LIKE '%{$species_genus}%' ";
            if ($species_name != "")
                $addsql .= " AND sp.species_name LIKE '%{$species_name}%' ";
            if ($species_infra_name != "")
                $addsql .= " AND sp.species_infra_rank_name LIKE '%{$species_infra_name}%' ";
            if ($species_family != "")
                $addsql .= " AND sp.species_family LIKE '%{$species_family}%' ";
            if ($species_order != "")
                $addsql .= " AND sp.species_ordername LIKE '%{$species_order}%' ";
            if ($species_class != "")
                $addsql .= " AND sp.species_classname LIKE '%{$species_class}%' ";
            if ($syn_genus != "")
                $addsql .= " AND syns.synonyms_genus LIKE '%{$syn_genus}%' ";
            if ($syn_species != "")
                $addsql .= " AND syns.synonyms_species_name LIKE '%{$syn_species}%' ";
            if ($syn_infra_rank != "")
                $addsql .= " AND syns.synonyms_infra_rank_name LIKE '%{$syn_infra_rank}%' ";
            if ($syn_infra_rank2 != "")
                $addsql .= " AND syns.synonyms_infra_rank2_name LIKE '%{$syn_infra_rank2}%' ";
            if ($sel_species_origen != "-- Seleccione --" and $sel_species_origen != "")
                $addsql .= " AND sp.species_origen = '{$sel_species_origen}' ";
            if ($sel_species_presence != "-- Seleccione --" and $sel_species_presence != "")
                $addsql .= " AND sp.species_presence = '{$sel_species_presence}' ";
            if ($sel_species_grow_form != "-- Seleccione --" and $sel_species_grow_form != "")
                $addsql .= " AND sp.species_plant_growth_form = '{$sel_species_grow_form}' ";
            //if ($isendemism != "No") TODO cuando este el campo endemism -bool
            //$addsql .= " AND sp.species_is_aweed LIKE '%{$isendemism}%' ";
            if ($sel_use_lookup != "-- Seleccione --" and $sel_use_lookup != "")
            {
                $addsql .= " AND gpec_use.use_lookup = '{$sel_use_lookup}' ";
                $lefjoin .= " LEFT JOIN gpec_use ON gpec_use.internal_taxon_id = sp.internal_taxon_id ";
            }
            if ($sel_habitat_lookup != "-- Seleccione --" and $sel_habitat_lookup != "")
            {
                $addsql .= " AND habitat.habitats_lookup = '{$sel_habitat_lookup}' ";
                $lefjoin .= " LEFT JOIN gpec_habitats AS habitat ON habitat.internal_taxon_id = sp.internal_taxon_id ";
            }
            //query sql optimizadas
            $sql = "SELECT SQL_CALC_FOUND_ROWS
                        sp.id,sp.internal_taxon_id,sp.species_htmlname, syns.synonyms_htmlname 
                    FROM
                        gpec_species AS sp                       
                        LEFT JOIN gpec_synonyms AS syns ON syns.internal_taxon_id = sp.internal_taxon_id
                        {$lefjoin}                                                 
                    {$addsql} 
                    GROUP BY sp.internal_taxon_id
                    ORDER BY sp.species_htmlname
                    LIMIT $limit 
                    OFFSET $offset";
            $query = $obj->exec_sql_ready($sql);
            $rsTotal = $obj->get_total_count_rows(); //cantd de registros
            $maximo = count($query);
            $showing = $maximo - ($offset * $numero_pagina)
            ?>
            <?php  echo var_dump($sql); ?>
            <?php
            global $wp;
            $totalPag = ceil($rsTotal[0]->total/$limit);
            if ($rsTotal[0]->total < 0): ?>
                <span class="no-listings">
                    <?php _ex("No listings found.", 'templates', "GPEC"); ?>
                </span>
            <?php else: ?>
            </br>
            <div class="panel">
                <table class="table table-bordered table-striped" style="margin-top: 40px;">
                    <tbody>
                    <tr>
                        <th> - </th>
                        <th>
                            <div>P&aacute;gina
                                <span class="badge"><?= $numero_pagina ?></span>
                                de <span class="badge"><?= $totalPag ?></span>
                                Mostrando <span class="badge"><?= $maximo ?></span>
                                resultado(s) de <span class="badge"><?= $rsTotal[0]->total; ?></span>
                            </div>
                        </th>
                        <th>
                            Número de registros a mostrar
                            <select id="limit" name="limit" class="select-rows" style="display: block; height: 34px; padding: 0 !important; font-size: 14px;  margin: 0px; width: 60px;">
                                <option value="10" <?php if($_POST['limit']==10) echo "selected='selected'" ?> >10</option>
                                <option value="20" <?php if($_POST['limit']==20) echo "selected='selected'" ?>>20</option>
                                <option value="30" <?php if($_POST['limit']==30) echo "selected='selected'" ?>>30</option>
                                <option value="50" <?php if($_POST['limit']==50) echo "selected='selected'" ?>>50</option>
                                <option value="100" <?php if($_POST['limit']==100) echo "selected='selected'" ?>>100</option>
                            </select>
                        </th>
                    </tr>
                    <tr class="bg-success">
                        <th>No</th>
                        <th colspan="2"> Nombre </th>
                    </tr>
                    <?php
                    for($i=0; $i< $maximo ;$i++){ ?>
                        <tr>
                            <td> <?= ($i+1)+$limit*($numero_pagina-1) ?> </td>
                            <td colspan="2">
                                <?php if($query[$i]->species_htmlname != "" and $query[$i]->species_htmlname != "NULL"){ ?>
                                    <span>
                                    <a href="<?php echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-checklist/?id={$query[$i]->id}" ?>">
                                        <?= $query[$i]->species_htmlname ?>
                                    </a>
                                </span>
                                <?php   }
                                else{
                                    echo "No tiene species_htmlname configurado";
                                }
                                ?>
                                <div>
                                    <?php
                                    $synonyms = $obj->get_list_data_taxon("gpec_synonyms",$query[$i]->internal_taxon_id);
                                    foreach ($synonyms as $syns){
                                        echo "<span>".$syns->synonyms_htmlname." ,</span>";
                                    }?>
                                </div>
                            </td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2">
                            <?php
                            //El paginado
                            $next = (int)($numero_pagina) + 1 < $totalPag ? (int)($numero_pagina) + 1 : $totalPag;
                            $prev = (int)($numero_pagina) - 1 > 1 ? (int)($numero_pagina) - 1 : 1;
                            $html_paginate = "<nav aria-label='navigation '>";
                            $html_paginate .= "<button type='button' class=\"page-link\" name='first' id='first' value='1'>First</button>";
                            $html_paginate .= "<button type='button' class=\"page-link\" name='prev' id='prev' value='$prev'>Prev</button>";
                            $html_paginate .= "<input type='text' class='pagination-input' readonly='readonly' name='pag' id='pag' value='{$numero_pagina}'>";
                            $html_paginate .= "<button type='button' class=\"page-link\" name='next' id='next' value='$next'>Next</button>";
                            $html_paginate .= "<button type='button' class=\"page-link\" name='last' id='last' value='$totalPag'>Last</button>";
                            if ($totalPag > 1){
                                echo $html_paginate."</nav>";
                            }
                            ?>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    <?php endif; ?>


    <?php  }?>
    </section>
    <?php
    #Para busqueda general autocompletar de...
    #Tabla:SpeciesGEPC
    $species_class = $obj->get_list_json_atribute("gpec_species","species_classname");
    $species_order = $obj->get_list_json_atribute("gpec_species","species_ordername");
    $species_family = $obj->get_list_json_atribute("gpec_species","species_family");
    $species_genus = $obj->get_list_json_atribute("gpec_species","species_genus");
    $species_name = $obj->get_list_json_atribute("gpec_species","species_name");
    $species_infra_rank_name = $obj->get_list_json_atribute("gpec_species","species_infra_rank_name");
    #Tabla:SynonymsGEPC
    $syn_genus = $obj->get_list_json_atribute("gpec_synonyms","synonyms_genus");
    $synonyms_species_name = $obj->get_list_json_atribute("gpec_synonyms","synonyms_species_name");
    $syn_infra_rank_name = $obj->get_list_json_atribute("gpec_synonyms","synonyms_infra_rank_name");
    $syn_infra_rank2_name = $obj->get_list_json_atribute("gpec_synonyms","synonyms_infra_rank2_name");
    #TABLA: commonnamesGEPC

    ?>
    <script>
        //llevando las variables php a array javascript
        var species_order = [ '<?php echo implode("','",$species_order);?>' ];
        var species_class = [ '<?php echo implode("','",$species_class);?>' ];
        var species_family = [ '<?php echo implode("','",$species_family);?>' ];
        var species_genus = [ '<?php echo implode("','",$species_genus);?>' ];
        var species_name = [ '<?php echo implode("','",$species_name);?>' ];
        var species_infra_rank_name = [ '<?php echo implode("','",$species_infra_rank_name);?>' ];
        //de la tabla synonyms
        var syn_genus = [ '<?php echo implode("','",$syn_genus);?>' ];
        var synonyms_species_name = [ '<?php echo implode("','",$synonyms_species_name);?>' ];
        var syn_infra_rank_name = [ '<?php echo implode("','",$syn_infra_rank_name);?>' ];
        var syn_infra_rank2_name = [ '<?php echo implode("','",$syn_infra_rank2_name);?>' ];

        //Concatenado en un arreglo grande
        var global_species =  species_name.concat(species_genus).concat(species_infra_rank_name).concat(species_family);
        var global_syns =  synonyms_species_name.concat(syn_genus).concat(syn_infra_rank_name).concat(syn_infra_rank2_name);

        autocomplete(document.getElementById("myInput"), global_species.concat(global_syns));/* el global de todos */
        autocomplete(document.getElementById("species_family"), species_family);
        autocomplete(document.getElementById("species_genus"), species_genus);
        autocomplete(document.getElementById("species_name_form"), species_name);
        autocomplete(document.getElementById("species_order_form"), species_order);
        autocomplete(document.getElementById("species_class_form"), species_class);
        autocomplete(document.getElementById("species_infra_name_form"), species_infra_rank_name);
        //los sinonimos
        autocomplete(document.getElementById("syn_genus_form"), syn_genus);
        autocomplete(document.getElementById("syn_species_form"), synonyms_species_name);
        autocomplete(document.getElementById("syn_infra_rank_form"), syn_infra_rank_name);
        autocomplete(document.getElementById("syn_infra_rank2_form"), syn_infra_rank2_name);
    </script>
</div>
