<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <?php if(file_exists(APPPATH."modules/post")){?>
                <li class="<?=(segment(1) == 'post')?"active":""?>">
                    <a href="<?=cn("post")?>">
                        <i class="far fa-paper-plane" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('publish_all')?>"></i>
                        <span class="name"> <?=lang('publish_all')?></span>
                    </a>
                </li>
                <li class="nav-line"></li>
                <?php }?>

                <?php sidebar();?>
                <li class="nav-line"></li>

                <?php plugins();?>
                
                <li class="<?=(segment(1) == 'dashboard')?"active":""?>">
                    <a href="<?=cn("dashboard")?>">
                        <i class="fas fa-chart-bar"></i> <span> <?=lang('dashboard')?> </span>
                    </a>
                </li>
                
                <li class="<?=(segment(1) == 'schedules')?"active":""?>">
                    <a href="<?=cn("schedules")?>">
                        <i class="far fa-calendar" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('schedules')?>"></i>
                        <span class="name"> <?=lang('schedules')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'account_manager')?"active":""?>">
                    <a href="<?=cn("account_manager")?>">
                        <i class="fas fa-chalkboard-teacher" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('account_manager')?>"></i>
                        <span class="name"> <?=lang('account_manager')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'group_manager')?"active":""?>">
                    <a href="<?=cn("group_manager")?>">
                        <i class="far fa-object-group" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('Group manager')?>"></i>
                        <span class="name"> <?=lang('Group manager')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'caption')?"active":""?>">
                    <a href="<?=cn("caption")?>">
                        <i class="far fa-closed-captioning" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('caption')?>"></i>
                        <span class="name"> <?=lang('caption')?></span>
                    </a>
                </li>

                <?php if(permission("photo_type") || permission("video_type")){?>
                <li class="<?=(segment(1) == 'file_manager')?"active":""?>">
                    <a href="<?=cn("file_manager")?>">
                        <i class="far fa-folder" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('file_manager')?>"></i>
                        <span class="name"> <?=lang('file_manager')?></span>
                    </a>
                </li>
                <?php }?>

                <?php if(permission("watermark")){?>
                <li class="<?=(segment(1) == 'tools')?"active":""?>">
                    <a href="<?=cn("tools")?>">
                        <i class="fas fa-toolbox" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('tools')?>"></i>
                        <span class="name"> <?=lang('tools')?></span>
                    </a>
                </li>
                <?php }?>

                <?php if(get_role()){?>
                <li class="nav-line"></li>
                <li class="<?=(segment(1) == 'users')?"active":""?>">
                    <a href="<?=cn("users")?>">
                        <i class="far fa-user" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('user_manager')?>"></i>
                        <span class="name"> <?=lang('user_manager')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'packages')?"active":""?>">
                    <a href="<?=cn("packages")?>">
                        <i class="fas fa-archive" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('packages')?>"></i>
                        <span class="name"> <?=lang('packages')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'payment_history')?"active":""?>">
                    <a href="<?=cn("payment_history")?>">
                        <i class="fab fa-cc-amazon-pay" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('payment_history')?>"></i>
                        <span class="name"> <?=lang('payment_history')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'proxies')?"active":""?>">
                    <a href="<?=cn("proxies")?>">
                        <i class="fas fa-shield-alt" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('proxies')?>"></i>
                        <span class="name"> <?=lang('proxies')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'module')?"active":""?>">
                    <a href="<?=cn("module")?>">
                        <i class="fas fa-window-restore" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('modules')?>"></i>
                        <span class="name"> <?=lang('modules')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'language')?"active":""?>">
                    <a href="<?=cn("language")?>">
                        <i class="fa fa-language" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('language')?>"></i>
                        <span class="name"> <?=lang('language')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'custom_page')?"active":""?>">
                    <a href="<?=cn("custom_page")?>">
                        <i class="far fa-file-alt" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('custom_page')?>"></i>
                        <span class="name"> <?=lang('custom_page')?></span>
                    </a>
                </li>

                <li class="<?=(segment(1) == 'settings' && segment(2) == 'general')?"active":""?>">
                    <a href="<?=cn("settings/general")?>">
                        <i class="fas fa-cog" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('general_settings')?>"></i>
                        <span class="name"> <?=lang('general_settings')?></span>
                    </a>
                </li>

                <li class="nav-line"></li>

                <li class="<?=(segment(1) == 'cron')?"active":""?>">
                    <a href="<?=cn("cron")?>">
                        <i class="fas fa-history" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('cronjobs')?>"></i>
                        <span class="name"> <?=lang('cronjobs')?></span>
                    </a>
                </li>

                <li>
                    <a href="http://doc.stackposts.com" target="_blank">
                        <i class="far fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?=lang('documentation')?>"></i>
                        <span class="name"> <?=lang('documentation')?></span>
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>
