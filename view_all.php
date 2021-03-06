<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/basic/fav.png" type="image/x-icon">
    <title>SQL Learning and Evalution Platfrom</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
        .mylink:hover
        {
            color: #03a9f4 !important;
        }
        .hljs {
            display: block;
            overflow-x: auto;
            padding: 1em;
            border-left: 4px solid #03a9f4;
            background: #f5f2f0;
            color: #606676;
            font-weight: bold;
            font-size: 18px;
            font-family: Consolas,Monaco,Andale Mono,Ubuntu Mono,monospace;
        }
        .heading
        {
            background: rgba(236, 233, 233, 0.55);
            padding: 10px;
            border-left: #0a6aa1 3px solid;
        }


    </style>
</head>
<body>
<!-- Pre loader -->
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="l-s-2 blink">LOADING</div>
    </div>
</div>

<div id="app" class="paper-loading">


<div class="blog">
    <!-- Header -->
    <?php

    include_once 'includes/navbar.php';
    $m=new ManageClient();
    $get=$m->getTopArticle();
    if(isset($_GET['id']))
    {
        $get=$m->getArticleById($_GET['id']);

    }


    $gets=$get->fetch_assoc();

    ?>
    <div class="search-section">
        <div class="container">
            <h1 style="margin-top: 10px;">SQL Evaluations Scenarios</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside class="main-sidebar ">
                    <div class="">
                        <section class="sidebar p-t-b-40">

                            <?php
                                $cat=$m->getAllCats();
                                if($cat)
                                {
                                    while ($cats=$cat->fetch_assoc())
                                    {

                            ?>
                            <h3 class="heading" style="font-size: 15px; font-weight: bold;"><?php echo $cats['title']; ?></h3>
                                        <?php
                                        $art=$m->getArticleBycat($cats['id']);
                                        if($art)
                                        {
                                            while ($arts=$art->fetch_assoc())
                                            {
                                            ?>
                            <a href="view_all.php?id=<?php echo $arts['id']; ?>"  class="mylink" style="color: #606676;margin-bottom: 0;"> <p style="font-weight: bold;padding-left: 10px;margin-bottom: 0; font-size: 12px;"><?php echo $arts['title']; ?></p></a>

                            <?php

                            }
                            }
                            ?>

                            <?php

                                    }
                                }
                            ?>

                        </section>
                    </div>
                    <!-- /.sidebar -->
                </aside>
            </div>
            <article class="col-md-9 p-b-40 b-l p-40">
                <section id="introduction">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="font-weight: 500;"> <?php echo $gets['title'] ." Statement"; ?></h4>
                            <hr>
                            <?php echo $gets['article_detail']; ?>
                            <br>
                            <br>
                            <?php
                            if($gets['example_details'] || $gets['example_code'])
                            {
                                ?>

                            <h4 style="font-weight: 500;"> <?php echo $gets['title']." Example"; ?></h4>
                                <hr>
                         <?php

                            echo $gets['example_details']; ?>




                                <code class="hljs"> <?php
                                    echo $gets['example_code']; ?></code>
                                <br>
                                <a href="evaluator.php?id=<?php echo $gets['id']; ?>" class="btn btn-primary">Try Now</a>



                            <?php
                            }
                            ?>

                            <?php
                            if($gets['quiz'])
                            {
                            ?> <br><br>
                                    <hr>

                                <h4 style="font-weight: 500;"> SQL Quiz Test</h4>
                                <p>Test your SQL skills at This plateform</p>

                                    <a class="btn btn-primary" href=" <?php
                                    echo $gets['quiz'];
                                    ?>">Start SQL Quiz</a>
                                <br><br>
                                <hr>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </section>




            </article>
        </div>
    </div>
</div>
<footer>
    <div class="container">
       <div class="copyrights">
                 <center>   <p>&#xA9; 2018 SQL Evaluation Copyrights</p></center>
                </div>
    </div>
</footer>

<!--End Page page_wrrapper -->
<script src="assets/js/app.js"></script>

</body>
</html>