<section class="posts style-02">
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php foreach ($tafsirAyat as $tafsir): ?>
                        <article class="post type-post media">
                            <div class="entry-content media-body">
                                <span class="category"><a href="#"><?php echo $tafsir->link_tag ?></a></span><!-- /.ctegory -->
                                <h2 class="entry-title"><a href="<?php echo base_url('page/ayat/'.$tafsir->id_tafsir) ?>">Tafsir Surat <?php echo $tafsir->nama ?> Ayat <?php echo $tafsir->ayat ?></a></h2><!-- /.entry-title -->
                                <div class="entry-meta">
                                    <div class="post-time">
                                        <time datetime="2017-08-08">
                                            <?php
                                                $date = date_create($tafsir->updated);
                                                echo date_format($date, 'F d, Y');
                                            ?>
                                        </time>
                                    </div><!-- /.post-time -->
                                    <span class="author">By <a href="#">Logic Boys</a></span><!-- /.author -->
                                </div><!-- /.entry-meta -->
                                <p>
                                    <?php echo limit_to_numwords($tafsir->content, 50, base_url('page/ayat/'.$tafsir->id_tafsir)) ?>
                                </p>
                                <div class="post-meta">
                                    <span class="meta-id"><a href="#"><i class="pe-7f-chat"></i> <span class="count"><?php echo count($tafsir->comment) ?></span></a></span><!-- /.meta-id -->
                                </div><!-- /.post-meta -->
                            </div><!-- /.entry-content -->
                        </article><!-- /.post -->
                    <?php endforeach ?>

                    <nav class="pagination pagination-01">
                        <a href="#" class="next-page">Older Posts <i class="fa fa-angle-double-right"></i></a>
                    </nav>
                </div>

                <?php
                    if($page_info['sidebar']) $this->load->view('component/page_sidebar');
                ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section-padding -->
</section><!-- /.posts -->