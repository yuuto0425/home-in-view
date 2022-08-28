<html>
<!-- front-page.phpとthree.js -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Document</title>
    <link href="<?php echo get_template_directory_uri();?>/css/style.css" rel="stylesheet" media="all">
</head>

<body>
    <section class="kv-block outer-block">
        <h1 class="main-title">Think different.</h1>
        <canvas id="canvas" class="fadeTarget"></canvas>
        <div id="kv" class="fadeTarget"></div>
    </section>
    <section class="outer-block contents-block">
        <div class="inner-block">
        <a href="<?php echo home_url('/dddddddddddd');?>">dddddddddddd</a>
            <h2 class="title">タイトルタイトルタイトルタイトルタイトル</h2>
            <p class="text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <p class="text">
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
            <p class="text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <p class="text">
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
        </div>
    </section>
    <!-- <script src = "https://cdnjs.cloudflare.com/ajax/libs/three.js/r126/three.min.js"></script> -->
    <!-- <script src="js/three.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r127/three.min.js"></script>
    <?php get_template_part('template/three-js');?>
    <script src="<?php echo get_template_directory_uri();?>/js/common.js"></script>
  </body>
</html>