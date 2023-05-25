<?php
function generateLoremIpsum($paragraphs = 5, $sentencesPerParagraph = 5, $wordsPerSentence = 10) {
  $loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend malesuada velit, eget viverra orci lobortis ut. Quisque facilisis felis non ullamcorper finibus. Proin nec dictum nisl, vel posuere tellus. Maecenas iaculis vestibulum dolor, at fermentum lorem molestie non. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer sit amet erat ac metus eleifend placerat. Aliquam efficitur lacinia tortor, in convallis lacus fringilla ut. Nulla facilisi. Morbi non lobortis lectus. Aenean auctor interdum ex, non sagittis arcu bibendum eu. Curabitur at lectus vestibulum, tristique risus id, pharetra nulla. In a ligula ligula. Nunc ultrices ultrices ligula vitae interdum. Aliquam sollicitudin purus vel libero luctus, nec eleifend turpis lobortis. Sed rutrum dolor eu vulputate congue. Cras eget libero vel dui aliquet feugiat vitae nec tortor.";
  
  $words = explode(' ', $loremIpsum);
  $numWords = count($words);
  $output = '';
  
  for ($i = 0; $i < $paragraphs; $i++) {
    $paragraph = '';
    
    for ($j = 0; $j < $sentencesPerParagraph; $j++) {
      $sentence = '';
      
      for ($k = 0; $k < $wordsPerSentence; $k++) {
        $randomIndex = mt_rand(0, $numWords - 1);
        $word = $words[$randomIndex];
        $sentence .= $word . ' ';
      }
      
      $paragraph .= rtrim($sentence) . '. ';
    }
    
    $output .= '<p>' . rtrim($paragraph) . '</p>';
  }
  
  return $output;
}

// Usage example
echo generateLoremIpsum(3, 5, 10);
?>
