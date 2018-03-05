<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="film-list">
            <h2>СПИСОК ФИЛЬМОВ</h2>
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
        <div id="addFilm">
            <div id="addFilmButton" onclick="showFilmForm('addFilm');">Добавить новый фильм</div>
            <form method="POST" onsubmit="validateForm();return false;" action="<?php echo URL?>index/addFilm" id="sendForm">
                <div class="oneInput">
                    <label for="title">Название:</label>
                    <input type="text" name="Title" id="title">
                </div>
                <div class="oneInput">
                    <label for="Released_Year">Год выпуска:</label>
                    <input type="text" name="Released_Year" id="Released_Year">
                    <div id="error">Год выпуска не может быть больше текущего и меньше 1900</div>
                </div>
                <div class="oneInput">
                    <label for="Format">Формат:</label>
                    <select name="format">
                        <option value="VHS">VHS</option>
                        <option value="DVD">DVD</option>
                        <option value="Blu-Ray">Blu-Ray</option>
                    </select>
                </div>
                <div class="oneInput">
                    <label for="Stars">Актеры:</label>
                    <input type="text" name="stars" id="Stars">
                </div>
                <div class="oneInput">
                    <input type="submit" value="Добавить информацию">
                </div>
            </form>
        </div>
        <div id="addFilmFile">
            <div id="addFilmFileButton" onclick="showFilmForm('addFilmFile');">Загрузить данные с файла</div>
            <form action="<?php echo URL?>index/downloadFilms" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <input name="userfile" type="file" />
                <input type="submit" value="Загрузить файл">
            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>