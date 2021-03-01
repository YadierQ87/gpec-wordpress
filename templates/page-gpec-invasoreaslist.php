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
                                <h4> <?= $gpec_species[0]->species_htmlname; ?>
                                    <?php
                                        foreach ($common as $names) {
                                            echo "<span>" . $names->common_name . "</span>";
                                        }
                                    ?>
                                </h4>
                                <h4> <?= $gpec_species[0]->species_family; ?> & <?= $gpec_species[0]->species_ordername; ?> & <?= $gpec_species[0]->species_division; ?></h4>
                                <h4>
                                    <label class="label label-info">Datos de Taxonom&iacute;a y Nomenclatura</label>
                                    <?php foreach ($synonyms as $syn){
                                        echo "<p>".$syn->synonyms_htmlname."</p>";
                                    }?>
                                </h4>
                                <div class="">
                                    <label class="label label-info">Origen e Invasibilidad</label>
                                    <p>species_origen <?= $gpec_species[0]->species_origen; ?></p>
                                    <p>species_is_naturalized <?= $gpec_species[0]->species_is_naturalized; ?></p>
                                    <p>species_is_invasive <?= $gpec_species[0]->species_is_invasive; ?></p>
                                    <p>species_is_atransformer <?= $gpec_species[0]->species_is_atransformer; ?></p>
                                    <p>species_is_aweed <?= $gpec_species[0]->species_is_aweed; ?></p>
                                    <p>species_naturalization_reference <?= $gpec_species[0]->species_naturalization_reference; ?></p>
                                    <p>species_herbarium_specimen <?= $gpec_species[0]->species_herbarium_specimen; ?></p>
                                    <p>species_origen_notes <?= $gpec_species[0]->species_origen_notes; ?></p>

                                    <p><label class="label label-info">Justificación de invasivibilidad en Cuba</label>
                                        <?= "species_invasive_rationale no esta?" ?></p>

                                    <label class="label label-info">Tipo de Planta</label>
                                    <p> <?= $gpec_species[0]->species_plant_growth_form; ?></p>

                                    <p><label class="label label-info">Ruta de entrada y proliferación</label>
                                    <ul>
                                        <?php foreach ($invasive_route as $invasive){
                                            echo "<li>".$invasive->invasive_entry_route."</li>";
                                        }?>
                                    </ul>
                                    </p>
                                    <p><label class="label label-info">Tipo de impacto registrado</label></p>
                                    <p>species_is_itseffectunknown <?= $gpec_species[0]->species_is_itseffectunknown; ?>
                                    <ul><li>invasive_impact_lookup</li>
                                        <?php
                                        foreach ($invasive_impact as $impact){
                                            echo "<li>". $impact->invasive_impact_lookup."</li>";
                                        }
                                        ?>
                                    </ul>
                                    </p>

                                    <p><label class="label label-info">Sumario</label>
                                        <?= "species_invasive_narrative no esta?" ?> </p>


                                    <p><label class="label label-info">Tipos de hábitats usados por este taxón</label>
                                    <ul>
                                        <?php foreach ($habitat as $hab){
                                            echo "<li>". $hab->habitats_lookup."</li>";
                                        }?>
                                    </ul>
                                    </p>


                                    <p><label class="label label-info">Áreas protegidas</label>
                                        <ul>
                                            <?php foreach ($protected as $prot){
                                                echo "<li>".$prot->ap_name."</li>";
                                            }?>
                                        </ul>
                                    </p>

                                    <p><label class="label label-info">Usos del taxón en Cuba</label>
                                    <ul>
                                        <?php foreach ($use_lookup as $uses){
                                            echo "<li>". $uses->use_lookup."</li>";
                                        }?>
                                    </ul>

                                    <div>
                                        <label class="label label-info"> Referencias </label>
                                        <br/>
                                        <ul>
                                            <?php foreach ($references as $ref){
                                                echo "<span>".$ref->species_referencias_general."</span>";
                                            }?>
                                        </ul>
                                    </div>

                                    <p><label class="label label-info">Citación recomendada</label>
                                        <?php foreach ($assessments as $asset){
                                            echo "<blockquote>". $asset->summary_recommended_citation."</blockquote>";
                                        }?>
                                    </p>
                                    <div class="box-for-maps" style="margin-top: 50px;">
                                        <strong>Distribuci&oacute;n</strong>
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