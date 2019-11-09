<head>
    <div id="page-preloader" class="preloader">
        <?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '1') { ?>
        <div class="ldBar loader label-center" id="loader" data-preset="circle" data-stroke=var(--span-color)></div>
        <?php } else if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '2' && file_exists('app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1])) { ?>
        <img src=<? echo 'app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1]; ?> id="loader" style="max-width:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][2] ?? 100 ?>px;max-height:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][3] ?? 100 ?>px;">
        <?php } else if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '3' && file_exists('app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1])) { ?>
        <div>
            <img src=<? echo 'app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['custom_setting'][1]; ?> id="loader" style="max-width:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][2] ?? 100 ?>px;max-height:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][3] ?? 100 ?>px;margin-left:<?php echo $Modules->array_modules['module_block_main_preloader']['custom_setting'][4] ?? 0 ?>px">
            <div style="text-align: center;"><span id="load_perc">0%</span></div>
        </div>
        <?php } else { ?>
            <h1>Preloader 404 :: Изображение/гифка не найдена.</h1>
        <?php } ?>
    </div>
</head>
<?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '1'): ?>
<script type="text/javascript" src="app/modules/module_block_main_preloader/assets/loading-bar.js"></script>
<script type="text/javascript">
for(var images=document.images,images_total_count=images.length,images_loaded_count=0,bar=new ldBar("#loader"),preloader=document.getElementById("page-preloader"),i=0;i<images_total_count;i++)image_clone=new Image,image_clone.onload=image_loaded,image_clone.onerror=image_loaded,image_clone.src=images[i].src;function image_loaded(){images_loaded_count++,bar.set(100/images_total_count*images_loaded_count<<0),images_total_count<=images_loaded_count&&setTimeout(function(){preloader.classList.contains("done")||preloader.classList.add("done")},1e3)}
</script>
<?php endif ?>
<?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '2'): ?>
<script type="text/javascript">
for(var images=document.images,images_total_count=images.length,images_loaded_count=0,preloader=document.getElementById("page-preloader"),i=0;i<images_total_count;i++)image_clone=new Image,image_clone.onload=image_loaded,image_clone.onerror=image_loaded,image_clone.src=images[i].src;function image_loaded(){images_total_count<=++images_loaded_count&&setTimeout(function(){preloader.classList.contains("done")||preloader.classList.add("done")},1e3)}
</script>
<?php endif ?>
<?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '3'): ?>
<script type="text/javascript">
for(var images=document.images,images_total_count=images.length,images_loaded_count=0,perc_display=document.getElementById("load_perc"),preloader=document.getElementById("page-preloader"),i=0;i<images_total_count;i++)image_clone=new Image,image_clone.onload=image_loaded,image_clone.onerror=image_loaded,image_clone.src=images[i].src;function image_loaded(){images_loaded_count++,perc_display.innerHTML=(100/images_total_count*images_loaded_count<<0)+"%",images_total_count<=images_loaded_count&&setTimeout(function(){preloader.classList.contains("done")||preloader.classList.add("done")},1e3)}
</script>
<?php endif ?>