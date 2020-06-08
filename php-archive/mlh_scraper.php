<?php
    include('simple_html_dom.php');

    $html = "https://mlh.io/seasons/na-2020/events";
    $fileHeaders = get_headers($html);

    // Check to see if webpage is loading
    if($fileHeaders[0]!="HTTP/1.1 200 OK") {
        printf('There was an error retrieving data');
        // $contents = '<div class="alert alert-danger" role="alert">There was an error</div>';
    } else {
        
        $page = file_get_html($html);

        foreach($page->find('a.event-link') as $e)
            $titles[] = $e->title;

        foreach($page->find('a.event-link') as $e)
            $links[] = $e->href;

        foreach($page->find('p.event-date') as $e)
            $event_dates[] = $e->innertext;

        foreach($page->find('meta[itemprop=startDate]') as $e)            
            $start_dates[] = $e->content;

        foreach($page->find('meta[itemprop=endDate]') as $e)
            $end_dates[] = $e->content;

        foreach($page->find('span[itemprop=city]') as $e)
            $cities[] = $e->innertext;

        foreach($page->find('span[itemprop=state]') as $e)
            $states[] = $e->innertext;

        foreach($page->find('div.image-wrap') as $e)
            $event_images[] = $e->first_child()->src;

        foreach($page->find('div.event-logo') as $e)
            $event_logos[] = $e->first_child()->src;

        // Check to make sure the data aligns by comparing the lengths of each array
        $dataArr = array(
            sizeof($titles),
            sizeof($links),
            sizeof($event_dates),
            sizeof($start_dates),
            sizeof($end_dates),
            sizeof($cities),
            sizeof($states),
            sizeof($event_images),
            sizeof($event_logos)
            );
        if(count(array_unique($dataArr)) === 1) {
            $hackathons = [];
            for($i=0;$i<sizeof($titles);$i++){
                $hackathons[] = (object) [
                    "title" => $titles[$i],
                    "link" => $links[$i],
                    "event_date" => $event_dates[$i],
                    "start_date" => $start_dates[$i],
                    "end_date" => $end_dates[$i],
                    "city" => $cities[$i],
                    "state" => $states[$i],
                    "event_image" => $event_images[$i],
                    "event_logo" => $event_logos[$i]
                ];
            }
            // print_r($hackathons[0]);
        } else {
            printf('There was an error retrieving data');
            // $contents = '<div class="alert alert-danger" role="alert">The data didn\'t align</div>';
        }
    }
?>