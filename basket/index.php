<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");

CModule::IncludeModule('iblock');

?>

<?    
    $order = new Order();
    $basket_arr = $order->basket_arr();
    if(!empty($basket_arr)){
        require($_SERVER["DOCUMENT_ROOT"]."/basket/basket.php");
    }else{
        require($_SERVER["DOCUMENT_ROOT"]."/basket/empty.php");
    }
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>