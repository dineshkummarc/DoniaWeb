        <div class="row">
            <div class="pricing-tables medium-padding120 bg-border-color">
                <div class="row text-center" id="pills-month" role="tabpanel" aria-labelledby="pills-month-tab">
                    <div class="row text-center">
                        <?php if(!empty($package)){
                        $social_list = load_social_list();
                        foreach ($package as $key => $row) {
                            $pricing_monthly = number_format($row->price_monthly,2);
                            $pricing_monthly_explode = explode(".", $pricing_monthly);
                            $pricing_anually = number_format($row->price_annually,2);
                            $pricing_discount = number_format(($row->price_monthly - $row->price_annually)*12, 2);
                            $permission = (array)json_decode($row->permission);

                            $social_list_permission = array();
                            foreach ($social_list as $name) {
                                if((in_array(strtolower($name)."_enable",$permission))){
                                    $social_list_permission[] = $name;
                                }
                            }
                            $social_count = count($social_list_permission);
                         ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="pricing-box pricing-box-curbed wow fadeIn" data-av-animation="bounceInUp">
                                <div class="pricing-top gradiant-background">
                                    <div>
                                    <h5><?=$row->name?></h5>
                                    <div>
                                        <div>
                                         <h2><span class="usd">$</span><?=$pricing_monthly_explode[0]?>.<?=$pricing_monthly_explode[1]?></h2>
                                        </div>
                                        <small><?=lang("per_active_user_monthly")?></small>
                                        <br/>
                                        <small><?=sprintf(lang("save_x_on_annually"), $pricing_discount." ".get_option('payment_currency'));?></small>
                                    </div>
                                </div>
                            </div>
                                <div class="price-body">
                                    <div class="price-info">
                                        <?=sprintf(lang('add_up_to_social_accounts'),$social_count*$row->number_accounts)?> <br>
                                        <div class="small">(<?=sprintf(lang('social_account_on_each_platform'),$row->number_accounts)?>)</div>
                                    </div>
                                    <ul class="pricing-tables-position">
                                        <?php 
                                        if(!empty($social_list)){
                                            foreach ($social_list as $key => $name) {
                                        ?>
                                        <li class="<?=in_array($name, $social_list_permission)?"":"no"?>"><b><?=lang(strtolower($name))?></b> <?=lang('scheduling_automation')?></li>
                                        <?php }}?>
                                        <li> <?=lang('premium_support')?></li>
                                        <li> <?=lang('spintax_support')?></li>
                                        <li class="<?=in_array("watermark", $permission)?"":"no"?>"> <?=lang('watermark_support')?></li>
                                        <li class="<?=in_array("image_editor", $permission)?"":"no"?>"> <?=lang("image_editor_support")?></li>
                                        <li> <?=lang('cloud_import')?>: 
                                            <?php if(in_array("google_drive",$permission) || in_array("dropbox",$permission)){?>
                                            <strong class="filetype note <?=in_array("google_drive",$permission)?"text-primary":"text-muted"?>"><?=lang("google_drive")?></strong>, 
                                            <strong class="filetype note <?=in_array("dropbox", $permission)?"text-primary":"text-muted"?>"><?=lang("dropbox")?></strong>
                                            <?php }else{?>
                                            <span class="note"><?=lang('not_available')?></span>
                                            <?php }?>
                                        </li>

                                        <li> <?=lang('file_type_support')?>:
                                            <?php if(in_array("photo_type",$permission) || in_array("video_type",$permission)){?>
                                            <strong class="filetype note <?=in_array("photo_type",$permission)?"text-primary":"text-muted"?>"><?=lang("photo")?></strong>, 
                                            <strong class="filetype note <?=in_array("video_type", $permission)?"text-primary":"text-muted"?>"><?=lang("video")?></strong>
                                            <?php }else{?>
                                            <span class="note"><?=lang('not_available')?></span>
                                            <?php }?>
                                        </li>
                                        <li> <?=lang('max_storage_size_ouput')?> <strong class="text-primary"><?=get_value($permission, "max_storage_size")?> <?=lang("mb")?></strong></li>
                                        <li> <?=lang('max_file_size_output')?> <strong class="text-primary"><?=get_value($permission, "max_file_size")?> <?=lang("mb")?></strong></li>
                                    </ul>
                                    <a href="<?=(session("uid"))?cn('payment/'.$row->ids.'?type=1'):cn("auth/login?redirect=payment/".$row->ids.'?type=1')?>" class="button button-uppercase"><?=lang('upgrade_now')?><span class="semicircle"></span><i class="dripicons-arrow-thin-right"></i></a>
                                  </div>
                                  <br/>
                                <div>
                                </div>
                            </div>
                        </div>  
                        <?php }}?>

                    </div>
                </div>
            </div>
        </div>
</section>