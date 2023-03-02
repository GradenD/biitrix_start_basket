<?
$prop_array = array();
$filter_prop = array("15", "11", "12");

$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBLOCK_ID));
while ($prop_fields = $properties->GetNext()){
    if (in_array($prop_fields["ID"], $filter_prop)) {
        $prop_array[$prop_fields["ID"]]["ID"] = $prop_fields["ID"];
        $prop_array[$prop_fields["ID"]]["NAME"] = $prop_fields["NAME"];
        $prop_array[$prop_fields["ID"]]["PROPERTY_TYPE"] = $prop_fields["PROPERTY_TYPE"];
        $prop_array[$prop_fields["ID"]]["CODE"] = $prop_fields["CODE"];
    
        if($prop_fields["PROPERTY_TYPE"] == "L"){
            $property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$IBLOCK_ID, "CODE"=>$prop_fields["CODE"]));
            while ($enum_fields = $property_enums->GetNext()) {
                //echo $enum_fields["ID"]." - ".$enum_fields["VALUE"]."<br>";
                $prop_array[$prop_fields["ID"]]["VALUES"][$enum_fields["ID"]] = $enum_fields["VALUE"];
            }
        }else{
			$rsResult = CIBlockElement::GetList(
   				array(),
    			array(
                    'IBLOCK_ID' => $IBLOCK_ID,         // ID инфоблока
                    'ACTIVE' => 'Y',            // только активные элементы
                    '!PROPERTY_'.$prop_fields["CODE"].'_VALUE' => false,
                ),
                array('PROPERTY_'.$prop_fields["CODE"])            // группировка по VALUE
            );
            while($arResult=$rsResult->Fetch()){
                /*echo "<pre>";
                print_r($arResult);
                echo "<pre>";*/
                $prop_array[$prop_fields["ID"]]["VALUES"][] = $arResult["PROPERTY_FLOOR_VALUE"];
            }
        }
    }
}

/*$rezultSelect = Array("ID", "NAME", "IBLOCK_ID", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*");
$rezultFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$result = CIBlockElement::GetList(Array(), $rezultFilter, false, Array(), $rezultSelect);
if ($result->SelectedRowsCount()!=0){
    while($obs = $result->GetNextElement()){
        $arProps = $obs->GetProperties();
        $arFields = $obs->GetFields();
    }
}*/

?>

<!--== Start Page Title Area ==-->
<section class="page-title-area" data-bg-img="<?=SITE_TEMPLATE_PATH?>/assets/img/photos/bg-page-title.webp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title text-white">Проекты</h2>
                    <div class="bread-crumbs">
                        <a href="index.html">
                            Главная
                            <span class="breadcrumb-sep">/</span>
                        </a>
                        <span class="active">Проекты</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Page Title Area ==-->





<!--== Start Shop Area Wrapper ==-->
<section class="product-area product-grid-area">
    <div class="container">
        <div class="row flex-row-reverse">  
            <div class="col-lg-9">

                <div class="row">
                    <div class="col-12">
                        <div class="shop-topbar-wrapper">
                            <div class="collection-shorting">
                                <div class="shop-topbar-left">
                                    <div class="view-mode">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                                                <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-list-ul"></i></button>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="product-sorting-wrapper">
                                    <div class="product-show">
                                        <label for="SortBy">Сортировать по</label>
                                        <select class="form-select" id="SortBy" aria-label="Default select example">
                                            <option value="manual">Цена по убыванию</option>
                                            <option value="best-selling">Цена по возрастанию</option>
                                            <option value="title-ascending" selected>Популярные</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab"></div>

                    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab"></div>
                </div>

                <div class="pagination-area">
                    <nav>
                        <ul class="page-numbers">
                            <li>
                                <a class="page-number disabled next" href="#">
                                    <i class="ion-ios-arrow-left"></i>
                                </a>
                            </li>
                            <li>
                                <a class="page-number active" href="#">1</a>
                            </li>
                            <li>
                                <a class="page-number next" href="#">
                                    <i class="ion-ios-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="total-pages">
                        <p></p>
                    </div>
                </div>
            </div>




            <div id="filter-block" class="col-lg-3">
                <div class="shop-sidebar-area">

                    <?
                        foreach ($prop_array as $key => $value) {
                            if($value["VALUES"] != ""){
                                ?>
                                    <div class="widget" data-id="<?=$key?>">
                                        <h3 class="widget-title"><?=$value["NAME"]?></h3>
                                        <div class="widget-list-style">
                                            <ul class="list-filter" data-code="<?=$value["CODE"]?>">
                                                <?
                                                    foreach ($value["VALUES"] as $key2 => $value2) {
                                                        ?>
                                                            <li><a class="item" data-id="<?=$key2?>" data-val="<?=$value2?>" href="javascript:void(0)"><?=$value2?></a></li>
                                                        <?
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
    <!--== End Shop Area Wrapper ==-->

<div id="ajax"></div>

<?
    $filter = array();
?>

<script>
    $( document ).ready(function() {

        function ajax_url(url, block, filter){
            var json;
            json={filter:filter}
            console.log(JSON.stringify(filter));
            $.ajax({
		        type: "POST",
		        url: url,
                data: {
                    filter: JSON.stringify(json),
				},
		        success: function (data) {
			        $(block).html(data);
		        },
	        });
        }

        function filter_action(filter){

            var url = "/include/catalog/products_v1.php";
            var block = "#nav-grid";

            ajax_url(url, block, filter);

            var url = "/include/catalog/products_v2.php";
            var block = "#nav-list";

            ajax_url(url, block, filter);
        }

        var filter = [];
        filter = <?php echo json_encode($filter);?>;
        filter_action(filter);


        $(".list-filter .item").click(function() {
            if($(this).hasClass("active")){
                $(this).removeClass("active");
            }else{
                $(this).addClass("active");
            }

            var filter = {};
            var x = 0;
            /*$("#filter-block a").each(function() {
                if($(this).hasClass("active")){
                    var code = $(this).parents(".list-filter").data("code");
                    if(!Array.isArray(filter[code])){
                        filter[code] = {};
                        console.log($(this).data("val"));
                        var shirt = [];
                    }

                    shirt[x] = $(this).data("val");    
                    x = x + 1;
                    filter[code].push(shirt);
                }
            });*/
            /*$("#filter-block .list-filter").each(function() {

                var code = $(this).data("code");
                var shirt = [];

                filter[code] = {};

                $(this).find("a").each(function() {
                    if($(this).hasClass("active")){
                        shirt[{x}] = $(this).data("val"); 
                        x = x + 1;
                    }
                });
                console.log(shirt);
                filter[code].push(shirt);
            });*/

            var json;
            var shirts = [];

            $('#filter-block .list-filter').each(function () {

                var shirt = {};
                var code = $(this).data("code");
                var flag = "N";

                $(this).find("a").each(function() {
                    if($(this).hasClass("active")){

                        if(!Array.isArray(shirt[code])){
                            shirt[code] = [];
                        }

                        shirt[code][x] = $(this).data("val");
                        x = x + 1;
                        flag = "Y";
                    }
                });
                if(flag == "Y"){
                    shirts.push(shirt); 
                }          
            });

            json={shirts:shirts}

            //console.log(json);
            filter_action(json);
        });

    });
</script>