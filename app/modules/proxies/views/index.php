<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left"><?=lang('proxies')?></h4>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#"><?=lang('proxies')?></a></li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row pn-mode pn-mode-users m-t--30">

    <a href="javascript:void(0);" class="pn-toggle-open"><i class="far fa-sticky-note" aria-hidden="true"></i></a>

    <div class="pn-sidebar pn-scroll card">

        <div class="pn-box-sidebar">



            <h3 class="head-title"><?=lang("proxies")?> <a href="<?=cn("proxies/index/add")?>" class="pull-right text-primary" title="<?=lang("add_new")?>"><i class="fas fa-plus-circle"></i></a></h3>



            <div class="box-search">

                <div class="input-group">

                  <input type="text" class="form-control pn-search" placeholder="<?=lang("Search")?>" aria-describedby="basic-addon2">

                  <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>

                </div>

            </div>



            <?php if(!empty($proxies)){

            foreach ($proxies as $proxy) {

            ?>

            <div class="item item-3">

                <a href="<?=cn("proxies/index/edit/".$proxy->ids)?>" data-content="pn-ajax-content" data-result="html" class="actionItem" onclick="history.pushState(null, '', '<?=cn("proxies/index/edit/".$proxy->ids)?>');">

                    <div class="icon bg-success white"><i class="fas fa-shield-alt"></i></div>

                    <div class="content content-2">

                        <div class="title"><?=$proxy->address?></div>

                        <div class="desc"><?=$proxy->location?></div>

                    </div>

                </a>

                <?php if($proxy->status == 1){?>

                <div class="option">

                    <div class="dropdown">

                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">

                            <i class="ft-more-vertical"></i>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-right">

                            <li><a href="<?=cn("proxies/ajax_delete_item/")?>" data-id="<?=$proxy->ids?>" data-redirect="<?=cn("proxies")?>" class="actionItem"><?=lang("delete")?></a></li>

                        </ul>

                    </div>

                </div>

                <?php }?>

            </div>

            <?php }}?>

        </div>

    </div>

    <div class="pn-content pn-scroll card">

        <form action="<?=cn("proxies/ajax_update")?>" data-redirect="<?=cn("proxies")?>" class="actionForm" method="POST">

            <div class="pn-ajax-content">

                <?=$view?>

            </div>

        </form>

    </div>

</div>



<style type="text/css">



</style>