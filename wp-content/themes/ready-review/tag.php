<?php get_header(); ?>    <!-- CONTENT --><div class="row content">    <div class="ten columns leftcontent">        <?php if (is_tag()) { ?>            <h1 class="postmargin">Tag: <?php single_tag_title(); ?></h1>        <?php } else { ?>            <h1 class="postmargin"><?php wp_title(' ', true, ''); ?></h1>        <?php } ?>        <?php if (tag_description()) { ?>            <div class="tag-desc"><?php echo tag_description(); ?></div>        <?php } ?>        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'med-thumb'); ?>            <?php if ($image): ?>                <!-- post -->                <div class="post">                    <h2 class="postmargin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>                    <?php                    $showmeta = ready_review('showmeta');                    if (isset($showmeta) && $showmeta == 'showmeta_show') {                        ?>                        <div class="post_meta">                            <ul>                                <li class="metacats"><?php the_category(' '); ?></li>                                <li>//</li>                                <li><?php the_time('F d, Y'); ?></li>                                <li>//</li>                                <li><?php comments_popup_link(__('Comments', 'ready_review'), __('1 Comment', 'ready_review'), __('% Comments', 'ready_review')); ?></li>                            </ul>                        </div>                    <?php } ?>                    <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="150" height="150"                                                                align="left" class="featuredimg"                                                                title="<?php the_title(); ?>"                                                                alt="<?php the_title(); ?>"/></a><?php ready_review_excerpt('200'); ?>                        <a href="<?php the_permalink(); ?>"><?php _e('Read More', 'ready_review'); ?> &raquo;</a></p>                    <div class="clear"></div>                </div>                <!-- end post -->            <?php else: ?>                <!-- post -->                <div class="post">                    <h2 class="postmargin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>                    <?php if (isset($showmeta) && $showmeta == 'showmeta_show') { ?>                        <div class="post_meta">                            <ul>                                <li class="metacats"><?php the_category(' '); ?></li>                                <li>//</li>                                <li><?php the_time('F d, Y'); ?></li>                                <li>//</li>                                <li><?php comments_popup_link(__('Comments', 'ready_review'), __('1 Comment', 'ready_review'), __('% Comments', 'ready_review')); ?></li>                            </ul>                        </div>                    <?php } ?>                    <p><?php ready_review_excerpt('300'); ?> <a                                href="<?php the_permalink(); ?>"><?php _e('Read More', 'ready_review'); ?> &raquo;</a></p>                </div>                <!-- end post -->            <?php endif; ?>        <?php endwhile; endif; ?>        <?php if (function_exists('wp_pagenavi')) {            wp_pagenavi();        } else {            ?>            <?php next_posts_link(); ?>            <?php previous_posts_link(); ?>        <?php } ?>    </div>    <!--end of .ten columns (left content) --><?php get_footer(); ?>