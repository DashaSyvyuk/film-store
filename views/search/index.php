<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="film-list">
            <h2>РЕЗУЛЬТАТ ПОИСКА ПО ЗАПРОСУ "<?php echo Controller::checkString($_GET["search-text"]);?>"</h2>
            <ul>
                <?php if(!empty($this->filmList)){
                foreach($this->filmList as $key => $value){?>
                <li>
                    <div class="oneparam">
                        <div class="left">Название:</div>
                        <div class="right"><?php echo $value["Title"]?></div>
                    </div>
                    <div class="hide-part" id="show-hide-<?php echo $key?>">
                        <div class="oneparam">
                            <div class="left">Год выпуска:</div>
                            <div class="right"><?php echo $value["Release Year"]?></div>
                        </div>
                        <div class="oneparam">
                            <div class="left">Формат:</div>
                            <div class="right"><?php echo $value["Format"]?></div>
                        </div>
                        <div class="oneparam">
                            <div class="left">Список актеров:</div>
                            <div class="right"><?php echo $value["Stars"]?></div>
                        </div>
                    </div>
                    <div class="oneparam">
                        <div class="left">
                            <a href="<?php echo URL?>index/deleteFilm/<?php echo $value["id"]?>" class="delete-button">Удалить фильм</a>
                        </div>
                        <div class="right">
                            <div id="button-<?php echo $key;?>" class="show-hide-button" onclick="showHideInfo('<?php echo $key?>')">Показать информацию</div>
                        </div>
                    </div>
                </li>
                <?php }
                }?>
            </ul>
        </div>
        <div id="pagination"><?php if(!empty($this->pagination)){ echo $this->pagination;}?></div>
    </div>
    <div class="col-lg-3"></div>
</div>