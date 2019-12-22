<div class="wrap-content container">
    <form action="<?=cn('telegram/ajax_add_account')?>" data-redirect="<?=cn("account_manager")?>" class="actionForm" method="post">
    <div class="list-add-accounts">
        <div class="account_info">
            <div class="title"><?=lang('Telegram accounts')?></div>
        </div>

        <input type="hidden" name="ids" name="ids" value="<?=segment(3)?>">
        <?php if(!empty($result)){
            $data_groups = array();
        ?>
        <ul class="list-group">
            <?php
            $count_channel = 0;
            foreach ($result as $key => $row) {
                if(isset($row->channel_post) && !in_array($row->channel_post->chat->id, $data_groups)){
                    $data_groups[] = $row->channel_post->chat->id;
            ?>

            <?php if($count_channel == 0){?>
            <li class="list-group-item item-header">
                <i class="fa fa-bullhorn"></i> <?=lang('Telegram channels')?>
            </li>
            <?php }?>

            <li class="list-group-item">
                <div class="pure-checkbox grey mr15">
                    <input type="checkbox" id="md_checkbox_<?=$row->channel_post->chat->id?>" name="accounts[]" class="filled-in chk-col-red" value="<?=$row->channel_post->chat->id?>">
                    <label class="p0 m0" for="md_checkbox_<?=$row->channel_post->chat->id?>">&nbsp;</label>
                    <span class="checkbox-text-right"><?=$row->channel_post->chat->title?></span>
                </div>
            </li>
            <?php $count_channel++; }}?>



            <?php
            $count_group = 0;
            foreach ($result as $key => $row) {
                if(isset($row->message) && !in_array($row->message->chat->id, $data_groups)){
                    $data_groups[] = $row->message->chat->id;
            ?>

            <?php if($count_group == 0){?>
            <li class="list-group-item item-header">
                <i class="fa fa-users"></i> <?=lang('Telegram groups')?>
            </li>
            <?php }?>

            <li class="list-group-item">
                <div class="pure-checkbox grey mr15">
                    <input type="checkbox" id="md_checkbox_<?=$row->message->chat->id?>" name="accounts[]" class="filled-in chk-col-red" value="<?=$row->message->chat->id?>">
                    <label class="p0 m0" for="md_checkbox_<?=$row->message->chat->id?>">&nbsp;</label>
                    <span class="checkbox-text-right"><?=$row->message->chat->title?></span>
                </div>
            </li>
            <?php $count_group++; }}?>
            
            <li class="list-group-item text-center">
                <button type="submit" class="btn btn-success"><?=lang('add_account')?></button>
            </li>

        </ul>
        <?php }else{?>
            <div class="dataTables_empty"></div>
        <?php }?>
    </div>
    </form>
</div>