<div id="checklist-form-search" class="checklist-form-search">
    <h5 class="title"> <i class="fa fa-pagelines"></i> Registro de plantas introducidas e invasoras en Cuba </h5>
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
                        <label for="">Género (nombre del género)</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_genus'];?>"
                               class="form-control" id="species_genus"
                               name="species_genus" placeholder="Genus">
                    </div>
                    <div class="col-md-4">
                        <label for="">Especie (nombre específico)</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_name_form'];?>"
                               class="form-control" id="species_name_form"
                               name="species_name_form" placeholder="species names"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Familia botánica</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_family'];?>"
                               class="form-control" id="species_family"
                               name="species_family" placeholder="Family"/>
                    </div>

                    <div class="col-md-4">
                        <label for="">Nombre común </label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['auto_common'];?>"
                               class="form-control" id="auto_common"
                               name="auto_common" placeholder="common names"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Tipo de planta</label>
                        <?php $seleccion5 = $_POST['sel_species_grow_form']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_plant_growth_form",
                            "--Seleccione--","sel_species_grow_form",$seleccion5); ?>
                    </div>

                    <div class="separator col-md-12">&nbsp;</div>

                    <div class="col-md-4">
                        <label for=""> Estatus de la especie en Cuba según su origen
                            (seleccione si es una especie introducida o criptogénica) </label>
                        <select class="form-control">
                            <option value="">Seleccione</option>
                            <option value="Introducida">Introducida</option>
                            <option value="criptogénica">Criptogénica</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Estatus de Invasora en Cuba</label>
                        <?php $seleccion4 = $_POST['sel_is_invasive']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_is_invasive",
                            "--Seleccione--","sel_is_invasive",$seleccion4); ?>
                    </div>

                    <div class="separator col-md-12">&nbsp;</div>

                    <div class="col-md-4">
                        <label for="">Reportada como maleza </label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="isweed" id="isweed" value="Yes" /> Si
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="isweed" id="isweed" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Registrada como transformadora en Cuba</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="istransformer" id="istransformer" value="Yes" /> Si
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="istransformer" id="istransformer" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Especie con efecto aún desconocido</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="effectunknown" id="effectunknown" value="Yes" /> Si
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="effectunknown" id="effectunknown" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Uso reportado para la planta </label>
                        <?php $seleccion3 = $_POST['sel_use_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_use","use_lookup",
                            "--Seleccione--","sel_use_lookup",$seleccion3); ?>
                    </div>

                    <div class="col-md-4">
                        <label for=""> Ruta de entrada y proliferación </label>
                        <?php $seleccion2 = $_POST['sel_invasive_route']; ?>
                        <?= $obj->get_combo_data("gpec_invasive_entry_route","invasive_entry_route ",
                            "--Seleccione--","sel_invasive_route",$seleccion2); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Tipo de impacto registrado </label>
                        <?php $seleccion6 = $_POST['sel_invasive_impact_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_invasive_impact","invasive_impact_lookup",
                            "--Seleccione--","sel_invasive_impact_lookup",$seleccion6); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">Tipo de hábitat donde ha sido registrada en Cuba</label>
                        <?php $seleccion = $_POST['sel_habitat_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_habitats","habitats_lookup",
                            "--Seleccione--","sel_habitat_lookup",$seleccion); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">Áreas Protegidas donde ha sido registrada su presencia</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['prot_areas'];?>"
                               class="form-control" id="prot_areas"
                               name="prot_areas" placeholder="Protected Areas"/>
                    </div>
                    <div class="col-md-6">
                        <label for="">Acciones</label><br/>
                        <button type="reset" id="reset_post" name="reset_post" class="btn btn-danger">Limpiar Filtros</button>
                        <button type="submit" class="btn btn-primary">Solicitar B&uacute;squeda</button>
                    </div>
                </div>
            </div>
            <?php if (  isset($_REQUEST["myInput"]) or isset($_REQUEST['pag'])  ) {
            if (!empty($_REQUEST)) {
                $singular_name = $_REQUEST["myInput"];//el campo de busqueda global
                //los demas campos POST x Orden
                $species_family = $_REQUEST["species_family"];
                $common_names = $_REQUEST["auto_common"];
                $species_genus = $_REQUEST["species_genus"];
                $species_name_form = $_REQUEST["species_name_form"];
                $impact_lookup = $_REQUEST["sel_invasive_impact_lookup"];
                $species_grow_form = $_REQUEST["sel_species_grow_form"];
                $sel_is_invasive = $_REQUEST["sel_is_invasive"];
                $sel_species_origen = $_REQUEST["sel_species_origen"];#new todo put in filter
                $radio_isweed = $_REQUEST["isweed"];
                $radio_istransformer = $_REQUEST["istransformer"];
                $radio_effectunknown = $_REQUEST["effectunknown"];
                $sel_use_lookup = $_REQUEST["sel_use_lookup"];
                $sel_invasive_route = $_REQUEST["sel_invasive_route"];
                $sel_habitat_lookup = $_REQUEST["sel_habitat_lookup"];
                $protected_areas = $_REQUEST["prot_areas"];
            }
            $addsql = " WHERE (sp.species_origen != 'Nativa' or sp.species_origen != '') ";
            //para paginado
            $numero_pagina =(int)(!isset($_REQUEST['pag'])) ? 1 : $_REQUEST['pag'];
            if (isset($_REQUEST["buscar_general"])){
                $numero_pagina = 1;
            }
            $limit = (!isset($_POST['limit'])) ? 10 : $_POST['limit'];
            $offset = ($numero_pagina-1) * $limit;
            //preguntas para conformar el sql solo en la table gpec_species
            if ($singular_name != "") {//singular_name puede ser
                $addsql .= " AND (sp.species_family LIKE '%{$singular_name}%' 
                    OR sp.species_genus LIKE '%{$singular_name}%' 
                    OR sp.species_name LIKE '%{$singular_name}%' 
                    OR sp.species_infra_rank_name LIKE '%{$singular_name}%' 
                    OR syns.synonyms_genus LIKE '%{$singular_name}%' 
                    OR syns.synonyms_species_name LIKE '%{$singular_name}%' 
                    OR syns.synonyms_infra_rank_name LIKE '%{$singular_name}%' 
                    OR syns.synonyms_infra_rank2_name LIKE '%{$singular_name}%' 
                    OR comn.common_name LIKE '%{$singular_name}%') ";
            }
            //cuando el filtro es busqueda avanzada
            $leftjoin = "";
            if ($species_family != "")
                $addsql .= " AND sp.species_family LIKE '%{$species_family}%' ";
            if ($species_name_form != "")
                $addsql .= " AND sp.species_name LIKE '%{$species_name_form}%' ";
            if ($common_names != "")
                $addsql .= " AND comn.common_name LIKE '%{$common_names}%' ";
            if ($species_genus != "")
                $addsql .= " AND sp.species_genus LIKE '%{$species_genus}%' ";
            if ($species_grow_form != "--Seleccione--" and $species_grow_form != "")
                $addsql .= " AND sp.species_plant_growth_form = '{$species_grow_form}' ";
            if ($sel_is_invasive != "--Seleccione--" and $sel_is_invasive != "")
                $addsql .= " AND sp.species_is_invasive = '{$sel_is_invasive}' ";
            if ($radio_isweed != "No")
                $addsql .= " AND sp.species_is_aweed LIKE '%{$radio_isweed}%' ";
            if ($radio_istransformer != "No")
                $addsql .= " AND sp.species_is_atransformer LIKE '%{$radio_istransformer}%' ";
            if ($radio_effectunknown != "No")
                $addsql .= " AND sp.species_is_itseffectunknown LIKE '%{$radio_effectunknown}%' ";
            if ($sel_use_lookup != "--Seleccione--" and $sel_use_lookup != "")
            {
                $leftjoin .= " LEFT JOIN gpec_use ON gpec_use.internal_taxon_id = sp.internal_taxon_id ";
                $addsql .= " AND gpec_use.use_lookup = '{$sel_use_lookup}' ";
            }
            if ($sel_invasive_route != "--Seleccione--" and $sel_invasive_route != "")
            {
                $leftjoin .= "  LEFT JOIN gpec_invasive_entry_route AS route ON route.internal_taxon_id = sp.internal_taxon_id ";
                $addsql .= " AND route.invasive_entry_route = '{$sel_invasive_route}' ";
            }
            if ($sel_habitat_lookup != "--Seleccione--" and $sel_habitat_lookup != "")
            {
                $leftjoin .= "LEFT JOIN gpec_habitats AS habitat ON habitat.internal_taxon_id = sp.internal_taxon_id ";
                $addsql .= " AND habitat.habitats_lookup = '{$sel_habitat_lookup}' ";
            }
            if ($impact_lookup != "--Seleccione--" and $impact_lookup != "")
            {
                $leftjoin = " LEFT JOIN gpec_invasive_impact AS impact ON impact.internal_taxon_id = sp.internal_taxon_id ";
                $addsql .= " AND impact.invasive_impact_lookup = '{$impact_lookup}' ";
            }
            if ($protected_areas!= "")
            {
                $leftjoin = " LEFT JOIN gpec_protected_areas areas ON areas.internal_taxon_id = sp.internal_taxon_id ";
                $addsql .= " AND areas.ap_name LIKE '%{$protected_areas}%' ";
            }
            //query sql optimizadas
            $sql = "SELECT SQL_CALC_FOUND_ROWS
                        sp.id,sp.internal_taxon_id,sp.species_ordername,
                        sp.species_genus,sp.species_family,sp.species_classname,
                        sp.species_htmlname,sp.species_plant_growth_form
                    FROM
                        gpec_species AS sp
                        LEFT JOIN gpec_common_names AS comn ON comn.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_synonyms AS syns ON syns.internal_taxon_id = sp.internal_taxon_id 
                        {$leftjoin} 
                    {$addsql} 
                    GROUP BY sp.internal_taxon_id, sp.species_family,sp.species_genus,sp.species_name
                    ORDER BY sp.species_htmlname
                    LIMIT $limit 
                    OFFSET $offset";
            $query = $obj->exec_sql_ready($sql);
            $rsTotal = $obj->get_total_count_rows(); //cantd de registros
            $maximo = count($query);
            $showing = $maximo - ($offset * $numero_pagina)
            ?>
                <?php echo var_dump($sql); ?>
            <?php
            global $wp;
            $totalPag = ceil($rsTotal[0]->total/$limit);
            if ($rsTotal[0]->total < 0): ?>
                <span class="no-listings">
                    <?php _ex("No listings found.", 'templates', "GPEC"); ?>
                </span>
            <?php else: ?>
            </br>
            <div class="panel" >
                <table class="table table-bordered table-striped" style="margin-top: 40px;">
                    <tbody>
                    <tr>
                        <th> - </th>
                        <th>
                            <p>P&aacute;gina
                                <span class="badge"><?= $numero_pagina ?></span>
                                de <span class="badge"><?= $totalPag ?></span>
                                Mostrando <span class="badge"><?= $maximo ?></span>
                                resultado(s) de <span class="badge"><?= $rsTotal[0]->total; ?></span>
                            </p>
                        </th>
                        <th>
                            <select id="limit" name="limit" class="select-rows" style="display: block; height: 34px; padding: 0 !important; font-size: 14px;  margin: 0px; width: 60px;">
                                <option value="10" <?php if($_POST['limit']==10) echo "selected='selected'" ?> >10</option>
                                <option value="20" <?php if($_POST['limit']==20) echo "selected='selected'" ?>>20</option>
                                <option value="30" <?php if($_POST['limit']==30) echo "selected='selected'" ?>>30</option>
                                <option value="50" <?php if($_POST['limit']==50) echo "selected='selected'" ?>>50</option>
                                <option value="100" <?php if($_POST['limit']==100) echo "selected='selected'" ?>>100</option>
                            </select>
                        </th>
                    </tr>
                    <tr class="bg-warning">
                        <th>No</th>
                        <th colspan="2"> Nombre </th>
                    </tr>
                    <?php
                    for($i=0; $i< $maximo ;$i++){ ?>
                        <tr>
                            <td> <?= ($i+1)+$limit*($numero_pagina-1) ?> </td>
                            <td colspan="3">
                                <span>
                                    <?php  $my_common_names = $obj->get_list_data_taxon("gpec_common_names",$query[$i]->internal_taxon_id);    ?>
                                    <a href="<?php echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-invasoreas/?id={$query[$i]->id}" ?>">
                                        <?= $query[$i]->species_htmlname ?> (<?= $query[$i]->species_family; ?>)
                                    </a>
                                    <br/>
                                    <?php
                                        foreach ($my_common_names as $names) {
                                            echo "<span> " . $names->common_name . ", </span>";
                                        }
                                    ?>
                                </span>
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
    $common_names = $obj->get_list_json_atribute("gpec_common_names","common_name");
    $prot_areas = $obj->get_list_json_atribute("gpec_protected_areas","ap_name");
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
        var common_names = [ '<?php echo implode("','",$common_names);?>' ];
        var ap_name = [ '<?php echo implode("','",$prot_areas);?>' ];
        //Concatenado en un arreglo grande
        var global_species =  species_name.concat(species_genus).concat(species_infra_rank_name).concat(common_names).concat(species_family);
        var global_syns =  synonyms_species_name.concat(syn_genus).concat(syn_infra_rank_name).concat(syn_infra_rank2_name);

        autocomplete(document.getElementById("myInput"), global_species.concat(global_syns));/* el global de todos */
        autocomplete(document.getElementById("species_family"), species_family);
        autocomplete(document.getElementById("species_name_form"), species_name);
        autocomplete(document.getElementById("species_genus"), species_genus);
        autocomplete(document.getElementById("auto_common"), common_names);
        autocomplete(document.getElementById("prot_areas"), ap_name);

        document.querySelector('#myInput').addEventListener('keydown', function (e) {
            if (13 == e.keyCode) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("myBtn").click();
            }
        });
    </script>
</div>
