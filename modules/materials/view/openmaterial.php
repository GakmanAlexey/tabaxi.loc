<?php
$maOpDa = $this->data_view["materialOpenData"];
 $file = \Modules\Files\Modul\Taker:: take($maOpDa->getIdImg());
/*
type
h - head
p - paragraph
t - table
"Тип таблицы" "ид" "Очередность"

*/
?>



    <div class="tut_006_container scale-container">
        <section class="tut_006_hero ">
            <img src="<?php echo $file->get_path();?>" alt="Основное руководство игрока" class="tut_006_hero_image">
            <div class="tut_006_hero_content">
                <h1 class="tut_006_hero_title"><?php echo $maOpDa->getName();?></h1>
                <div class="tut_006_hero_description"><?php echo $maOpDa->getSmallDescription();?></div>
                
                <div class="tut_006_hero_actions">
                    <?php /*
                    <a href="" class="tut_006_btn tut_006_btn_primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 9H15V3H9V9H5L12 16L19 9ZM5 18V20H19V18H5Z"/>
                        </svg>
                        Скачать материал
                    </a> */
                    ?>
                    <a href="#intro" class="tut_006_btn tut_006_btn_secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        Смотреть онлайн
                    </a>
                </div>
            </div>
            
            <div class="tut_006_sidebar">
                <table class="tut_006_requirements_table">
<?php
$arrayTableMain = $maOpDa->getTableStart();
foreach($arrayTableMain as $itemTableMain){
    echo 
    '
                    <tr>
                        <td>'.$itemTableMain[0].'</td>
                        <td>'.$itemTableMain[1].'</td>
                    </tr>    
    ';
}
?>
                    
                </table>
            </div>
        </section>
    </div>
 <?php
 /*   
    <div class="tut_006_container scale-container">
        <section class="tut_006_toc">
            <h2 class="tut_006_toc_title">Содержание</h2>
            <ul class="tut_006_toc_list">
                <li class="tut_006_toc_item"><a href="#intro" class="tut_006_toc_link">Введение в D&D</a></li>
                <li class="tut_006_toc_item"><a href="#character-creation" class="tut_006_toc_link">Создание персонажа</a></li>
                <li class="tut_006_toc_item"><a href="#races" class="tut_006_toc_link">Расы и народы</a></li>
                <li class="tut_006_toc_item"><a href="#classes" class="tut_006_toc_link">Классы персонажей</a></li>
                <li class="tut_006_toc_item"><a href="#equipment" class="tut_006_toc_link">Снаряжение и экипировка</a></li>
                <li class="tut_006_toc_item"><a href="#combat" class="tut_006_toc_link">Боевая система</a></li>
                <li class="tut_006_toc_item"><a href="#magic" class="tut_006_toc_link">Магия и заклинания</a></li>
                <li class="tut_006_toc_item"><a href="#adventuring" class="tut_006_toc_link">Приключения и исследования</a></li>
            </ul>
        </section>
    </div>
 */

