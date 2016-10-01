<style type="text/css">
    #av4x4-breadcumb {
        padding-right: 20px;
    }

    #av4x4-breadcumb h1 {
        color: #636161;
        font-size: 29px;
        border-bottom: 5px solid;
        padding-bottom: 20px;
    }

    #av4x4-breadcumb form {
        width: 600px;
    }

    #av4x4-breadcumb form .parts {
        float: left;
        width: 300px;
    }

    #av4x4-breadcumb form .parts .form-group {
        margin: 10px 0px;
        float: left;
    }

    #av4x4-breadcumb form .parts label {
        width: 100%;
        float: left;
    }

    #av4x4-breadcumb form .parts input {
        width: 260px;
        padding: 5px 10px;
        float: left;
    }

    #av4x4-breadcumb button {
        background: #3a8e3d;
        padding: 7px 25px;
        color: #fff;
        border: 1px solid #357137;
        cursor: pointer;
        float: right;
        font-size: 19px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        outline: none;
    }
    #av4x4-breadcumb .form-group:last-child{
        width: 100%;
        float: left;
    }
</style>

<section id="av4x4-breadcumb">
    <h1>AV4X4 Theme Settings</h1>
    <div class="part-50 pull-left">
        <form action="admin.php?page=av4x4-settings" type="post">
            <input type="hidden" name="page" value="av4x4-settings" />
            <div class="parts">
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
            </div>

            <div class="parts">
                <div class="form-group">
                    <label for="map-lat-lb" class="full-width pull-left">Footer Map Lat</label>
                    <input type="text" name="map_lat" id="map-lat-lb" value="<?=$data->map_lat?>"/>
                </div>
                <div class="form-group">
                    <label for="map-long-lb" class="full-width pull-left">Footer Map Long</label>
                    <input type="text" name="map_long" id="map-long-lb" value="<?=$data->map_long?>"/>
                </div>
            </div>
            <div class="form-group">
                <button class="transition">Save</button>
            </div>
        </form>
    </div>
</section>

