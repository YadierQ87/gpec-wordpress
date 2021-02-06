<div id="checklist-form-search" class="container checklist-form-search">
    <h5 class="title"> <i class="fa fa-pagelines"></i> Lista Roja de la Flora de Cuba </h5>
    <section >
        <!-- Codigos php para las cargas de datos -->
        <?php $obj = new Gpec_Report();
        $common_names = $obj->get_list_json_atribute("gpec_species","species_name");
        //var_dump($common_names);
        ?>
        <input type="hidden" id="common_names"
               name="common_names"
               value="<?php echo json_decode($common_names); ?>"
            />
        <!-- ENd Codigos php para las cargas de datos -->
        <form action="<?php echo get_permalink();?>" method="post" class="row">
            <div class="col-md-12">
                <input  type="text" id="myInput" name="myInput" class="input-search" value=""
                        placeholder="Nombre comun" autocomplete="off"/>
                <button class="btn-new-search" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                <div class="box-advance" id="btn-advance-checklist">
                    B&uacute;squeda Avanzada
                    <i id="spin-search" class="fa fa-caret-down"></i>
                </div>
            </div>
            <div class="col-md-12 my-hidden advance-fields" id="advance-fields">
                <div class="row">
                    <h6 class="col-lg-12"> <i class="fa fa-filter"></i> Par&aacute;metros de B&uacute;squeda avanzada</h6>
                    <div class="col-md-4">
                        <label for="">Species Name</label>
                        <input type="text" class="form-control" id="species_name" name="species_name" placeholder="Species Name">
                    </div>
                    <div class="col-md-4">
                        <label for=""> Species Genus</label>
                        <input type="text" class="form-control" id="species_genus" name="species_genus" placeholder="Genus">
                    </div>
                    <div class="col-md-4">
                        <label for="">Synonyms Species</label>
                        <input type="text" class="form-control" id="species_class" name="species_class" placeholder="Class">
                    </div>
                    <div class="col-md-4">
                        <label for="">Synonyms Genus</label>
                        <input type="text" class="form-control" id="species_class" name="species_class" placeholder="Class">
                    </div>
                    <div class="col-md-4">
                        <label for="">Species Infra Name </label>
                        <input type="text" class="form-control" id="syn_infra_name" name="syn_infra_name" placeholder="Class">
                    </div>
                    <div class="col-md-4">
                        <label for="">synonyms Infra Rank Name</label>
                        <input type="text" class="form-control" id="syn_infra_rank" name="syn_infra_rank" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label for="">synonyms Infra Rank2 Name</label>
                        <input type="text" class="form-control" id="syn_infra_rank2" name="syn_infra_rank2" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label for="">redlist.category</label>
                        <?= $obj->get_combo_data("gpec_assessments","redlist_category","--Seleccione Categoria--","sel_categorie_redlist"); ?>
                    </div>
                    <div class="col-md-4">
                        <label>Species Endemism</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="endemism" id="endemism" value="Yes" checked=""> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="endemism" id="endemism" value="No"> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Species Plant Grow</label>
                        <?= $obj->get_combo_data("gpec_species","species_plant_growth_form","--Seleccione Common Name--","sel_species_plant_growth_form"); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">Presence</label>
                        <?= $obj->get_combo_data("gpec_species","species_presence_reference","--Seleccione Presence --","sel_species_presence_reference"); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">Habitats (lookups)</label>
                        <?= $obj->get_combo_data("gpec_habitats","habitats_lookup","--Seleccione Habitat--","sel_habitats"); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="">Uses</label>
                        <input class="form-control" id="uses" name="uses" placeholder="Uses">
                    </div>


                    <div class="col-md-6">
                        <label for="">Acciones</label><br/>
                        <button type="reset" class="btn btn-danger">Limpiar Filtros</button>
                        <button type="submit" class="btn btn-primary">Solicitar B&uacute;squeda</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section>
        <?php if (  isset($_POST["myInput"]) or isset($_REQUEST['pag'])  ) {
            //TODO listar el template de las plantas checklist
            //controller for main table gpec_species
            //la principal busqueda sale de los siguientes campos
            //species.genus synonyms.genus
            //species.name synonyms.species
            //species.infra.name synonyms.infra.rank.name
            //synonyms.infra.rank2.name
            $singular_name = $_POST["myInput"];//
            $syn_infra_rank2 = $_POST["syn_infra_rank2"];
            $syn_infra_rank = $_POST["syn_infra_rank"];
            $syn_infra_name = $_POST["syn_infra_name"];
            $species_class = $_POST["species_class"];
            $species_genus = $_POST["species_genus"];
            $species_name = $_POST["species_name"];
            $endemism = $_POST["endemism"];//bool
            $uses = $_POST["uses"];
            //los combos
            $species_origen = $_POST["sel_species_origen"];
            $species_plant_growth_form = $_POST["sel_species_plant_growth_form"];
            $species_presence_reference = $_POST["sel_species_presence_reference"];
            $habitats = $_POST["sel_habitats"];
            $addsql = " WHERE 1=1 ";

            //para paginado
            $numero_pagina =(int)(!isset($_REQUEST['pag'])) ? 1 : $_REQUEST['pag'];
            $limit = 10;
            $offset = ($numero_pagina-1) * $limit;
            if ($singular_name != "")
                $addsql .= " AND species_name LIKE '%{$singular_name}%'";

            //query sql optimizadas
            $sql = "SELECT SQL_CALC_FOUND_ROWS id, species_classname,species_ordername ,species_family,
                    species_genus,species_name,species_htmlname, species_plant_growth_form
                     FROM gpec_species $addsql LIMIT $limit OFFSET $offset";
            $query = $obj->exec_sql_ready($sql);
            $rsTotal = $obj->get_total_count_rows(); //cantd de registros
            $maximo = count($query);
            $showing = $maximo - ($offset * $numero_pagina)
            ?>
            <?php if ($rsTotal[0]->total < 0): ?>
                <span class="no-listings">
                    <?php _ex("No listings found.", 'templates', "GPEC"); ?>
                </span>
            <?php else: ?>
                </br>
                <table class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th colspan="2">Mostrando
                    <span class="badge bg-primary"><?= $maximo ?></span>
                      Resultado(s) del total <span class="badge bg-primary"><?= $rsTotal[0]->total; ?></span>  </th>
                </tr>
                    <?php

                    for($i=0; $i< $maximo ;$i++){ ?>
                        <tr>
                            <td>
                                <h6>
                                    <a href="<?php echo get_permalink(add_query_arg(array($_GET), $wp->request))."species?id=$i"; ?>">
                                        <?= $query[$i]->species_htmlname; ?>
                                    </a>
                                </h6>
                                <ul>
                                    <li><?= $query[$i]->species_classname." - ".$query[$i]->species_ordername; ?></li>
                                    <li><?= $query[$i]->species_genus." - ".$query[$i]->species_family; ?></li>
                                    <li><?= $query[$i]->species_plant_growth_form; ?></li>
                                </ul>
                            </td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                         <td colspan="2">
                              <?php
                                 global $wp;
                                 $totalPag = ceil($rsTotal[0]->total/$limit);
                                 $links = array();
                                 for( $i=1; $i<=$totalPag ; $i++) {
                                    $links[] = "<a href='".get_permalink(add_query_arg(array($_POST), $wp->request))."?pag=$i'>$i</a>";
                                 }
                                 echo implode(" - ", $links);
                              ?>
                         </td>
                      </tr>
                   </tfoot>
                </table>
            <?php endif; ?>


        <?php  }?>
    </section>


    <script>
        //var common_names = document.getElementById("common_names").getAttribute('value');
        var common_names = ["ekmanii","pusilla","baracoense","subacuminatum","lineata","cristalensis","cubense",
            "rex ","ossana","duplex","acunae","moralesii","excisa","angustifolia","aristulatus ",
            "victorinianus","caribaeum","pistaciifolium","auritum","dentatum","coriacea","ferruginea",
            "punctata","meisnerianum"];
        /*common_names = JSON.parse(common_names);
         for (var i=0; i < 30 ; i++){
         alert(common_names[i].common_name)
         }*/
        autocomplete(document.getElementById("myInput"), common_names);
    </script>
</div>
