<section id="av4x4-breadcumb">

    <div class="part-50 pull-left">
        <form action="admin.php?page=av4x4-settings" type="post">
            <input type="hidden" name="page" value="av4x4-settings" />
            <div class="form-group">
                <label for="slogan-lb" class="full-width pull-left">Slogan</label>
                <input type="text" name="slogan" id="slogan-lb" value="<?=$data->slogan?>"/>
            </div>
            <div class="form-group">
                <label for="phone-lb" class="full-width pull-left">Phone</label>
                <input type="text" name="phone" id="phone-lb" value="<?=$data->phone?>"/>
            </div>
            <div class="form-group">
                <label for="button_text-lb" class="full-width pull-left">Button Text</label>
                <input type="text" name="button_text" id="button_text-lb" value="<?=$data->button_text?>"/>
            </div>
            <div class="form-group">
                <label for="button_link-lb" class="full-width pull-left">Button Link</label>
                <input type="text" name="button_link" id="button_link-lb" value="<?=$data->button_link?>"/>
            </div>
            <div class="form-group">
                <label for="fb-lb" class="full-width pull-left">Facebook Link</label>
                <input type="text" name="fb" id="fb-lb" value="<?=$data->fb?>"/>
            </div>
            <div class="form-group">
                <label for="inst-lb" class="full-width pull-left">Instagram Link</label>
                <input type="text" name="inst" id="inst-lb" value="<?=$data->inst?>"/>
            </div>
            <div class="form-group">
                <label for="youtube-lb" class="full-width pull-left">Youtube Link</label>
                <input type="text" name="youtube" id="youtube-lb" value="<?=$data->youtube?>"/>
            </div>
            <div class="form-group">
                <label for="map-lat-lb" class="full-width pull-left">Footer Map Lat</label>
                <input type="text" name="map_lat" id="map-lat-lb" value="<?=$data->map_lat?>"/>
            </div>
            <div class="form-group">
                <label for="map-long-lb" class="full-width pull-left">Footer Map Long</label>
                <input type="text" name="map_long" id="map-long-lb" value="<?=$data->map_long?>"/>
            </div>
            <div class="form-group">
                <button class="transition">Save</button>
            </div>
        </form>
    </div>
</section>

