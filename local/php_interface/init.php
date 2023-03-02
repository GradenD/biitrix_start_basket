<?
    session_start();

    class Order{

        public function element_arr($id, $q){

            $rezultSelect = Array("ID", "NAME", "IBLOCK_ID", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*");
            $rezultFilter = Array("IBLOCK_ID"=>3, "ID"=>$id, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $result = CIBlockElement::GetList(Array(), $rezultFilter, false, Array(), $rezultSelect);
            if ($result->SelectedRowsCount()!=0){
                while($obs = $result->GetNextElement()){
                    $arProps = $obs->GetProperties();
                    $arFields = $obs->GetFields();
        
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
                }
        
                $order = array(
                    "ID" => $arFields["ID"],
                    "NAME" => $name,
                    "ITOG" => $itog,
                    "OLD_PRICE" => $old_price,
                    "URL" => $url,
                    "IMG" => $img,
                    "QANTY" => $q,
                );

                return $order;

            }

        }

        public function basket_sum(){

            $sum = 0;
            $basket_arr = $this->basket_arr();
            foreach ($basket_arr as $key => $value) {
                $sum = $sum + $value["ITOG"] * $value["QANTY"];
            }
            return $sum;

        }

        public function basket_count(){
            return count($_SESSION['order']);
        }

        public function basket_arr(){

            return $_SESSION['order'];

        }

        public function order_remove($id){
            unset($_SESSION['order'][$id]);
        }

        public function order_qunty($id, $q){
            $_SESSION['order'][$id]["QANTY"] = $q;
        }

        public function order_del(){
            $_SESSION['order'] = "";
        }

        public function order_confirm($array){

            $basket_arr = $this->basket_arr();
            $preview = "";
            foreach ($basket_arr as $key => $value) {
                $sum_item = $value["ITOG"] * $value["QANTY"];
                $preview = ''.$preview.'Товар: '.$value["NAME"].';<br>';
                $preview = ''.$preview.'Цена без скидки: '.$value["ITOG"].';<br>';
                if($value["OLD_PRICE"] != ""){
                    $preview = ''.$preview.'Цена со скидкой: '.$value["OLD_PRICE"].';<br>';
                }
                $preview = ''.$preview.'Количество: '.$value["QANTY"].';<br>';
                $preview = ''.$preview.'Итог: $'.$sum_item.';<br><br><br>';
            }

            $preview = ''.$preview.'<b>Итого</b>: $'.$this->basket_sum().';<br><br><br>';

            $el = new CIBlockElement;
            
            $PROP = $_POST;
        
            $today = date("m.d.y H:i:s");
            $name = $_POST["NAME"];
            $name = "$name - $today";
        
            $arLoadProductArray = Array(
                "IBLOCK_ID"      => 5,
                "NAME"           => $name,
                "ACTIVE"         => "Y",
                "PROPERTY_VALUES"=> $array,
                "PREVIEW_TEXT_TYPE" =>"html",
                "PREVIEW_TEXT" => $preview,
            );

            if ($PRODUCT_ID = $el->Add($arLoadProductArray)){
                $this->order_del();
                return true;
            }else{
                return false;
            }

        }

    }