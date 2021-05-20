<? global $config;
$menu_links = array(
    array("title" => "Home", "icon" => " feather icon-home", "action" => "home",
        "additionals" => array(
            array("link" => "/", "title" => "Dashboard", "icon" => " fa fa-angle-right"),
        ),
    ),
    


    array("title" => "Layout Design", "icon" => " feather icon-sidebar", "action" => array("banner","client", "config", "slider", "logo", "inner_banner","testimonials","faq"),
        "additionals" => array(
            //array("link"=>"category/menu","title"=>"Menu Categories", "icon"=>"wallet"),
            //array("link"=>"promotional_banner","title"=>"Promotional Banners", "icon"=>"plus"),
            array("link" => "logo/add/1", "title" => "Manage Logo", "icon" => " fa fa-angle-right"),
            // array("link" => "banner", "title" => "Manage Banner", "icon" => " fa fa-angle-right"),
            //array("link" => "slider", "title" => "Manage Home Slider", "icon" => " fa fa-angle-right"),
            
            // array("link"=>"counter","title"=>"Counter Management", "icon"=>" fa fa-angle-right"),
            array("link"=>"inner_banner","title"=>"Manage Inner Banner", "icon"=>" fa fa-angle-right"),
            //array("link"=>"cms_content","title"=>"Manage PageContent", "icon"=>"speech"),
           array("link"=>"faq","title"=>"Manage FAQ's", "icon"=>" fa fa-angle-right"),
            //array("link"=>"certificate","title"=>"Manage Certificate", "icon"=>"star"),
            //array("link"=>"team_member","title"=>"Manage Team Member", "icon"=>"user"),
            // array("link"=>"testimonials","title"=>"Manage Testimonials", "icon"=>" fa fa-angle-right"),
            //array("link"=>"news","title"=>"Manage News", "icon"=>"note"),
            array("link" => "client", "title" => "Manage Client", "icon" => " fa fa-angle-right"),
            array("link" => "config/update", "title" => "Additional Options", "icon" => " fa fa-angle-right"),
        ),
    ),
    

    array("title"=>"Manage Pages", "icon" => " feather icon-users" ,"action" => array("cms_page") ,
        "additionals"=>array(
        array("link" => "cms_page", "title" => "Manage Pages", "icon" => " fa fa-angle-right"),        
        ),
    ),

    // array("title"=>"Reviews Management", "icon"=>" feather icon-image" ,"action" => array("reviews") ,
    //     "additionals"=>array(
    //          array("link"=>"reviews","title"=>"Manage Reviews", "icon"=>" fa fa-angle-right"),
    //     ),
    // ),

    array("title"=>"Testimonials Management", "icon"=>" feather icon-image" ,"action" => array("testimonials") ,
        "additionals"=>array(
             array("link"=>"testimonials","title"=>"Manage Testimonials", "icon"=>" fa fa-angle-right"),
        ),
    ),


    array("title"=>"Expert Management", "icon"=>" feather icon-image" ,"action" => array("expert") ,
        "additionals"=>array(
             array("link"=>"expert","title"=>"Manage Experts", "icon"=>" fa fa-angle-right"),
        ),
    ),

    array("title"=>"Learning Journey Management", "icon"=>" feather icon-image" ,"action" => array("learning_journey_category","learning_journey_content") ,
    "additionals"=>array(
         array("link"=>"learning_journey_category","title"=>"Manage Learning Journey Category", "icon"=>" fa fa-angle-right"),
         array("link"=>"learning_journey_content","title"=>"Manage Learning Journey Content", "icon"=>" fa fa-angle-right"),
    ),
),


    // array("title"=>"Videos Management", "icon"=>" feather icon-image" ,"action" => array("video") ,
    //     "additionals"=>array(
    //          array("link"=>"video","title"=>"Manage Videos", "icon"=>" fa fa-angle-right"),
    //     ),
    // ),

    
    // array("title"=>"Articles Management", "icon"=>" fa fa-newspaper-o" ,"action" => array("category","article",'video_article') ,
    //     "additionals"=>array(
    //         array("link"=>"category","title"=>"Manage Category", "icon"=>" fa fa-folder-open"),
    //         array("link"=>"article","title"=>"Manage Article", "icon"=>" fa fa-list-ul"),
    //         array("link"=>"video_article","title"=>"Manage Video", "icon"=>" fa fa-th-large"),
    //         // array("link"=>"product","title"=>"Manage Products", "icon"=>"basket"),
    //         // array("link"=>"size","title"=>"Manage Size", "icon"=>"basket"),
    //         // array("link"=>"color","title"=>"Manage Color", "icon"=>"basket"),
    //         //array("link"=>"coupon","title"=>"Manage Coupon", "icon"=>"plus"),
    //     ),
    // ),


    // array("title"=>"Manage Testimonials", "icon" => "speech" ,"action" => array("testimonial") ,
    //     "additionals"=>array(
    //         array("link"=>"testimonial","title"=>"Manage Testimonials", "icon"=>" fa fa-angle-right"),        
    //     ),
    // ),

     

    // array("title"=>"Package Management", "icon"=>"speech" ,"action" => array("package") ,
    //     "additionals"=>array(
    //         array("link"=>"package","title"=>"Manage Packages", "icon"=>" fa fa-angle-right")            
    //     ),
    // ),

    array("title"=>"Courses Management", "icon"=>"speech" ,"action" => array("tutorial","states","videos","language","learning_journey_course_review","expert_tutorial_review") ,
        "additionals"=>array(
            array("link"=>"tutorial","title"=>"Manage Tutorial", "icon"=>" fa fa-angle-right"),
            array("link"=>"videos","title"=>"Manage Videos", "icon"=>" fa fa-angle-right"),
            array("link"=>"language","title"=>"Manage Language", "icon"=>" fa fa-angle-right"),
            array("link"=>"learning_journey_course_review","title"=>"Tutorial Reviews", "icon"=>" fa fa-angle-right"),
            array("link"=>"expert_tutorial_review","title"=>"Videos Reviews", "icon"=>" fa fa-angle-right"),
            // array("link"=>"states","title"=>"Manage State", "icon"=>" fa fa-angle-right")            
        ),
    ),



    // array("title"=>"Questions Management", "icon"=>"speech" ,"action" => array("questions","options") ,
    //     "additionals"=>array(
    //         array("link"=>"questions","title"=>"Manage Questions", "icon"=>" fa fa-angle-right"),            
    //         array("link"=>"options","title"=>"Manage Options", "icon"=>" fa fa-angle-right")            
    //     ),
    // ),


    array("title"=>"Category Management", "icon"=>"speech" ,"action" => array("category") ,
        "additionals"=>array(
            array("link"=>"category","title"=>"Manage Category", "icon"=>" fa fa-angle-right")            
        ),
    ),
    
    array("title"=>"Learning Management", "icon"=>" fa fa-book" ,"action" => array("learning") ,
        "additionals"=>array(
            array("link"=>"learning","title"=>"Manage Learning", "icon"=>" fa fa-angle-right")            
        ),
    ),


array("title"=>"Order Management", "icon"=>"basket" ,"action" => array("shop_order") ,
"additionals"=>array(
    array("link"=>"shop_order","title"=>"Manage Orders", "icon"=>"bar-chart"),
),
),
    

   // array("title"=>"Stock Management", "icon"=>" fa fa-angle-right" ,"action" => array("category","product") ,
   //      "additionals"=>array(
   //          array("link"=>"category","title"=>"Manage Category", "icon"=>" fa fa-angle-right"),
   //          array("link"=>"product","title"=>"Manage Products", "icon"=>" fa fa-angle-right"),
   //      ),
   //  ),
     

    // array("title"=>"Manage Portfolio", "icon"=>" feather icon-image" ,"action" => array("portfolio","portfolio_category") ,
    //     "additionals"=>array(  
    //         array("link"=>"portfolio_category","title"=>"Manage Categories", "icon"=>" fa fa-angle-right"),
    //         array("link"=>"portfolio","title"=>"Portfolios", "icon"=>" fa fa-angle-right"),      
    //     ),
    // ), 

    // array("title" => "Inquiries Management", "icon" => "envelope", "action" => array("inquiry", "partnership_inquiry", "newsletter"),
    //     "additionals" => array(
    //         array("link" => "inquiry", "title" => "Contact Inquiries", "icon" => " fa fa-comments"),
    //         // array("link" => "partnership_inquiry", "title" => "PartnerShip Inquiries", "icon" => " fa fa-comments"),
    //         //array("link"=>"quote","title"=>"Request A Quote", "icon"=>"envelope"),
    //         array("link"=>"newsletter","title"=>"Newsletter", "icon"=>"envelope"),
    //     ),
    // ), 

    // array("title"=>"Manage Volunteers", "icon"=>" feather icon-image" ,"action" => array("volunteers") ,
    //     "additionals"=>array(
    //          array("link"=>"volunteers","title"=>"Manage Volunteers", "icon"=>"note"),           
    //     ),
    // ), 

    // array("title"=>"Event Management", "icon"=>" feather icon-image" ,"action" => array("event") ,
    //     "additionals"=>array(
    //          array("link"=>"event","title"=>"Manage Events", "icon"=>"note"),           
    //     ),
    // ), 

    // array("title"=>"Board Of Directors", "icon"=>" feather icon-image" ,"action" => array("directors","volunteers","team_member") ,
    //     "additionals"=>array(
    //         array("link"=>"directors","title"=>"Manage Directors", "icon"=>" feather icon-image"),   
    //         array("link"=>"volunteers","title"=>"Manage Volunteers", "icon"=>"note"),       
    //         array("link"=>"team_member","title"=>"Internationl Team", "icon"=>" fa fa-user"),        
    //     ),
    // ),



    // array("title"=>"Attribute Management", "icon" => " feather icon-users" ,"action" => array("size","size_unit") ,
    //     "additionals"=>array(
    //         array("link"=>"size","title"=>"Manage  Size", "icon"=>" fa fa-angle-right"),
    //         array("link"=>"size_unit","title"=>"Manage Size Unit", "icon"=>" fa fa-angle-right"),
    //     ),
    // ),


    
    
    // array("title"=>"Other Products Management", "icon"=>" fa fa-shopping-cart" ,"action" => array("product","category","finish","size","size_unit") ,
    //     "additionals"=>array(
    //         array("link"=>"category","title"=>"Manage Category", "icon"=>" fa fa-angle-right"),
    //         array("link"=>"product","title"=>"Manage Products", "icon"=>" fa fa-angle-right"),
    //         array("link"=>"finish","title"=>"Manage Product Finish", "icon"=>" fa fa-angle-right"),
    //     ),
    // ),


    // array("title"=>"Zippers Management", "icon"=>" fa fa-shopping-cart" ,"action" => array("zipper","color") ,
    //     "additionals"=>array(
    //         array("link"=>"zippers","title"=>"Manage Zippers", "icon"=>" fa fa-angle-right"),
    //         array("link"=>"color","title"=>"Manage Teeth Colors", "icon"=>" fa fa-angle-right"),
    //         array("link"=>"type","title"=>"Manage Zipper's Types", "icon"=>" fa fa-angle-right"),
    //     ),
    // ),


    // array("title"=>"Clients Management", "icon" => " fa fa-handshake-o" ,"action" => array("client") ,
    //     "additionals"=>array(
    //         array("link"=>"client","title"=>"Manage Clients", "icon"=>" fa fa-handshake-o"),        
    //     ),
    // ),

    // array("title"=>"Solution Management", "icon"=>"folder" ,"action" => array("solution") ,
    //     "additionals"=>array(
    //         array("link"=>"solution","title"=>"Manage Solution", "icon"=>"folder"),
    //         //array("link"=>"product","title"=>"Manage Products", "icon"=>"basket"),
    //     ),
    // ),
    
    // array("title"=>"Stock Management", "icon"=>"basket" ,"action" => array("category","product","brand","size","color") ,
    //     "additionals"=>array(
    //         array("link"=>"category","title"=>"Manage Category", "icon"=>"basket"),
    //         array("link"=>"brand","title"=>"Manage Brand", "icon"=>"basket"),
    //         array("link"=>"product","title"=>"Manage Products", "icon"=>"basket"),
    //         array("link"=>"size","title"=>"Manage Size", "icon"=>"basket"),
    //         array("link"=>"color","title"=>"Manage Color", "icon"=>"basket"),
    //         //array("link"=>"coupon","title"=>"Manage Coupon", "icon"=>"plus"),
    //     ),
    // ),
    /*
    array("title"=>"Stock Management", "icon"=>"link" ,"action" => array("category","product") ,
        "additionals"=>array(
            array("link"=>"category","title"=>"Manage Category", "icon"=>"link"),
            array("link"=>"product","title"=>"Manage Products", "icon"=>"basket"),
        ),
    ),/*
*/

    // array("title"=>"Gallery Management", "icon"=>"icon-image" ,"action" => array("gallery") ,
    //     "additionals"=>array(
    //         array("link"=>"gallery","title"=>"Manage Gallery", "icon"=>"icon-image"),
    //     ),
    // ),
    
    // array("title"=>"Orders Management", "icon"=>" fa fa-cart-arrow-down" ,"action" => array("shop_order") ,
    //     "additionals"=>array(
    //         array("link"=>"shop_order","title"=>"Manage Orders", "icon"=>" fa fa-picture-o"),
    //     ),
    // ),
    
    /*
    *//*
    array("title"=>"Stock Management", "icon"=>"basket" ,"action" => array("category","product","coupon") ,
        "additionals"=>array(
            //array("link"=>"category","title"=>"Manage Categories", "icon"=>" fa fa-folder-open"),
            array("link"=>"product","title"=>"Manage Products", "icon"=>"basket"),
            /*array("link"=>"coupon","title"=>"Manage Coupon", "icon"=>"plus"),*/
    //     ),
    // ),

    // array("title"=>"Services Management", "icon"=>" fa fa-tasks" ,"action" => array("services") ,
    //     "additionals"=>array(
    //         array("link"=>"services","title"=>"Manage Services", "icon"=>" fa fa-list-alt"),
    //         // array("link"=>"product","title"=>"Manage Products", "icon"=>"basket"),
    //         // array("link"=>"coupon","title"=>"Manage Coupon", "icon"=>"plus"),*//*
    //     ),
    // ),
    /*
    array("title"=>"Affiliates Management", "icon"=>"target" ,"action" => array("affiliate") ,
        "additionals"=>array(
            array("link"=>"affiliate","title"=>"Manage Affiliates", "icon"=>"target"),
            //array("link"=>"source","title"=>"Manage Sources", "icon"=>"link"),
        ),
    ),
    /*
    array("title"=>"Camp Gallery", "icon"=>"plus" ,"action" => array("velocity_camp") ,
        "additionals"=>array(
            array("link"=>"gallery_image","title"=>"Gallery Images", "icon"=>"camera"),
            //array("link"=>"source","title"=>"Manage Sources", "icon"=>"link"),
        ),
    ),
    array("title"=>"Camp Features", "icon"=>"present" ,"action" => array("training_level") ,
        "additionals"=>array(
            array("link"=>"manage_feature","title"=>"Manage Features", "icon"=>"eye"),
            //array("link"=>"source","title"=>"Manage Sources", "icon"=>"link"),
        ),
    ),
    array("title"=>"Trainers", "icon"=>"hourglass" ,"action" => array("trainer") ,
        "additionals"=>array(
            array("link"=>"trainer","title"=>"Manage Trainers", "icon"=>"link"),
            //array("link"=>"source","title"=>"Manage Sources", "icon"=>"link"),
        ),
    ),

    array("title"=>"Schedule", "icon"=>"clock" ,"action" => array("schedule") ,
        "additionals"=>array(
            array("link"=>"schedule","title"=>"Manage Schedule", "icon"=>"clock"),
            //array("link"=>"source","title"=>"Manage Sources", "icon"=>"link"),
        ),
    ),
    /*
    array("title"=>"Benefits & Sources", "icon"=>"plus" ,"action" => array("product_benefit","source") ,
        "additionals"=>array(
            array("link"=>"product_benefit","title"=>"Manage Benefits", "icon"=>"plus"),
            array("link"=>"source","title"=>"Manage Sources", "icon"=>"link"),
        ),
    ),
    

    /*
    array("title"=>"Other Sections", "icon"=>"hourglass" ,"action" => array("blog","testimonial") ,
        "additionals"=>array(
            //array("link"=>"category","title"=>"Manage Categories", "icon"=>"pin"),
            //array("link"=>"package","title"=>"Manage Packages", "icon"=>"diamond"),
            //array("link"=>"feature","title"=>"Manage Features", "icon"=>"present"),
            //array("link"=>"product","title"=>"Manage Products", "icon"=>"basket"),
            //array("link"=>"gallery","title"=>"Manage Gallery", "icon"=>"pencil"),
            //array("link"=>"team_member","title"=>"Manage Team", "icon"=>"flag"),
            //array("link"=>"fabric","title"=>"Manage Bride Fabric", "icon"=>"flag"),
            array("link"=>"blog","title"=>"Manage Blog", "icon"=>"note"),
            array("link"=>"testimonial","title"=>"Manage Testimonials", "icon"=>"speech"),
        ),
    ),





  /*  array("title" => "Employment Form", "icon" => " feather icon-users", "action" => "employment",
        "additionals" => array(
            array("link"=>"employment","title"=>"Inquiries", "icon"=>"envelope"),
        ),
    ), */

  /*  array("title" => "Orders Management", "icon" => " feather icon-users", "action" => "order_supplies",
        "additionals" => array(
            array("link"=>"order_supplies","title"=>"Orders", "icon"=>"envelope"),
        ),
    ), */


    // array("title"=>"User Management", "icon"=>" fa fa-users" ,"action" => "user" ,
    //     "additionals"=>array(
    //         array("link"=>"user","title"=>"Manage User's", "icon"=>" fa fa-users"),
    //     ),
    // ),

    // array("title" => "Administrators", "icon" => " feather icon-users", "action" => "admins",
    //     "additionals" => array(
    //         array("link" => "admins", "title" => "Manage Admin", "icon" => " fa fa-user"),
    //     ),
    // ),
    



    /*
    /*array("title"=>"Statuses Management", "icon"=>"flag" ,"action" => "ostatus" ,
        "additionals"=>array(
            array("link"=>"ostatus","title"=>"Manage Statuses", "icon"=>"flag"),
        ),
    ),
    array("title"=>"Order Management", "icon"=>"basket" ,"action" => array("order") ,
        "additionals"=>array(
            array("link"=>"order","title"=>"Manage Orders", "icon"=>"bar-chart"),
        ),
    ),
    */
);
?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu page-sidebar-menu-fixed" data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper text-center">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <!-- <div class="sidebar-toggler">
                </div> -->
                <img alt="" class="img-circle my-image" src="https://img.icons8.com/color/48/000000/manager.png">
                <h3 class="my-h3-c">Welcome To Admin Portal</h3>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                &nbsp;
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <? foreach ($menu_links as $menu) {

            if (has_value($config['ci_class'], $menu['action']) || has_value($config['ci_index_page'], $menu['action'])) {
                $active = "active";
                $open = "open";
                $selected = '<span class="selected"></span>';
            } else {
                $open = "";
                $active = "";
                $selected = "";
            }
            ?>
            <li class="start <?= $active ?> <?= $open ?>">
                <a href="javascript:;">
                    <i class="icon-<?= $menu['icon'] ?>"></i>
                    <span class="title"><?= $menu['title'] ?></span>
                    <?= $selected ?>
                    <span class="arrow <?= $open ?>"></span>
                </a>
                <ul class="sub-menu">
                    <? foreach ($menu['additionals'] as $add) { ?>
                        <li class="active">
                            <a href="<?= $config['base_url'] . "admin/" . $add['link'] ?>">
                                <i class="icon-<?= $add['icon'] ?>"></i>
                                <?= $add['title'] ?></a>
                        </li>
                    <? } ?>
                </ul>
                <? } ?>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>