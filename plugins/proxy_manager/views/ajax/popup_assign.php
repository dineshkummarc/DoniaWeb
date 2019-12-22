<link rel="stylesheet" type="text/css" href="<?=BASE?>assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?=BASE?>plugins/proxy_manager/assets/css/select2-bootstrap.min.css">
<script type="text/javascript" src="<?=BASE?>assets/plugins/select2/js/select2.full.min.js"></script>

<div id="load_popup_modal_contant" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title"> <?=lang("Assign proxy")?></div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <form action="<?=cn("proxy_manager/ajax_assign_proxy/".$social."/".$ids)?>" data-type-message="text" data-redirect="" data-async role="form" class="actionForm" role="form" method="POST" >
                            <div class="form-notify"></div>
                            <div class="form-group">
                                <label class="control-label" for="username"><?=lang("Select proxy")?></label>
                                <div class="select2-wrapper">
                                    <select class="dropdown-assign" name="proxy">
                                        <option></option>
                                        <?php if(!empty($proxies)){
                                        foreach ($proxies as $proxy) {
                                        ?>
                                        <option value="<?=$proxy->ids?>"><?=$proxy->address?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb0">
                                <input type="submit" value="<?=lang('submit')?>" class="btn btn-primary pull-right" />
                            </div>
                            <div class="mb0 iframe_access_token">

                            </div>
                        </form>
                
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $( ".dropdown-assign" ).select2({
            placeholder: "<?=lang("Select a proxy")?>",
            theme: "bootstrap"
        });
    });
</script>