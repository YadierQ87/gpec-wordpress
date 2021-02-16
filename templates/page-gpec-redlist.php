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
                            $synonims = $obj->get_list_data_taxon("gpec_synonyms",$internal_taxon_id);
                            $protected = $obj->get_list_data_taxon("gpec_protected_areas",$internal_taxon_id);
                            $use_lookup = $obj->get_list_data_taxon("gpec_use",$internal_taxon_id);
                            $references = $obj->get_list_data_taxon("gpec_references",$internal_taxon_id);
                            $assessments = $obj->get_list_data_taxon("gpec_assessments",$internal_taxon_id);
                            $invasive_route = $obj->get_list_data_taxon("gpec_invasive_entry_route",$internal_taxon_id);
                            $invasive_impact = $obj->get_list_data_taxon("gpec_invasive_impact",$internal_taxon_id);
                            $locations = $obj->get_list_data_taxon("gpec_distribution",$internal_taxon_id);
                            $redlist = $obj->get_list_data_taxon("gpec_assessments",$internal_taxon_id);
                            $threats = $obj->get_list_data_taxon("gpec_threats",$internal_taxon_id);
                            $research_needed = $obj->get_list_data_taxon("gpec_research_needed",$internal_taxon_id);
                            $conservation_needed = $obj->get_list_data_taxon("gpec_conservation_needed",$internal_taxon_id);
                            //var_dump($gpec_species);
                            ?>

                            <?php do_action('back_button'); ?>

                            <h3>Registro de plantas Lista Roja en Cuba</h3>
                            <div class="card panel">
                                <h4> <?= $gpec_species[0]->species_family; ?> &
                                    <?= $gpec_species[0]->species_ordername; ?> &
                                    <?= $gpec_species[0]->species_division; ?>
                                </h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th> Hoja de taxón </th>
                                        <th>Red list Tag</th>
                                    </tr>
                                    <tr>
                                        <td><?= $redlist[0]->redlist_rationale ?></td>
                                        <td>
                                            <label class="label label-danger"><?= $redlist[0]->redlist_category ?></label>
                                            <label class="label label-danger"><?= $redlist[0]->redlist_tag ?></label>
                                        </td>
                                    </tr>
                                    </thead>
                                </table>
                                <div>
                                    <p><strong>TAXONOMÍA</strong> <?= $redlist[0]->redlist_assessment_scope ?> </p>
                                    <p><?= $gpec_species[0]->species_htmlname; ?></p>
                                    <p><strong>Sinonimos</strong>
                                        <?= $synonims[0]->synonyms_htmlname ?>
                                        <ul>
                                            <li>Familia: <?= $gpec_species[0]->species_family ?> </li>
                                            <li>Orden: <?= $gpec_species[0]->species_ordername ?></li>
                                            <li>Clase: <?= $gpec_species[0]->species_classname ?> </li>
                                            <li>División: <?= $gpec_species[0]->species_division ?> </li>
                                        </ul>
                                    </p>
                                    <p>
                                        <strong>Apuntes taxonómicos</strong><br/>
                                        <?= $gpec_species[0]->species_taxonomic_notes ?>
                                    </p>
                                    <p><strong>NOMBRES COMUNES</strong>
                                        species.summary.common.names Este campo no existe??!! </p>
                                    <p><strong>HÁBITAT Y ECOLOGÍA </strong> <br/>
                                        <?= $assessments[0]->habitat_narrative ?>
                                    </p>
                                    <p><strong>DISTRIBUCIÓN  </strong> <br/>
                                        <?= $assessments[0]->range_narrative ?>
                                    </p>
                                </div>
                            </div>
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
                            <p><strong>POBLACIÓN  </strong> <br/>
                                <?= $assessments[0]->population_narrative ?>
                            </p>
                            <p><strong>AMENAZAS  </strong> <br/>
                                <?= $assessments[0]->threats_narrative ?>
                            </p>
                            <p><strong>USO Y COMERCIO  </strong> <br/>
                                <?= $assessments[0]->uses_narrative ?>
                            </p>
                            <p><strong>CONSERVACIÓN  </strong> <br/>
                                <?= $assessments[0]->conservation_actions_narrative ?>
                            </p>
                            <p><strong>REFERENCIAS  </strong> <br/>
                                summary.references
                                Este campo no existe??!! o no lo tengo registrado
                            </p>
                            <p><strong>EVALUADORES  </strong> <br/>
                               <?= $assessments[0]->summary_credit_assessors ?>
                            </p>
                            <p><strong>REVISOR  </strong> <br/>
                               <?= $assessments[0]->summary_credit_reviewers ?>
                            </p>
                            <p><strong>AGRADECIMIENTOS  </strong> <br/>
                               <?= $assessments[0]->redlist_assessment_acknowledgements ?>
                            </p>
                            <p><strong>CITACIÓN RECOMENDADA </strong> <br/>
                                <?= $assessments[0]->summary_recommended_citation ?>
                            </p>
                            <p><strong>ANEXO </strong> <br/>
                                Falta el campo
                            </p>
                            <p><strong>ANEXO </strong> <br/>
                                Falta el campo
                            </p>
                            <div>
                                <strong>Formaciones vegetales</strong>
                                El taxón crece en: <?= $habitat[0]->habitats_lookup ?>
                                Sitios de presencia:
                                    <?= $locations[0]->location_name ?>
                            </div>
                            <table>
                                <tr>
                                    <td>Amenaza(s) identificadas: threats.lookup</td>
                                    <td>Periodo de tiempo : threats.timing</td>
                                </tr>
                                <tr>
                                    <td> Área Protegida: ap_name </td>
                                    <td>Estatus legal: ap.type </td>
                                </tr>




                                Acciones necesarias para la conservación del taxón
                                <ul>
                                    <li>ConservationNeeds.lookup</li>
                                </ul>

                                Investigaciones necesarias para la conservación del taxón
                                <ul>
                                    <li>ResearchNeeds.lookup</li>
                                </ul>

                            </table>

                            <span>Colecciones ex situ de la especie</span></br>
                            <p>exsitucollections.location </p>

                            <p>species.recovery.plan.url</p></br>
                            <p>species.url.pdf.taxon </p>



                        </div>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</main>
<?php get_footer(); ?>
