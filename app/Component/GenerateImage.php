<?php 


	 function WriteOnImage($im,$item_text, $positionX, $positionY, $size, $angle, $fontfile ){
	//	$im = imagecreate(400, 200);
		$background_color = imagecolorallocate($im, 183, 183, 183);
		
		$color_text = imagecolorallocate($im, 255, 255, 255);
		$background_text = imagecolorallocate($im, 236, 135, 14);
		//$size = 12;
		//$angle = 0;
		//$fontfile = "fonts/arial.ttf";
		//draw background
		//imagefilledrectangle($im, 40, 45, 160, 70, $background_text);
		//draw text
		//$item_text = "Những thằng tên \n ".$data->name." thường rất ngu";
		
		# detect if the string was passed in as unicode
		//$item_text = mb_convert_encoding($item_text, "HTML-ENTITIES", "UTF-8");
		//  $item_text = preg_replace('~^(&([a-zA-Z0-9]);)~',htmlentities('${1}'),$item_text);
		
		//imagestring($im, 10, 50, 50, $item_text , $color_text);
		imagettftext ( $im, $size, $angle, $positionX, $positionY, $color_text, $fontfile, $item_text );
		return $im;
	}
	 function ImageOnImage($bgImage, $layerImage, $layerImageWidth, $layerImageHeight, $positionX, $positionY, $transparencyLayer ){
		
		/*	$WaterMark_Transparency = "100";
		//	$bgImageWidth, $bgImageHeight

			$Main_Image_width = imageSX($Main_Image);
			$Main_Image_height = imageSY($Main_Image);
			$WaterMark_width = imageSX($WaterMark);
			$WaterMark_height = imageSY($WaterMark);
			
			// calculate the position of the WaterMark
			$MaterMark_x = ($Main_Image_width - $WaterMark_width);
			$MaterMark_y = ($Main_Image_height - $WaterMark_height);
			*/
			//put the watermark on top of the background image.
			imageCopyMerge($bgImage, $layerImage, $positionX, $positionY, 0, 0, $layerImageWidth, $layerImageHeight, $transparencyLayer);
			return $bgImage;
	}

function LoadImage($filename) {
 		
      $image_info = getimagesize($filename);
      $image_type = $image_info[2];
      if( $image_type == IMAGETYPE_JPEG ) {
 			$image = imagecreatefromjpeg($filename);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         $image = imagecreatefromgif($filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         $image = imagecreatefrompng($filename);
      }
      return $image;
   }


   function SaveImage($image, $filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }

   /*
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }

   */
   function getWidth($image) {
 
      return imagesx($image);
   }
   function getHeight($image) {
 
      return imagesy($image);
   }
   function resizeToHeight($image,$height) {
 
      $ratio = $height / getHeight($image);
      $width = getWidth($image) * $ratio;
      $image = resize($image, $width,$height);
      return $image;
   }
 
   function resizeToWidth($image,$width) {
      $ratio = $width / getWidth($image);
      $height = getheight($image) * $ratio;
      $image = resize($image, $width,$height);
      return $image;
   }
 
 /*
   function scale($image,$scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
   */
 
   function resize($image,$width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $image, 0, 0, 0, 0, $width, $height, getWidth($image), getHeight($image));
      $image = $new_image;
      return $image;
   }      
 


   function CropCricleImage($img1){
   
    $x=imagesx($img1);
    $y=imagesy($img1);


    // Step 2 - Create a blank image.
    $img2 = imagecreatetruecolor($x, $y);

    $bg = imagecolorallocate($img2, 255,255, 127); // wierdo pink background
    // $bg = imagecolorallocate($img2, 0, 0, 0, 127 ); // white background

    imagefill($img2, 0, 0, $bg);
    imagecolortransparent($img2, $bg);

    // Step 3 - Create the ellipse OR circle mask.
    $e = imagecolorallocate($img2, 255, 255, 255); // black mask color

    // Draw a ellipse mask
    imagefilledellipse ($img2, ($x/2), ($y/2), $x, $y, $e);

    // OR
    // Draw a circle mask
    // $r = $x <= $y ? $x : $y; // use smallest side as radius & center shape
    // imagefilledellipse ($img2, ($x/2), ($y/2), $r, $r, $e);

    // Step 4 - Make shape color transparent
    imagecolortransparent($img2, $e);

    // Step 5 - Merge the mask into canvas with 100 percent opacity
    imagecopymerge($img1, $img2, 0, 0, 0, 0, $x, $y, 100);

    // Step 6 - Make outside border color around circle transparent
    imagecolortransparent($img1, $bg);

    /* Clean up memory */
    imagedestroy($img2);

    return $img1;
   }

    function CropSquareImage($thumb_img, $width = 60,$height = 60, $quality = 80)
            {
              //  $thumb_img  =   imagecreatefromjpeg($thumb_target);

                // size from
              //  list($w, $h) = getimagesize($thumb_target);
            	$w= imagesx($thumb_img);
            	$h = imageSY($thumb_img);
                if($w > $h) {
                        $new_height =   $height;
                        $new_width  =   floor($w * ($new_height / $h));
                        $crop_x     =   ceil(($w - $h) / 2);
                        $crop_y     =   0;
                }
                else {
                        $new_width  =   $width;
                        $new_height =   floor( $h * ( $new_width / $w ));
                        $crop_x     =   0;
                        $crop_y     =   ceil(($h - $w) / 2);
                }

                // I think this is where you are mainly going wrong
                $tmp_img = imagecreatetruecolor($width,$height);

                imagecopyresampled($tmp_img, $thumb_img, 0, 0, $crop_x, $crop_y, $new_width, $new_height, $w, $h);
/*
                if($SetFileName == false) {
                        header('Content-Type: image/jpeg');
                        imagejpeg($tmp_img);
                }
                else
                    imagejpeg($tmp_img,$SetFileName,$quality);
*/
                    return $tmp_img;
                //imagedestroy($tmp_img);
            
    }



?>