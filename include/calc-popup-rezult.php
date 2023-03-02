<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
?>


<?

    $fb_html = "";
    $prop = array();
    $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>1));    
    while ($prop_fields = $properties->GetNext()){
        $code = $prop_fields["CODE"];
        $value = $_POST[$prop_fields["CODE"]];

        $value = str_replace("&nbsp;",'',$value);
        $value = str_replace("<sup>",'',$value);
        $value = str_replace("</sup>",'',$value);

        if($value != ""){
            $prop["$code"] = "$value";
    
            $field_name = $prop_fields["NAME"];
            if($value != ""){
                $fb_html = $fb_html."<br><i>".$field_name."</i>: ".$value;
            }else{
                $fb_html = $fb_html."<br><i>".$field_name."</i>: - ";	
            }

            $headers .= $prop_fields["NAME"].": " .$value."<br>";
        }
    }

    $date = $today = date("d-m-Y H:i:s");
    $el = new CIBlockElement;
    $name = "Кредитный калькулятор";
    $title = "$today - $name";
    $arLoadProductArray = Array(
        "IBLOCK_ID" => 1,
        "NAME"           => $title,
        "PREVIEW_TEXT"   => '',
        "DETAIL_TEXT"    => "",
        "DETAIL_PICTURE" => "",
        "PROPERTY_VALUES" => $prop,
    );

    if($PRODUCT_ID = $el->Add($arLoadProductArray)){
            /*  */

    }else{
        echo "Error: ".$el->LAST_ERROR;
    }
?>