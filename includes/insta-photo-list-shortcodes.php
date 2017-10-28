<?php
// List photos
function ipl_list_photos($atts, $content = null)
{
  global $ipl_options;
  $atts = shortcode_atts([
    'title' => 'Instagram Photo List',
    'count' => 20
  ], $atts);

  $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.$ipl_options['access_token'].'&count='.$atts['count'];
  $options = [
    'http' => ['user_agent' => $_SERVER['http_user_agent']]
  ];
  $context = stream_context_create($options);
  $response = file_get_contents($url, false, $context);

  $data = json_decode($response)->data;

  $output = '<div class="ipl-photos">';
  $output .= '<p>'. $ipl_options['page_caption'] .'</p>';

  foreach ($data as $photo) {
    $output .= '<div class="photo-col">';
    if ($ipl_options['linked']) {
      $output .= '<a title="'.$photo->caption->text.'" href="'.$photo->link.'" target="_blank"><img src="'.$photo->images->standard_resolution->url.'"></a>';
    }else{
      $output .= '<img src="'.$photo->images->standard_resolution->url.'">';
    }
    $output .= '</div>';
  }

  $output .= '</div>';

  echo $output;
}

// Register shortcode
add_shortcode('photos', 'ipl_list_photos');
