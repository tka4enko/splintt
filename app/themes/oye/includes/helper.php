<?php
Class Helper {
    public static function getVar($var = "", $default = "", $checkempty=false)
    {
        $value = isset($_REQUEST[$var]) ? $_REQUEST[$var] : $default;
        if ($checkempty) {
            $value = empty($value) ? $default : $value;
        }
        return $value;
    }


    public static function getValue($value = "", $default = "", $args=array())
    {
        $args = Helper::shortcode_atts(array(
            'append' => "",
            'prepend' => "",
        ), $args);

        if (empty($value)) {
            return $default;
        }
        if ($args["append"])  $value .= $args["append"];
        if ($args["prepend"])  $value = $args["prepend"].$value;
        return $value;
    }

    /* above function checkvar will not work incase of direct variables for example $demo->name 
        if i have array return empty so there is no name variable now but if i use above function check var it will still gives error "trying to get property of non-object"
        so i created below function
        Undefined Index, Undefined Variable
    */

    public static function getDefault(&$isset, $default="") {
        return isset($isset) ? $isset : $default;
    }


    public static function issetAndNotEmpty($var = "")
    {
        $value = isset($var) ? $var : false;
        $value = empty($value) ? false : true;
        return $value;
        
    }


    public static function shortcode_atts( $pairs, $atts) {
        $atts = (array)$atts;
        $out = array();
        foreach ($pairs as $name => $default) {
            if ( array_key_exists($name, $atts) )
                $out[$name] = $atts[$name];
            else
                $out[$name] = $default;
        }


        return $out;
    }


    public static function jsonResponse($status = "0", $body = "", $args = [])
    {
        $args["status"] = $status;
        $args["body"] = $body;
             
        return json_encode($args);
    }

    public static function dropdown($name, $emptytext, $class, array $options, $selected = null)
    {

        /*** begin the select ***/
        $dropdown = '<select class="' . $class . '" name="' . $name . '" id="' . $name . '">' . "\n";

        if ($emptytext) {
            $dropdown .= '<option value="">' . $emptytext . '</option>';
        }
        $selected = $selected;
        /*** loop over the options ***/
        foreach ($options as $key => $option) {
            /*** assign a selected value ***/
            $select = $selected == $key ? ' selected' : null;

            /*** add each option to the dropdown ***/
            $dropdown .= '<option value="' . $key . '"' . $select . '>' . $option . '</option>' . "\n";
        }

        /*** close the select ***/
        $dropdown .= '</select>' . "\n";

        /*** and return the completed dropdown ***/
        return $dropdown;
    }

    public function numberDropdown($name, $selected = null)
    {
        $query = 'SELECT * from cpm_property_type';
        $options = db_query($query)->fetchAll();

        /*** begin the select ***/
        $dropdown = '<select name="' . $name . '" id="' . $name . '">' . "\n";

        $selected = $selected;
        /*** loop over the options ***/
        foreach ($options as $option) {
            // var_dump($option);
            /*** assign a selected value ***/
            $select = $selected == $option->id ? ' selected' : null;

            $subtype_json = CPM_Property::getPropertySubTypeJSON($option->id);
            /*** add each option to the dropdown ***/
            $dropdown .= '<option data-childs="' . $subtype_json . '" data-alias="' . $option->alias . '" value="' . $option->id . '"' . $select . '>' . $option->name . '</option>' . "\n";
        }

        /*** close the select ***/
        $dropdown .= '</select>' . "\n";

        /*** and return the completed dropdown ***/
        return $dropdown;
    }

    function set_breadcrumb($array) {
        $breadcrumb = $array;
        if (!empty($breadcrumb)) {
            $crumbs = '<ul class="breadcrumbs">';
            foreach($breadcrumb as $value) {
                if ($value[1])  {
                    $value = '<a href="'.$value[1].'">'.$value[0].'</a>';
                } else {
                    $value = $value[0];
                }
                $crumbs .= '<li>'.$value.'</li>';
            }
            $crumbs .= '</ul>';
        }
        return $crumbs;
    }
    
    public static function human_to_machine($human_name)
    {
        return strtolower(preg_replace(array(
            '/[^a-zA-Z0-9]+/',
            '/-+/',
            '/^-+/',
            '/-+$/',
        ), array('-', '-', '', ''), $human_name));
    }


    // Function to break text upto specific limit and add ellipse
    public static function break_text($string, $limit=200, $is_elipse=true) {   
        $newstring = strip_tags($string);
        $newstring = substr($newstring, 0, $limit);
        $ellipse_text = $is_elipse ? "..." : "";
        $ellipse_text = strlen($string) == strlen($newstring) ? "" : $ellipse_text;
        return $newstring.$ellipse_text;
    }



    public static function readmoredata($data,$limit,$readmorebtn=0) {
        if (strlen($data) > $limit) {
            $data = strip_tags($data);
            $firstdata = substr($data, 0, $limit);
            $firstdata .= '...';
            if ($readmorebtn) {
                $lastdata = substr($data, $limit);
                $output = '<div data-overview-text="'.$firstdata.'" data-full-text="'.$data.'" class="readmore-data">'.$firstdata.'</div><a class="rooms-readmore-btn readmore-style1" data-less="'.t('READ LESS').'" data-more="'.t('READ MORE').'" href="#">'.t('READ MORE').'</a>';
                return $output;
            } else {
                return $firstdata;
            }
        } else {
            return $data;
        }
    }


    public static function jqx_BuildWhere()
    {

        // filter data.
        if (isset($_GET['filterscount'])) {
            $filterscount = $_GET['filterscount'];

            if ($filterscount > 0) {
                $where = " WHERE (";
                $tmpdatafield = "";
                $tmpfilteroperator = "";
                for ($i = 0; $i < $filterscount; $i++) {
                    // get the filter's value.
                    $filtervalue = $_GET["filtervalue" . $i];
                    // get the filter's condition.
                    $filtercondition = $_GET["filtercondition" . $i];
                    // get the filter's column.
                    $filterdatafield = $_GET["filterdatafield" . $i];
                    // get the filter's operator.
                    $filteroperator = $_GET["filteroperator" . $i];

                    if ($tmpdatafield == "") {
                        $tmpdatafield = $filterdatafield;
                    } else if ($tmpdatafield != $filterdatafield) {
                        $where .= ")AND(";
                    } else if ($tmpdatafield == $filterdatafield) {
                        if ($tmpfilteroperator == 0) {
                            $where .= " AND ";
                        } else {
                            $where .= " OR ";
                        }

                    }

                    // build the "WHERE" clause depending on the filter's condition, value and datafield.
                    switch ($filtercondition) {
                        case "CONTAINS":
                            $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue . "%'";
                            break;
                        case "DOES_NOT_CONTAIN":
                            $where .= " " . $filterdatafield . " NOT LIKE '%" . $filtervalue . "%'";
                            break;
                        case "EQUAL":
                            $where .= " " . $filterdatafield . " = '" . $filtervalue . "'";
                            break;
                        case "NOT_EQUAL":
                            $where .= " " . $filterdatafield . " <> '" . $filtervalue . "'";
                            break;
                        case "GREATER_THAN":
                            $where .= " " . $filterdatafield . " > '" . $filtervalue . "'";
                            break;
                        case "LESS_THAN":
                            $where .= " " . $filterdatafield . " < '" . $filtervalue . "'";
                            break;
                        case "GREATER_THAN_OR_EQUAL":
                            $where .= " " . $filterdatafield . " >= '" . $filtervalue . "'";
                            break;
                        case "LESS_THAN_OR_EQUAL":
                            $where .= " " . $filterdatafield . " <= '" . $filtervalue . "'";
                            break;
                        case "STARTS_WITH":
                            $where .= " " . $filterdatafield . " LIKE '" . $filtervalue . "%'";
                            break;
                        case "ENDS_WITH":
                            $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue . "'";
                            break;
                    }

                    if ($i == $filterscount - 1) {
                        $where .= ")";
                    }

                    $tmpfilteroperator = $filteroperator;
                    $tmpdatafield = $filterdatafield;
                }

                return $where;
            }
        }
    } // end filterGrid func





    public static function currencyToSymbol($currency='eur') {
        $currency_symbol = "€";

        if ($currency=='eur') {
            $currency_symbol = "€";
        }
        if ($currency=='gbp') {
            $currency_symbol = "£";
        }

        return $currency_symbol;
    }


    public static function numberTOEuroLabel($number) {
        $temp=number_format((float)$number, 2, '.', '');
        $inter =number_format($temp,2);
        $temp1=str_replace(',','.',$inter);
        $final=substr_replace($temp1,',',-3,1);
        return "&euro; ".$final;
    }


}



Class DateHelper{
    /*
        Dates in the m/d/y or d-m-y formats are disambiguated by looking at the separator between the various components: 
        if the separator is a slash (/), then the American m/d/y is assumed; whereas if the separator is a dash (-) or a dot (.), 
        then the European d-m-y format is assumed.
    */
    public static function getDateDiff($date1,$date2){
        $startTime = strtotime( $date1);
        $endTime = strtotime($date2 );
        $days = ($endTime - $startTime) / 86400;
        return $days;
    }

    public static function compareGreaterthanEqualto($date1,$date2){
        $startTime = strtotime( $date1);
        $endTime = strtotime($date2 );
        if ($startTime >= $endTime) {
            return true;
        }
        return false;
    }

    public static function getDateFormats($date) {
        $timestamp = strtotime($date);
        $format["ymd"] = date('Y-m-d', $timestamp);
        $format["dmy"] = date('d-m-Y', $timestamp);
        $format["dmy_slash"] = date('d/m/Y', $timestamp);
        $format["mdy"] = date('m/d/Y', $timestamp);
        return $format;
    }

}