<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'azad-article' ); ?>>
        <header class="article-heading">
            <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                <span class="sticky-post"><?php _e('Featured','azad-guineapig'); ?></span>
            <?php endif; ?>
            <?php the_title( sprintf( '<h2 class="azad-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </header>
        <div class="article-body">
            <?php 
                the_content(
                    sprintf( __( 'Continue reading<span class="screen-reader-text">"%s"</span>', 'azad-guineapig' ),
                        get_the_title()
                    )
                ); 
            ?>
        </div>
        <footer class="article-footer">
            <?php 
                edit_post_link(
                    sprintf( __( 'Edit<span class="screen-reader-text">%s</span>', 'azad-guineapig' ), get_the_title() ),
                    '<span class="edit-link">',
                    '</span>'
                ); 
            ?>
        </footer>
    </article>
<?php endwhile; else: ?>
    <p>No content found for now. You can try <a href="<?php site_url(); ?>"><?php bloginfor( 'name' ); ?></a></p>
<?php endif; ?>