<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
?>



<div class="row">
<?
    if($_POST["filter"] != ""){
        $filter = json_decode($_POST["filter"]);
        $filter = json_decode(json_encode($filter), true);
        $filter = $filter["filter"]["shirts"];
        /*?>
            <pre>
                <?print_r($filter)?>
            </pre>
        <?*/
    }else{
       // echo "false";
    }

    $IBLOCK_ID = 3;

    $rezultFilter["IBLOCK_ID"] = $IBLOCK_ID;
    $rezultFilter["ACTIVE_DATE"] = "Y";
    $rezultFilter["ACTIVE"] = "Y";

    foreach ($filter as $key => $value) {
        foreach ($value as $param => $value2) {
            $rezultFilter["PROPERTY_".$param."_VALUE"] = $value2;
        }
    }

   /* ?>
            <pre>
                <?print_r($rezultFilter)?>
            </pre>
    <? */

    $rezultSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*");

    $result = CIBlockElement::GetList(Array(), $rezultFilter, false, Array(), $rezultSelect);
    if ($result->SelectedRowsCount()!=0){
        while($obs = $result->GetNextElement()){
            $arProps = $obs->GetProperties();
            $arFields = $obs->GetFields();
            $discont_proc = "";
            $discont_itog = "";

            $price = $arProps["PRICE_START"]["VALUE"];
            if($arProps["DISCONT"]["VALUE"] != ""){
                $discont_proc = $arProps["DISCONT"]["VALUE"];
                $discont_itog = $price - ($price / 100 * $discont_proc);
            }

            if($discont_itog != ""){
                $itog = $discont_itog;
                $old_price = $price;
            }else{
                $itog = $price;
                $old_price = "";
            }
        
            $url = $arFields["DETAIL_PAGE_URL"];
            $name = $arFields["NAME"];
            $img = CFile::GetPath($arFields["PREVIEW_PICTURE"]);

            if($img == ""){
                $img = SITE_TEMPLATE_PATH."/assets/img/shop/1.png";
            }
    
?>
                            <div class="col-md-6 col-xl-4">
                                <!-- Start Product Item -->
                                <div class="product-item" data-id="<?=$arFields["ID"]?>">
                                    <div class="product-thumb">
                                        <a href="<?=$url?>">
                                            <img src="<?=$img?>" alt="<?=$name?>">
                                            <?
                                                if($discont_proc != ""){
                                                    ?>
                                                        <div class="ribbons">
                                                            <span class="ribbon ribbon-hot">Sale</span>
                                                            <span class="ribbon ribbon-onsale align-right">-<?=$discont_proc?>%</span>
                                                        </div>
                                                    <?
                                                }
                                            ?>
                                        </a>
                                        <div class="product-action">
                                            <a class="action-wishlist" href="shop-wishlist.html" title="Wishlist">
                                                <i class="ion-android-favorite-outline"></i>
                                            </a>
                                            <?/*<a class="action-quick-view" href="javascript:void(0);" title="Quick View">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>*/?>
                                            <a class="action-cart btn-action-basket-item" data-id="<?=$arFields["ID"]?>" href="javascript:void(0);">
                                                <i class="fa fa-opencart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="title">
                                            <a href="<?=$url?>"><?=$name?></a>
                                        </h4>
                                        <div class="prices">
                                            <?
                                                if($old_price != ""){
                                                    ?>
                                                        <span class="price">$<?=$itog?></span>
                                                        <del class="price-old">$<?=$old_price?></del>
                                                    <?
                                                }else{
                                                    ?>
                                                        <span class="price">$<?=$itog?></span>
                                                    <?
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Item -->
                            </div>     


<?
        }
    }
?>

</div>