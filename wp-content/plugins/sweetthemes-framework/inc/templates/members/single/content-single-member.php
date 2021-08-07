<?php
/**
 * @package ModelTheme
 */

$prev_post = get_previous_post();
$next_post = get_next_post();

$metabox_member_position = get_post_meta( get_the_ID(), 'niva_member_position', true );
$metabox_member_email = get_post_meta( get_the_ID(), 'niva_member_email', true );
$metabox_member_phone = get_post_meta( get_the_ID(), 'niva_member_phone', true );
$metabox_facebook_profile = get_post_meta( get_the_ID(), 'niva_facebook_profile', true );
$metabox_twitter_profile  = get_post_meta( get_the_ID(), 'niva_twitter_profile', true );
$metabox_linkedin_profile = get_post_meta( get_the_ID(), 'niva_linkedin_profile', true );
$metabox_contact_details_title_text = get_post_meta( get_the_ID(), 'niva_contact_details_title_text', true );
$metabox_skills_title_text = get_post_meta( get_the_ID(), 'niva_skills_title_text', true );
$metabox_progress_bar1_name = get_post_meta( get_the_ID(), 'niva_progress_bar1_name', true );
$metabox_progress_bar1_percentage = get_post_meta( get_the_ID(), 'niva_progress_bar1_percentage', true );
$metabox_progress_bar2_name = get_post_meta( get_the_ID(), 'niva_progress_bar2_name', true );
$metabox_progress_bar2_percentage = get_post_meta( get_the_ID(), 'niva_progress_bar2_percentage', true );
$metabox_progress_bar3_name = get_post_meta( get_the_ID(), 'niva_progress_bar3_name', true );
$metabox_progress_bar3_percentage = get_post_meta( get_the_ID(), 'niva_progress_bar3_percentage', true );
$metabox_progress_bar3_name = get_post_meta( get_the_ID(), 'niva_progress_bar3_name', true );
$metabox_progress_bar3_percentage = get_post_meta( get_the_ID(), 'niva_progress_bar3_percentage', true );
$metabox_areas_expertise_title_text = get_post_meta( get_the_ID(), 'niva_areas_expertise_title_text', true );
$metabox_areas_expertise_content = get_post_meta( get_the_ID(), 'niva_areas_expertise_content', true );
$metabox_education_title_text = get_post_meta( get_the_ID(), 'niva_education_title_text', true );
$metabox_education_content = get_post_meta( get_the_ID(), 'niva_education_content', true );

if($metabox_facebook_profile) {
$profil_fb = '<span class="social-holder-span"><a target="_blank" href="'. $metabox_facebook_profile .'" class="member01_profile-facebook"> <i class="fa fa-facebook" aria-hidden="true"></i></a></span>  ';
}
if($metabox_twitter_profile) {
    $profil_tw = '<span class="social-holder-span"><a target="_blank" href="https://twitter.com/'. $metabox_twitter_profile .'" class="member01_profile-twitter"> <i class="fa fa-twitter" aria-hidden="true"></i></a></span>  ';
}
if($metabox_linkedin_profile) {
    $profil_in = '<span class="social-holder-span"><a target="_blank" href="'. $metabox_linkedin_profile .'" class="member01_profile-linkedin"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a></span>  ';
}

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post super-high-padding'); ?>>

    <div class="container">
        <div class="row">
            <div class="col-md-4 sidebar-member">
                <div class="thumbnail-single">             
                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'sweetthemes_single_member' ); 
                    if($thumbnail_src) { ?>
                        <?php the_post_thumbnail( 'sweetthemes_single_member' ); ?>
                    <?php } ?>
                </div>
                <?php if($metabox_contact_details_title_text) { ?>
                    <h4 class="member_contact_title"><?php echo $metabox_contact_details_title_text; ?></h4>
                <?php } ?>
                <div class="member_email"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $metabox_member_email; ?></div>
                <div class="member_phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $metabox_member_phone; ?></div>
                <div class="member_social"><?php echo $profil_fb . $profil_tw . $profil_in; ?></div>
            </div> 
            <div class="col-md-8">
                <h1 class="member-name"><?php echo get_the_title(); ?></h1>
                <h4 class="member_position"><?php echo $metabox_member_position; ?></h4>  
                <div class="member_description"><?php the_content(); ?></div>
                <?php if($metabox_skills_title_text) { ?>
                    <h5 class="member_skills-title"><?php echo $metabox_skills_title_text; ?></h5>  
                <?php } ?>
                
                <?php if(!empty($metabox_progress_bar1_name) && !empty($metabox_progress_bar1_percentage)) { ?>
                    <?php echo do_shortcode('[progress_bar tooltip_option="tooltip_on" bar_scope="success" bar_style="simple" bar_value="'.$metabox_progress_bar1_percentage.'" bar_label_text="'.$metabox_progress_bar1_name.'" bar_label_percentage="'.$metabox_progress_bar1_percentage.'%"]'); ?>
                <?php } ?>

                <?php if(!empty($metabox_progress_bar2_name) && !empty($metabox_progress_bar2_percentage)) { ?>
                    <?php echo do_shortcode('[progress_bar tooltip_option="tooltip_on" bar_scope="success" bar_style="simple" bar_value="'.$metabox_progress_bar2_percentage.'" bar_label_text="'.$metabox_progress_bar2_name.'" bar_label_percentage="'.$metabox_progress_bar2_percentage.'%"]'); ?>
                <?php } ?>

                <?php if(!empty($metabox_progress_bar3_name) && !empty($metabox_progress_bar3_percentage)) { ?>
                    <?php echo do_shortcode('[progress_bar tooltip_option="tooltip_on" bar_scope="success" bar_style="simple" bar_value="'.$metabox_progress_bar3_percentage.'" bar_label_text="'.$metabox_progress_bar3_name.'" bar_label_percentage="'.$metabox_progress_bar3_percentage.'%"]'); ?>
                <?php } ?>

                <div class="row">
                <?php if(!empty($metabox_areas_expertise_title_text) && !empty($metabox_areas_expertise_content)) { ?>
                    <div class="areas_expertise_section col-md-6">
                        <div class="areas_expertise_section_inner">
                            <h4 class="areas_expertise_title_text"><?php echo $metabox_areas_expertise_title_text; ?></h4>
                            <div class="areas_expertise_content"><?php echo $metabox_areas_expertise_content; ?></div>
                        </div>
                    </div>
                <?php } ?>

                <?php if(!empty($metabox_education_title_text) && !empty($metabox_education_content)) { ?>
                    <div class="education_section col-md-6">
                        <div class="education_section_inner">
                            <h4 class="education_title_text"><?php echo $metabox_education_title_text; ?></h4>
                            <div class="education_content"><?php echo $metabox_education_content; ?></div>
                        </div>
                    </div>
                <?php } ?>
                </div>

            </div>         
        </div>
    </div>


</article>