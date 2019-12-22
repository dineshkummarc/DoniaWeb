<?php
    $module_name = "reddit";
?>
<div class="<?=$module_name?>-app">

    <div class="preview-<?=$module_name?>">
        <div class="card">
            <div class="card-block p0">

                <!--TEXT-->
                <div class="preview-<?=$module_name?>-view preview-<?=$module_name?>-text <?=segment(1)=="post"?"":"hide"?>">
                    <div class="preview-header">
                        <div class="preview-logo"><i class="fa fa-<?=$module_name?>"></i></div>
                    </div>

                    <div class="preview-content">

                        <div class="preview-user">
                            <img class="img-circle" src="<?=BASE?>public/facebook/assets/img/avatar.png">
                            <div class="text">
                                <div class="name"> <?=lang('anonymous')?> <span style="font-weight: 400; font-size: 10px;"> • <?=lang('Posted by anonymous just now')?></span></div>
                            </div>
                        </div>

                        <div class="preview-title">
                            <div class="line-no-text"></div>
                        </div>

                        <div class="preview-reddit-caption">
                            <div class="line-no-text"></div>
                            <div class="line-no-text"></div>
                            <div class="line-no-text w50"></div>
                        </div>

                    </div>

                    <div class="preview-footer">
                        <ul>
                            <li><i class="reddit-icon reddit-icon-comment"></i> <?=lang('Comment')?></li>
                            <li><i class="reddit-icon reddit-icon-share"></i> <?=lang('Share')?></li>
                            <li><i class="reddit-icon reddit-icon-approve"></i> <?=lang('Approve')?></li>
                            <li><i class="reddit-icon reddit-icon-remove"></i> <?=lang('Remove')?></li>
                            <li><i class="reddit-icon reddit-icon-spam"></i> <?=lang('Spam')?></li>
                            <li><i class="reddit-icon reddit-icon-modActions"></i></li>
                            <li><i class="reddit-icon reddit-icon-menu"></i></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--IMAGE-->
                <div class="preview-<?=$module_name?>-view preview-<?=$module_name?>-media <?=segment(1)=="post"?"hide":""?>">
                    <div class="preview-header">
                        <div class="preview-logo"><i class="fa fa-<?=$module_name?>"></i></div>
                    </div>

                    <div class="preview-content">

                        <div class="preview-user">
                            <img class="img-circle" src="<?=BASE?>public/facebook/assets/img/avatar.png">
                            <div class="text">
                                <div class="name"> <?=lang('anonymous')?> <span style="font-weight: 400; font-size: 10px;"> • <?=lang('Posted by anonymous just now')?></span></div>
                            </div>
                        </div>

                        <div class="preview-title">
                            <div class="line-no-text"></div>
                        </div>

                        <div class="preview-image"></div>

                    </div>

                    <div class="preview-footer">
                        <ul>
                            <li><i class="reddit-icon reddit-icon-comment"></i> <?=lang('Comment')?></li>
                            <li><i class="reddit-icon reddit-icon-share"></i> <?=lang('Share')?></li>
                            <li><i class="reddit-icon reddit-icon-approve"></i> <?=lang('Approve')?></li>
                            <li><i class="reddit-icon reddit-icon-remove"></i> <?=lang('Remove')?></li>
                            <li><i class="reddit-icon reddit-icon-spam"></i> <?=lang('Spam')?></li>
                            <li><i class="reddit-icon reddit-icon-modActions"></i></li>
                            <li><i class="reddit-icon reddit-icon-menu"></i></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--LINK-->
                <div class="preview-<?=$module_name?>-view preview-<?=$module_name?>-link hide">
                    <div class="preview-header">
                        <div class="preview-logo"><i class="fa fa-<?=$module_name?>"></i></div>
                    </div>

                    <div class="preview-content">

                        <div class="preview-left">
                            <div class="preview-user">
                                <img class="img-circle" src="<?=BASE?>public/facebook/assets/img/avatar.png">
                                <div class="text">
                                    <div class="name"> <?=lang('anonymous')?> <span style="font-weight: 400; font-size: 10px;"> • <?=lang('Posted by anonymous just now')?></span></div>
                                </div>
                            </div>

                            <div class="preview-title">
                                <div class="line-no-text"></div>
                            </div>

                            <div class="preview-link">
                                <div class="line-no-text"></div>
                            </div>
                        </div>

                        <div class="preview-link-info">
                            <i class="fa fa-link link" aria-hidden="true"></i>
                            <i class="fa fa-external-link open" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="preview-footer">
                        <ul>
                            <li><i class="reddit-icon reddit-icon-comment"></i> <?=lang('Comment')?></li>
                            <li><i class="reddit-icon reddit-icon-share"></i> <?=lang('Share')?></li>
                            <li><i class="reddit-icon reddit-icon-approve"></i> <?=lang('Approve')?></li>
                            <li><i class="reddit-icon reddit-icon-remove"></i> <?=lang('Remove')?></li>
                            <li><i class="reddit-icon reddit-icon-spam"></i> <?=lang('Spam')?></li>
                            <li><i class="reddit-icon reddit-icon-modActions"></i></li>
                            <li><i class="reddit-icon reddit-icon-menu"></i></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--NONE-->
                <div class="preview-<?=$module_name?>-view preview-<?=$module_name?>-none hide">
                    
                    <div class="preview-error">
                        <?=lang("This social network not support post this type post")?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>   