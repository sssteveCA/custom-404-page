<?php get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Pagina non trovata</h1>
				</header><!-- .page-header -->
				<div class="page-content">
                    <div class="container-fluid">
                        <?php
                        $url_pattern = '/^(https?:\/\/)?([a-z\d.-_]+)\.([a-z]{2,6})(\/([^\s]*)?)?$/i';
                         if($useImage && preg_match($url_pattern,$imagePath)): ?>
                        <div class="row mt-3">
                            <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-md-2">
                                <img src="<?php echo esc_url($imagePath); ?>" alt="Pagina non trovata" title="Pagina non trovata">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($useText && !empty($text)): ?>
                        <div class="row mt-3 gx-md-2 gx-lg-4">
                            <div class="col-12"><?php echo esc_html($text); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($showArticles): ?>
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
                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
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