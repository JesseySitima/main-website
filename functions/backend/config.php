<?php

namespace HISQ\Theme\Backend;

/**
 * TODO
 *     - Add developement page for us, when we set site to liev automatcally allow th site to be indexed and ask for a google anayitics code.
 *
 */

class config
{

    private $post_types;

    public function __construct()
    {

        $this->post_types = new post_types();
        $this->configure_post_types();
        $this->configure_taxonomies();
        $this->post_types->start();

    }

    public function configure_post_types()
    {

        $p = array(
            "slug" => 'research',
            "options" => array(
                'labels' => array(
                    'name' => __('Research'),
                    'singular_name' => __('Article'),
                    'menu_name' => __('Research'),
                    'parent_item_colon' => __('Parent Article'),
                    'all_items' => __('All Articles'),
                    'view_item' => __('View Article'),
                    'add_new_item' => __('Add New Article'),
                    'add_new' => __('Add Article'),
                    'edit_item' => __('Edit Article'),
                    'update_item' => __('Update Article'),
                    'search_items' => __('Search Article'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'research'),
                'supports' => array('title', 'editor', 'thumbnail'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'researchers',
            "options" => array(
                'labels' => array(
                    'name' => __('Researcher'),
                    'singular_name' => __('Researcher'),
                    'menu_name' => __('Researchers'),
                    'parent_item_colon' => __('Parent Article'),
                    'all_items' => __('All Researchers'),
                    'view_item' => __('View Researcher'),
                    'add_new_item' => __('Add New Researcher'),
                    'add_new' => __('Add Researcher'),
                    'edit_item' => __('Edit Researcher'),
                    'update_item' => __('Update Researcher'),
                    'search_items' => __('Search Researcher'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'researchers'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'publication',
            "options" => array(
                'labels' => array(
                    'name' => __('Publication'),
                    'singular_name' => __('Publication'),
                    'menu_name' => __('Publications'),
                    'parent_item_colon' => __('Parent Article'),
                    'all_items' => __('All Publications'),
                    'view_item' => __('View Publication'),
                    'add_new_item' => __('Add New Publication'),
                    'add_new' => __('Add Publication'),
                    'edit_item' => __('Edit Publication'),
                    'update_item' => __('Update Publication'),
                    'search_items' => __('Search Publication'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'publication'),
                'supports' => array('title'),
            ),
        );

        $this->post_types->addPostType($p);

        // LEGACY
        $p = array(
            "slug" => 'programme',
            "options" => array(
                'labels' => array(
                    'name' => __('Programme'),
                    'singular_name' => __('Programme'),
                    'menu_name' => __('Programmes'),
                    'parent_item_colon' => __('Parent Programme'),
                    'all_items' => __('All Programmes'),
                    'view_item' => __('View Programme'),
                    'add_new_item' => __('Add New Programme'),
                    'add_new' => __('Add Programme'),
                    'edit_item' => __('Edit Programme'),
                    'update_item' => __('Update Programme'),
                    'search_items' => __('Search Programme'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'programme'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'theme',
            "options" => array(
                'labels' => array(
                    'name' => __('Theme'),
                    'singular_name' => __('Theme'),
                    'menu_name' => __('Themes'),
                    'parent_item_colon' => __('Parent Theme'),
                    'all_items' => __('All Themes'),
                    'view_item' => __('View Theme'),
                    'add_new_item' => __('Add New Theme'),
                    'add_new' => __('Add Theme'),
                    'edit_item' => __('Edit Theme'),
                    'update_item' => __('Update Theme'),
                    'search_items' => __('Search Theme'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'theme'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'vacancies',
            "options" => array(
                'labels' => array(
                    'name' => __('Vacancy'),
                    'singular_name' => __('Vacancy'),
                    'menu_name' => __('Vacancies'),
                    'parent_item_colon' => __('Parent Vacancy'),
                    'all_items' => __('All Vacancy'),
                    'view_item' => __('View Vacancy'),
                    'add_new_item' => __('Add New Vacancy'),
                    'add_new' => __('Add Vacancy'),
                    'edit_item' => __('Edit Vacancy'),
                    'update_item' => __('Update Vacancy'),
                    'search_items' => __('Search Vacancy'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'vacancies'),
                'supports' => array('title'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'departments',
            "options" => array(
                'labels' => array(
                    'name' => __('Departments'),
                    'singular_name' => __('Department'),
                    'menu_name' => __('Departments'),
                    'parent_item_colon' => __('Parent Department'),
                    'all_items' => __('All Department'),
                    'view_item' => __('View Department'),
                    'add_new_item' => __('Add New Department'),
                    'add_new' => __('Add Department'),
                    'edit_item' => __('Edit Department'),
                    'update_item' => __('Update Department'),
                    'search_items' => __('Search Department'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'departments'),
                'supports' => array('title'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'students',
            "options" => array(
                'labels' => array(
                    'name' => __('Students'),
                    'singular_name' => __('Student'),
                    'menu_name' => __('Students'),
                    'parent_item_colon' => __('Parent Student'),
                    'all_items' => __('All Student'),
                    'view_item' => __('View Student'),
                    'add_new_item' => __('Add New Student'),
                    'add_new' => __('Add Student'),
                    'edit_item' => __('Edit Student'),
                    'update_item' => __('Update Student'),
                    'search_items' => __('Search Student'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'students'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'opportunities',
            "options" => array(
                'labels' => array(
                    'name' => __('Opportunities'),
                    'singular_name' => __('Opportunity'),
                    'menu_name' => __('Training Opportunities'),
                    'parent_item_colon' => __('Parent Opportunity'),
                    'all_items' => __('All Opportunities'),
                    'view_item' => __('View Opportunity'),
                    'add_new_item' => __('Add New Opportunity'),
                    'add_new' => __('Add Opportunity'),
                    'edit_item' => __('Edit Opportunity'),
                    'update_item' => __('Update Opportunity'),
                    'search_items' => __('Search Opportunity'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'opportunities'),
                'supports' => array('title'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'creator-updates',
            "options" => array(
                'labels' => array(
                    'name' => __('Creator Updates'),
                    'singular_name' => __('Creator Updates'),
                    'menu_name' => __('Creator Updates'),
                    'parent_item_colon' => __('Parent Creator'),
                    'all_items' => __('All Creator Updates'),
                    'view_item' => __('View Creator Update'),
                    'add_new_item' => __('Add New Creator Update'),
                    'add_new' => __('Add Creator Update'),
                    'edit_item' => __('Edit Creator Update'),
                    'update_item' => __('Update Creator Update'),
                    'search_items' => __('Search Creator Update'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'creator-updates'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        $p = array(
            "slug" => 'student-profiles',
            "options" => array(
                'labels' => array(
                    'name' => __('Student Profiles'),
                    'singular_name' => __('Student Profiles'),
                    'menu_name' => __('Student Profiles'),
                    'parent_item_colon' => __('Parent Student'),
                    'all_items' => __('All Student Profiles'),
                    'view_item' => __('View Student Profile'),
                    'add_new_item' => __('Add New Student Profile'),
                    'add_new' => __('Add Student Profile'),
                    'edit_item' => __('Edit Student Profile'),
                    'update_item' => __('Update Student Profile'),
                    'search_items' => __('Search Student Profile'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'student-profiles'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        // maternalhealth-about
        $p = array(
            "slug" => 'maternalhealth-about',
            "options" => array(
                'labels' => array(
                    'name' => __('Maternal Health About'),
                    'singular_name' => __('Maternal Health About'),
                    'menu_name' => __('Maternal Health About'),
                    'parent_item_colon' => __('Parent Maternal Health About'),
                    'all_items' => __('Maternal Health About'),
                    'view_item' => __('View Maternal Health About'),
                    'add_new_item' => __('Add New Maternal Health About'),
                    'add_new' => __('Add Maternal Health About'),
                    'edit_item' => __('Edit Maternal Health About'),
                    'update_item' => __('Update Maternal Health About'),
                    'search_items' => __('Search Maternal Health About'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'maternalhealth-about'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        // mhprofiles
        $p = array(
            "slug" => 'mhprofiles',
            "options" => array(
                'labels' => array(
                    'name' => __('Maternal Health Profiles'),
                    'singular_name' => __('Maternal Health Profile'),
                    'menu_name' => __('Maternal Health Profile'),
                    'parent_item_colon' => __('Parent Maternal Health Profile'),
                    'all_items' => __('Maternal Health Profiles'),
                    'view_item' => __('View Maternal Health Profile'),
                    'add_new_item' => __('Add New Maternal Health Profile'),
                    'add_new' => __('Add Maternal Health Profile'),
                    'edit_item' => __('Edit Maternal Health Profile'),
                    'update_item' => __('Update Maternal Health Profile'),
                    'search_items' => __('Search Maternal Health Profile'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'mhprofiles'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        // maternalhealth-blogs
        $p = array(
            "slug" => 'maternalhealth-blogs',
            "options" => array(
                'labels' => array(
                    'name' => __('Maternal Health blogs'),
                    'singular_name' => __('Maternal Health Blogs'),
                    'menu_name' => __('Maternal Health Blogs'),
                    'parent_item_colon' => __('Parent Maternal Health Blogs'),
                    'all_items' => __('Maternal Health blogs'),
                    'view_item' => __('View Maternal Health Blogs'),
                    'add_new_item' => __('Add New Maternal Health Blogs'),
                    'add_new' => __('Add Maternal Health Blogs'),
                    'edit_item' => __('Edit Maternal Health Blogs'),
                    'update_item' => __('Update Maternal Health Blogs'),
                    'search_items' => __('Search Maternal Health Blogs'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'maternalhealth-blogs'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        // maternalhealth-videos
        $p = array(
            "slug" => 'mhvideos',
            "options" => array(
                'labels' => array(
                    'name' => __('Maternal Health Videos'),
                    'singular_name' => __('Maternal Health Videos'),
                    'menu_name' => __('Maternal Health Videos'),
                    'parent_item_colon' => __('Parent Maternal Health Videos'),
                    'all_items' => __('Maternal Health Videos'),
                    'view_item' => __('View Maternal Health Videos'),
                    'add_new_item' => __('Add New Maternal Health Videos'),
                    'add_new' => __('Add Maternal Health Videos'),
                    'edit_item' => __('Edit Maternal Health Videos'),
                    'update_item' => __('Update Maternal Health Videos'),
                    'search_items' => __('Search Maternal Health Videos'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'mhvideos'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);

        // maternalhealth-research-and-programs
        $p = array(
            "slug" => 'mh-researchprograms',
            "options" => array(
                'labels' => array(
                    'name' => __('Maternal Health Reaserch and Programs'),
                    'singular_name' => __('Maternal Health Reaserch and Programs'),
                    'menu_name' => __('Maternal Health Reaserch and Programs'),
                    'parent_item_colon' => __('Parent Maternal Health Reaserch and Programs'),
                    'all_items' => __('Maternal Health Reaserch and Programs'),
                    'view_item' => __('View Maternal Health Reaserch and Programs'),
                    'add_new_item' => __('Add New Maternal Health Reaserch and Programs'),
                    'add_new' => __('Add Maternal Health Reaserch and Programs'),
                    'edit_item' => __('Edit Maternal Health Reaserch and Programs'),
                    'update_item' => __('Update Maternal Health Reaserch and Programs'),
                    'search_items' => __('Search Maternal Health Reaserch and Programs'),
                    'not_found' => __('Not Found'),
                    'not_found_in_trash' => __('Not found in Trash'),
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'mh-researchprograms'),
                'supports' => array('title', 'editor'),
            ),
        );

        $this->post_types->addPostType($p);
    }

    public function configure_taxonomies()
    {

        $l = array(
            "slug" => 'publication-type',
            "post_type" => 'publication',
            "options" => array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => _x('Publication Type', 'taxonomy general name'),
                    'singular_name' => _x('Publication Type', 'taxonomy singular name'),
                    'search_items' => __('Publication Types'),
                    'all_items' => __('All Publication Types'),
                    'parent_item' => __('Parent Publication Type'),
                    'parent_item_colon' => __('Parent Publication Type:'),
                    'edit_item' => __('Edit Publication Type'),
                    'update_item' => __('Update Publication Type'),
                    'add_new_item' => __('Add New Publication Type'),
                    'new_item_name' => __('New Publication Type Name'),
                    'menu_name' => __('Publication Types'),
                ),
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'publication-type'),
            ),
        );

        $this->post_types->addCustomTaxonomy($l);

        $l = array(
            "slug" => 'publication-author',
            "post_type" => 'publication',
            "options" => array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => _x('Publication Author', 'taxonomy general name'),
                    'singular_name' => _x('Publication Author', 'taxonomy singular name'),
                    'search_items' => __('Publication Authors'),
                    'all_items' => __('All Publication Authors'),
                    'parent_item' => __('Parent Publication Author'),
                    'parent_item_colon' => __('Parent Publication Author:'),
                    'edit_item' => __('Edit Publication Author'),
                    'update_item' => __('Update Publication Author'),
                    'add_new_item' => __('Add New Publication Author'),
                    'new_item_name' => __('New Publication Author Name'),
                    'menu_name' => __('Authors'),
                ),
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'publication-author'),
            ),
        );

        $this->post_types->addCustomTaxonomy($l);

        $l = array(
            "slug" => 'academic-level',
            "post_type" => 'student-profiles',
            "options" => array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => _x('Academic Level', 'taxonomy general name'),
                    'singular_name' => _x('Academic Level', 'taxonomy singular name'),
                    'search_items' => __('Academic Levels'),
                    'all_items' => __('All Academic Levels'),
                    'parent_item' => __('Parent Academic Level'),
                    'parent_item_colon' => __('Parent Academic Level:'),
                    'edit_item' => __('Edit Academic Level'),
                    'update_item' => __('Update Academic Level'),
                    'add_new_item' => __('Add New Academic Level'),
                    'new_item_name' => __('New Academic Level Name'),
                    'menu_name' => __('Academic Levels'),
                ),
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'academic-level'),
            ),
        );

        $this->post_types->addCustomTaxonomy($l);

        $l = array(
            "slug" => 'maternal-health-Video-type',
            "post_type" => 'mhvideos',
            "options" => array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => _x('Maternal Health Video Type', 'taxonomy general name'),
                    'singular_name' => _x('Maternal Health Video Type', 'taxonomy singular name'),
                    'search_items' => __('Maternal Health Video Types'),
                    'all_items' => __('All Maternal Health Video Types'),
                    'parent_item' => __('Parent Maternal Health Video Type'),
                    'parent_item_colon' => __('Parent Maternal Health Video Type:'),
                    'edit_item' => __('Edit Maternal Health Video Type'),
                    'update_item' => __('Update Maternal Health Video Type'),
                    'add_new_item' => __('Add New Maternal Health Video Type'),
                    'new_item_name' => __('New Maternal Health Video Type Name'),
                    'menu_name' => __('Maternal Health Video Types'),
                ),
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'maternal-health-blog-type'),
            ),
        );

        $this->post_types->addCustomTaxonomy($l);
    }

}