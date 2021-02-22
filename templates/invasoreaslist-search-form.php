<div id="checklist-form-search" class="container checklist-form-search">
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
                       placeholder="Buscar por nombre de planta, autor, o publicaci&oacute;n"/>
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
                        <label for="">Species Genus</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_genus'];?>"
                               class="form-control" id="species_genus"
                               name="species_genus" placeholder="Genus">
                    </div>
                    <div class="col-md-4">
                        <label for="">Species Name</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_name_form'];?>"
                               class="form-control" id="species_name_form"
                               name="species_name_form" placeholder="species names"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Family</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['species_family'];?>"
                               class="form-control" id="species_family"
                               name="species_family" placeholder="Family"/>
                    </div>

                    <div class="col-md-4">
                        <label for="">Common Name</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['auto_common'];?>"
                               class="form-control" id="auto_common"
                               name="auto_common" placeholder="common names"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Plant growth form</label>
                        <?php $seleccion5 = $_POST['sel_species_grow_form']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_plant_growth_form","--Seleccione Plant --","sel_species_grow_form",$seleccion5); ?>
                    </div>

                    <div class="separator col-md-12">&nbsp;</div>

                    <div class="col-md-4">
                        <label for=""> Species Origen </label>
                        <select class="form-control">
                            <option value="">Seleccione</option>
                            <option value="Introducida">Introducida</option>
                            <option value="criptogénica">Criptogénica</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Is Invasive</label>
                        <?php $seleccion4 = $_POST['sel_is_invasive']; ?>
                        <?= $obj->get_combo_data("gpec_species","species_is_invasive","--Seleccione Invasive --","sel_is_invasive",$seleccion4); ?>
                    </div>

                    <div class="separator col-md-12">&nbsp;</div>

                    <div class="col-md-4">
                        <label for="">Is Weed</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="isweed" id="isweed" value="Yes" /> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="isweed" id="isweed" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Is a Transformer</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="istransformer" id="istransformer" value="Yes" /> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="istransformer" id="istransformer" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Is its Effect Unknown</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="effectunknown" id="effectunknown" value="Yes" /> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="effectunknown" id="effectunknown" value="No" checked="checked"/> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Uses Lookup </label>
                        <?php $seleccion3 = $_POST['sel_use_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_use","use_lookup","--Seleccione Uses Lookup --","sel_use_lookup",$seleccion3); ?>
                    </div>

                    <div class="col-md-4">
                        <label for=""> Invasive entry route lookup </label>
                        <?php $seleccion2 = $_POST['sel_invasive_route']; ?>
                        <?= $obj->get_combo_data("gpec_invasive_entry_route","invasive_entry_route ","--Seleccione Route --","sel_invasive_route",$seleccion2); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""> Invasive Impact lookup </label>
                        <?php $seleccion6 = $_POST['sel_invasive_impact_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_invasive_impact","invasive_impact_lookup","--Seleccione Impact --","sel_invasive_impact_lookup",$seleccion6); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">Habitats lookup</label>
                        <?php $seleccion = $_POST['sel_habitat_lookup']; ?>
                        <?= $obj->get_combo_data("gpec_habitats","habitats_lookup","--Seleccione Habitat --","sel_habitat_lookup",$seleccion); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">protected areas GEPC</label>
                        <input type="text" autocomplete="off"
                               value="<?= $_POST['prot_areas'];?>"
                               class="form-control" id="prot_areas"
                               name="prot_areas" placeholder="Protected Areas"/>
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
            $addsql = " WHERE 1=1 ";
            //para paginado
            $numero_pagina =(int)(!isset($_REQUEST['pag'])) ? 1 : $_REQUEST['pag'];
            if (isset($_REQUEST["buscar_general"])){
                $numero_pagina = 1;
            }
            $limit = 10;
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
            if ($species_name_form != "")
                $addsql .= " AND sp.species_name LIKE '%{$species_name_form}%' ";
            if ($common_names != "")
                $addsql .= " AND comn.common_name LIKE '%{$common_names}%' ";
            if ($species_genus != "")
                $addsql .= " AND sp.species_genus LIKE '%{$species_genus}%' ";
            if ($species_grow_form != "--Seleccione Plant --" and $species_grow_form != "")
                $addsql .= " AND sp.species_plant_growth_form = '{$species_grow_form}' ";
            if ($sel_is_invasive != "--Seleccione Invasive --" and $sel_is_invasive != "")
                $addsql .= " AND sp.species_is_invasive = '{$sel_is_invasive}' ";
            if ($radio_isweed != "No")
                $addsql .= " AND sp.species_is_aweed LIKE '%{$radio_isweed}%' ";
            if ($radio_istransformer != "No")
                $addsql .= " AND sp.species_is_atransformer LIKE '%{$radio_istransformer}%' ";
            if ($radio_effectunknown != "No")
                $addsql .= " AND sp.species_is_itseffectunknown LIKE '%{$radio_effectunknown}%' ";
            if ($sel_use_lookup != "--Seleccione Uses Lookup --" and $sel_use_lookup != "")
                $addsql .= " AND gpec_use.use_lookup = '{$sel_use_lookup}' ";
            if ($sel_invasive_route != "--Seleccione Route --" and $sel_invasive_route != "")
                $addsql .= " AND route.invasive_entry_route = '{$sel_invasive_route}' ";
            if ($sel_habitat_lookup != "--Seleccione Habitat --" and $sel_habitat_lookup != "")
                $addsql .= " AND habitat.habitats_lookup = '{$sel_habitat_lookup}' ";
            if ($impact_lookup != "--Seleccione Impact --" and $impact_lookup != "")
                $addsql .= " AND impact.invasive_impact_lookup = '{$impact_lookup}' ";
            if ($protected_areas!= "")
                $addsql .= " AND areas.ap_name LIKE '%{$protected_areas}%' ";
            //TODO cuando este completa la bd Siempre filtrar x Species Origen = Introducida or Criptogenica
            //if ($origen != "")
                //$addsql .= " AND (sp.species_origin = 'Introducida' OR  sp.species_origin = 'Criptogenica') ";
            //query sql optimizadas
            $sql = "SELECT SQL_CALC_FOUND_ROWS
                        sp.id,sp.internal_taxon_id,sp.species_ordername,
                        sp.species_genus,sp.species_family,sp.species_classname,
                        sp.species_htmlname,sp.species_plant_growth_form,
                        sp.species_name,comn.common_name 
                    FROM
                        gpec_species AS sp
                        LEFT JOIN gpec_common_names AS comn ON comn.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_synonyms AS syns ON syns.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_use ON gpec_use.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_invasive_entry_route AS route ON route.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_invasive_impact AS impact ON impact.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_habitats AS habitat ON habitat.internal_taxon_id = sp.internal_taxon_id
                        LEFT JOIN gpec_protected_areas areas ON areas.internal_taxon_id = sp.internal_taxon_id 
                    {$addsql} 
                    GROUP BY sp.internal_taxon_id, sp.species_family,sp.species_genus, sp.species_name, comn.common_name
                    ORDER BY sp.species_htmlname
                    LIMIT $limit 
                    OFFSET $offset";
            $query = $obj->exec_sql_ready($sql);
            $rsTotal = $obj->get_total_count_rows(); //cantd de registros
            $maximo = count($query);
            $showing = $maximo - ($offset * $numero_pagina)
            ?>
            <!--     < ?//= //var_dump($sql); ?> -->
            <?php
            global $wp;
            $totalPag = ceil($rsTotal[0]->total/$limit);
            if ($rsTotal[0]->total < 0): ?>
                <span class="no-listings">
                    <?php _ex("No listings found.", 'templates', "GPEC"); ?>
                </span>
            <?php else: ?>
            </br>
            <div class="panel" style="padding: 20px">
                <table class="table table-bordered table-hover" style="margin-top: 40px;">
                    <tbody>
                    <tr>
                        <th colspan="2">
                            <p>P&aacute;gina
                                <span class="badge bg-primary"><?= $numero_pagina ?></span>
                                de <span class="badge bg-primary"><?= $totalPag ?></span>
                                Mostrando <span class="badge bg-primary"><?= $maximo ?></span>
                                resultado(s) de <span class="badge bg-primary"><?= $rsTotal[0]->total; ?></span>
                            </p>
                        </th>
                    </tr>
                    <?php
                    for($i=0; $i< $maximo ;$i++){ ?>
                        <tr>
                            <td> <?= ($i+1)+$limit*($numero_pagina-1) ?> </td>
                            <td>
                                <span>
                                    <a href="<?php echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-invasoreas/?id={$query[$i]->id}" ?>">
                                        <?= $query[$i]->species_htmlname ?>
                                    </a>
                                </span>
                                <ul>
                                    <li><?= $query[$i]->species_family; ?></li>
                                    <li><?= $query[$i]->common_name; ?></li>
                                </ul>
                            </td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2">
                            <?php
                            $html_paginate = "<nav aria-label='navigation '><ul class=\"pagination\">";
                            for( $i=1; $i<=$totalPag ; $i++) {
                                $html_paginate .= "<li class=\"page-item\">
                                    <button type='submit' class=\"page-link\" name='pag' id='pag' value='$i'>$i</button></li>";
                            }
                            if ($totalPag > 1){
                                echo $html_paginate."</ul></nav>";
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
