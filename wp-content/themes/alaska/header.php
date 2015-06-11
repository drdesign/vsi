<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<?php 
    global $ts_alaska;
    if(isset($_GET['ts-header-style']) && !empty($_GET['ts-header-style'])){
            $ts_alaska['ts-header-style'] = $_GET['ts-header-style'];
        }

?>

<body <?php body_class(); ?>>
    <!--Wrapper-->
    <div id="wrapper">
        <header>
        <?php if ($ts_alaska['ts-topbar-showhide']=='show') {?>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="top-social col-sm-4">
                        <?php get_template_part('content-parts/header', 'socials'); ?>
                    </div>
                    <div class="top-info col-sm-8 pull-right">
                    <div id="flags_language_selector"><?php language_selector_flags(); ?></div >
                    <?php echo do_shortcode( $ts_alaska['ts-top-right-content'] ) ?>
                    </div>
                    </div>
            </div>
        </div>
        <?php } ?>
            <?php if($ts_alaska['ts-switch-info-bar']==1){ ?>
            <a class="toggle-bar-btn fade-toggle hidden-phone" href="#"><span class="ts-infobar infobar-up"></span></a>
            <?php } ?>
        <?php if($ts_alaska['ts-header-style']=='header_right') {?>
        <div class="main-header">
            <div class="container">
                    <div class="logo">
                    <h1><a href="<?php echo get_home_url(); ?>" class="ariva_logo"><img src="<?php echo esc_url($ts_alaska['ts-logo']['url']); ?>"  alt="<?php echo get_bloginfo('name') ?>"></a></h1>
                    </div>
                    <a href="#" class="mobile-navigation"><i class="fa fa-bars"></i></a>
                    <div class="pull-right ts-mainmenu">
                        <nav class="main-menu nav-menu">
                            <?php get_template_part('content-parts/megamenu', ''); ?>
                            	<?php if($ts_alaska['ts-whmcs-register-url']!=''){ ?>
                                	<div class="navbar-form"><a href="<?php echo esc_url( $ts_alaska['ts-whmcs-register-url'] ) ?>" class="ts-bt bt-login"><i class="fa fa-user"></i><?php echo $ts_alaska['ts-text-signup'] ?></a></div>                            
                                <?php } ?>	
                        </nav>
                    </div>
            </div>        
        </div>
        <?php }else{ 
            if($ts_alaska['ts-background-color']=='image'){
                $bgimage = 'style="background-image:url('.esc_url($ts_alaska['ts-background-center']['url']).')"';
            }else{
                $bgimage = 'style="background-color:'.esc_url($ts_alaska['ts-background-color-header']).'"';
            }


            ?>
        <div class="main-header-style2">
            <a href="#" class="mobile-navigation"><i class="fa fa-bars"></i></a>
            <div class="ts-header-1" <?php echo $bgimage ;?> >  
            <?php if($ts_alaska['ts-background-color']=='image'){ ?>           
                <div class="header-overlay"></div>    
            <?php } ?>    
                <div class="container">
                    <div class="logo">
                        <h1><a href="<?php echo get_home_url(); ?>" class="ariva_logo"><img src="<?php echo esc_url($ts_alaska['ts-logo']['url']); ?>"  alt="<?php echo get_bloginfo('name') ?>"></a></h1>
                    </div>
                    <div class="pull-right ts-suport-header">
                    <?php if($ts_alaska['ts-header-center-phone']!=''){ ?>
                        <div class="header-suport">
                                <span class='header-title'><?php echo esc_attr( $ts_alaska['ts-header-center-title'] ) ?></span>
                                <span class='header-phone'><?php echo esc_attr( $ts_alaska['ts-header-center-phone'] ) ?> </span>
                        </div>
                    <?php }  ?>    
                        <div class="header-signup-chat">
                            <ul>
                            <?php if($ts_alaska['ts-whmcs-register-url']!=''){ ?>
                                <li class="header-signup"><a href="<?php echo esc_url( $ts_alaska['ts-whmcs-register-url'] ) ?>"><span class="icon"><i class="fa fa-unlock-alt fa-1x"></i></span>        
                                        <span class="text"><?php echo $ts_alaska['ts-text-signup'] ?></span></a></li>
                            <?php } 
                            	if($ts_alaska['ts-header-livechat']!=''){ 
                            ?>            
                                <li class="header-chat"><a href="<?php echo  $ts_alaska['ts-header-livechat']  ?>"><span class="icon"><i class="fa fa-comments-o fa-1x"></i></span>    
                                        <span class="text"><?php echo $ts_alaska['ts-text-livechat'] ?></span></a></li>
                            <?php } ?>            
                            </ul>                            
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="main-menu-2">
                <div class="container">
                    <div class="ts-mainmenu-center">
                        <div class="ts-mainmenu">
                                <nav class="main-menu nav-menu">
                                    <?php get_template_part('content-parts/megamenu2', ''); ?>                                
                                </nav>
                                <?php if($ts_alaska['ts-show-search']=='show'){ ?>
                                    <div class="header-search pull-right">
                                        <form role="search" method="get" id="searchform" action="<?php echo get_home_url() ?>" >
                                            <input placeholder="Search.." type="search" name="s"  />
                                            <span><button type="submit" id="submit_btn" class="search-submit"><i class="fa fa-search"></i></button></span>
                                        </form>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>           
                </div>        
            </div>    
        </div>
    <?php } ?>
    </header>