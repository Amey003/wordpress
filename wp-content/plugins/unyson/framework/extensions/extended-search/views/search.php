<?php
/**
 * @var object $ext
 * @var array $atts
 */

$query = filter_input( INPUT_GET, 's', FILTER_SANITIZE_STRING );
$search_type = filter_input( INPUT_GET, 'search_type', FILTER_SANITIZE_STRING );
$cur_page = filter_input( INPUT_GET, 'spage', FILTER_SANITIZE_NUMBER_INT );
$cur_page = isset($cur_page) ? $cur_page : 1;
$posts_per_page = get_option( 'posts_per_page' );

$post_cur_page = $cur_page;
if($search_type != '' && $search_type != 'post'){
    $post_cur_page = 1;
}
$search_types = array(
    'post'	 => array('name' => esc_html__( 'Posts', 'olympus' )),
    'page'	 => array('name' => esc_html__( 'Pages', 'olympus' )),
);

$args_post = array(
    'per_page'  => $posts_per_page,
    'post_type'		 => 'post',
    'paged'			 => $post_cur_page,
    'post_status'	 => 'publish',
    's'				 => $query
);
$page_cur_page = $cur_page;
if($search_type != '' && $search_type != 'page'){
    $page_cur_page = 1;
}
$the_post_query = new WP_Query( $args_post );
$args_page = array(
    'per_page'  => $posts_per_page,
    'post_type'		 => 'page',
    'paged'			 => $page_cur_page,
    'post_status'	 => 'publish',
    's'				 => $query
);
$the_page_query = new WP_Query( $args_page );
$search_types['post']['post_found'] = (int) $the_post_query->found_posts;
$search_types['page']['post_found'] = (int) $the_page_query->found_posts;

$user_query = $group_query = $bbp_topics_args = $the_product_query = array();

if ( class_exists( 'woocommerce' ) ){
    $product_cur_page = $cur_page;
    if($search_type != '' && $search_type != 'product'){
        $product_cur_page = 1;
    }
    $search_types[ 'product' ] = array('name' => esc_html__( 'Products', 'olympus' ));
    $args_products = array(
        'per_page'  => $posts_per_page,
        'post_type'		 => 'product',
        'paged'			 => $product_cur_page,
        'post_status'	 => 'publish',
        's'				 => $query
    );
    $the_product_query = new WP_Query( $args_products );
    $search_types[ 'product' ]['post_found'] = (int) $the_product_query->found_posts;
}
if ( class_exists( 'BuddyPress' ) && class_exists( 'Youzer' ) ) {
    $user_cur_page = $cur_page;
    if($search_type != '' && $search_type != 'user'){
        $user_cur_page = 1;
    }
    $search_types[ 'user' ] = array('name' => esc_html__( 'Users', 'olympus' ));

    $members = array('total' => 0);
    if ( function_exists( 'bp_is_active' ) ) {
        $members = bp_core_get_users( array(
            'per_page'  => $posts_per_page,
	        'page'  => $user_cur_page,
            'search_terms' => esc_attr( $query ),
            'populate_extras' => false 
        ) );
    }
    $user_query = (isset($members['users'])) ? extended_search_user_by_name( $members['users'], esc_attr($query) ) : array();
    $search_types['user']['post_found'] = (int) count($user_query);

    if ( bp_is_active( "groups" ) ) {
        $search_types[ 'group' ] = array('name' => esc_html__( 'Groups', 'olympus' ));
    }
    $group_cur_page = $cur_page;
    if($search_type != '' && $search_type != 'group'){
        $group_cur_page = 1;
    }
    $groups = array('total' => 0);
    if ( function_exists( 'bp_is_active' ) && bp_is_active( "groups" ) ) {
		$groups = groups_get_groups( array(
            'per_page' => $posts_per_page,
	        'page'  => $group_cur_page,
            'search_terms' => esc_attr( $query ), 
            'populate_extras' => false 
        ) );
    }
    $group_query = (isset($groups['groups'])) ? extended_search_group_by_name( $groups['groups'], esc_attr($query) ) : array();
    $search_types['group']['post_found'] = (int) count($group_query);
}