$data = $maOpDa-> gettextPageData();
foreach($data as $d){
    if($d[0] == "h"){
        if($d[3]["typeH"] == "h2"){
            echo '
                <div class="tut_006_container scale-container">
                    <div class="tut_006_content" >
                        <section class="tut_006_section" id="'.$d[3]["idH"].'">
                            <h2 class="tut_006_section_title">'.$d[3]["textH"].'</h2>
                        </section>
                    </div>
                </div>
                ';
        }
        if($d[3]["typeH"] == "h3"){
            echo '    
                <div class="tut_006_container scale-container">
                    <div class="tut_006_content" >
                        <section class="tut_006_section" id="'.$d[3]["idH"].'">
                            <h3 class="tut_006_section_subtitle">'.$d[3]["textH"].'</h3>
                        </section>
                    </div>
                </div>
                ';
        }
        if($d[3]["typeH"] == "h4"){
            echo '    
                <div class="tut_006_container scale-container">
                    <div class="tut_006_content" >
                        <section class="tut_006_section" id="'.$d[3]["idH"].'">
                            <h4 class="tut_006_section_subtitle">'.$d[3]["textH"].'</h3>
                        </section>
                    </div>
                </div>
                ';
        }
    }elseif($d[0] == "p"){
        if($d[3]["typeP"] == NULL){
            echo '    
                <div class="tut_006_container scale-container">
                    <div class="tut_006_content">
                        <section class="tut_006_section" id="">
                            <p class="tut_006_text">'.$d[3]["textP"].'</p>
                        </section>
                    </div>
                </div>
                ';
        }
    }elseif($d[0] == "t"){    
        if($d[3]["idP"] == 1){
                $tableArray = unserialize($d[3]["bodyArray"]);
                echo '
            <div class="tut_006_container scale-container">
                <div class="tut_006_content" id="">
                    <section class="tut_006_section" id="">
                        <table class="tut_006_vertical_table tut_006_vertical_table_w70">';
                        $countTR=0;
                            foreach($tableArray as $tableItem){                        
                                echo '<tr>';  
                                foreach($tableItem as $item){
                                    if($countTR == 0){ 
                                    echo '<th>'.$item.'</th>';
                                    }else{
                                    echo '<td>'.$item.'</td>';
                                    }
                                }                         
                                $countTR++;
                            }
                echo '    
                        </table>
                    </section>
                </div>
            </div>';
        }elseif($d[3]["idP"] == 2){
            $tableArray = unserialize($d[3]["bodyArray"]);
            echo '
            <div class="tut_006_container scale-container">
                <div class="tut_006_content" id="">
                    <section class="tut_006_section" id="">
                        <table class="tut_006_vertical_table tut_006_vertical_table_w70">';
                        $countTR=0;
                            foreach($tableArray as $tableItem){                        
                                echo '<tr>';  
                                foreach($tableItem as $item){
                                    if($countTR == 0){ 
                                    echo '<th>'.$item.'</th>';
                                    }else{
                                        $text = \Modules\Materials\Modul\Box::callBox($item);
                                    echo '<td>'.$text.'</td>';
                                    }
                                }                         
                                $countTR++;
                            }
                echo '    
                        </table>
                    </section>
                </div>
            </div>';
        }
    }elseif($d[0] == "l"){     
        $arrayList = unserialize($d[3]["value_array"]);
        if($d[3]["type_t"] == "c"){
           $listenClass = "tut_006_ul_circle";
        }else{
           $listenClass = "tut_006_ul_decimal";
        }
        echo '
    <div class="tut_006_container scale-container">
        <div class="tut_006_content" id="">
            <section class="tut_006_section" id="">
                <ul class="'.$listenClass.'">';
                foreach($arrayList as $listItem){
                    echo '<li>'.$listItem.'</li>';
                }
    echo '
                </ul>
            </section>
        </div>
</div>    ';
    }
    
}

