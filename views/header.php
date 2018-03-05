<header>
    <div class="row">
        <div class="col-lg-9">
            <div id="search">
                <form method="GET" action="<?php echo URL?>search/getFilmsList/0/">
                    <input type="text" name="search-text">
                    <select name="param">
                        <option value="Title">по названию</option>
                        <option value="Stars">по имени актера</option>
                    </select>
                    <input type="submit" value="Поиск">
                </form>
            </div>
        </div>
        <div class="col-lg-3">
            <div id="sort">
                <p>Сортировать по:&nbsp;&nbsp;</p>
                <select name="order" onchange="orderFilms('<?php echo $this->orderURL;?>','<?php echo $this->params;?>');">
                    <option value="ASC" <?php if(isset($this->order) && $this->order == "ASC"){ echo "selected";}?>>имени фильма А-Я</option>
                    <option value="DESC" <?php if(isset($this->order) && $this->order == "DESC"){ echo "selected";}?>>имени фильма Я-А</option>
                </select>
            </div>
        </div>
    </div>
</header>