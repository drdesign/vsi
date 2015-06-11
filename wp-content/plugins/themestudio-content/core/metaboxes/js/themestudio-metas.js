jQuery(document).ready(function($) {
    'use strict';

    //Page settings
    var page_template = $('#page_template');
    $(this).change(function() {
        page_settings();
    });
    page_settings();

     function page_settings() {
        var select_type = $('#page_template option');

        var page_sidebar      = $('.cmb_id_themestudio_page_sidebar');
        var page_metas      = $('#page_metas');

        select_type.each(function() {

            if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'default')) {
                page_metas.fadeIn();
                page_sidebar.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'templates/fullwidth-template.php')) {
                page_sidebar.hide();
                page_metas.fadeIn();

            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'templates/page_sidebar_left.php')) {
                page_sidebar.fadeIn();
                page_metas.fadeIn();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'templates/portfolio-template.php')) {
                page_sidebar.hide();
                page_metas.fadeIn();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'templates/page_sidebar_right.php')) {
                page_sidebar.fadeIn();
                page_metas.fadeIn();
            }
        });
    }

    //Post settings
    function post_format_setting() {

        if ($('#post-format-image').is(':checked')) {
            $('#themestudio_post_metas').fadeIn();
            $('.cmb_id_themestudio_image_gallery').hide();
            $('.cmb_id_themestudio_post_image').fadeIn();
            $('.cmb_id_themestudio_post_video_embed').hide();
            $('.cmb_id_themestudio_post_audio_embed').hide();
            $('.cmb_id_themestudio_quote_content').hide();
            $('.cmb_id_themestudio_quote_author').hide();
            $('.cmb_id_themestudio_link_description').hide();
            $('.cmb_id_themestudio_link_url').hide();

        } else if ($('#post-format-gallery').is(':checked')) {
            $('#themestudio_post_metas').fadeIn();
            $('.cmb_id_themestudio_image_gallery').fadeIn();
            $('.cmb_id_themestudio_post_image').hide();
            $('.cmb_id_themestudio_post_video_embed').hide();
            $('.cmb_id_themestudio_post_audio_embed').hide();
            $('.cmb_id_themestudio_quote_content').hide();
            $('.cmb_id_themestudio_quote_author').hide();
            $('.cmb_id_themestudio_link_description').hide();
            $('.cmb_id_themestudio_link_url').hide();

        } else if ($('#post-format-video').is(':checked')) {
            $('#themestudio_post_metas').fadeIn();
            $('.cmb_id_themestudio_image_gallery').hide();
            $('.cmb_id_themestudio_post_image').hide();
            $('.cmb_id_themestudio_post_video_embed').fadeIn();
            $('.cmb_id_themestudio_post_audio_embed').hide();
            $('.cmb_id_themestudio_quote_content').hide();
            $('.cmb_id_themestudio_quote_author').hide();
            $('.cmb_id_themestudio_link_description').hide();
            $('.cmb_id_themestudio_link_url').hide();

        } else if ($('#post-format-audio').is(':checked')) {
            $('#themestudio_post_metas').fadeIn();
            $('.cmb_id_themestudio_image_gallery').hide();
            $('.cmb_id_themestudio_post_image').hide();
            $('.cmb_id_themestudio_post_video_embed').hide();
            $('.cmb_id_themestudio_post_audio_embed').fadeIn();
            $('.cmb_id_themestudio_quote_content').hide();
            $('.cmb_id_themestudio_quote_author').hide();
            $('.cmb_id_themestudio_link_description').hide();
            $('.cmb_id_themestudio_link_url').hide();

        } else if ($('#post-format-quote').is(':checked')) {
            $('#themestudio_post_metas').fadeIn();
            $('.cmb_id_themestudio_image_gallery').hide();
            $('.cmb_id_themestudio_post_image').hide();
            $('.cmb_id_themestudio_post_video_embed').hide();
            $('.cmb_id_themestudio_post_audio_embed').hide();
            $('.cmb_id_themestudio_quote_content').fadeIn();
            $('.cmb_id_themestudio_quote_author').fadeIn();
            $('.cmb_id_themestudio_link_description').hide();
            $('.cmb_id_themestudio_link_url').hide();

        }else if ($('#post-format-link').is(':checked')) {
            $('#themestudio_post_metas').fadeIn();
            $('.cmb_id_themestudio_image_gallery').hide();
            $('.cmb_id_themestudio_post_image').hide();
            $('.cmb_id_themestudio_post_video_embed').hide();
            $('.cmb_id_themestudio_post_audio_embed').hide();
            $('.cmb_id_themestudio_quote_content').hide();
            $('.cmb_id_themestudio_quote_author').hide();
            $('.cmb_id_themestudio_link_description').fadeIn();
            $('.cmb_id_themestudio_link_url').fadeIn();

        } else {
            $('#themestudio_post_metas').hide();
        }
    }
    post_format_setting();

    var select_type = $('#post_formats_select input');

    $(this).change(function() {
        post_format_setting();
    });

    // Portfolio settings
    function portfolio_setting() {
        var select_type = $('#themestudio_portfolio_type option');

        var portfolio_standard      = $('.cmb_id_themestudio_portfolio_standard');
        var portfolio_slider        = $('.cmb_id_themestudio_portfolio_slider');
        var portfolio_image         = $('.cmb_id_themestudio_portfolio_image');
        var portfolio_video         = $('.cmb_id_themestudio_portfolio_video');
        var portfolio_soundcloud    = $('.cmb_id_themestudio_portfolio_soundcloud');

        select_type.each(function() {

            if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'standard')) {
                portfolio_slider.hide();
                portfolio_image.hide();
                portfolio_video.hide();
                portfolio_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'video')) {
                portfolio_slider.hide();
                portfolio_image.hide();
                portfolio_video.fadeIn();
                portfolio_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'image')) {
                portfolio_slider.hide();
                portfolio_image.fadeIn();
                portfolio_video.hide();
                portfolio_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'slider')) {
                portfolio_slider.fadeIn();
                portfolio_image.hide();
                portfolio_video.hide();
                portfolio_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'soundcloud')) {
                portfolio_slider.hide();
                portfolio_image.hide();
                portfolio_video.hide();
                portfolio_soundcloud.fadeIn();
            }
        });
    }
    // Portfolio settings
    
    portfolio_setting();

    var select_type = $('#themestudio_portfolio_type');

    $(this).change(function() {
        portfolio_setting();
    });


    // Portfolio settings
    function feature_setting() {
        var select_type = $('#themestudio_feature_type option');

        var feature_standard      = $('.cmb_id_themestudio_feature_standard');
        var feature_slider        = $('.cmb_id_themestudio_feature_slider');
        var feature_image         = $('.cmb_id_themestudio_feature_image');
        var feature_video         = $('.cmb_id_themestudio_feature_video');
        var feature_soundcloud    = $('.cmb_id_themestudio_feature_soundcloud');

        select_type.each(function() {

            if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'standard')) {
                feature_slider.hide();
                feature_image.hide();
                feature_video.hide();
                feature_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'video')) {
                feature_slider.hide();
                feature_image.hide();
                feature_video.fadeIn();
                feature_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'image')) {
                feature_slider.hide();
                feature_image.fadeIn();
                feature_video.hide();
                feature_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'slider')) {
                feature_slider.fadeIn();
                feature_image.hide();
                feature_video.hide();
                feature_soundcloud.hide();
            } else if (($(this).attr('selected') == 'selected') && ($(this).attr('value') == 'soundcloud')) {
                feature_slider.hide();
                feature_image.hide();
                feature_video.hide();
                feature_soundcloud.fadeIn();
            }
        });
    }
    // Portfolio settings
    
    feature_setting();

    var select_type = $('#themestudio_feature_type');

    $(this).change(function() {
        feature_setting();
    });


    function time_line_format_setting () {
        var select_time_line = $('#themestudio_time_line_class option');

        select_time_line.each(function() {

            if ($(this).attr('selected') == 'selected' ){
                var select_time_line_val = $(this).val();
                $('.cmb_id_themestudio_time_line_class .cmb_metabox_description').html('<span class="fa '+select_time_line_val+'" style="font-size:30px;color:#C69C6D;"></span>');
            }

        });
    }
    time_line_format_setting();

    var select_type = $('#themestudio_time_line_class');

    $(this).change(function() {
        time_line_format_setting();
    });


    function services_format_setting () {
        var select_services = $('#themestudio_service_class option');

        select_services.each(function() {

            if ($(this).attr('selected') == 'selected' ){
                var select_services_val = $(this).val();
                $('.cmb_id_themestudio_service_class .cmb_metabox_description').html('<span class="fa '+select_services_val+' fa-5" style="font-size:50px;color:#C69C6D;"></span>');
            }

        });
    }
    services_format_setting();

    var select_type = $('#themestudio_service_class');

    $(this).change(function() {
        services_format_setting();
    });


});