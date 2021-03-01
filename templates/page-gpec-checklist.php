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
                            global $wp;
                            $gpec_species = $obj->get_object_data("gpec_species",$id);
                            $internal_taxon_id = $gpec_species[0]->internal_taxon_id;
                            $synonyms = $obj->get_list_data_taxon("gpec_synonyms",$internal_taxon_id);
                            $habitat = $obj->get_list_data_taxon("gpec_habitats",$internal_taxon_id);
                            $use_lookup = $obj->get_list_data_taxon("gpec_use",$internal_taxon_id);
                            $references = $obj->get_list_data_taxon("gpec_references",$internal_taxon_id);
                            $redlist = $obj->get_list_data_taxon("gpec_assessments",$internal_taxon_id);
                            //var_dump($gpec_species);
                            ?>

                            <?php do_action('back_button'); ?>

                            <h3>Checklist de la flora de Cuba-GPEC</h3>
                            <h4> <?=  $gpec_species[0]->species_htmlname; ?></h4>
                            <div class="">
                                <label class="label label-info">Sin&oacute;nimos</label>
                                <?php foreach ($synonyms as $syn){
                                    echo "<p>".$syn->synonyms_htmlname."</p>";
                                }?>
                            </div>
                            <div class="panel">
                                <p>En Cuba, este taxón es: <?= $gpec_species[0]->species_origen; ?></p>
                                <p>Notas sobre el origen de este tax&oacute;n: <?php echo $gpec_species[0]->species_origen_notes; ?></p>
                                <p>End&eacute;mico: <?php // $gpec_species[0]->species_origen; ?></p>
                                <p>Tipo de end&eacute;mico: <?php echo $gpec_species[0]->species_endemism_type; ?></p>
                                <p>Estatus actual en Cuba: <?= $gpec_species[0]->species_presence; ?></p>
                                <p> Herbarium label <?= $gpec_species[0]->species_herbarium_specimen; ?></p>
                                <p> Preference Reference label <?= $gpec_species[0]->species_presence_reference; ?></p>
                                <p> Tipo de planta: <?= $gpec_species[0]->species_plant_growth_form; ?></p>
                                <p>Tipos de hábitats usados por este taxón:
                                <ul>
                                    <?php foreach ($habitat as $hab){
                                        echo "<li>". $hab->habitats_lookup."</li>";
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
                                </div>
                                <p>Citación recomendada:
                                    NO ESTA ACTUALMENTE!
                                </p>
                                <p>
                                    <?php
                                    if( count($redlist)>0 ){ ?>
                                        <a class="bg-info" href="<?php  echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-redlist/?id={$redlist[0]->id}";?>">
                                            M&aacute;s Informaci&oacute;n
                                        </a>
                                    <?php }
                                    if( $gpec_species[0]->species_origen != "Nativa" ){ ?>
                                    <a class="bg-info" href="<?php  echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-invasoreas/?id={$gpec_species[0]->id}";?>">
                                        M&aacute;s Informaci&oacute;n
                                    </a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>