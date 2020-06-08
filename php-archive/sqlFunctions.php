<?php
    function create_hackathon_post($i, $hackathon){
        $postQuery = "-- -----------begin create_hackathon_post query------------- \n\n\n".
        "INSERT INTO `wp_posts` (
            `ID`, 
            `post_author`, 
            `post_date`, 
            `post_date_gmt`, 
            `post_content`, 
            `post_title`, 
            `post_excerpt`, 
            `post_status`, 
            `comment_status`, 
            `ping_status`, 
            `post_password`, 
            `post_name`, 
            `to_ping`, 
            `pinged`, 
            `post_modified`, 
            `post_modified_gmt`, 
            `post_content_filtered`, 
            `post_parent`, 
            `guid`, 
            `menu_order`, 
            `post_type`, 
            `post_mime_type`, 
            `comment_count`
            ) VALUES (
            ".(9000 + $i).",
            1,
            CURRENT_TIMESTAMP,
            CURRENT_TIMESTAMP,
            '<!-- wp:paragraph -->\n<p>Some text Some more text</p>\n<!-- /wp:paragraph -->',
            '".$hackathon[$i]->title."',
            '".$hackathon[$i]->event_date."',
            'publish', 
            'closed', 
            'closed', 
            '', 
            '".$hackathon[$i]->link."',
            '', 
            '', 
            CURRENT_TIMESTAMP,
            CURRENT_TIMESTAMP,
            '', 
            0, 
            'https://wunderkind.us/',
            0, 
            'project', 
            '', 
            0);
            "."-- -----------end create_hackathon_post query------------- \n\n\n";
        return $postQuery;
    }

    // Construct query to create post_meta
    function create_hackathon_postmeta($i, $hackathons) {
        $post_id = 9000 + $i;
        $attachment_id = 6000 + $i;
        $post_meta_id = 12000 + ($i * 100);
        $postMetaQuery = "-- -----------begin create_hackathon_postmeta query------------- \n\n\n".
        "INSERT INTO `wp_postmeta` (
            `meta_id`, 
            `post_id`, 
            `meta_key`, 
            `meta_value`
            ) VALUES
            (".($post_meta_id + 1).", ".$post_id.", '_edit_lock', '1591466390:1'),
            (".($post_meta_id + 2).", ".$post_id.", '_thumbnail_id', ".$attachment_id."),
            (".($post_meta_id + 3).", ".$post_id.", '_et_pb_use_builder', 'off'),
            (".($post_meta_id + 4).", ".$post_id.", '_et_pb_old_content', ''),
            (".($post_meta_id + 5).", ".$post_id.", '_et_gb_content_width', '1080'),
            (".($post_meta_id + 6).", ".$post_id.", 'spay_email', ''),
            (".($post_meta_id + 7).", ".$post_id.", '_edit_last', '1'),
            (".($post_meta_id + 8).", ".$post_id.", '_et_pb_post_hide_nav', 'default'),
            (".($post_meta_id + 9).", ".$post_id.", '_et_pb_project_nav', 'off'),
            (".($post_meta_id + 10).", ".$post_id.", '_et_pb_page_layout', 'et_no_sidebar'),
            (".($post_meta_id + 11).", ".$post_id.", '_et_pb_side_nav', 'off'),
            (".($post_meta_id + 12).", ".$post_id.", '_yoast_wpseo_content_score', '60'),
            (".($post_meta_id + 13).", ".$post_id.", '_wp_old_slug', 'test-project'),
            (".($post_meta_id + 14).", ".$post_id.", '_yoast_wpseo_primary_project_category', '39'),
            (".($post_meta_id + 15).", ".$post_id.", 'et_enqueued_post_fonts', 'a:2:{s:6:\"family\";a:1:{s:19:\"et-gf-titillium-web\";s:88:\"Titillium+Web:200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900\";}s:6:\"subset\";a:2:{i:0;s:5:\"latin\";i:1;s:9:\"latin-ext\";}}');
            "."-- -----------end create_hackathon_postmeta query------------- \n\n\n";
        return $postMetaQuery;
    }

    // Construct query to create attachments
    function create_hackathon_attachment($i, $hackathons) {
        $attachment_id = 6000 + $i;
        $postAttachmentQuery = "-- -----------begin create_hackathon_attachment query------------- \n\n\n".
        "INSERT INTO `wp_posts` (
            `ID`, 
            `post_author`, 
            `post_date`, 
            `post_date_gmt`, 
            `post_content`, 
            `post_title`, 
            `post_excerpt`, 
            `post_status`, 
            `comment_status`, 
            `ping_status`, 
            `post_password`, 
            `post_name`, 
            `to_ping`, 
            `pinged`, 
            `post_modified`, 
            `post_modified_gmt`, 
            `post_content_filtered`, 
            `post_parent`, 
            `guid`, 
            `menu_order`, 
            `post_type`, 
            `post_mime_type`, 
            `comment_count`
            ) VALUES (
            ".$attachment_id.",
            1, 
            CURRENT_TIMESTAMP, 
            CURRENT_TIMESTAMP, 
            '', 
            'portrait-square-04', 
            '', 
            'inherit', 
            'open', 
            'closed', 
            '', 
            'portrait-square-04', 
            '', 
            '', 
            CURRENT_TIMESTAMP, 
            CURRENT_TIMESTAMP, 
            '', 
            0, 
            '".$hackathons[$i]->event_image."',
            0, 
            'attachment', 
            'image/jpeg', 
            0);
            "."-- -----------end create_hackathon_attachment query------------- \n\n\n";
        return $postAttachmentQuery;
    }

// [title] => NotUniversity Hacks
// [link] => https://hackp.ac/NotUniversityHacks
// [event_date] => Jun 6th - 7th
// [start_date] => 2020-06-06
// [end_date] => 2020-06-07
// [city] => Everywhere
// [state] => Worldwide
// [event_image] => https://s3.amazonaws.com/assets.mlh.io/events/splashes/000/001/546/thumb/notUniversity_mlh-event-hero.png?1589821548
// [event_logo] => https://s3.amazonaws.com/assets.mlh.io/events/logos/000/001/546/thumb/notUniversity_mlh-event-title.png?1589821547
?>