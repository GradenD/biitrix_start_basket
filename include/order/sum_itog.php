<?
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule('iblock');
?>

$
<?
    $order = new Order();

    echo $order->basket_sum();
?>