/*
$array = [];
$array[] = ["Уровень","Опыт"];
$array[] = ["1","0"];
$array[] = ["2","100"];
$array[] = ["3","250"];
$array[] = ["4","500"];
$array[] = ["5","1 000"];
$array[] = ["6","2 000"];
$array[] = ["7","4 000"];
$array[] = ["8","8 000"];
$array[] = ["9","16 000"];
$array[] = ["10","32 000"];
$array[] = ["11","64 000"];
$array[] = ["12","125 000"];
$array[] = ["13","250 000"];
$array[] = ["14","500 000"];
$array[] = ["15","1 000 000"];
echo serialize($array);
$list = ["Уровни 1-4: 1к4","Уровни 5-9: 1к6","Уровни 10-12: 1к8","Уровни 13-15: 1к10"];
echo serialize($list);

$array = [];
$array[] = ["Уровень","Название","Цена","Опыт","Ссылка"];
$array[] = ["#[resurse.lvl(1)","#[item..name(38)","#[item..price(38)","#[resurse.exp(1)","#[item..url(38)"];
$array[] = ["#[resurse.lvl(2)","#[item..name(39)","#[item..price(39)","#[resurse.exp(2)","#[item..url(39)"];
$array[] = ["#[resurse.lvl(3)","#[item..name(40)","#[item..price(40)","#[resurse.exp(3)","#[item..url(40)"];
$array[] = ["#[resurse.lvl(4)","#[item..name(41)","#[item..price(41)","#[resurse.exp(4)","#[item..url(41)"];
$array[] = ["#[resurse.lvl(5)","#[item..name(42)","#[item..price(42)","#[resurse.exp(5)","#[item..url(42)"];
$array[] = ["#[resurse.lvl(6)","#[item..name(43)","#[item..price(43)","#[resurse.exp(6)","#[item..url(43)"];
$array[] = ["#[resurse.lvl(7)","#[item..name(44)","#[item..price(44)","#[resurse.exp(7)","#[item..url(44)"];
$array[] = ["#[resurse.lvl(8)","#[item..name(45)","#[item..price(45)","#[resurse.exp(8)","#[item..url(45)"];
$array[] = ["#[resurse.lvl(9)","#[item..name(46)","#[item..price(46)","#[resurse.exp(9)","#[item..url(46)"];
$array[] = ["#[resurse.lvl(10)","#[item..name(47)","#[item..price(47)","#[resurse.exp(10)","#[item..url(47)"];
$array[] = ["#[resurse.lvl(11)","#[item..name(48)","#[item..price(48)","#[resurse.exp(11)","#[item..url(48)"];
$array[] = ["#[resurse.lvl(12)","#[item..name(49)","#[item..price(49)","#[resurse.exp(12)","#[item..url(49)"];
$array[] = ["#[resurse.lvl(13)","#[item..name(50)","#[item..price(50)","#[resurse.exp(13)","#[item..url(50)"];
$array[] = ["#[resurse.lvl(14)","#[item..name(51)","#[item..price(51)","#[resurse.exp(14)","#[item..url(51)"];
$array[] = ["#[resurse.lvl(15)","#[item..name(52)","#[item..price(52)","#[resurse.exp(15)","#[item..url(52)"];
$array[] = ["#[resurse.lvl(16)","#[item..name(53)","#[item..price(53)","#[resurse.exp(16)","#[item..url(53)"];
$array[] = ["#[resurse.lvl(17)","#[item..name(54)","#[item..price(54)","#[resurse.exp(17)","#[item..url(54)"];
$array[] = ["#[resurse.lvl(18)","#[item..name(55)","#[item..price(55)","#[resurse.exp(18)","#[item..url(55)"];
$array[] = ["#[resurse.lvl(19)","#[item..name(56)","#[item..price(56)","#[resurse.exp(19)","#[item..url(56)"];
$array[] = ["#[resurse.lvl(20)","#[item..name(57)","#[item..price(57)","#[resurse.exp(20)","#[item..url(57)"];
$array[] = ["#[resurse.lvl(21)","#[item..name(58)","#[item..price(58)","#[resurse.exp(21)","#[item..url(58)"];
$array[] = ["#[resurse.lvl(22)","#[item..name(59)","#[item..price(59)","#[resurse.exp(22)","#[item..url(59)"];
$array[] = ["#[resurse.lvl(23)","#[item..name(60)","#[item..price(60)","#[resurse.exp(23)","#[item..url(60)"];
$array[] = ["#[resurse.lvl(24)","#[item..name(61)","#[item..price(61)","#[resurse.exp(24)","#[item..url(61)"];
$array[] = ["#[resurse.lvl(25)","#[item..name(62)","#[item..price(62)","#[resurse.exp(25)","#[item..url(62)"];
echo serialize($array);*/
