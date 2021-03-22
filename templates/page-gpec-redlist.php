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
                            $common_names = $obj->get_list_data_taxon("gpec_common_names",$internal_taxon_id);
                            $synonims = $obj->get_list_data_taxon("gpec_synonyms",$internal_taxon_id);
                            $protected = $obj->get_list_data_taxon("gpec_protected_areas",$internal_taxon_id);
                            $use_lookup = $obj->get_list_data_taxon("gpec_use",$internal_taxon_id);
                            $references = $obj->get_list_data_taxon("gpec_references",$internal_taxon_id);
                            $assessments = $obj->get_list_data_taxon("gpec_assessments",$internal_taxon_id);
                            $locations = $obj->get_list_data_taxon("gpec_distribution",$internal_taxon_id);
                            $redlist = $obj->get_list_data_taxon("gpec_assessments",$internal_taxon_id);
                            $threats = $obj->get_list_data_taxon("gpec_threats",$internal_taxon_id);
                            $research_needed = $obj->get_list_data_taxon("gpec_research_needed",$internal_taxon_id);
                            $conservation_needed = $obj->get_list_data_taxon("gpec_conservation_needed",$internal_taxon_id);
                            $exsitu = $obj->get_list_data_taxon("gpec_exsitucollections",$internal_taxon_id);
                            //var_dump($gpec_species);
                            ?>

                            <?php do_action('back_button'); ?>

                            <h3>Lista Roja de la flora de Cuba</h3>
                            <div class="card panel">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4><?= $gpec_species[0]->species_htmlname; ?> - Hoja de taxón</h4>
                                        <p>
                                            <?php if ($redlist[0]->redlist_rationale != ""){
                                                echo $redlist[0]->redlist_rationale;
                                            }
                                            else { echo "No tiene datos registrados"; }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="">
                                            <thead>
                                            <tr>
                                                <th class="label-redlist">
                                                    <?php if ($redlist[0]->redlist_category != ""){
                                                        echo $redlist[0]->redlist_category;
                                                    }
                                                    else { echo "No tiene datos registrados"; }
                                                    ?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="">
                                                    <?php if ($redlist[0]->redlist_criteria != ""){
                                                        echo $redlist[0]->redlist_criteria;
                                                    }
                                                    else { echo "No tiene datos registrados"; }
                                                    ?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="">
                                                    <?php if ($redlist[0]->redlist_criteria != ""){
                                                        echo $redlist[0]->redlist_criteria;
                                                    }
                                                    else { echo "No tiene datos registrados"; }
                                                    ?>
                                                    <?= $redlist[0]->redlist_assessment_scope ?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="">
                                                    <?php if ($redlist[0]->redlist_tag != ""){
                                                        echo $redlist[0]->redlist_tag;
                                                    }
                                                    else { echo "No tiene datos registrados"; }
                                                    ?>
                                                </th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <p><strong>TAXONOMÍA</strong> </p>
                                        <p><?= $gpec_species[0]->species_htmlname; ?></p>
                                        <p><strong>Sin&oacute;nimos</strong>
                                            <?= $synonims[0]->synonyms_htmlname ?>
                                        <ul style="list-style: none;">
                                            <li>Familia: <?php echo ($gpec_species[0]->species_family != "") ? $gpec_species[0]->species_family : "No existe registro";  ?> </li>
                                            <li>Orden: <?php echo ($gpec_species[0]->species_ordername != "") ? $gpec_species[0]->species_ordername : "No existe registro";  ?> </li>
                                            <li>Clase: <?php echo ($gpec_species[0]->species_classname != "") ? $gpec_species[0]->species_classname : "No existe registro";  ?> </li>
                                            <li>División: <?php echo ($gpec_species[0]->species_division != "") ? $gpec_species[0]->species_division : "No existe registro";  ?> </li>
                                        </ul>
                                        </p>
                                        <p>
                                            <strong>Apuntes taxonómicos</strong><br/>
                                            <?php echo ($gpec_species[0]->species_taxonomic_notes != "") ? $gpec_species[0]->species_taxonomic_notes : "No existe registro";  ?>
                                        </p>
                                        <p><strong>NOMBRES COMUNES</strong>
                                        <ul style="list-style: none;">
                                            <?php foreach ($common_names as $common){
                                                echo "<li>".$common->common_name."</li>";
                                            }?>
                                        </ul>
                                        </p>
                                        <p><strong>HÁBITAT Y ECOLOGÍA </strong> <br/>
                                            <?php echo ($assessments[0]->habitat_narrative != "") ? $assessments[0]->habitat_narrative : "No existe registro";  ?>
                                        </p>
                                        <p><strong>DISTRIBUCIÓN  </strong> <br/>
                                            <?php echo ($assessments[0]->range_narrative != "") ? $assessments[0]->range_narrative : "No existe registro";  ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
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
                            <p><strong>POBLACIÓN  </strong> <br/>
                                <?php echo ($assessments[0]->population_narrative != "") ? $assessments[0]->population_narrative : "No existe registro";  ?>
                            </p>
                            <p><strong>AMENAZAS  </strong> <br/>
                                <?php echo ($assessments[0]->threats_narrative != "") ? $assessments[0]->threats_narrative : "No existe registro";  ?>
                            </p>
                            <p><strong>USO Y COMERCIO  </strong> <br/>
                                <?php echo ($assessments[0]->uses_narrative != "") ? $assessments[0]->uses_narrative : "No existe registro";  ?>
                            </p>
                            <p><strong>CONSERVACIÓN  </strong> <br/>
                                <?php echo ($assessments[0]->conservation_actions_narrative != "") ? $assessments[0]->conservation_actions_narrative : "No existe registro";  ?>
                            </p>
                            <p><strong>REFERENCIAS  </strong> <br/>
                            <ul style="list-style: none;">
                                <?php foreach ($references as $ref){
                                    echo "<li>".$ref->species_referencias_general."</li>";
                                }?>
                            </ul>
                            </p>
                            <p><strong>EVALUADORES  </strong> <br/>
                            <ul style="list-style: none;">
                                <?php foreach ($assessments as $amenaza){
                                    echo "<li>".$amenaza->summary_credit_assessors."</li>";
                                }?>
                            </ul>
                            </p>
                            <p><strong>REVISOR  </strong> <br/>
                            <ul style="list-style: none;">
                                <?php foreach ($assessments as $amenaza){
                                    echo "<li>".$amenaza->summary_credit_reviewers."</li>";
                                }?>
                            </ul>
                            </p>
                            <p><strong>AGRADECIMIENTOS  </strong> <br/>
                                <?php echo ($assessments[0]->redlist_assessment_acknowledgements != "") ? $assessments[0]->redlist_assessment_acknowledgements : "No existe registro";  ?>
                            </p>
                            <p><strong>CITACIÓN RECOMENDADA </strong> <br/>
                                <?php echo ($assessments[0]->summary_recommended_citation != "") ? $assessments[0]->summary_recommended_citation : "No existe registro";  ?>
                            </p>

                            <div>
                                <strong>ANEXO </strong> <br/>
                                <strong>Formaciones vegetales</strong></br>
                                <p>El taxón crece en:
                                    <?php echo ($habitat[0]->habitats_lookup != "") ? $habitat[0]->habitats_lookup : "No existe registro";  ?>

                                </p>
                                <strong>Sitios de presencia:</strong>
                                <p>
                                <ul style="list-style: none;">
                                    <?php foreach ($locations as $loc){
                                        echo "<li>".$loc->location_name."</li>";
                                    }?>
                                </ul>
                                </p>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="65%">Amenazas identificadas:</th>
                                        <th width="35%">Per&iacute;odo de tiempo:</th>
                                    </tr>
                                    <?php foreach ($threats as $threat){
                                        echo "<tr><td>".$threat->threats_lookup."</td>
                                        <td>".$threat->threats_timing."</td></tr>";
                                    }?>
                                </table>

                                <table class="table table-bordered">
                                    <tr>
                                        <th width="65%">Área Protegida:</th>
                                        <th width="35%">Estatus legal:</th>
                                    </tr>
                                    <?php foreach ($protected as $prot){
                                        echo "<tr><td>".$prot->ap_name."</td>
                                        <td>".$prot->ap_type."</td></tr>";
                                    }?>
                                </table>

                                <strong>Acciones necesarias para la conservación del tax&oacute;n:</strong>
                                <p>
                                <ul style="list-style: none;">
                                    <?php foreach ($conservation_needed as $cons){
                                        echo "<li>".$cons->conservationneeds_lookup."</li>";
                                    }?>
                                </ul>
                                </p>
                                <strong>Investigaciones necesarias para la conservación del tax&oacute;n:</strong>
                                <p>
                                <ul style="list-style: none;">
                                    <?php foreach ($research_needed as $research){
                                        echo "<li>".$research->researchneeds_lookup."</li>";
                                    }?>
                                </ul>
                                </p>
                                <strong>Colecciones ex situ de la especie:</strong>
                                <p>
                                <ul style="list-style: none;">
                                    <?php foreach ($exsitu as $exi){
                                        echo "<li>".$exi->exsitucollections_location."</li>";
                                    }?>
                                </ul>
                                </p>
                                <strong>Plan de Recuperaci&oacute;n de la especie</strong>
                                <p>
                                    <?php echo ($assessments[0]->Species_recovery_plan_url != "") ? $assessments[0]->Species_recovery_plan_url : "No existe registro";  ?>
                                </p>
                                <p>
                                <ul style="list-style: none;">
                                    <?php foreach ($assessments as $asset){
                                        echo "<li>".$asset->Assessment_PDF_url."</li>";
                                    }?>
                                </ul>
                                </p>
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
