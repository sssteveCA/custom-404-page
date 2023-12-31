<?php get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
                <?php if($useTitle == 'true' && !empty($title)): ?>
				<header class="custom-404-page-header">
					<h1 class="page-title text-center fs-2 fw-bold"><?php echo esc_html($title); ?></h1>
				</header><!-- .page-header -->
                <?php endif; ?>
				<div class="page-content">
                    <div class="container-fluid">
                        <?php
                        $urlPattern = '/^(https?:\/\/)?([a-z\d.-_]+)\.([a-z]{2,6})(\/([^\s]*)?)?$/i';
                         if($useImage == 'true' && preg_match($urlPattern,$imagePath)): ?>
                        <div class="row mt-3">
                            <div class="custom-page-404-image col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                                <img src="<?php echo esc_url($imagePath); ?>" alt="Pagina non trovata" title="Pagina non trovata">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($useText == 'true' && !empty($text)): ?>
                        <div class="row mt-3 gx-md-2 gx-lg-4">
                            <div class="col-12 fs-4 fw-bolder text-center"><?php echo esc_html($text); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($showArticles == 'true' && !empty($postImagePath)): ?>
                        <div class="row mt-5">
                            <?php $args = [
                                'post_type' => 'post',
                                'orderby' => 'rand',
                                'posts_per_page' => 4
                            ];
                            $query = new WP_Query($args);
                            if($query->have_posts()):
                                while($query->have_posts()):
                                    $query->the_post(); ?>
                            <div class="col-12 col-md-6 col-lg-3 text-center post-link-wrapper">
                                <a class="post-link" href="<?php the_permalink(); ?>">
                                    <div class="post-thumbnail">
                                        <?php
                                        if(has_post_thumbnail()):
                                            the_post_thumbnail('thumbnail'); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($postImagePath); ?>" alt="Immagine articolo" title="Immagine articolo">
                                        <?php endif; ?>
                                    </div>
                                    <h5 class="post-title"><?php the_title(); ?></h5>
                                </a>
                            </div>
                                <?php endwhile;
                            endif;
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>