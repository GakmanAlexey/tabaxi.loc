<!-- Второй блок -->
    <div class="tut_001_container scale-container">
        <section class="tut_001_second_section">
            <div class="tut_001_section_header">
                <div class="tut_001_section_icon appearance-effect">
                    <img src="/modules/core/src/img/Star.svg" alt="">
                </div>
                <h2 class="tut_001_section_title appearance-effect">инструменты<br>для вашего приключения</h2>
            </div>
            <p class="tut_001_section_description appearance-effect">От поиска команды до ведения персонажа — все необходимое для игрока и Мастера в одном месте. Выберите, куда направить свой путь.</p>
            
            <div class="tut_001_cards_container">
                
                <a class="tut_001_card appearance-effect" href="/service/">
                    <img src="/modules/core/src/img/pl1.png" alt="Плашка 1" class="tut_001_card_image">
                    <div class="tut_001_card_overlay">
                        <div class="tut_001_card_content">
                            <h3 class="tut_001_card_title"> все сервисы</h3>
                        </div>
                    </div>
                </a>
                <?php
                $count = 0;
                foreach($this->data_view["repoService"] as $itemService){
                   $count++;
                   if($count > 8) continue; 
    echo '
                <a class="tut_001_card appearance-effect" href="'.$itemService->getWebsiteUrl().'">
                    <img src="'.\Modules\Serv\Modul\Servicemove::takeImg($itemService).'" alt="'.$itemService->getName().'" class="tut_001_card_image">
                    <div class="tut_001_card_overlay">
                        <div class="tut_001_card_content">
                            <h3 class="tut_001_card_title">'.$itemService->getName().'</h3>
                        </div>
                    </div>
                </a>';
}
            ?>
            </div>
        </section>    
    </div>