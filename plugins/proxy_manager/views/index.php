<?php

$module_name = segment(1);

?> 

<div class="wrap-content proxy-manager row app-mod">

    <ul class="am-mobile-menu">

        <li><a href="javascript:void(0);" class="active" data-am-open="account"><?=lang("Accounts")?></a></li>

        <li><a href="javascript:void(0);" data-am-open="content"><?=lang("Content")?></a></li>

        <li><a href="javascript:void(0);" data-am-open="preview"><?=lang("Preview")?></a></li>

    </ul>

    <div class="clearfix"></div>



    <div class="am-sidebar active">

        <div class="box-search">

            <div class="input-group">

              <input type="text" class="form-control am-search" placeholder="<?=lang("search")?>" aria-describedby="basic-addon2">

              <span class="input-group-addon" id="basic-addon2"><i class="ft-search"></i></span>

            </div>

        </div>

        <?php if(!empty($proxies)){?>

        <ul class="box-list am-scroll">

            <?php

            foreach ($proxies as $key => $row) {

            ?>

            <li class="item <?=$row->ids == segment(3)?"active":""?> item-3">

                <a href="<?=cn("proxy_manager/edit/".$row->ids)?>" data-content="pn-ajax-content" data-result="html" class="actionItem" onclick="history.pushState(null, '', '<?=cn("proxy_manager/edit/".$row->ids)?>');">

                    <div class="box-img">

                        <img src="https://ui-avatars.com/api?name=<?=$row->location?>&size=128&background=fd397a&color=fff">

                        <div class="checked"><i class="fa fa-check"></i></div>

                    </div>

                    <div class="pure-checkbox grey mr15">

                        <input type="radio" name="account[]" class="filled-in chk-col-red" value="<?=$row->ids?>" <?=$row->ids == segment(3)?"checked":""?>>

                        <label class="p0 m0" for="md_checkbox_<?=$row->ids?>">&nbsp;</label>

                    </div>

                    <div class="box-info">

                        <div class="title"><?=$row->address?></div>

                        <div class="desc"><?=ucfirst($row->location)?> </div>

                    </div>

                </a> 

                <div class="option">

                    <div class="dropdown">

                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">

                            <i class="ft-more-vertical"></i>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-right">

                            <li><a href="<?=cn("proxy_manager/ajax_check_proxy")?>" data-id="<?=$row->address?>" class="actionItem"><?=lang("Check proxy")?></a></li>

                            <li><a href="<?=cn("proxy_manager/ajax_delete_item")?>" data-id="<?=$row->ids?>" data-redirect="<?=cn("proxy_manager")?>" class="actionItem"><?=lang("delete")?></a></li>

                        </ul>

                    </div>

                </div>

            </li>

            <?php }?>

        </ul>

        <?php }else{?>

        <div class="empty">

            <div class="text-center">

                <div class="dataTables_empty"></div>

            </div>  

            <a href="<?=cn("proxy_manager/add")?>" class="btn btn-primary"><?=lang("add_new")?></a>

        </div>



        <?php }?>

    </div>

    <div class="am-wrapper">



        <div class="am-content col-md-12 am-scroll pl15 pr15">

            

            <div class="head-title" style="padding: 10px 0px 17px; margin-bottom: 0;">

                <div class="name">

                    <i class="ft-shield" aria-hidden="true"></i> <?=lang("Proxy manager")?>

                </div>

                <div class="btn-group pull-right" role="group" aria-label="Basic example">

                  <a href="<?=cn("proxy_manager/add")?>" class="btn btn-default"><i class="fas fa-plus"></i> <?=lang("Add new")?></a>

                  <a href="<?=cn("proxy_manager/assign")?>" class="btn btn-default"><i class="ft-user"></i> <?=lang("Assign proxy")?></a>

                  <div class="btn btn-default fileinput-button">

                    <i class="ft-share"></i> <span> <?=lang("Import")?></span>

                    <input id="import_proxy" type="file" name="files[]" multiple="">

                </div>

                </div>

                <div class="clearfix"></div>

            </div>



            <div class="pn-ajax-content">

                <?=$view?>

            </div>



        </div>



    </div>



</div>



<script type="text/javascript">

    function openContent(){

        if($(window).width() <= 768){

            $(".am-mobile-menu li a[data-am-open='content']").click();

        }

    }



    $(function(){

        $(document).on("change", ".language-app table .lang-item", function(){

            var _code = $("#code").val();

            var _key = $(this).attr("name");

            var _value = $(this).val();

            var _data     = $.param({token:token, code: _code, key: _key, value: _value});



            $.post(PATH+"language/update_language_item", _data, function(_resut){

                Main.notify(_resut.message, _resut.status);

            },'json');

        });

        

        var url = PATH + "proxy_manager/ajax_import";

        $("#import_proxy").fileupload({

            url: url,

            dataType: 'json',

            formData: { token: token },

            done: function (e, data) {

                if(data.result.status == "success"){

                    Main.notify(data.result.message, data.result.status);

                    setTimeout("location.reload(true);", 3000);

                }else{

                    FileManager.hide_overplay();

                    Main.notify(data.result.message, data.result.status);

                }

            },

            progressall: function (e, data) {

                Main.overplay();

            }

        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

    });



</script>