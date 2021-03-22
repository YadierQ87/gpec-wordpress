<?php
/**
 * Template Name: Listing detail Template
 * Template Post Type: post
 *
 * @package WordPress
 * page invasoreas list
 */

get_header();
?>
    <main id="site-content" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="listing-detail">
                        <section >
                            <div class="listing-title">
                                <?php
                                $obj = new Gpec_Report();
                                $id = $_REQUEST["id"];
                                $gpec_species = $obj->get_object_data("gpec_species",$id);
                                $internal_taxon_id = $gpec_species[0]->internal_taxon_id;
                                $habitat = $obj->get_list_data_taxon("gpec_habitats",$internal_taxon_id);
                                $synonyms = $obj->get_list_data_taxon("gpec_synonyms",$internal_taxon_id);
                                $common = $obj->get_list_data_taxon("gpec_common_names",$internal_taxon_id);
                                $protected = $obj->get_list_data_taxon("gpec_protected_areas",$internal_taxon_id);
                                $use_lookup = $obj->get_list_data_taxon("gpec_use",$internal_taxon_id);
                                $references = $obj->get_list_data_taxon("gpec_references",$internal_taxon_id);
                                $assessments = $obj->get_list_data_taxon("gpec_assessments",$internal_taxon_id);
                                $invasive_route = $obj->get_list_data_taxon("gpec_invasive_entry_route",$internal_taxon_id);
                                $invasive_impact = $obj->get_list_data_taxon("gpec_invasive_impact",$internal_taxon_id);
                                $locations = $obj->get_list_data_taxon("gpec_distribution",$internal_taxon_id);
                                //var_dump($gpec_species);
                                ?>
                                <?php do_action('back_button'); ?>
                                <h3>Registro de plantas introducidas e invasoras en Cuba</h3>

                                <label class="label label-default"> Hoja de Datos </label>
                                <h4><?php if ($gpec_species[0]->species_htmlname != "") {
                                        echo $gpec_species[0]->species_htmlname;
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php
                                    if (count($common) > 0)
                                        foreach ($common as $names){
                                            echo "<p>".$uses->common_name."</p>";
                                        }
                                    else
                                        echo "No tiene registros";
                                    ?>
                                </h4>
                                <h4>
                                    <?php if ($gpec_species[0]->species_family != "") {
                                        echo $gpec_species[0]->species_family;
                                    }
                                    ?>
                                    <?php
                                    if ($gpec_species[0]->species_ordername != ""){
                                        echo " & ".$gpec_species[0]->species_ordername;
                                    }
                                    ?>
                                    <?php
                                    if ($gpec_species[0]->species_division != ""){
                                        echo " & ".$gpec_species[0]->species_division;
                                    }
                                    ?>
                                </h4>
                                <h4>
                                    <?php if (count($synonyms )>0){ ?>
                                        <label class="label label-info">Datos de Taxonom&iacute;a y Nomenclatura</label>
                                        <?php foreach ($synonyms as $syn){
                                            echo "<p>".$syn->synonyms_htmlname."</p>";
                                        }
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                </h4>
                                <div class="">
                                    <label class="label label-info">Origen e Invasibilidad</label>
                                    <?php if ($gpec_species[0]->species_origen != ""){
                                        echo "<p> Introducido ".$gpec_species[0]->species_origen."</p>";
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php if ($gpec_species[0]->species_is_naturalized != ""){
                                        echo "<p> Label species_is_naturalized ".$gpec_species[0]->species_is_naturalized."</p>";
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php if ($gpec_species[0]->species_is_invasive != ""){
                                        echo "<p> Label species_is_invasive ".$gpec_species[0]->species_is_invasive."</p>";
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php if ($gpec_species[0]->species_is_atransformer != ""){
                                        echo "<p> Label species_is_atransformer ".$gpec_species[0]->species_is_atransformer."</p>";
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php if ($gpec_species[0]->species_is_aweed != ""){
                                        echo "<p> Label species_is_aweed ".$gpec_species[0]->species_is_aweed."</p>";
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php if ($gpec_species[0]->species_naturalization_reference != ""){
                                        echo "<p>   ".$gpec_species[0]->species_naturalization_reference."</p>";
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php if ($gpec_species[0]->species_herbarium_specimen != ""){
                                        echo "<p>   ".$gpec_species[0]->species_herbarium_specimen."</p>";
                                    }?>
                                    <?php if ($gpec_species[0]->species_origen_notes != ""){
                                        echo "<p>   ".$gpec_species[0]->species_origen_notes."</p>";
                                    }?>
                                    <p>
                                        <label class="label label-info">Justificación de invasivibilidad en Cuba</label>
                                        <?php echo "species_invasive_rationale no esta?" ?>
                                    </p>
                                    <?php if ($gpec_species[0]->species_plant_growth_form != ""){
                                        echo "<label class=\"label label-info\">Tipo de Planta</label>";
                                        echo "<p> ".$gpec_species[0]->species_plant_growth_form."</p>";
                                    }?>
                                    <?php if (count($invasive_route)>0){
                                        echo "<label class=\"label label-info\">Ruta de entrada y proliferación</label>";
                                        echo "<ul>";
                                        foreach ($invasive_route as $invasive){
                                            echo "<li>".$invasive->invasive_entry_route."</li>";
                                        }
                                        echo "</ul>";
                                    }?>

                                    <p><label class="label label-info">Tipo de impacto registrado</label></p>
                                    <?php if ($gpec_species[0]->species_is_itseffectunknown != ""){
                                        echo "<p>  ".$gpec_species[0]->species_is_itseffectunknown."</p>";
                                    }?>
                                    <p>
                                        <?php if (count($invasive_impact)>0) { ?>
                                            <ul>
                                                <li>invasive_impact_lookup</li>
                                                <?php
                                                foreach ($invasive_impact as $impact){
                                                    echo "<li>". $impact->invasive_impact_lookup."</li>";
                                                }
                                                ?>
                                            </ul>
                                        <?php } ?>
                                    </p>

                                    <p>
                                        <label class="label label-info">Sumario</label>
                                        <?php echo "species_invasive_narrative no esta?" ?>
                                    </p>

                                    <?php if (count($habitat)>0) { ?>
                                        <p>
                                            <label class="label label-info">Tipos de hábitats usados por este taxón</label>
                                            <ul>
                                                <?php foreach ($habitat as $hab){
                                                    echo "<li>". $hab->habitats_lookup."</li>";
                                                }?>
                                            </ul>
                                        </p>
                                    <?php } ?>

                                    <?php if (count($protected)>0) { ?>
                                        <p><label class="label label-info">Áreas Protegidas donde ha sido registrada su presencia</label>
                                        <ul>
                                            <?php foreach ($protected as $prot){
                                                echo "<li>".$prot->ap_name."</li>";
                                            }?>
                                        </ul>
                                        </p>
                                    <?php } ?>

                                    <?php if (count($use_lookup)>0) { ?>
                                        <p><label class="label label-info">Usos del taxón en Cuba</label>
                                        <ul>
                                            <?php foreach ($use_lookup as $uses){
                                                echo "<li>". $uses->use_lookup."</li>";
                                            }?>
                                        </ul>
                                        </p>
                                    <?php } ?>

                                    <?php if (count($references)>0) { ?>
                                        <div>
                                            <label class="label label-info"> Referencias </label>
                                            <br/>
                                            <ul>
                                                <?php foreach ($references as $ref){
                                                    echo "<span>".$ref->species_referencias_general."</span>";
                                                }?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <?php if (count($assessments)>0) { ?>
                                        <p><label class="label label-info">Citación recomendada</label>
                                            <?php foreach ($assessments as $asset){
                                                echo "<blockquote>". $asset->summary_recommended_citation."</blockquote>";
                                            }?>
                                        </p>
                                    <?php } ?>

                                    <div class="box-for-maps" style="margin-top: 50px;">
                                        <strong>Distribución</strong>
                                        <?php
                                        if (count($locations) > 0){
                                            $timit  = 0;
                                            $shortcode = "[leaflet-map lat=21.175525785037447 lng=-78.22061238986527 zoom=6 height=350 width=100% ][leaflet-marker]";
                                            $max = count($locations);
                                            for ($i=0;$i < $max;$i++){
                                                if ($locations[$i]->location_latitude != "" || $locations[$i]->location_longitud != ""){
                                                    $shortcode .= "[leaflet-marker lat={$locations[$i]->location_latitude} lng={$locations[$i]->location_longitud} ]{$locations[$i]->location_name}[/leaflet-marker]" ;
                                                }
                                            }
                                            echo do_shortcode($shortcode);
                                            //var_dump($shortcode);
                                        }
                                        else{
                                            echo "No existen datos registrados!";
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>