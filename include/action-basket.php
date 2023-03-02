<?
    session_start();
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule('iblock');
?>

<?
    if($_POST["id"] != ""){

        $order = $_SESSION['order'];

        $order = new Order();

        $order = $order->element_arr($_POST["id"], $_POST["q"]);

        /*?>
            <pre>
                <?print_r($order)?>
            </pre>
        <?*/

        $_SESSION['order'][$_POST["id"]] = $order;

    }
?>