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
                                    <strong>Taxonomía y Sinónimos</strong></br>
                                    <div>
                                        <span><?=  $gpec_species[0]->species_family; ?>/<?=  $gpec_species[0]->species_ordername; ?>/<?=  $gpec_species[0]->species_classname; ?></span>
                                    </div>
                                    <span>Sin&oacute;nimos</span>
                                    <?php
                                    if (count($synonyms) > 0)
                                        foreach ($synonyms as $syn){
                                            echo "<p>".$syn->synonyms_htmlname."</p>";
                                        }
                                    else
                                        echo "Información no disponibles";
                                    ?>
                                </div>
                                <br/>
                                <div class="panel">
                                    <div><strong>Estatus de la especie en Cuba según su origen biogeográfico</strong> <br/>
                                        <?php
                                        if($gpec_species[0]->species_origen != "" and $gpec_species[0]->species_origen != "Null")
                                            echo $gpec_species[0]->species_origen;
                                        else
                                            echo "Información no disponible";
                                        ?>
                                    </div>
                                    <p><strong>Notas sobre su origen</strong><br/>
                                        <?php
                                        if($gpec_species[0]->species_origen_notes != "" and $gpec_species[0]->species_origen_notes != "Null")
                                            echo $gpec_species[0]->species_origen_notes;
                                        else
                                            echo "Información no disponible";
                                        ?>
                                    </p>
                                    <p><strong>Endémico de Cuba</strong><br/>
                                        <?php
                                        if($gpec_species[0]->species_endemism != "" and $gpec_species[0]->species_endemism != "Null")
                                            echo $gpec_species[0]->species_endemism;
                                        else
                                            echo "Información no disponible";
                                        ?>
                                        <?php
                                        if($gpec_species[0]->species_endemism_type != "" and $gpec_species[0]->species_endemism_type != "Null")
                                            echo $gpec_species[0]->species_endemism_type; ?>
                                    </p>

                                    <p><strong>Estatus actual en Cuba:</strong> <br/>
                                        <?php
                                        if($gpec_species[0]->species_presence != "" and $gpec_species[0]->species_presence != "Null")
                                            echo $gpec_species[0]->species_presence;
                                        else
                                            echo "Información no disponible";
                                        ?>
                                    </p>
                                    <p> <strong>Espécimen de herbario u otra fuente de referencia</strong> <br/>
                                        <?php
                                        if($gpec_species[0]->species_herbarium_specimen != "" and $gpec_species[0]->species_herbarium_specimen != "Null")
                                            echo $gpec_species[0]->species_herbarium_specimen;
                                        else
                                            echo "Información no disponible";
                                        ?>
                                    </p>
                                    <p> <strong>Tipo de planta</strong> <br/>
                                        <?php
                                        if($gpec_species[0]->species_plant_growth_form != "" and $gpec_species[0]->species_plant_growth_form != "Null")
                                            echo $gpec_species[0]->species_plant_growth_form;
                                        else
                                            echo "Información no disponible";
                                        ?>
                                    </p>
                                    <p><strong>Tipo de hábitat donde crece esta planta</strong>
                                    <ul>
                                        <?php
                                        if (count($habitat) > 0)
                                            foreach ($habitat as $hab){
                                                echo "<p>".$hab->habitats_lookup."</p>";
                                            }
                                        else
                                            echo "Información no disponible";
                                        ?>
                                    </ul>
                                    </p>
                                    <p><strong>Usos reportados para esta planta en Cuba</strong>
                                    <ul>
                                        <?php
                                        if (count($use_lookup) > 0)
                                            foreach ($use_lookup as $uses){
                                                echo "<p>".$uses->use_lookup."</p>";
                                            }
                                        else
                                            echo "Información no disponible";
                                        ?>
                                    </ul>
                                    <div><strong>Referencias:</strong><br/>
                                        <ul>
                                            <?php
                                            if (count($references) > 0)
                                                foreach ($references as $ref){
                                                    if ($ref->reference_type == "Presence")
                                                        echo "<p>".$ref->species_referencias_general."</p>";
                                                }
                                            else
                                                echo "Información no disponibles";
                                            ?>
                                        </ul>
                                    </div>
                                    <p>
                                        <?php
                                        if( count($redlist)>0 ){ ?>
                                            <a class="btn btn-info" href="<?php  echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-redlist/?id={$gpec_species[0]->id}";?>">
                                                M&aacute;s Informaci&oacute;n
                                            </a>
                                        <?php }
                                        if( $gpec_species[0]->species_origen != "Nativa" ){ ?>
                                            <a class="btn btn-info" href="<?php  echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-invasoreas/?id={$gpec_species[0]->id}";?>">
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