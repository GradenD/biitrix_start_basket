<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");

CModule::IncludeModule('iblock');

?>

<?

$IBLOCK_ID = 3;
$poluchaemurl = explode("/", $_SERVER["REQUEST_URI"]); //разбираем url по ключу "/" в массив
$bezpustyh = array_diff($poluchaemurl, array('')); //удаляем пустые элементы массива
$poslelement = end($bezpustyh); //получаем последний элемент


if($poslelement != "catalog"){
    require($_SERVER["DOCUMENT_ROOT"]."/catalog/detali.php");
}else{
    require($_SERVER["DOCUMENT_ROOT"]."/catalog/catalog.php");
}


?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>