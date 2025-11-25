<div class="tut_005_container scale-container">
        <div class="tut_005_materials_grid">
            <?php
                foreach($this->data_view["materials"] as $material)
                {
                    $file = \Modules\Files\Modul\Taker:: take($material->getIdImg());
                
            ?>
            <!-- Материал 1 -->
            <div class="tut_005_material_card">
                <img src="<?php echo $file->get_path();?>" 
                     alt="Основное руководство игрока" class="tut_005_material_image">
                <div class="tut_005_material_content">
                    <h3 class="tut_005_material_title"><?php echo $material->getName();?></h3>
                    <div class="tut_005_material_subtitle"></div>
                    <div class="tut_005_material_description">
                        <?php echo $material->getSmallDescription();?>
                    </div>
                    <a href="<?php echo $material->getUrl();?>" class="tut_005_material_button">Открыть</a>
                </div>
            </div>
            <?php
                }
            ?>
                       
        </div>
    </div>

    <?php
    /*
$repository = new \Modules\Materials\Modul\Materialrepository();


// Создание
$material = \Modules\Materials\Modul\Material::create()
    ->setName('Test Material 3')
    ->setIsActive(1);
$repository->save($material);

// Поиск
$foundMaterial = $repository->findById(1);
$activeMaterials = $repository->findAllActive();
*/
    ?>