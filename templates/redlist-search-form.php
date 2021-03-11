<div id="checklist-form-search" class="container checklist-form-search">
    <h5 class="title"> <i class="fa fa-pagelines"></i> Lista Roja de la flora de Cuba </h5>
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
                    B&uacute;squeda Avanzada
                    <i id="spin-search" class="fa fa-caret-down"></i>
                </div>
            </div>
            <div class="col-md-12 my-hidden advance-fields" id="advance-fields" style="margin-bottom: 40px;">
                <div class="row">
                    <span class="col-lg-12"> <i class="fa fa-filter"></i> Par&aacute;metros de B&uacute;squeda avanzada</span>
                    <div class="col-md-4">
                        <label for="">G&eacute;nero </label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_genus'];?>"
                               class="form-control" id="species_genus"
                               name="species_genus" placeholder="Genus">
                    </div>
                    <div class="col-md-4">
                        <label for="">Especie </label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_name_form'];?>"
                               class="form-control" id="species_name_form"
                               name="species_name_form" placeholder="species names"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Familia</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_family'];?>"
                               class="form-control" id="species_family"
                               name="species_family" placeholder="Family"/>
                    </div>

                    <div class="col-md-4">
                        <label for=""> End&eacute;mica </label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="isendemism" id="isendemism" value="Yes" /> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="isendemism" id="isendemism" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Nombre Com&uacute;n</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['auto_common'];?>"
                               class="form-control" id="auto_common"
                               name="auto_common" placeholder="common names"/>
                    </div>

                    <div class="separator col-md-12">seccion de subtitle </div>

                    <div class="col-md-4">
                        <label for=""> Categor&iacute;a de la IUCN </label>
                        <?php $seleccion8 = $_POST['sel_redlist_category']; ?>
                        <?= $obj->get_combo_data("gpec_assessments","redlist_category",
                            "-- Seleccione --","sel_redlist_category",$seleccion8); ?>
                        <!-- table assestment -->
                    </div>
                    <div class="col-md-4">
                        <label for=""> Criterio de la IUCN </label>
                        <input type="text"
                               autocomplete="off"
                               value="<?= $_POST['i_redlist_criteria'];?>"
                               class="form-control"
                               name="i_redlist_criteria" id="i_redlist_criteria" placeholder="redlist criteria">
                    </div>
                    <div class="col-md-4">
                        <label for=""> Etiquetas de la Categor&iacute;a </label>
                        <?php $seleccion8 = $_POST['sel_redlist_tag']; ?>
                        <?= $obj->get_combo_data("gpec_assessments","redlist_tag",
                            "-- Seleccione --","sel_redlist_tag",$seleccion8); ?>
                        <!-- table assestment -->
                    </div>

                    <div class="col-md-4">
                        <label for=""> Tipos de Amenaza </label>
                        <?php $seleccion9 = $_POST['sel_threats_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_threats","threats_lookup",
                            "-- Seleccione --","sel_threats_lookup",$seleccion9); ?>
                    </div>

                    <div class="col-md-4">
                        <label for="">Areas protegidas </label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['prot_areas'];?>"
                               class="form-control" id="prot_areas"
                               name="prot_areas" placeholder="Protected Areas"/>
                    </div>

                    <div class="col-md-4">
                        <label for=""> Fuera de Areas Protegidas  </label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="radio_areas_protegidas"
                                       id="radio_areas_protegidas" value="Yes" /> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radio_areas_protegidas"
                                       id="radio_areas_protegidas" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>

                    <div class="separator col-md-12"> seccion de subtitle </div>

                    <div class="col-md-4">
                        <label for=""> Acciones de Conservaci&oacute;n Necesarias </label>
                        <?php $seleccion2 = $_POST['sel_conservation_needs']; ?>
                        <?= $obj->get_combo_data("gpec_conservation_needed","conservationneeds_lookup",
                            "-- Seleccione --","sel_conservation_needs",$seleccion2); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Investigaciones Necesarias </label>
                        <?php $seleccion10 = $_POST['sel_researchneeds_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_research_needed","researchneeds_lookup",
                            "-- Seleccione --","sel_researchneeds_lookup",$seleccion10); ?>
                    </div>



                    <div class="col-md-4">
                        <label for="">Tipo de Planta</label>
                        <?php $seleccion5 = $_POST['sel_species_grow_form']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_plant_growth_form",
                            "-- Seleccione --","sel_species_grow_form",$seleccion5); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Tipo de Habitats</label>
                        <?php $seleccion = $_POST['sel_habitat_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_habitats","habitats_lookup",
                            "-- Seleccione --","sel_habitat_lookup",$seleccion); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Usos de la especie </label>
                        <?php $seleccion3 = $_POST['sel_use_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_use","use_lookup",
                            "-- Seleccione --","sel_use_lookup",$seleccion3); ?>
                    </div>

                    <div class="col-md-4">
                        <label for=""> Species Presence(?)  </label>
                        <?php $seleccion7 = $_POST['sel_species_presence']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_presence",
                            "-- Seleccione --","sel_species_presence",$seleccion7); ?>
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
                $species_family = $_REQUEST["species_family"];
                $common_names = $_REQUEST["auto_common"];
                $species_genus = $_REQUEST["species_genus"];
                $species_grow_form = $_REQUEST["sel_species_grow_form"];
                $sel_use_lookup = $_REQUEST["sel_use_lookup"];
                $sel_habitat_lookup = $_REQUEST["sel_habitat_lookup"];
                $protected_areas = $_REQUEST["prot_areas"];
                $fuera_areas_protegidas = $_REQUEST["radio_areas_protegidas"];

                $species_name_form = $_REQUEST["species_name_form"];
                $sel_redlist_category = $_REQUEST["sel_redlist_category"];
                $i_redlist_criteria = $_REQUEST["i_redlist_criteria"];
                $sel_redlist_tag = $_REQUEST["sel_redlist_tag"];
                $sel_threats_lookup = $_REQUEST["sel_threats_lookup"];
                $sel_species_presence = $_REQUEST["sel_species_presence"];
                $sel_conservation_needs = $_REQUEST["sel_conservation_needs"];
                $sel_researchneeds_lookup = $_REQUEST["sel_researchneeds_lookup"];
            }
            $addsql = " WHERE 1=1 ";
            $leftjoin = " ";
            //para paginado
            $numero_pagina =(int)(!isset($_REQUEST['pag'])) ? 1 : $_REQUEST['pag'];
            if (isset($_REQUEST["buscar_general"])){
                $numero_pagina = 1;
            }
            $limit = $_POST['limit'];
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
            if ($species_family != "")
                $addsql .= " AND sp.species_family LIKE '%{$species_family}%' ";
            if ($common_names != "")
                $addsql .= " AND comn.common_name LIKE '%{$common_names}%' ";
            if ($species_genus != "")
                $addsql .= " AND sp.species_genus LIKE '%{$species_genus}%' ";
            if ($species_grow_form != "-- Seleccione --" and $species_grow_form != "")
                $addsql .= " AND sp.species_plant_growth_form = '{$species_grow_form}' ";
            if ($sel_use_lookup != "-- Seleccione --" and $sel_use_lookup != "")
            {
                $addsql .= " AND gpec_use.use_lookup = '{$sel_use_lookup}' ";
                $leftjoin .= " LEFT JOIN gpec_use ON gpec_use.internal_taxon_id = sp.internal_taxon_id";
            }
            if ($sel_habitat_lookup != "-- Seleccione --" and $sel_habitat_lookup != "")
            {
                $addsql .= " AND habitat.habitats_lookup = '{$sel_habitat_lookup}' ";
                $leftjoin .= " LEFT JOIN gpec_habitats AS habitat ON habitat.internal_taxon_id = sp.internal_taxon_id ";
            }
            if ($species_name_form != "")
                $addsql .= " AND sp.species_name LIKE '%{$species_name_form}%' ";
            if ($sel_species_presence != "" AND $sel_species_presence != "-- Seleccione --")
                $addsql .= " AND sp.species_presence LIKE '%{$sel_species_presence}%' ";
            //table assesment redlist
            if ($sel_redlist_category != "" AND $sel_redlist_category != "-- Seleccione --")
                $addsql .= " AND redlist.redlist_category LIKE '%{$sel_redlist_category}%' ";
            if ($i_redlist_criteria != "" )
                $addsql .= " AND redlist.redlist_criteria LIKE '%{$i_redlist_criteria}%' ";
            if ($sel_redlist_tag != "" AND $sel_redlist_tag != "-- Seleccione --")
                $addsql .= " AND redlist.redlist_tag LIKE '%{$sel_redlist_tag}%' ";
            //table gpec_threats (amenaza)
            if ($sel_threats_lookup != "" AND $sel_threats_lookup != "-- Seleccione --")
            {
                $addsql .= " AND amenaza.threats_lookup LIKE '%{$sel_threats_lookup}%' ";
                $leftjoin .= " LEFT JOIN gpec_threats AS amenaza ON amenaza.internal_taxon_id = sp.internal_taxon_id";
            }
            //table gpec_conservation_needed
            if ($sel_conservation_needs != "" AND $sel_conservation_needs != "-- Seleccione --"){
                $addsql .= " AND conservation.conservationneeds_lookup LIKE '%{$sel_conservation_needs}%' ";
                $leftjoin .= " LEFT JOIN gpec_conservation_needed AS conservation ON conservation.internal_taxon_id = sp.internal_taxon_id";
            }
            //table research
            if ($sel_researchneeds_lookup != "" AND $sel_researchneeds_lookup != "-- Seleccione --")
            {
                $addsql .= " AND research.researchneeds_lookup LIKE '%{$sel_researchneeds_lookup}%' ";
                $leftjoin .= " LEFT JOIN gpec_research_needed AS research ON research.internal_taxon_id = sp.internal_taxon_id";
            }

            //Para las que no tengan areas protegidas
            if ($fuera_areas_protegidas == "Yes" ){
                $addsql .= " AND sp.internal_taxon_id NOT IN (SELECT  internal_taxon_id FROM gpec_habitats) ";
                $protected_areas = "";
            }
            if ($protected_areas != ""){
                $addsql .= " AND areas.ap_name LIKE '%{$protected_areas}%' ";
                $leftjoin .= " LEFT JOIN gpec_protected_areas AS areas ON areas.internal_taxon_id = sp.internal_taxon_id ";
            }
            //query sql optimizadas
            $sql = "SELECT SQL_CALC_FOUND_ROWS
                        sp.id,sp.internal_taxon_id,sp.species_htmlname,
                        sp.species_endemism_type,redlist.redlist_category
                    FROM
                        gpec_species AS sp
                        LEFT JOIN gpec_common_names AS comn ON comn.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_synonyms AS syns ON syns.internal_taxon_id = sp.internal_taxon_id                        
                        LEFT JOIN gpec_assessments AS redlist ON redlist.internal_taxon_id = sp.internal_taxon_id
                        {$leftjoin}                           
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
            <?php echo var_dump($sql);  ?>
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
                <table class="table table-bordered table-hover" style="margin-top: 40px;">
                    <tbody>
                    <tr>
                        <th colspan="2">
                            <p>P&aacute;gina
                                <span class="badge"><?= $numero_pagina ?></span>
                                de <span class="badge"><?= $totalPag ?></span>
                                Mostrando <span class="badge"><?= $maximo ?></span>
                                resultado(s) de <span class="badge"><?= $rsTotal[0]->total; ?></span>
                            </p>
                        </th>
                        <th>
                            <select id="limit" name="limit">
                                <option value="10" <?php if($_POST['limit']==10) echo "selected='selected'" ?> >10</option>
                                <option value="20" <?php if($_POST['limit']==20) echo "selected='selected'" ?>>20</option>
                                <option value="30" <?php if($_POST['limit']==30) echo "selected='selected'" ?>>30</option>
                                <option value="50" <?php if($_POST['limit']==50) echo "selected='selected'" ?>>50</option>
                                <option value="100" <?php if($_POST['limit']==100) echo "selected='selected'" ?>>100</option>
                            </select>
                        </th>
                    </tr>
                    <?php
                    for($i=0; $i< $maximo ;$i++){ ?>
                        <tr>
                            <td> <?= ($i+1)+$limit*($numero_pagina-1) ?> </td>
                            <td>
                                <span>
                                    <a href="<?php echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-redlist/?id={$query[$i]->id}" ?>">
                                        <?= $query[$i]->species_htmlname ?>
                                    </a>
                                </span>
                            </td>
                            <td>
                                <?php
                                if ($query[$i]->species_endemism_type != "" and $query[$i]->species_endemism_type != NULL ){
                                    echo $query[$i]->species_endemism_type; } ?>
                            </td>
                            <td>
                                <?php if ($query[$i]->redlist_category != "" and $query[$i]->redlist_category != NULL ){?>
                                    <label class="label label-danger"> <?= $query[$i]->redlist_category ?> </label>
                                <?php } ?>
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
                            $html_paginate .= "<input type='text' class='pagination-input' readonly='readonly' name='pag' id='pag' value='{$_REQUEST['pag']}'>";
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
    #TABLA assesment
    $redlist_criteria = $obj->get_list_json_atribute("gpec_assessments","redlist_criteria");
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
        //de la table assesment
        var redlist_criteria = [ '<?php echo implode("','",$redlist_criteria);?>' ];
        //Concatenado en un arreglo grande
        var global_species =  species_name.concat(species_genus).concat(species_infra_rank_name).concat(common_names);
        var global_syns =  synonyms_species_name.concat(syn_genus).concat(syn_infra_rank_name).concat(syn_infra_rank2_name);

        autocomplete(document.getElementById("myInput"), global_species.concat(global_syns));/* el global de todos */
        autocomplete(document.getElementById("species_family"), species_family);
        autocomplete(document.getElementById("species_genus"), species_genus);
        autocomplete(document.getElementById("auto_common"), common_names);
        autocomplete(document.getElementById("prot_areas"), ap_name);
        autocomplete(document.getElementById("i_redlist_criteria"), redlist_criteria);
        autocomplete(document.getElementById("species_name_form"), species_name);
    </script>
</div>
