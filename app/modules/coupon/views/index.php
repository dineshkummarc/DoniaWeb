<div class="row pn-mode pn-mode-users">

    <a href="javascript:void(0);" class="pn-toggle-open"><i class="ft-percent" aria-hidden="true"></i></a>

    <div class="pn-sidebar pn-scroll">

        <div class="pn-box-sidebar">



            <h3 class="head-title"><?=lang("Coupon manager")?> <a href="<?=cn("coupon/index/add")?>" class="pull-right text-primary" title="<?=lang("add_new")?>"><i class="fas fa-plus-circle"></i></a></h3>



            <div class="box-search">

                <div class="input-group">

                  <input type="text" class="form-control pn-search" placeholder="<?=lang("Search")?>" aria-describedby="basic-addon2">

                  <span class="input-group-addon" id="basic-addon2"><i class="ft-search"></i></span>

                </div>

            </div>



            <?php if(!empty($coupons)){

            foreach ($coupons as $coupon) {



                $expiration_date = strtotime($coupon->expiration_date);

                $now = strtotime(NOW);



                $check = true;

                if($now > $expiration_date){

                    $check = false;

                }





            ?>

            <div class="item item-3">

                <a href="<?=cn("coupon/index/edit/".$coupon->ids)?>" data-content="pn-ajax-content" data-result="html" class="actionItem" onclick="history.pushState(null, '', '<?=cn("coupon/index/edit/".$coupon->ids)?>');">

                    <div class="icon bg-danger white"><i class="ft-percent"></i></div>

                    <div class="content content-2">

                        <div class="title"><?=$coupon->name?></div>

                        <div class="desc"><span class="<?=!$check?"text-danger":""?>" title="<?=!$check?lang("Expired"):""?>"><?=$coupon->code?></span></div>

                    </div>

                </a>

                <div class="option">

                    <div class="dropdown">

                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">

                            <i class="ft-more-vertical"></i>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-right">

                            <li><a href="<?=cn("coupon/ajax_delete_item/")?>" data-id="<?=$coupon->ids?>" data-redirect="<?=cn("coupon")?>" class="actionItem"><?=lang("delete")?></a></li>

                        </ul>

                    </div>

                </div>



            </div>

            <?php }}?>

        </div>

    </div>

    <div class="pn-content pn-scroll">

        <form action="<?=PATH?>coupon/ajax_update" method="POST" class="actionForm">

            <div class="pn-ajax-content">

                <?=$view?>

            </div>

        </form>

    </div>

</div>



<style type="text/css">



</style>