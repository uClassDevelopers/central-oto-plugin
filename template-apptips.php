<?php
/**
 *  ETER
 * 	Template Name: apptips
 *
*/
/*
Copyright 2015 uClass Developers Daniel Holm & Adam Jacobs Feldstein

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/
get_header(); // This fxn gets the header.php file and renders it ?>

<div id="archive_page" class="container-full-width">
	<div class="container">	
		<div class="container-fluid">				
			<div id="container" class="row-fluid">
                <div id="content" class="span9 content-sidebar-right">
                <?php
                $post_id = 24;
                $queried_post = get_post($post_id);
                echo $queried_post->post_content;
                ?>
                 <?php wp_reset_query(); ?> 

                            <?php if ( have_posts() ) : 
                            // Do we have any posts in the databse that match our query?
                            ?>
                            <?php 
                                query_posts( 'cat=4' );
                            ?>
                                <?php while ( have_posts() ) : the_post(); 
                                // If we have a post to show, start a loop that will display it
                                ?>

                                    <article class="post">
                                        <div class="entry-summary">
                                        <h1 class="title"><?php the_title(); // Display the title of the post ?></h1>
                                        <div class="post-meta">
                                            <?php the_time('m.d.Y'); // Display the time it was published ?>
                                            <?php // the author(); Uncomment this and it will display the post author ?>

                                        </div><!--/post-meta -->

                                        <div class="the-content">
                                            <?php the_content(); 
                                            // This call the main content of the post, the stuff in the main text box while composing.
                                            // This will wrap everything in p tags
                                            ?>

                                            <?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
                                        </div><!-- the-content -->

                                        <div class="meta clearfix">
                                            <div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
                                            <div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
                                        </div><!-- Meta -->
                                        </div>    
                                    </article>

                                <?php endwhile; // OK, let's stop the post loop once we've displayed it ?>

                            <?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

                                <article class="post error">
                                    <h1 class="404">Nothing has been posted like that yet</h1>
                                </article>

        <?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?> 
                </div>            
             
                <?php get_sidebar(); ?>   
           
        </div>
    </div>
</div>                
<?php get_footer(); // This fxn gets the footer.php file and renders it ?> 