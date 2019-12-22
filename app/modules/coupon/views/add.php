<div class="pn-box-content">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?=lang("name")?></label>
                <input type="" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label><?=lang("Code")?></label>
                <input type="" class="form-control" name="code">
            </div>
            <div class="form-group">
                <label for="type"><?=lang("type")?></label><br/>
                <div class="pure-checkbox grey mr15 mb15">
                    <input type="radio" id="md_checkbox_type_enable" name="type" class="filled-in chk-col-red" value="1">
                    <label class="p0 m0" for="md_checkbox_type_enable">&nbsp;</label>
                    <span class="checkbox-text-right"> <?=lang('Price')?></span>
                </div>

                <div class="pure-checkbox grey mr15 mb15">
                    <input type="radio" id="md_checkbox_type_disable" name="type" class="filled-in chk-col-red" checked="true" value="0">
                    <label class="p0 m0" for="md_checkbox_type_disable">&nbsp;</label>
                    <span class="checkbox-text-right"> <?=lang('Percent')?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="price"><?=lang("Price")?></label>
                <input type="text" class="form-control" name="price" id="price" value="">
            </div>
            <div class="form-group">
                <label for="price"><?=lang("packages")?></label><br/>
                <?php
                if(!empty($packages)){

                $item_package = array();
                if(!empty($result)){
                    $item_package = json_decode($result->packages);
                }

                foreach($packages as $row){?>
                    <div class="pure-checkbox grey mr15 mb15">
                         <input type="checkbox" id="md_checkbox_<?=$row->id?>" name="packages[]" class="filled-in chk-col-red" value="<?=$row->id?>" <?=(in_array($row->id, $item_package))?"checked":""?>>
                         <label class="p0 m0" for="md_checkbox_<?=$row->id?>">&nbsp;</label>
                        <span class="checkbox-text-right <?=$row->id?>"> <?=$row->name?></span>
                    </div>
                <?php }}?>
            </div>
            <div class="form-group">
                <label for="expiration_date"><?=lang("expiration_date")?></label>
                <input type="text" class="form-control date" name="expiration_date" id="expiration_date" value="<?=!empty($result)?convert_date($result->expiration_date):""?>">
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary"> <?=lang('save')?></button>
    <a href="<?=cn("coupon")?>" class="btn btn-default"> <?=lang('cancel')?></a>
</div>