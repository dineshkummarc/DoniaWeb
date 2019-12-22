<div class="coupon-tab">
    <div class="form-group">
        <form class="actionForm" action="<?=cn("coupon/ajax_verify")?>" data-redirect="">
            <div class="input-group">
                <input type="hidden" name="package" value="<?=$package->ids?>">
                <input type="text" class="form-control" placeholder="<?=lang("Coupon code")?>" name="code" aria-describedby="basic-addon2" value="<?=$coupon_code?>">
                <span class="input-group-btn">
                    <?php if($coupon_code != ""){?>
                    <a href="<?=cn("coupon/ajax_remove")?>" class="btn btn-default text-danger actionItem" id="<?=$coupon_code?>" data-redirect=""><i class="ft-trash"></i></a>
                    <?php }?>
                    <button class="btn btn-primary" type="submit"><?=lang("submit")?></button>
                </span>
            </div>
        </form>
    </div>
</div>