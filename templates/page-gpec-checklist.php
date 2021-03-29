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
                                    <label class="label label-info">Sin&oacute;nimos</label>
                                    <?php
                                    if (count($synonyms) > 0)
                                        foreach ($synonyms as $syn){
                                            echo "<p>".$syn->synonyms_htmlname."</p>";
                                        }
                                    else
                                        echo "No tiene registros";
                                    ?>
                                </div>
                                <div class="panel">
                                    <div>Estatus de la especie en Cuba según su origen biogeográfico: <br/>
                                        <?php
                                        if($gpec_species[0]->species_origen != "")
                                            echo $gpec_species[0]->species_origen;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </div>
                                    <p>Notas sobre su origen:<br/>
                                        <?php
                                        if($gpec_species[0]->species_origen_notes != "")
                                            echo $gpec_species[0]->species_origen_notes;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </p>
                                    <p>Endémico de Cuba:<br/>
                                        <?php
                                        if($gpec_species[0]->species_endemism != "")
                                            echo $gpec_species[0]->species_endemism;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </p>
                                    <p> <br/>
                                        <?php
                                        if($gpec_species[0]->species_endemism_type != "")
                                            echo $gpec_species[0]->species_endemism_type;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </p>
                                    <p>Estatus actual en Cuba: <br/>
                                        <?php
                                        if($gpec_species[0]->species_presence != "")
                                            echo $gpec_species[0]->species_presence;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </p>
                                    <p> Espécimen de herbario u otra fuente de referencia <br/>
                                        <?php
                                        if($gpec_species[0]->species_herbarium_specimen != "")
                                            echo $gpec_species[0]->species_herbarium_specimen;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </p>
                                    <p>
                                        <?php
                                        if($gpec_species[0]->species_presence_reference != "")
                                            echo $gpec_species[0]->species_presence_reference;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </p>
                                    <p> Tipo de planta <br/>
                                        <?php
                                        if($gpec_species[0]->species_plant_growth_form != "")
                                            echo $gpec_species[0]->species_plant_growth_form;
                                        else
                                            echo "No tiene registro";
                                        ?>
                                    </p>
                                    <p>Tipo de hábitat donde crece esta planta:
                                    <ul>
                                        <?php
                                        if (count($habitat) > 0)
                                            foreach ($habitat as $hab){
                                                echo "<p>".$hab->habitats_lookup."</p>";
                                            }
                                        else
                                            echo "No tiene registros";
                                        ?>
                                    </ul>
                                    </p>
                                    <p>Usos reportados para esta planta en Cuba:
                                    <ul>
                                        <?php
                                        if (count($use_lookup) > 0)
                                            foreach ($use_lookup as $uses){
                                                echo "<p>".$uses->use_lookup."</p>";
                                            }
                                        else
                                            echo "No tiene registros";
                                        ?>
                                    </ul>
                                    <div>Referencias:<br/>
                                        <ul>
                                            <?php
                                            if (count($references) > 0)
                                                foreach ($references as $ref){
                                                    echo "<p>".$ref->species_referencias_general."</p>";
                                                }
                                            else
                                                echo "No tiene registros";
                                            ?>
                                        </ul>
                                    </div>
                                    <p>
                                        <?php
                                        if( count($redlist)>0 ){ ?>
                                            <a class="bg-info" href="<?php  echo get_site_url(add_query_arg(array($_GET), $wp->request))."/gpec-redlist/?id={$gpec_species[0]->id}";?>">
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