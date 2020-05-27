<?php
    include('simple_html_dom.php');

    $html = "https://angelhack.com/events/";
    $fileHeaders = get_headers($html);
    
    // Check to see if webpage is loading
    if($fileHeaders[0]!="HTTP/1.1 200 OK") {
        $contents = '<div class="alert alert-danger" role="alert">There was an error</div>';
    } else {
        $page = file_get_html($html);        

        foreach($page->find('img.portfolio-image') as $e)
            $titlesanddates[] = $e->alt;
            
        foreach($titlesanddates as $title) {            
            $split_title = explode('<br/>', $title);
            $titles[] = $split_title[0];
            $event_dates[] = $split_title[1];
        }

        foreach($page->find('a.project-load') as $e)
            $links[] = $e->href;

        foreach($page->find('img.portfolio-image') as $e)
            $dirty_event_images[] = $e->getAttribute('data-mk-image-src-set');
        
        foreach($dirty_event_images as $dirty_event_image) {
            $arr1 = explode('{"default":"', $dirty_event_image);
            $arr2 = explode('","', $arr1[1]);
            $event_images[] = $arr2[0];
        }

        // Check to make sure the data aligns by comparing the lengths of each array
        $dataArr = array(
            sizeof($titles),
            sizeof($links),
            sizeof($event_dates),
            sizeof($event_images),
            );
        if(count(array_unique($dataArr)) === 1) {
            $objects = [];
            for($i=0;$i<sizeof($titles);$i++){
                $objects[] = (object) [
                    "title" => $titles[$i],
                    "link" => $links[$i],
                    "event_date" => $event_dates[$i],                    
                    "event_image" => $event_images[$i],                
                ];
            }
            print_r($objects);
            // echo json_encode($objects);
        } else {
                $contents = '<div class="alert alert-danger" role="alert">The data didn\'t align</div>';
        }
    }
?>