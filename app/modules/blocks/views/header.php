<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="<?=cn("dashboard")?>" class="logo">
            <span>
                <img src="<?=get_option("website_logo_black", BASE.'assets/img/logo-black.png')?>" alt="" height="40">
            </span>
            <i>
                <img src="<?=get_option("website_logo_mark", BASE.'assets/img/logo-mark.png')?>" alt="" height="22">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0 header-menu">
            <?php if(get_option('show_subscription', 0)==1){?>
            <li class="list-inline-item hide-phone">
                <?php if(check_expiration_date()){?>
                <span class="" style="color: #797979;"><?=sprintf( lang("Subscription expire: %s"), date("d-m-Y", strtotime($user->expiration_date)) )?></span>
                <?php }else{?>
                    <span class="text-danger"><?=lang("Subscription expired")?></span>
                <?php }?>
            </li>
            <?php }?>

            <?php if(get_payment()){?>
            <li class="list-inline-item hide-phone">
                <a class="menu-button" href="<?=cn("pricing")?>">
                    <div class="btn btn-success btn-rounded w-md waves-effect waves-light"><?=lang('upgrade_now')?></div>
                </a>
            </li>
            <?php }?>

            <?php if(get_option('enable_headwayapp', 0) == 1 && get_option('headwayapp_account_id', '') != ""){?>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon waves-light waves-effect"></i>
                </a>
                <span class="badgeCont badge badge-purple noti-icon-badge">2</span>
            </li>
            <?php }?>

            <?php 
            $lang_default = get_default_language();
            if (!empty($lang_default)) {
            ?>
            <li class="list-inline-item dropdown notification-list hide-phone">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown"  href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <span class="<?=$lang_default->icon?>" style="font-size: 16px;"></span> 
                    <i class="dropdown-down-icon ft-chevron-down noti-icon waves-light waves-effect"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right dropdown-arrow dropdown-lg">
                    <?php if(!empty($languages)){
                        foreach ($languages as $key => $value) {
                    ?>
                        <a class="dropdown-item  notify-item" href="<?=cn('set_language')?>" data-redirect="<?=current_url()?>" data-id="<?=$value->code?>"><i class="<?=$value->icon?>"></i> <?=$value->name?></a>
                    <?php }}?>
                </div>
            </li>
            <?php }?>

            <!-- <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-email-outline noti-icon waves-light waves-effect"></i>
                </a>
                <span class="badge badge-purple noti-icon-badge">3</span>
                <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right dropdown-arrow dropdown-lg">
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                    </div>

                    <div class="slimscroll" style="max-height: 230px;">
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon"><img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                        </a>
                    </div>

                    <a href="javascript:void(0);" class="dropdown-item text-center text-dark notify-item notify-all">
                        View all <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li> -->

            <!-- <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon waves-light waves-effect"></i>
                </a>
                <span class="badge badge-pink noti-icon-badge">4</span>
                <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right dropdown-arrow dropdown-lg">
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                    </div>

                    <div class="slimscroll" style="max-height: 230px;">
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon text-success"><i class="mdi mdi-comment-account-outline"></i></div>
                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                        </a>
                    </div>

                    <a href="javascript:void(0);" class="dropdown-item text-center text-dark notify-item notify-all">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li> -->

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="noti-icon"><img src="<?=BASE?>assets/img/default-avatar.png" alt="user" class="img-fluid rounded-circle"></i>
                    <span class="profile-username ml-2 text-dark"><?=get_field(USERS, session("uid"), "fullname")?></span>
                    <span class="mdi mdi-menu-down text-dark"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right profile-dropdown ">
                    <a class="dropdown-item notify-item" href="<?=cn('profile')?>"><i class="mdi mdi-account-circle"></i> <?=lang('profile')?></a>
                    <a class="dropdown-item notify-item" href="<?=cn('auth/logout')?>"><i class="mdi mdi-power"></i> <?=lang('logout')?></a>

                    <?php
                    $lang_default = get_default_language();
                    if(!empty($lang_default)){
                    ?>

                    <div class="language-mobile">
                        <div class="name"><i class="fas fa-language"></i> Language</div>
                        <?php if(!empty($languages)){
                        foreach ($languages as $key => $value) {
                        ?>
                            <a class="dropdown-item notify-item <?=$lang_default->code == $value->code?"bg-primary":""?>" href="<?=cn('set_language')?>" data-redirect="<?=current_url()?>" data-id="<?=$value->code?>">
                                <i class="<?=$value->icon?>"></i> 
                                <?=$value->name?>
                            </a>
                        <?php }}?>
                    </div>
                    <?php }?>

                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <!-- <li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li> -->
        </ul>

    </nav>    
</div>
