<div class="lead"><?=lang('general')?></div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <span class="text"> <?=lang("login_pinterest_via")?></span> <br/>
            <div class="pure-checkbox grey mr15 mb15 mt15">
                <input type="hidden" name="pinterest_button" value="0">
                <input type="checkbox" id="md_checkbox_pinterest_button" name="pinterest_button" class="filled-in chk-col-red" <?=get_option('pinterest_button', 1)==1?"checked":""?> value="1">
                <label class="p0 m0" for="md_checkbox_pinterest_button">&nbsp;</label>
                <span class="checkbox-text-right"> <?=lang('Pinterest Button')?></span>
            </div>
            <div class="pure-checkbox grey mr15 mb15">
                <input type="hidden" name="pinterest_your_app" value="0">
                <input type="checkbox" id="md_checkbox_pinterest_onwer_app" name="pinterest_your_app" class="filled-in chk-col-red" <?=get_option('pinterest_your_app', 0)==1?"checked":""?> value="1">
                <label class="p0 m0" for="md_checkbox_pinterest_onwer_app">&nbsp;</label>
                <span class="checkbox-text-right"> <?=lang('Owner pinterest app')?></span>
            </div>
            <div class="pure-checkbox grey mr15 mb15">
                <input type="hidden" name="pinterest_login_username_password" value="0">
                <input type="checkbox" id="md_checkbox_pinterest_username_password" name="pinterest_login_username_password" class="filled-in chk-col-red" <?=get_option('pinterest_login_username_password', 1)==1?"checked":""?> value="1">
                <label class="p0 m0" for="md_checkbox_facebook_username_password">&nbsp;</label>
                <span class="checkbox-text-right"> <?=lang('Username & Password')?></span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="item form-group">
            <span class="text"><?=lang('pinterest_app_ID')?></span> 
            <div class="activity-option-input">
                <input type="text" class="form-control" name="pinterest_app_id" value="<?=get_option("pinterest_app_id", "")?>">
          </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="item form-group">
            <span class="text"><?=lang('pinterest_app_secret')?></span> 
            <div class="activity-option-input">
                <input type="text" class="form-control" name="pinterest_app_secret" value="<?=get_option("pinterest_app_secret", "")?>">
          </div>
        </div>
    </div>
</div>
