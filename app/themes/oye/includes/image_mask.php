<?php

$image = $_GET['path'];
$ext = pathinfo(basename($image), PATHINFO_EXTENSION);


if($ext=="png") {
  $image = imagecreatefrompng($image);
} else if($ext=="gif") {
  $image = imagecreatefromgif($image);
} else {
  $image = imagecreatefromjpeg($image);
}

// Polygonal masking using GD
// imagealphamask() Courtesy of author at http://www.php.net/manual/en/function.imagesavealpha.php#94986

// Load the image
// $image = imagecreatefromjpeg('aa.jpg');
$width = imagesx($image); // get dimensions
$height = imagesy($image);

 
// Create mask
$mask = imagecreatetruecolor($width, $height);
// "black" in a mask is transparent, while white is opaque
$opaque = imagecolorallocate($mask, 255, 255, 255);

imagefilledpolygon($mask, array(0,0,$width,0, $width,$height-60, $width-120,$height, 0, $height), 5, $opaque);

// Apply mask to source
imagealphamask( $image, $mask );

// Output image and free memory
header('Content-type: image/png');
imagepng($image);
// echo $image;
imagedestroy($image);
imagedestroy($mask);
exit;

function imagealphamask( &$picture, $mask ) {
  // Get sizes and set up new picture
  $xSize = imagesx( $picture );
  $ySize = imagesy( $picture );
  $newPicture = imagecreatetruecolor( $xSize, $ySize );
  imagesavealpha( $newPicture, true );
  imagefill( $newPicture, 0, 0, imagecolorallocatealpha( $newPicture, 0, 0, 0, 127 ) );
  
  // Resize mask if necessary
  if( $xSize != imagesx( $mask ) || $ySize != imagesy( $mask ) ) {
    $tempPic = imagecreatetruecolor( $xSize, $ySize );
    imagecopyresampled( $tempPic, $mask, 0, 0, 0, 0, $xSize, $ySize, imagesx( $mask ), imagesy( $mask ) );
    imagedestroy( $mask );
    $mask = $tempPic;
  }

  // Perform pixel-based alpha map application
  for( $x = 0; $x < $xSize; $x++ ) {
    for( $y = 0; $y < $ySize; $y++ ) {
      $alpha = imagecolorsforindex( $mask, imagecolorat( $mask, $x, $y ) );
      $alpha = 127 - floor( $alpha[ 'red' ] / 2 );
      $color = imagecolorsforindex( $picture, imagecolorat( $picture, $x, $y ) );
      imagesetpixel( $newPicture, $x, $y, imagecolorallocatealpha( $newPicture, $color[ 'red' ], $color[ 'green' ], $color[ 'blue' ], $alpha ) );
    }
  }
  
  // Copy back to original picture
  imagedestroy( $picture );
  $picture = $newPicture;
} // end imagealphamask()

?>



