<?php
/**
 * Clase Generica para acceder a la BD
 */
class DB_Model{
    /**
     * Devuelve la lista de elementos de una tabla
     * @return items{}
     */
    public function get_list_data($table_name){
        global $wpdb;
        $sql = "SELECT * FROM $table_name ";
        $items = $wpdb->get_results($sql);
        return $items;
    }

    public function exec_sql_ready($sql){
        global $wpdb;
        return$wpdb->get_results($sql);
    }

    public function get_total_count_rows(){
        global $wpdb;
        $sqlTotal = "SELECT FOUND_ROWS() as total";
        $total = $wpdb->get_results($sqlTotal);
        return $total;
    }

    /**
     * Devuelve la lista de 1 atributo de una tabla
     * @return items{}
     */
    public function get_list_distinct_atribute($table_name,$atribute){
        global $wpdb;
        $items = $wpdb->get_results("SELECT DISTINCT $atribute FROM $table_name");
        return $items;
    }
    /**
     * Devuelve la lista de 1 atributo de una tabla en formato json
     * @return json items{}
     */
    public function get_list_json_atribute($table_name,$atribute){
        global $wpdb;
        $items = $wpdb->get_results("SELECT DISTINCT $atribute FROM $table_name ");
        $array = [];
        foreach ($items as $var){
            $array[] = $var->$atribute;
        }
        return ($array);
    }
    /**
     * Devuelve la lista de elementos de una tabla segun internal_taxon_id
     * @return items{}
     */
    public function get_list_data_taxon($table_name,$internal_taxon_id){
        global $wpdb;
        $items = $wpdb->get_results("SELECT * FROM $table_name WHERE internal_taxon_id = '$internal_taxon_id'");
        return $items;
    }
    /**
     * Devuelve el arreglo de un objeto de la tabla segun id
     * @return obj[]
     */
    public function get_object_data($table_name,$id){
        global $wpdb;
        $obj = $wpdb->get_results("SELECT * FROM $table_name WHERE id = '$id'");
        return $obj;
    }
}


class Gpec_Report extends DB_Model{

    /**
     * Devuelve el combobox de una tabla segun atributo a mostrar
     * @return string $combo
     */
    public function get_combo_data($table_name,$atribute,$select,$select_id,$seleccion){

        $combo = "<select name='{$select_id}' id='{$select_id}' class='form-control'><option>{$select}</option>";
        $list = $this->get_list_distinct_atribute($table_name,$atribute);        
        foreach ($list as $val){
            if ($seleccion == $val->$atribute)
                $combo .= "<option selected='selected'>{$val->$atribute}</option>";
            else
                $combo .= "<option>{$val->$atribute}</option>";
        }
        $combo .= "</select>";
        return $combo;
    }

    public function get_query_for_checklist(){

    }





}

