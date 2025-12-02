<?php
$data = $this->data_view["itemOpen"];
//var_dump($data);

// Создание сервиса
// Создание сервиса
$sourceService = new \Modules\Sour\Modul\Sourceservice;



?>
    <div class="tut_008_container scale-container">
                <!-- Основной контент -->
        <section class="tut_008_hero">
            <img src="<?php echo $data->getRImg();?>"  alt="Магический меч света" class="tut_008_item_image">
            
            <div class="tut_008_item_content">
                <h1 class="tut_008_item_title"><?php echo $data->getName();?></h1>
                <div class="tut_008_item_rarity"><?php echo $data->getRRarityType();?></div> 
                <div class="tut_008_item_rarity">Цена: <?php echo $data->getRPrice();?></div>
                <div class="tut_008_item_rarity">Вес: <?php echo $data->getRWeight();?></div>
                <div class="tut_008_item_rarity">Источник: <?php echo $data->getRSource();?></div>
                <div class="tut_008_item_description">
                    <?php echo $data->getDescription();?>
                </div>
            </div>
        </section>

        <!-- Где найти/купить -->
        <section class="tut_008_section">
            <h2 class="tut_008_section_title">Где найти или купить</h2>
            <table class="tut_008_table">
                <tr>
                    <th>Локация</th>
                    <th>Тип</th>
                    <th>Условия</th>
                    <th>Шанс/Цена</th>
                </tr>
                <tr>
                    <td>Храм Солнечного Божества</td>
                    <td>Квестовая награда</td>
                    <td>Завершение квеста "Наследие Света"</td>
                    <td>100%</td>
                </tr>
                <tr>
                    <td>Древние эльфийские руины</td>
                    <td>Находка</td>
                    <td>В сундуке в тронном зале</td>
                    <td>25%</td>
                </tr>
                <tr>
                    <td>Магический базар Серебряного Города</td>
                    <td>Покупка</td>
                    <td>Репутация "Почитаемый" у магов</td>
                    <td>15,000 золотых</td>
                </tr>
                <tr>
                    <td>Аукцион Черного Рынка</td>
                    <td>Торги</td>
                    <td>Только в полнолуние</td>
                    <td>От 20,000 золотых</td>
                </tr>
            </table>
        </section>

        <!-- Крафт -->
        <section class="tut_008_section">
            <h2 class="tut_008_section_title">Создание (крафт)</h2>
            
            <!-- Плашки требований -->
            <div class="tut_008_requirements">
                <div class="tut_008_requirement_badge">Кузнечное дело - 90 ур.</div>
                <div class="tut_008_requirement_badge">Инструмент - Наковальня</div>
                <div class="tut_008_requirement_badge">Время создания - 7 дней</div>
                <div class="tut_008_requirement_badge">Магическая аффинность - 75 ур.</div>
            </div>

            <!-- Ингредиенты в виде табов -->
            <div class="tut_008_ingredients">
                <div class="tut_008_ingredient_tab">Солнечный кристалл ×1</div>
                <div class="tut_008_ingredient_tab">Мифриловая руда ×5</div>
                <div class="tut_008_ingredient_tab">Слеза феникса ×3</div>
                <div class="tut_008_ingredient_tab">Пыльца светлящегося мха ×10</div>
                <div class="tut_008_ingredient_tab">Эссенция света ×2</div>
                <div class="tut_008_ingredient_tab">Золотой слиток ×3</div>
                <div class="tut_008_ingredient_tab">Рунический камень ×1</div>
            </div>
        </section>

        <!-- Где используется -->
        <!-- <section class="tut_008_section">
            <h2 class="tut_008_section_title">Используется в создании</h2>
            
            <div class="tut_008_usage_list">
                <div class="tut_008_usage_item">Меч Вечного Света</div>
                <div class="tut_008_usage_item">Щит Светозащитника</div>
                <div class="tut_008_usage_item">Доспех Лученосца</div>
                <div class="tut_008_usage_item">Корона Солнечного Владыки</div>
                <div class="tut_008_usage_item">Посох Утренней Зари</div>
                <div class="tut_008_usage_item">Плащ Рассеивателя Тьмы</div>
            </div>
        </section> -->

        <section class="tut_008_section">
            <h2 class="tut_008_section_title">Используется в создании Меч Вечного Света</h2>
            
            <!-- Плашки требований -->
            <div class="tut_008_requirements">
                <div class="tut_008_requirement_badge">Кузнечное дело - 90 ур.</div>
                <div class="tut_008_requirement_badge">Инструмент - Наковальня</div>
                <div class="tut_008_requirement_badge">Время создания - 7 дней</div>
                <div class="tut_008_requirement_badge">Магическая аффинность - 75 ур.</div>
            </div>

            <!-- Ингредиенты в виде табов -->
            <div class="tut_008_ingredients">
                <div class="tut_008_ingredient_tab">Солнечный кристалл ×1</div>
                <div class="tut_008_ingredient_tab">Мифриловая руда ×5</div>
                <div class="tut_008_ingredient_tab tut_008_using_item">Магический меч света</div>
                <div class="tut_008_ingredient_tab">Пыльца светлящегося мха ×10</div>
                <div class="tut_008_ingredient_tab">Эссенция света ×2</div>
                <div class="tut_008_ingredient_tab">Золотой слиток ×3</div>
                <div class="tut_008_ingredient_tab">Рунический камень ×1</div>
            </div>
        </section>
        <section class="tut_008_section">
            <h2 class="tut_008_section_title">Используется в создании Щит Светозащитника</h2>
            
            <!-- Плашки требований -->
            <div class="tut_008_requirements">
                <div class="tut_008_requirement_badge">Кузнечное дело - 90 ур.</div>
                <div class="tut_008_requirement_badge">Инструмент - Наковальня</div>
                <div class="tut_008_requirement_badge">Время создания - 7 дней</div>
                <div class="tut_008_requirement_badge">Магическая аффинность - 75 ур.</div>
            </div>

            <!-- Ингредиенты в виде табов -->
            <div class="tut_008_ingredients">
                <div class="tut_008_ingredient_tab tut_008_using_item">Магический меч света</div>
                <div class="tut_008_ingredient_tab">Мифриловая руда ×5</div>
                <div class="tut_008_ingredient_tab">Слеза феникса ×3</div>
                <div class="tut_008_ingredient_tab">Пыльца светлящегося мха ×10</div>
                <div class="tut_008_ingredient_tab">Эссенция света ×2</div>
                <div class="tut_008_ingredient_tab">Золотой слиток ×3</div>
                <div class="tut_008_ingredient_tab">Рунический камень ×1</div>
            </div>
        </section>
    </div>