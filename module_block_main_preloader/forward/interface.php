<head>
    <style>
    .ldBar{position:relative;}.ldBar.label-center > .ldBar-label{position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);text-shadow:0 0 3px var(--default-text-color);}.ldBar-label:after{content:"%";display:inline}.ldBar.no-percent .ldBar-label:after{content:""}.preloader{position:fixed;left:0;top:0;width:100%;height:100%;background:var(--sidebar-color);transition:1s all;opacity:1;visibility:visible;display:flex;align-items:center;justify-content:center;z-index:9999}.done{opacity:0;visibility:hidden}
    </style>
    <div id="page-preloader" class="preloader">
        <?php switch($Modules->array_modules['module_block_main_preloader']['setting']['type']): case 1:?>
        <div class="ldBar loader label-center" id="loader" data-preset="circle" data-stroke=var(--span-color)></div>
        <?php break;case 2:?>
        <?php if(file_exists('app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1])) {?>
            <img src=<?php echo 'app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1];?> id="loader" style="max-width:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][2] ?? 100?>px;max-height:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][3] ?? 100?>px;">
        <?php } else {?>
            <h1 id="loader">Preloader 404 :: <?php echo $Translate->get_translate_module_phrase( 'module_block_main_preloader','_FilesNotExists')?>.</h1>
        <?php }?>
        <?php break;case 3:?>
        <?php if(file_exists('app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1])) {?>
        <div>
            <img src=<?php echo 'app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1];?> id="loader" style="max-width:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][2] ?? 100?>px;max-height:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][3] ?? 100?>px;margin-left:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][4] ?? 0?>px">
            <div style="text-align: center;"><span id="load_perc">0%</span></div>
        </div>
        <?php } else {?>
            <h1 id="loader">Preloader 404 :: <?php echo $Translate->get_translate_module_phrase( 'module_block_main_preloader','_FilesNotExists')?>
            <div style="text-align: center;opacity: 0;visibility: hidden;"><span id="load_perc">0%</span></div>
        <?php }?>
        <?php break;endswitch;?>
    </div>
</head>
<?php switch ($Modules->array_modules['module_block_main_preloader']['setting']['type']): case 1:?>
<script type="text/javascript" src="app/modules/module_block_main_preloader/assets/loading-bar.js"></script>
<script type="text/javascript">
for(var images=document.images,images_total_count=images.length,images_loaded_count=0,bar=new ldBar("#loader"),preloader=document.getElementById("page-preloader"),i=0;i<images_total_count;i++)image_clone=new Image,image_clone.onload=image_loaded,image_clone.onerror=image_loaded,image_clone.src=images[i].src;function image_loaded(){images_loaded_count++,bar.set(100/images_total_count*images_loaded_count<<0),images_total_count<=images_loaded_count&&setTimeout(function(){preloader.classList.contains("done")||preloader.classList.add("done")},1e3)}
</script>
<?php break;case 2:?>
<script type="text/javascript">
for(var images=document.images,images_total_count=images.length,images_loaded_count=0,preloader=document.getElementById("page-preloader"),i=0;i<images_total_count;i++)image_clone=new Image,image_clone.onload=image_loaded,image_clone.onerror=image_loaded,image_clone.src=images[i].src;function image_loaded(){images_total_count<=++images_loaded_count&&setTimeout(function(){preloader.classList.contains("done")||preloader.classList.add("done")},1e3)}
</script>
<?php break;case 3:?>
<script type="text/javascript">
for(var images=document.images,images_total_count=images.length,images_loaded_count=0,perc_display=document.getElementById("load_perc"),preloader=document.getElementById("page-preloader"),i=0;i<images_total_count;i++)image_clone=new Image,image_clone.onload=image_loaded,image_clone.onerror=image_loaded,image_clone.src=images[i].src;function image_loaded(){images_loaded_count++,perc_display.innerHTML=(100/images_total_count*images_loaded_count<<0)+"%",images_total_count<=images_loaded_count&&setTimeout(function(){preloader.classList.contains("done")||preloader.classList.add("done")},1e3)}
</script>
<?php break;endswitch;?>