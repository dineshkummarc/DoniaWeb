<div class="wrap-content container list-pinterest-accounts">
    <form action="<?=cn('pinterest/ajax_add_board')?>" data-redirect="<?=cn("account_manager")?>" class="actionForm" method="post">
    <div class="list-add-accounts">
        <div class="account_info">
            <div class="title"><?=$account->username?> <?=lang('account')?></div>
            <div class="desc"><?=lang('select_boards_to_start_your_plan')?></div>
        </div>

        <input type="hidden" name="ids" name="ids" value="<?=segment(3)?>">
        <ul class="list-group">
            <?php if(!empty($boards)){
                foreach ($boards as $key => $board) { 
            ?>

            <?php if($key == 0){?>
            <li class="list-group-item item-header">
                <i class="fa fa-user"></i> <?=lang('Boards')?>
            </li>
            <?php }?>

            <li class="list-group-item">
                <div class="pure-checkbox grey mr15">
                    <input type="checkbox" id="md_checkbox_<?=$board->id?>" name="boards[]" class="filled-in chk-col-red" value="<?=$board->id?>">
                    <label class="p0 m0" for="md_checkbox_<?=$board->id?>">&nbsp;</label>
                    <span class="checkbox-text-right"><?=$board->name?></span>
                </div>
            </li>
            <?php }}?>

            <li class="list-group-item text-center">
                <button type="submit" class="btn btn-success"><?=lang('add_account')?></button>
            </li>
        </ul>
    </div>
    </form>
</div>