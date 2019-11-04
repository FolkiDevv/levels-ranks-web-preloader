<head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div id="page-preloader" class="preloader">
        <?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '1'){ ?>
        <div class="ldBar loader label-center" id="loader" data-preset="circle"></div>
        <?php } else if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '2' && file_exists('app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['setting']['gif-name'].'.gif')) { ?>
        <img src=<? echo 'app/modules/module_block_main_preloader/assets/preloaders/'.$Modules->array_modules['module_block_main_preloader']['setting']['gif-name'].'.gif'; ?> class="loader" id="loader">
        <?php } else get_iframe('404', 'Название гифки прелоадера указано неверно!'); ?>
    </div>
</head>

<?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '1'){ ?>
<script type="text/javascript" src="app/modules/module_block_main_preloader/assets/loading-bar.js"></script>
<?php } ?>
<script type="text/javascript">
var
images = document.images,
images_total_count = images.length,
images_loaded_count = 0,
perc_display = document.getElementById('loader'),
<?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '1'){ ?>
bar = new ldBar('#loader'),
<?php } ?>
preloader = document.getElementById('page-preloader');

for(var i = 0; i < images_total_count; i++){
    image_clone = new Image();
    image_clone.onload = image_loaded;
    image_clone.onerror = image_loaded;
    image_clone.src = images[i].src;
}

function image_loaded(){
    images_loaded_count++;
    
    <?php if($Modules->array_modules['module_block_main_preloader']['setting']['type'] == '1'){ ?>
    bar.set(( (100 / images_total_count) * images_loaded_count) << 0);
    <?php } ?>

    if(images_loaded_count >= images_total_count){
        setTimeout(function(){
        if( !preloader.classList.contains('done'))
        {
            preloader.classList.add('done');
        }
    }, 1000);
    }
}
</script>