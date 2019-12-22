<div class="tab-list">
    <div class="card">
        <div class="card-header p0">
            <ul class="nav nav-tabs">
            	<?php
            	if(!empty($socials)){
            		foreach ($socials as $key => $social) {
            	?>
                <li class="<?=$key==0?"active":""?>"><a href="<?=cn("proxy_manager/assign/".$key)?>" class="ml0 mr15 mt0" style="cursor: pointer; background-color: <?=$social->color?>;"><i class="<?=$social->icon?>"></i> <?=str_replace("_", " ", ucfirst($social->title))?></a></li>
                <?php }}?>
            </ul>
        </div>
        <div class="card-block p0">
            <div class="tab-content">
        		
                <div class="users app-table">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                            <div class="table-filter pl0 pr0">
                                <div class="row">
                                    <div class="col-md-3  col-sm-6 pull-right">
                                        <div class="input-group p0">
                                            <input type="text" class="form-control" name="k" placeholder="<?=lang("enter_keyword")?>" aria-describedby="button-addon" value="<?=get("k")?>">
                                            <span class="input-group-btn" id="button-addon">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-bordered mb0" width="100%">
                                <?php if(!empty($columns)){?>
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="javascript:void(0);">
                                                <span class="text"><?=lang("option")?></span>
                                            </a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0);">
                                                <span class="text"><?=lang("#")?></span>
                                            </a>
                                        </th>
                                        <?php 
                                        $i = 0;
                                        foreach ($columns as $key => $column) {?>
                                        <th>
                                            <?php 
                                            $sort_type = "asc";
                                            $sort_icon = "";
                                            if(get("c") == $i){
                                                if(get("t") == "asc"){
                                                    $sort_type = "desc";
                                                    $sort_icon = "up";
                                                }else{
                                                    $sort_type = "asc";
                                                    $sort_icon = "down";
                                                }
                                            }
                                            
                                            $sort_link = cn($module."/assign/instagram?c={$i}&t={$sort_type}");
                                            if(get("k")){
                                                $sort_link = $sort_link."&k=".get("k");
                                            }
                                            ?>
                                            <a href="<?=$sort_link?>">
                                                <span class="text"><?=$column?></span>

                                                <span class="sort-caret pull-right <?=$sort_icon?>">
                                                    <i class="asc fa fa-sort-asc" aria-hidden="true"></i>
                                                    <i class="desc fa fa-sort-desc" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </th>
                                        <?php 
                                        $i ++;
                                        }?>
                                    </tr>
                                </thead>
                                <?php }?>
                                <tbody>
                                <?php if(!empty($result) && !empty($columns)){
                                foreach ($result as $key => $row) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="btn-group btn-group-option <?=($key + 1 == count($result)?"dropup":"")?>">
                                                <a href="<?=cn($module."/popup_assign/".segment(3)."/".$row->ids)?>" class="btn btn-default ajaxModal" title=""><i class="ft-shield"></i> <?=lang("Set proxy")?></a>
                                                <a href="<?=cn($module."/ajax_remove_assign/".segment(3))?>" data-id="<?=$row->ids?>" class="btn btn-default actionItem" data-placement="left" data-redirect="" title="<?=lang("delete")?>"><i class="ft-x"></i></a>
                                            </div>
                                        </td>
                                        <th scope="row"><?=$page + $key + 1?></th>
                                        <?php foreach ($columns as $column_name => $column_title){?>
                                        <td><?=custom_row($row->$column_name, $column_name, $module, $row->ids)?></td>
                                        <?php }?>
                                    </tr>
                                <?php }}?>
                                </tbody>
                            </table>
                            </div>
                            </form>
                        </div>
                        <?php if(!empty($result) && !empty($columns) && $this->pagination->create_links() != ""){?>
                        <div class="card-footer">
                            <?=$this->pagination->create_links();?>
                        </div>
                        <?php }?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<style type="text/css">
.tab-list .card-header .nav-tabs>li>a{
    border-radius: 4px;
    padding: 8px;
}

.tab-list .card-block .tab-content{
    padding: 0 0px;
    border-top: none;
}
</style>