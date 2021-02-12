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
                                <h4> <?= $gpec_species[0]->species_family; ?> & <?= $gpec_species[0]->species_ordername; ?> & <?= $gpec_species[0]->species_division; ?></h4>
                                <div class="panel">
                                    <p>En Cuba, este taxón es <?= $gpec_species[0]->species_is_invasive; ?>, <?= "species_is_invasive_type no esta?" ?></p>
                                    <p>Notas sobre el origen de este taxón: <?= $gpec_species[0]->species_origen_notes; ?></p>
                                    <p>Su estatus en Cuba está confirmado por <?= $gpec_species[0]->species_naturalization_reference; ?>
                                        y por el ejemplar de herbario <?= $gpec_species[0]->species_herbarium_specimen; ?></p>
                                    <p>Hábito o forma de crecimiento de la planta: <?= $gpec_species[0]->species_plant_growth_form; ?></p>
                                    <p>Ruta de entrada y proliferación:
                                    <ul>
                                        <?php foreach ($invasive_route as $invasive){
                                            echo "<li>".$invasive->invasive_entry_route."</li>";
                                        }?>
                                    </ul>
                                    </p>
                                    <p>Tipo de impacto registrado:
                                    <ul>
                                        <?php foreach ($invasive_impact as $impact){
                                            echo "<li>". $impact->invasive_impact_lookup."</li>";
                                        }?>
                                    </ul>
                                    </p>
                                    <p>Tipos de hábitats usados por este taxón:
                                    <ul>
                                        <?php foreach ($habitat as $hab){
                                            echo "<li>". $hab->habitats_lookup."</li>";
                                        }?>
                                    </ul>
                                    </p>
                                    <p>Justificación de invasivibilidad en Cuba: <?= "species_invasive_rationale no esta?" ?></p>
                                    <p>Ficha de datos de taxon <?= "species_invasive_narrative no esta?" ?> </p>
                                    <p>Áreas protegidas
                                    <ul>
                                        <?php foreach ($protected as $prot){
                                            echo "<li>".$prot->ap_name."</li>";
                                        }?>
                                    </ul>
                                    </p>
                                    <p>Usos del taxón en Cuba:
                                    <ul>
                                        <?php foreach ($use_lookup as $uses){
                                            echo "<li>". $uses->use_lookup."</li>";
                                        }?>
                                    </ul>
                                    <div>Referencias:<br/>
                                        <ul>
                                            <?php foreach ($references as $ref){
                                                echo "<span>".$ref->species_referencias_general."</span>";
                                            }?>
                                        </ul>
                                        (sin  titular)
                                    </div>
                                    <p>Citación recomendada:
                                        <?php foreach ($assessments as $asset){
                                            echo "<blockquote>". $asset->summary_recommended_citation."</blockquote>";
                                        }?>
                                    </p>
                                    <div class="box-for-maps" style="margin-top: 50px;">
                                        <strong>Location</strong>
                                        <?php
                                        echo do_shortcode('[leaflet-map height=350 width=100% zoomcontrol=1 scrollwheel=1 fitbounds]');
                                        foreach ($locations as $location)
                                        {
                                            $munic = $location->location_municipality;
                                            $prov = $location->location_province;
                                            $loc_name = $location->location_name;
                                            $lat = $location->location_latitude;
                                            $long = $location->location_longitud;
                                            echo do_shortcode("[leaflet-marker address='{$munic}, {$prov}' lat={$lat} lng={$long} zoom=5]{$loc_name}[/leaflet-marker]" );
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