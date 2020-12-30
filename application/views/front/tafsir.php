<section class="single-post-type">
    <div class="container">
        <article class="post type-post format-full-width">
            <div class="post-top text-center">
                <span class="category"><?php echo $tafsirAyat->link_tag ?></span><!-- /.category -->
                <h2 class="entry-title">Tafsir Surat <?php echo $tafsirAyat->nama ?> Ayat <?php echo $tafsirAyat->ayat ?></h2><!-- /.entry-title -->
                <div class="entry-meta">
                    <div class="post-time">
                        <time datetime="2017-08-08">
                            <?php
                                $date = date_create($tafsirAyat->updated);
                                echo date_format($date, 'F d, Y');
                            ?>
                        </time>
                    </div><!-- /.post-time -->
                    <span class="author">By Logic Boys</span><!-- /.author -->
                </div><!-- /.entry-meta -->
            </div><!-- /.post-top -->

            <div class="entry-content">
                <?php echo $tafsirAyat->content ?>

                <div class="post-meta text-center">
                    <span class="meta-id pull-left"><a href="#"><i class="pe-7f-chat"></i> <span class="count"><?php echo count($tafsirAyat->comment) ?></span></a></span><!-- /.meta-id -->
                </div><!-- /.post-meta -->
            </div><!-- /.entry-content -->
        </article><!-- /.post -->

        <div class="bottom-contents">

            <div class="comments text-center">
                <h3 class="comment-title"><?php echo count($tafsirAyat->comment) ?> comments</h3><!-- /.comment-title -->

                <ul class="comment-list">
                    <?php foreach ($tafsirAyat->comment as $comment): ?>
                        <li class="comment parent media">
                            <div class="comment-details media-body">
                                <h3 class="name"><a href="#"><?php echo $comment->nama ?></a></h3><!-- /.name -->
                                <time datetime="2017-08-08">July 08, 2017</time>
                                <div class="reply-btn">
                                    <a href="#" class="btn">Reply</a>
                                </div><!-- /.reply-btn -->
                                <p>
                                    <?php echo $comment->komentar ?>
                                </p>
                            </div><!-- /.comment-details -->
                        </li><!-- /.comment -->
                    <?php endforeach ?>
                </ul><!-- /.comment-list -->
            </div><!-- /.comments -->

            <div class="respond text-center">
                <h3 class="respond-title">Leave a reply</h3><!-- /.respond-title -->

                <?php echo form_open('', array('class' => 'comment-form')) ?>

                    <span class="comment-form-control-wrap your-name">
                        <input type="text" name="nama" id="name" class="comment-form-control" placeholder="Name" required>
                    </span>
                    <span class="comment-form-control-wrap message">
                        <textarea name="komentar" id="message" class="comment-form-control" placeholder="Your Message" required></textarea>
                    </span>
                    <input type="hidden" name="id_tafsir" value="<?php echo $tafsirAyat->id_tafsir ?>">
                    <span class="comment-form-control-wrap submit">
                        <input type="submit" name="submit" id="submit" class="comment-form-control" value="Post Comment">
                    </span>

                <?php echo form_close() ?>
            </div><!-- /.respond -->
        </div><!-- /.bottom-contents -->
    </div><!-- /.container -->
</section><!-- /.single-post-type -->