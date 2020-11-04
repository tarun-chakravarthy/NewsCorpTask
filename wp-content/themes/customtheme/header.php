<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
<header class="container">
    <?php if(has_post_thumbnail()):?>
        <img src="<?php the_post_thumbnail_url('largest');?>" class="img-fluid">
    <?php endif;?>
<div><img class="header-img" src="http://localhost/newscorp/wp-content/uploads/2020/11/header_image.png" alt="">
<div class="header-text">
    <h1>
        The Future of your business <br>
        relies on being informed
    </h1>
    <button class="btn btn-primary">
        Request a quote
    </button>
</div>
</div>
</header>

    