if ( class_exists( 'bbPress' ) ) {
    $forum_cur_page = $cur_page;
    if($search_type != '' && $search_type != 'forum'){
        $forum_cur_page = 1;
    }
    $search_types[ 'forum' ] = array('name' => esc_html__( 'Forums', 'olympus' ));
    $bbp_topics_args = array(
        'posts_per_page' => $posts_per_page,
        'paged'			 => $forum_cur_page,
        's'				 => $query,
    );

    $bbp_has_topics = bbp_has_topics( $bbp_topics_args );
    $search_types['forum']['post_found'] = (int) $bbp_has_topics;
}
$default_type = 'post';
foreach ( $search_types as $key => $type ) {
    if(isset($search_types[$key]['post_found']) && $search_types[$key]['post_found'] != 0){
        $default_type = $key;
        break;
    }
}
$curent_type = array_key_exists( $search_type, $search_types ) ? $search_type : $default_type;

?>

<?php if( !fw_ext('stunning-header') ){ ?>
<section class="search-page-panel simple-serach">
	<div class="container">
		<div class="row">
		    <div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
				<form class="form-inline search-form" action="<?php echo esc_url( home_url() ); ?>" method="GET">
					<div class="form-group label-floating">
						<label class="control-label" for="s"><?php esc_html_e( 'What do you search?', 'olympus' ); ?></label>
					    <input class="form-control bg-white" name="s" type="text" value="<?php echo esc_attr( $query ); ?>">
					</div>

					<button class="btn btn-purple btn-lg" type="submit"><?php esc_html_e( 'Search', 'olympus' ); ?></button>
				</form>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<section class="primary-content-wrapper">
	<div class="container">
		<ul class="cat-list-bg-style align-center sorting-menu">
            <?php
                foreach ( $search_types as $key => $type ) {
                $search_type_link = add_query_arg(array('s' => $query, 'search_type' => $key), home_url( '/' ));
                if(isset($search_types[$key]['post_found']) && $search_types[$key]['post_found'] != 0){
            ?>
                <li class="cat-list__item <?php if($curent_type == $key){echo 'active';} ?>">
                    <a href="<?php echo $search_type_link; ?>"><?php echo esc_html( $type['name'] ); ?></a>
                </li>
            <?php } } ?>
        </ul>
    </div>
</section>

<section class="primary-content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
                <?php 
                    if ( $query ) {
                    $max_pages = 1;
                    $found_posts = (isset($search_types[$curent_type]['post_found'])) ? $search_types[$curent_type]['post_found'] : 0;
                    if($curent_type == 'post'){ 
                        echo $ext->get_view( "types/post", array(
                            'found_posts' => $found_posts,
                            'the_query' => $the_post_query
                        ) );
                        $max_pages = $the_post_query->max_num_pages;
                    }elseif($curent_type == 'page'){
						echo $ext->get_view( "types/post", array(
                            'found_posts' => $found_posts,
                            'the_query' => $the_page_query
                        ) );
                        $max_pages = $the_page_query->max_num_pages;
                    }elseif($curent_type == 'product'){
						echo $ext->get_view( "types/product", array(
                            'found_posts' => $found_posts,
                            'the_query' => $the_product_query
                        ) );
                        $max_pages = $the_product_query->max_num_pages;
                    }elseif($curent_type == 'user'){
                        echo $ext->get_view( "types/user", array(
                            'found_posts' => $found_posts,
                            'the_query' => $user_query,
                            'query' => esc_attr($query)
                        ) );
                        $max_pages = ceil( (int) $found_posts / (int) $posts_per_page );
                    }elseif($curent_type == 'group'){
                        echo $ext->get_view( "types/group", array(
                            'found_posts' => $found_posts,
                            'the_query' => $group_query,
                            'query' => esc_attr($query)
                        ) );
                        $max_pages = ceil( (int) $found_posts / (int) $posts_per_page );
                    }elseif($curent_type == 'forum'){
                        echo $ext->get_view( "types/forum", array(
                            'found_posts' => $found_posts,
                            'the_query' => $bbp_topics_args
                        ) );
                        $bbp = bbpress();
                        $found_topics = (int) isset( $bbp->topic_query->found_posts ) ? $bbp->topic_query->found_posts : $bbp->topic_query->post_count;
                        $max_pages = ceil( (int) $found_topics / (int) $posts_per_page );
                    }

                    echo $ext->get_view( 'paginate', array(
                        'ext'			 => $ext,
                        'atts'			 => $atts,
                        'posts_per_page' => $posts_per_page,
                        'cur_page'		 => $cur_page,
                        'search_type'    => $curent_type,
                        'max_num_pages'	 => $max_pages
                    ) );
                ?>

                <?php }else{ ?>
                    <h2 class="search-help-result-title text-danger"><?php esc_html_e( 'Search query is empty!', 'olympus' ); ?></h2>
                <?php } ?>
            </div>
        </div>
    </div>
</section> 