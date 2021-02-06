<?php
/**
 * Template Name: Listing detail Template
 * Template Post Type: post
 *
 * @package WordPress
 * page checklist
 */

get_header();
?>
<main id="site-content" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="listing-detail">
                    <section style="margin-top: 150px;">
                        <h2>T&iacute;tulo</h2>
                        <article>
                            <div>
                                <?php
                                $obj = new Gpec_Report();
                                $id = $_REQUEST["id"];
                                $gpec_species = $obj->get_object_data("gpec_species",$id);
                                $internal_taxon_id = $gpec_species[0]->internal_taxon_id;
                                $habitat = $obj->get_list_data_taxon("gpec_habitats",$internal_taxon_id);
                                $use_lookup = $obj->get_list_data_taxon("gpec_use",$internal_taxon_id);
                                $references = $obj->get_list_data_taxon("gpec_references",$internal_taxon_id);
                                $assessments = $obj->get_list_data_taxon("gpec_assessments",$internal_taxon_id);
                                //var_dump($gpec_species);
                                ?>
                                <table class="table table-bordered form-table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?= $gpec_species[0]->species_htmlname; ?></th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>En Cuba, este tax&oacute;n es</td>
                                        <td> <?= $gpec_species[0]->species_origen; ?>  </td>
                                    </tr>
                                    <tr>
                                        <td>End&eacute;mico:</td>
                                        <td> <?= $gpec_species[0]->species_endemism; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de end&eacute;mico: </td>
                                        <td> <?= $gpec_species[0]->species_endemism_type; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Notas sobre el origen de este tax&oacute;n:</td>
                                        <td> <?= $gpec_species[0]->species_origen_notes; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Estatus actual en Cuba:</td>
                                        <td> <?= $gpec_species[0]->species_presence; ?>  </td>
                                    </tr>
                                </table>

                                <div>
                                    <h6>Su presencia en Cuba est&aacute; confirmada por el ejemplar de herbario:</h6>
                                    <div> <?= $gpec_species[0]->species_herbarium_specimen; ?> y/o por <?= $gpec_species[0]->species_presence_reference; ?></div>
                                    <div> Notas: <?= $gpec_species[0]->species_taxonomic_notes; ?> </div>
                                </div>

                                <table>
                                    <tr>
                                        <td>H&aacute;bito o forma de crecimiento de la planta:</td>
                                        <td> <?= $gpec_species[0]->species_plant_growth_form; ?> </td>
                                    </tr>
                                </table>

                                <div>
                                    <h6>Tipos de h&aacute;bitats usados por este tax&oacute;n:</h6>
                                    <div> <?= $habitat[0]->habitats_lookup; ?> </div>
                                </div>

                                <div>
                                    <h6>Usos del tax&oacute;n en Cuba:</h6>
                                    <div> <?= $use_lookup[0]->use_lookup;?> </div>
                                </div>

                                <comment><?= $references[0]->species_referencias_general ?> (sin titular)</comment>
                                <div>Citaci&oacute;n recomendada:
                                    <blockquote> <?= $assessments[0]->species_recommended_citation ?> </blockquote>
                                </div>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>