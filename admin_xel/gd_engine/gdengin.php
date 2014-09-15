<?php
/**
 * Kashif Ahmed
 * copyright 2008
 * NextTech Soft
 * Alied Power Services
 * Class for creating thumbs, Applying protection
 */
class GD_Engin
{
    var $Image_Dir;         //upload file path
	var $Thumb_Dir;         //thumbs directory

	var $WaterMarkImage;    //path to watermark image


    // function for creating thumbs
    // parama size = size of thumb
    // parama img = orginal image to create thumb from
    function create_Thumb($width,$height,$img)
    {

        //check that the file exists in upload dir
        if (!file_exists($this->Image_Dir . "/" . $img))
        {
            die("$img does not exits in " . $this->Image_Dir);
        }

        // create image resouce form given image
        $mainImage = imagecreatefromjpeg($this->Image_Dir . "/" . $img);
		
       // $width = intval($size);
        //$height = intval($size);
			//$width=150;
			//$height=150;
        //oraginal image's width and height
        $mainWidth = imagesx($mainImage);
        $mainHeight = imagesy($mainImage);

        $ratio_orig = $mainWidth / $mainHeight;

        //size propotionaly
        //($width / $height > $ratio_orig) ? $width = $height * $ratio_orig:$height = $width /$ratio_orig;

        //create image box for thumbnail
        $Thumb = imagecreatetruecolor($width, $height);
        //copy origanal image to box
        imagecopyresampled($Thumb, $mainImage, 0, 0, 0, 0, $width, $height, $mainWidth,
            $mainHeight);

        //save thumb image in thumbs dir
        if(imagejpeg($Thumb, $this->Thumb_Dir . "/$img", 70)){
        return 1;
        }
        //free memory
        imagedestroy($Thumb);
        imagedestroy($mainImage);
    }


    /**
     * GD_Engin::apply_Watermark()
     *
     * @param mixed $imgName
     * @return void
     */

    function apply_Watermark($imgName)
    {

        $imgPath = $this->Thumb_Dir."/".$imgName;

        if (!file_exists($imgPath))
        {
            die("File does not exits or the uploaded File is currupt or not supported");
        }

        //creating two image resources from oraginal image and watermark image
        $srcImage = imagecreatefromjpeg($imgPath);
        $waterMark = imagecreatefrompng($this->WaterMarkImage);

        //getting width height of orignal image
        $desWidth = imagesx($srcImage);
        $desHeight = imagesy($srcImage);

        //getting width height of watermark image
        $srcWidth = imagesx($waterMark);
        $srcHeight = imagesy($waterMark);

        //getting cernter point of orignal image
        $desX = ($desWidth - $srcWidth) / 2;
        $desY = ($desHeight - $srcHeight) / 2;

        //color for text
        $white = imagecolorallocate($srcImage, 255, 255, 255);

        //text to write
        //$text = 'Associated Press of Pakistan (Photo Service)';

        //font to use
       // $font = '../lib/ariblk.ttf';

        // copy watermark image to orignal image and set opacity of watermark image
        imagecopymerge($srcImage, $waterMark, $desX, $desY, 0, 0, $srcWidth, $srcHeight,50);

        //draw given text to image
      //  imagettftext($srcImage, 10, 0, 11, $desHeight - 10, $white, $font, $text);

        //save final image
		if(imagejpeg($srcImage, $imgPath,70)){
        return 1;
        }

        //free memory
        imagedestroy($srcImage);
        imagedestroy($waterMark);

    }
}
?>