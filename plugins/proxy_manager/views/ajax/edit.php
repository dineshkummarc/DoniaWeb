<div class="form-group">
    <div class="row nav">
        <ul class="tab-type nav-tabs">
            <li class="col-xs-4 col-sm-4 col-md-4 <?=segment(4)==""?"active":""?>">
            	<a href="#media" class="item" data-toggle="tab" onclick="history.pushState(null, '', '<?=cn("proxy_manager/edit/".$proxy->ids)?>');">
	                <i class="ft-info"></i> <?=lang('Info')?>
	            </a>
            </li>
            <li class="col-xs-4 col-sm-4 col-md-4 <?=segment(4)=="assigned"?"active":""?>">
	            <a href="#assigned_for" class="item" data-toggle="tab" onclick="history.pushState(null, '', '<?=cn("proxy_manager/edit/".$proxy->ids."/assigned")?>');">
	                <i class="ft-user"></i> <?=lang('Assigned For')?>
	            </a>
	        </li>
            <li class="col-xs-4 col-sm-4 col-md-4 <?=segment(4)=="advance"?"active":""?>">
	            <a href="#advance" class="item" data-toggle="tab" onclick="history.pushState(null, '', '<?=cn("proxy_manager/edit/".$proxy->ids."/advance")?>');">
	                <i class="ft-repeat"></i> <?=lang('Advance options')?>
	            </a>
	        </li>
        </ul>
    </div> 

    <div class="row">
        <div class="col-md-12">
            <div class="tab-content b0 mt15">
                <div id="media" class="tab-pane fade in <?=segment(4)==""?"active":""?>">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="actionForm" action="<?=cn("proxy_manager/ajax_add")?>" data-redirect="<?=cn("proxy_manager/edit")?>">
                                <input type="hidden" class="form-control" name="ids" value="<?=$proxy->ids?>">
                                <div class="form-group">
                                    <label><?=lang("Address")?></label>
                                    <div class="form-group form-help">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="<?=lang("Enter your proxy")?>" value="<?=$proxy->address?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?=lang("Location")?></label>
                                    <select name="location" class="form-control" id="location">
                                        <option value="unknown"><?=lang("unknown")?></option>
                                        <?php foreach (list_countries() as $key => $value){?>
                                            <option value="<?=$key?>" <?=(!empty($proxy) && $key == $proxy->location)?"selected":""?>><?=$value?></option>                             
                                        <?php }?>                                
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?=lang("Packages")?></label><br/>
                                    <?php
                                    if(!empty($packages)){
                                        $data= json_decode($proxy->package);
                                    foreach($packages as $row){?>
                                        <div class="pure-checkbox grey mr15 mb15">
                                             <input type="checkbox" id="md_checkbox_<?=$row->id?>" name="packages[]" class="filled-in chk-col-red" value="<?=$row->id?>" <?=(!empty($data) && in_array($row->id, $data))?"checked":""?>>
                                             <label class="p0 m0" for="md_checkbox_<?=$row->id?>">&nbsp;</label>
                                            <span class="checkbox-text-right <?=$row->id?>"> <?=$row->name?></span>
                                        </div>
                                    <?php }}?>
                                </div>
                                <div class="form-group">
                                    <label><?=lang("Limit")?></label>
                                    <div class="form-group form-help">
                                        <input type="number" class="form-control" name="limit" placeholder="" value="<?=$proxy->limit?>">
                                    </div>
                                </div>
                                <div class="card-footer pr0 pl0">
                                    <a href="<?=cn("proxy_manager")?>" class="btn btn-default"><?=lang('cancel')?></a>
                                    <button type="submit" class="btn btn-primary pull-right"><?=lang('update')?></button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
                <div id="assigned_for" class="tab-pane fade in  <?=segment(4)=="assigned"?"active":""?>">
                    <div class="row">
                        <?php if(!empty($assigned)){
                            foreach ($assigned as $key => $accounts) {
                        ?>
                        <div class="col-md-4 col-sm-4">
                            <div class="card" style="border: 1px solid #f5f5f5;">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="fa fa-<?=$key?>" aria-hidden="true"></i> <?=$key?>
                                    </div>
                                </div>
                                <div class="card-block p0">
                                    <div class="account-manager-list scrollbar scrollbar-dynamic">
                                        <?php foreach ($accounts as $row) { ?> 
                                        <div class="item">
                                            <div class="am-img">
                                                <img class="img-circle" src="<?=$row->avatar?>">
                                            </div>
                                            <a class="am-info" href="javascript:void(0);" target="_blank">
                                                <div class="username"><?=$row->username?> 
                                                    <?php if($row->status == 0){ ?>
                                                    <span class="small error"><?=lang("re_login")?></span>
                                                    <?php }?>
                                                </div>
                                            </a>
                                            <div class="am-option">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <i class="ft-more-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="<?=cn("proxy_manager/ajax_remove_assign/".$key)?>" class="actionItem removeAssignedProxy" data-id="<?=$row->ids?>"><?=lang("delete")?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }}else{?>
                            <div class="dataTables_empty"></div>
                        <?php }?>
                    </div>
                </div>
                <div id="advance" class="tab-pane fade in  <?=segment(4)=="advance"?"active":""?>">
                    <div class="form-group">
                        <a href="<?=cn("proxy_manager/ajax_check_proxy")?>" class="btn btn-success actionItem" data-id="<?=$proxy->address?>"><?=lang("Check proxy")?></a>
                        <a href="<?=cn("proxy_manager/ajax_delete_item")?>" data-id="<?=$proxy->ids?>" data-redirect="<?=cn("proxy_manager")?>" class="btn btn-danger actionItem"><?=lang("delete")?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    $(function(){
        $("#address").change(function(){
            _ip      = "";
            _address = $(this).val();
            if(_address != ""){
                _address_parse = _address.split("@");
                if(_address_parse.length > 1){
                    if(_address_parse[1] != undefined){
                        ipport = _address_parse[1].split(":");
                        if(ipport.length == 2){
                            _ip = ipport[0]
                        }
                    }
                }else{
                    if(_address_parse[0] != undefined){
                        ipport = _address_parse[0].split(":");
                        if(ipport.length == 2){
                            _ip = ipport[0]
                        }
                    }
                }

                if(_ip == ""){
                    return false;
                }
                
                $.ajax({
                    url: "<?=cn("proxy_manager/detect_proxy/")?>"+_ip,
                    jsonpCallback: "callback",
                    dataType: "json",
                    success: function( location ) {
                        if(location != "success"){
                            $("#location").val(location.country_code);
                        }else{
                            $("#location").val("unknown");
                        }
                    }
                });
            }
        });
    });
</script>