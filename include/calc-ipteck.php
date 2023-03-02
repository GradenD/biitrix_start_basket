<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
?>

<?
	$rezultSelect = Array("ID", "NAME", "IBLOCK_ID", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*");
	$rezultFilter = Array("IBLOCK_ID"=>3, "ID"=>$_POST["id"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$result = CIBlockElement::GetList(Array(), $rezultFilter, false, Array(), $rezultSelect);
	if ($result->SelectedRowsCount()!=0){
		while($obs = $result->GetNextElement()){
            $arProps = $obs->GetProperties();
            $arFields = $obs->GetFields();

            $object = $arProps["TYPE_HOUSE"]["VALUE"];
            $s = $arProps["SQARE"]["VALUE"];
            $st = $arProps["PRICE_START"]["VALUE"];
        }
    }
?>


<div class="conteiner-items objects">
    <ul>
        <li style="display: none">Объект: <span id="object-id"><?=$_POST["id"]?></span></li>
        <li>Объект: <span id="object-name"><?=$object?></span></li>
        <li>Площадь: <span id="object-s"><?=$s?> м<sup>2</sup></span</li>
        <li>Стоимость: <span id="object-sum"><?=number_format($st, 0, ',', ' ')?> руб.</span</li>
    </ul>
</div>

<div class="conteiner-items credit-program">
    <div class="ite-credit">
        <span>КРЕДИТНАЯ ПРОГРАММА:</span>
        <div class="select-container">
            <span id="program-ipoteck" class="value">Нажмите чтобы выбрать</span>
            <div class="row-angle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                </svg>
            </div>
            <div class="values-container">
                <div class="overlow-container">
                <ul class="values">
                <?
                    $i = 0;
                    $rezultSelect = Array("ID", "NAME", "IBLOCK_ID", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*");
                    $rezultFilter = Array("IBLOCK_ID"=>2, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                    $result = CIBlockElement::GetList(Array(), $rezultFilter, false, Array(), $rezultSelect);
                    if ($result->SelectedRowsCount()!=0){
                        while($obs = $result->GetNextElement()){
                            $arProps = $obs->GetProperties();
                            $arFields = $obs->GetFields();

                            if($arProps["TYPE"]["VALUE"] == $object){
                                $STAVKA = $arProps["STAVKA"]["VALUE"];
                                $DATA_MAX = $arProps["DATA_MAX"]["VALUE"];
                                $PERV_MIN = $arProps["PERV_MIN"]["VALUE"];
                                $MAX_SUM = $arProps["MAX_SUM"]["VALUE"];
                                ?>
                                    <li class="item-values <?if($i == 0){?>item-values-active<?}?>" data-maxsum="<?=$MAX_SUM?>" data-perv="<?=$PERV_MIN?>" data-maxdata="<?=$DATA_MAX?>" data-stavka="<?=$STAVKA?>" data-id="<?=$arFields["ID"]?>"><?=$arFields["NAME"]?></li>
                                <?
                                $i++;
                            }
                        }
                    }
                ?>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <p class="info-text">Максимальная сумма ипотеки: <span id="max-sum"><?=$st?></span> руб. Процентная ставка - <span id="procent"></span>%</p>
</div>

<div class="conteiner-items range-container">
    <div class="range-item">
        <label for="perv-vsnos">Первоначальный взнос, руб:</label>
        <span id="itog-vsnos" class="value"></span>
        <input id="perv-vsnos" type="range" id="volume" name="volume" min="1" max="11">
    </div>

    <div class="values">
        <span id="perv-vsnos-min" class="min"></span>
        <span id="perv-vsnos-max" class="min"></span>
    </div>

    <div class="range-item">
        <label for="data-ipopteck">Срок кредита, лет:</label>
        <span id="data_user" class="value">15</span>
        <input type="range" id="data-ipopteck" name="volume" min="0" max="">
    </div>

    <div class="values">
        <span class="min min-data">0</span>
        <span class="min max-data">30</span>
    </div>
</div>

<div class="conteiner-items input-container">
    <span class="input-tiele">Сумма ипотеки:</span>
    <div id="itog-sum" class="value">9 000 000 руб.</div>
    <span class="input-tiele">Ежемесячный платеж:</span>
    <div id="itog-month" class="value">25 000 руб.</div>
</div>



<script>

    function sum_ipoteck(){
        var perv = $('#perv-vsnos').val();
        var sum = <?=$st?>;
        sum = sum - perv;

        $("#itog-sum").html(sum.toLocaleString('ru') + " руб.");
    }

    function perv_vsnos(pervmin){

        var sum = <?=$st?>;
        var stavka = $(".item-values-active").data("stavka");
        var pervmin = Math.ceil(sum / 100 * stavka);
        console.log(pervmin);
        return pervmin;
    }

    function payment_user(){

        var srock = $("#data-ipopteck").val();
        var stavka = $("#procent").html();
        var perv = $('#perv-vsnos').val();
        var sum = <?=$st?>;

        sum = sum - perv;

       // var month = stavka / 12;
        console.log(srock);

        var x = sum + (sum / 100 * stavka * srock);

        x = x.toFixed();

        var y = srock * 12;
        console.log(x + " / " + y)
        sum = x / y;

        sum = sum.toFixed();

        $("#itog-month").html(sum.toLocaleString('ru') + " руб.");
    }
    

    $(".select-container").click(function() {
        if($(this).find(".values-container").hasClass("values-container-active")){
            $(this).find(".values-container").removeClass("values-container-active");
        }else{
            $(this).find(".values-container").addClass("values-container-active");
        }
    });

    $(".select-container .item-values").click(function() {
        $("#program-ipoteck").html($(this).html());

        var perv = $(this).data("perv");
        var maxdata = $(this).data("maxdata");
        var stavka = $(this).data("stavka");
        var maxsum = $(this).data("maxsum");

        $("#max-sum").html(maxsum.toLocaleString('ru'));
        $("#procent").html(stavka);

        var sum = <?=$st?>;

        var pervmin = perv_vsnos();

        $("#itog-vsnos").html(pervmin.toLocaleString('ru'));
        $("#perv-vsnos-min").html(pervmin.toLocaleString('ru'));
        $("#perv-vsnos-max").html(sum.toLocaleString('ru'));

        $("#data-ipopteck").attr('max', maxdata);

        $('#perv-vsnos').attr('min', pervmin);
        $('#perv-vsnos').attr('max', sum);

        $(".max-data").html(maxdata);
        $("#data_user").html(maxdata);

        sum_ipoteck();
        payment_user();
    });

    $(document).on('input change', '#perv-vsnos', function() {
        var pervmin = $(this).val();
        pervmin = +pervmin;
        $("#itog-vsnos").html(pervmin.toLocaleString('ru'));
        sum_ipoteck();
        payment_user();
    });

    $(document).on('input change', '#data-ipopteck', function() {
        var pervmin = $(this).val();
        $("#data_user").html(pervmin);

        payment_user();
    });

    $(document).on('click', ':not(.select-container)', function(e) {
        if(e.target.className == "item-values" || e.target.className == "values" || e.target.className == "values-container" || e.target.className == "value" || e.target.className == "[object SVGAnimatedString]" || e.target.className == "select-container"){
                console.log("true" + " - " + e.target.className);
        }else{
            console.log("false" + " - " + e.target.className);
            $(this).find(".values-container").removeClass("values-container-active");
        }
    });



    $(".item-values-active").click();
</script>