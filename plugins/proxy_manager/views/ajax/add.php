<form class="actionForm" action="<?=cn("proxy_manager/ajax_add")?>" data-redirect="<?=cn("proxy_manager/edit")?>">

<div class="form-group">

    <div class="row nav">

        <ul class="tab-type nav-tabs">

            <li class="col-xs-12 col-sm-12 col-md-12 active">

            	<a href="#media" class="item" data-toggle="tab">

	                <i class="fas fa-plus"></i> <?=lang('Add new')?>

	            </a>

            </li>

        </ul>

    </div> 



    <div class="row">

        <div class="col-md-6">

            <div class="tab-content b0 mt15">

                <div id="media" class="tab-pane fade in active">

                    <div class="form-group">

                        <label><?=lang("Address")?></label>

                        <div class="form-group form-help">

                            <input type="text" class="form-control" name="address" id="address" placeholder="<?=lang("Enter your proxy")?>" value="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label><?=lang("Location")?></label>

                        <select name="location" class="form-control" id="location">

                            <option value="unknown"><?=lang("unknown")?></option>

                            <?php foreach (list_countries() as $key => $value){?>

                                <option value="<?=$key?>" <?=(!empty($result) && $key == $result->location)?"selected":""?>><?=$value?></option>                             

                            <?php }?>                                

                        </select>

                    </div>

                    <div class="form-group form-help mb0">

                        <label><?=lang("Packages")?></label><br/>

                        <?php

                        if(!empty($packages)){

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

                            <input type="number" class="form-control" name="limit" placeholder="" value="1">

                        </div>

                    </div>

                    <div class="card-footer pr0 pl0">

                        <a href="<?=cn("proxy_manager")?>" class="btn btn-default"><?=lang('cancel')?></a>

                        <button type="submit" class="btn btn-primary pull-right"><?=lang('update')?></button>

                        <div class="clearfix"></div>

                    </div>

                </div>

                <div id="assigned_for" class="tab-pane fade in">

                    LOVE

                </div>

                <div id="advance" class="tab-pane fade in">

                    sss

                </div>

            </div>

        </div>

    </div>



    <div class="clearfix"></div>

</div>

</form>



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