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
        <div class="page-content container">
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
                                $invasive = $obj->get_list_data_taxon("gpec_invasive",$internal_taxon_id);
                                $invasive_route = $obj->get_list_data_taxon("gpec_invasive_entry_route",$internal_taxon_id);
                                $invasive_impact = $obj->get_list_data_taxon("gpec_invasive_impact",$internal_taxon_id);
                                $locations = $obj->get_list_data_taxon("gpec_distribution",$internal_taxon_id);
                                //var_dump($gpec_species);
                                ?>
                                <?php do_action('back_button'); ?>
                                <h3>Registro de plantas introducidas e invasoras en Cuba</h3>

                                <strong> Hoja de Datos </strong>
                                <h4><?php if ($gpec_species[0]->species_htmlname != "") {
                                        echo $gpec_species[0]->species_htmlname;
                                    }
                                    else { echo "No tiene datos registrados"; }
                                    ?>
                                    <?php
                                    if (count($common) > 0)
                                        foreach ($common as $names){
                                            echo "<p>".$names->common_name."</p>";
                                        }
                                    else
                                        echo "<br/>Nombre comun<br/> No tiene registros";
                                    ?>
                                </h4>
                                <p>
                                    <strong class="">Datos de Taxonom&iacute;a y Nomenclatura</strong><br/>
                                </p>
                                <p>
                                    <?php if ($gpec_species[0]->species_family != "") {
                                        echo $gpec_species[0]->species_family;
                                    }
                                    ?>
                                    <?php
                                    if ($gpec_species[0]->species_ordername != ""){
                                        echo " / ".$gpec_species[0]->species_ordername;
                                    }
                                    ?>
                                    <?php
                                    if ($gpec_species[0]->species_classname != ""){
                                        echo " / ".$gpec_species[0]->species_classname;
                                    }
                                    ?>
                                </p><br/>
                                <?php if (count($synonyms )>0){ ?>
                                    <?php foreach ($synonyms as $syn){
                                        echo "<p>".$syn->synonyms_htmlname."</p>";
                                    }
                                }
                                else { echo "Información no disponible"; }
                                ?>

                                <div class="">
                                    <strong>Estatus de la especie en Cuba</strong>
                                    <?php if ($gpec_species[0]->species_origen != ""){
                                        echo "<p>  ".$gpec_species[0]->species_origen."</p>";
                                    }
                                    else { echo "Información no disponible"; }
                                    ?>
                                    <?php if ($invasive[0]->species_is_naturalized != ""){
                                        echo "<p>  ".$invasive[0]->species_is_naturalized."</p>";
                                    }
                                    else { echo "Información no disponible"; }
                                    ?>
                                    <?php if ($invasive[0]->species_is_invasive != ""){
                                        echo "<p>  ".$invasive[0]->species_is_invasive."</p>";
                                    }
                                    else { echo "Información no disponible"; }
                                    ?>
                                    <?php if ($invasive[0]->species_is_atransformer != ""){
                                        echo "<p> Transformadora ".$invasive[0]->species_is_atransformer."</p>";
                                    }
                                    else { echo "Información no disponible"; }
                                    ?>
                                    <?php if ($invasive[0]->species_is_aweed != ""){
                                        echo "<p> Maleza ".$invasive[0]->species_is_aweed."</p>";
                                    }
                                    else { echo "Información no disponible"; }
                                    ?>
                                    <?php
                                    echo "Referencia de naturalización en Cuba<br/>";
                                    echo "Informacion no disponible<br/>";
                                    if ($gpec_species[0]->species_naturalization_reference != "" and $gpec_species[0]->species_naturalization_reference != "Null"){
                                        echo "<p>   ".$gpec_species[0]->species_naturalization_reference."</p>";
                                    }
                                    else { echo "Información no disponible"; }
                                    ?>
                                    <?php if ($gpec_species[0]->species_herbarium_specimen != "" and $gpec_species[0]->species_herbarium_specimen != "Null"){
                                        echo "<p>   ".$gpec_species[0]->species_herbarium_specimen."</p>";
                                    }?>
                                    <?php if ($gpec_species[0]->species_origen_notes != "" and $gpec_species[0]->species_origen_notes != "Null"){
                                        echo "<p>   ".$gpec_species[0]->species_origen_notes."</p>";
                                    }?>
                                    <p>
                                        <strong>Resumen de su estatus actual</strong><br/>
                                        <?php echo "Informacion no disponible" ?>
                                    </p>
                                    <?php if ($gpec_species[0]->species_plant_growth_form != "" and $gpec_species[0]->species_plant_growth_form != "Null"){
                                        echo "<strong>Tipo de Planta</strong>";
                                        echo "<p> ".$gpec_species[0]->species_plant_growth_form."</p>";
                                    }?>
                                    <?php if (count($invasive_route)>0){
                                        echo "<strong>Ruta de entrada y proliferación</strong>";
                                        echo "<ul>";
                                        foreach ($invasive_route as $invasive_entr){
                                            echo "<li>".$invasive_entr->invasive_entry_route."</li>";
                                        }
                                        echo "</ul>";
                                    }?>

                                    <p><strong>Tipo de impacto registrado</strong></p>
                                    <p>
                                        <?php if (count($invasive_impact)>0) { ?>
                                            <ul>
                                                <?php
                                                foreach ($invasive_impact as $impact){
                                                    echo "<li>". $impact->invasive_impact_lookup."</li>";
                                                }
                                                ?>
                                            </ul>
                                        <?php } ?>
                                    </p>
                                    <p>
                                        <strong>Invasion,Impacto y control en Cuba</strong><br/>
                                        <?php echo "Informacion no disponible" ?>
                                    </p>

                                    <?php if (count($habitat)>0) { ?>
                                        <p>
                                            <strong>Tipos de hábitats donde ha sido registrado</strong>
                                            <ul>
                                                <?php foreach ($habitat as $hab){
                                                    echo "<li>". $hab->habitats_lookup."</li>";
                                                }?>
                                            </ul>
                                        </p>
                                    <?php } ?>

                                    <?php if (count($protected)>0) { ?>
                                        <p><strong>Áreas Protegidas donde ha sido registrada su presencia</strong>
                                        <ul>
                                            <?php foreach ($protected as $prot){
                                                echo "<li>".$prot->ap_name."</li>";
                                            }?>
                                        </ul>
                                        </p>
                                    <?php } ?>

                                    <?php if (count($use_lookup)>0) { ?>
                                        <p><strong>Usos del taxón en Cuba</strong>
                                        <ul>
                                            <?php foreach ($use_lookup as $uses){
                                                echo "<li>". $uses->use_lookup."</li>";
                                            }?>
                                        </ul>
                                        </p>
                                    <?php } ?>

                                    <?php if (count($references)>0) { ?>
                                        <div>
                                            <strong> Referencias </strong>
                                            <br/>
                                            <ul>
                                                <?php foreach ($references as $ref){
                                                    if ($ref->reference_type == "Invasiveness")
                                                        echo "<span>".$ref->species_referencias_general."</span>";
                                                }?>
                                            </ul>
                                        </div>
                                    <?php } ?>

                                        <p>
                                            <strong>Citación recomendada</strong>
                                                <p>Información no disponible</p>
                                        </p>

                                    <div class="box-for-maps" style="margin-top: 50px;">
                                        <strong>Distribución</strong>
                                        <?php
                                        if (count($locations) > 0){
                                            $timit  = 0;
                                            $shortcode = "[leaflet-map lat=21.175525785037447 lng=-78.22061238986527 zoom=6 height=350 width=100% zoomcontrol=1 !scrollwheel min_zoom=5 max_zoom=12]";
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