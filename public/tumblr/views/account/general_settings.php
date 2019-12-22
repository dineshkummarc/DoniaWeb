<div class="lead"><?=lang('general')?></div>

<div class="row">
    <div class="col-md-12">
        <div class="item form-group">
            <span class="text"><?=lang('Tumblr Client ID')?>:</span> 
            <div class="activity-option-input">
                <input type="text" class="form-control" name="tumblr_app_id" value="<?=get_option("tumblr_app_id", "")?>">
          </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="item form-group">
            <span class="text"><?=lang('Tumblr Client Secret')?>:</span> 
            <div class="activity-option-input">
                <input type="text" class="form-control" name="tumblr_app_secret" value="<?=get_option("tumblr_app_secret", "")?>">
          </div>
        </div>
    </div>
</div>
 