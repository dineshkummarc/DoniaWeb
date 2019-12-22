<?php 
if(get_option('pinterest_login_username_password', 1)==1){
    $active_tab = 2;
}

if(get_option('pinterest_your_app', 0)==1){
    $active_tab = 1;
}

if(get_option('pinterest_button', 1)==1){
    $active_tab = 0;
}

?>

<div id="load_popup_modal_contant" class="facebook_popup_add" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title"><i class="fa fa-pinterest"></i> <?=lang('Add Pinterest Boards')?> </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <?php if(get_option('pinterest_button', 1)==1){?>
                            <li class="<?=$active_tab==0?"active":""?>"><a data-toggle="tab" href="#pinterest_login_1"> <?=lang('Button')?></a></li>
                            <?php }?>
                            <?php if(get_option('pinterest_your_app', 0)==1){?>
                            <li class="<?=$active_tab==1?"active":""?>"><a data-toggle="tab" href="#pinterest_login_2"> <?=lang('Your app')?></a></li>
                            <?php }?>
                            <?php if(get_option('pinterest_login_username_password', 1)==1){?>
                            <li class="<?=$active_tab==2?"active":""?>"><a data-toggle="tab" href="#pinterest_login_3"> <?=lang('Username & Password')?></a></li>
                            <?php }?>
                        </ul>

                        <div class="tab-content p15">
                            <?php if(get_option('pinterest_button', 1)==1){?>
                            <div id="pinterest_login_1" class="tab-pane fade in text-center <?=$active_tab==0?"active":""?>" style="padding: 50px;">
                                <a href="<?=cn("pinterest/oauth/1")?>" class="" style="background-color: #e60023; border-radius: 4px; color: #fff; display: inline-block; height: 45px; line-height: 45px;">
                                    <i class="fa fa-pinterest" style="font-size: 33px; padding: 7px; float: left;"></i>
                                    <span style="display: inline-block; padding-right: 15px;"><?=lang('Continue with Pinterest')?></span>
                                </a>
                            </div>
                            <?php }?>

                            <?php if(get_option('pinterest_your_app', 0)==1){?>
                            <div id="pinterest_login_2" class="tab-pane fade in <?=$active_tab==1?"active":""?>">
                                <form action="<?=PATH?>pinterest/set_app" data-redirect="<?=PATH?>pinterest/oauth" data-type-message="text" data-async role="form" class="actionForm" role="form" method="POST">
                                    <div class="form-notify"></div>
                                    <div class="form-group">
                                        <label class="control-label" for="app_id"><?=lang("Pinterest App ID")?></label>
                                            <input type="text" name="app_id" id="app_id" class="form-control" id="app_id" value="<?=!empty($account)?$account->app_id:""?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="app_secret"><?=lang("Pinterest App secret")?></label>
                                        <input type="text" name="app_secret" id="app_secret" class="form-control" id="app_secret" value="<?=!empty($account)?$account->app_secret:""?>">
                                    </div>

                                    <div class="form-group text-danger">
                                        <?=lang("Important: Need add this callback url on your pinterest app")?> <strong><?=cn("pinterest/add_account")?></strong>
                                    </div>

                                    <div class="modal-footer row mt15 pb0">
                                        <input name="submit_popup" type="submit" value="<?=lang('add_account')?>" class="btn btn-primary" />
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang("close")?></button>
                                    </div>
                                </form>
                            </div>
                            <?php }?>

                            <?php if(get_option('pinterest_login_username_password', 1)==1){?>
                            <div id="pinterest_login_3" class="tab-pane fade in <?=$active_tab==2?"active":""?>">
                                <form action="<?=PATH?>pinterest/login_with_username" data-redirect="<?=PATH?>pinterest/add_board" data-type-message="text" data-async role="form" class="actionForm" role="form" method="POST">
                                    <div class="form-notify"></div>
                                    <div class="form-group">
                                        <label class="control-label" for="username"><?=lang("Pinterest username")?></label>
                                            <input type="text" name="username" id="username" class="form-control" id="username" value="<?=!empty($account)?$account->account:""?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="password"><?=lang("Pinterest password")?></label>
                                        <input type="password" name="password" id="password" class="form-control" id="password" value="">
                                    </div>
                                    <?php if(get_option('user_proxy', 1) == 1){?>
                                    <div class="form-group">
                                        <label class="control-label" for="proxy"><?=lang("proxy")?></label>
                                        <input type="text" name="proxy" class="form-control" id="proxy" value="<?=!empty($account)?$account->proxy:""?>">
                                    </div>
                                    <?php }?>

                                    <div class="modal-footer row mt15 pb0">
                                        <input name="submit_popup" type="submit" value="<?=lang('add_account')?>" class="btn btn-primary" />
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang("close")?></button>
                                    </div>
                                </form>
                            </div>
                            <?php }?>
                            <div class="clearfix"></div>
                        </div>

                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

