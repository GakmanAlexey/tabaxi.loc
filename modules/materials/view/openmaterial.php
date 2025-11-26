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
                    <a href="" class="tut_006_btn tut_006_btn_primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 9H15V3H9V9H5L12 16L19 9ZM5 18V20H19V18H5Z"/>
                        </svg>
                        Скачать материал
                    </a>
                    <a href="#content" class="tut_006_btn tut_006_btn_secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        Смотреть онлайн
                    </a>
                </div>
            </div>
            
            <div class="tut_006_sidebar">
                <table class="tut_006_requirements_table">
                    <tr>
                        <td>Автор</td>
                        <td>Александр Волков</td>
                    </tr>
                    <tr>
                        <td>Соавторы</td>
                        <td>Мария Смирнова<br>Дмитрий Петров<br>Анна Козлова</td>
                    </tr>
                    <tr>
                        <td>Дата выпуска</td>
                        <td>15.01.2025</td>
                    </tr>
                    <tr>
                        <td>Версия</td>
                        <td>2.1.4</td>
                    </tr>
                    <tr>
                        <td>Язык</td>
                        <td>Русский</td>
                    </tr>
                    <tr>
                        <td>Формат</td>
                        <td>PDF, EPUB</td>
                    </tr>
                    <tr>
                        <td>Размер</td>
                        <td>48.7 МБ</td>
                    </tr>
                    <tr>
                        <td>Страниц</td>
                        <td>214</td>
                    </tr>
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

    }
}
?>   
    
