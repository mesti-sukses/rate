<header class="masthead">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <div id="sb-search" class="sb-search text-left">
                        <form action="#" class="sb-search-form" method="get" accept-charset="utf-8">
                            <input class="sb-search-input" placeholder="Search Here" type="text" value="" name="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                        </form><!-- /.sb-search-form -->
                    </div><!-- /.sb-search -->
                </div>

                <div class="col-sm-4 hidden-xs">
                    <a class="navbar-brand text-center" href="index.html"><img class="logo" src="<?php echo base_url('assets/') ?>images/logo.png" alt="Site Logo"></a>
                </div>

                <div class="col-sm-4 col-xs-6">
                    <div class="top-social text-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->

    <div class="header-bottom">
        <div class="container">
            <nav class="navbar navbar-default">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand visible-xs" href="index.html"><img class="logo" src="images/logo.png" alt="Site Logo"></a>
                </div><!-- /.navbar-header -->

                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="nav navbar-nav">
                        <li class="menu-item menu-item-has-children active">
                            <a href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#">Tag</a>
                            <ul class="sub-menu children">
                                <li><a href="standard.html">Standard Post</a></li>
                                <li><a href="full.html">Full Width Post</a></li>
                                <li><a href="left.html">Left Sidebar Post</a></li>
                                <li><a href="header-image.html">Header Image Post</a></li>
                                <li><a href="side.html">Side Image Post</a></li>
                                <li><a href="gallery.html">Gallery Post</a></li>
                                <li><a href="video.html">Video Post</a></li>
                                <li><a href="audio.html">Audio Post</a></li>
                                <li><a href="link.html">Link Post</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a href="<?php echo base_url('page/about') ?>">About Us</a></li>
                        <li class="menu-item"><a href="<?php echo base_url('user') ?>">Login</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav><!-- /.navbar-default -->
        </div><!-- /.container -->
    </div><!-- /.header-bottom -->
</header><!-- /.masthead -->