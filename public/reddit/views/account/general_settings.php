<div class="lead"><?=lang('general')?></div>
<div class="row">
    <div class="col-md-12">
        <div class="item form-group">
            <span class="text"><?=lang('Reddit Client ID')?></span> 
            <div class="activity-option-input">
                <input type="text" class="form-control" name="reddit_client_id" value="<?=get_option("reddit_client_id", "")?>">
          </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="item form-group">
            <span class="text"><?=lang('Reddit Client Secret')?></span> 
            <div class="activity-option-input">
                <input type="text" class="form-control" name="reddit_client_secret" value="<?=get_option("reddit_client_secret", "")?>">
          </div>
        </div>
    </div>
</div>