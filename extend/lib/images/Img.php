<?php 
  namespace lib\images;      class Img {      private $img;     private $newImg;     public function __construct($img) {          switch (strtolower(pathinfo($img)['extension'])) {              case 'jpg':                  $this->img=imagecreatefromjpeg($img);                  break;              case 'jpeg':                  $this->img=imagecreatefromjpeg($img);                  break;              case 'png':                  $this->img=  imagecreatefrompng($img);                  break;              case 'gif':                  $this->img= imagecreatefromgif($img);                  imagealphablending($this->img, true);                  break;              case 'wbmp':                  $this->img= imagecreatefromwbmp($img);                  break;              case 'webp':                  $this->img= imagecreatefromwebp($img);                  break;          }      }            public function __destruct() {           if(is_resource($this->img)) {             imagedestroy($this->img);           }           if(is_resource($this->newImg)){            imagedestroy($this->newImg);           }     }     public function initial(){         $this->newImg=$this->img;     }            public function zoom($width,$height){          $imgw=imagesx($this->img);          $imgh=imagesy($this->img);          $this->newImg=imagecreatetruecolor($width,$height);          imagecopyresampled($this->newImg, $this->img, 0, 0, 0, 0, $width,$height,   $imgw, $imgh);     }            public function scale($width,$height){          $imgw=imagesx($this->img);          $imgh=imagesy($this->img);          if($imgw>$imgh){              $imagew=$width;             $imageh=ceil(($imagew/$imgw)*$imgh);         }elseif($imgw<$imgh){              $imageh=$height;             $imagew=ceil(($imageh/$imgh)*$imgw);         }else{              $imagew=$width;              $imageh=$height;          }          $this->newImg=imagecreatetruecolor($imagew,$imageh);          imagecopyresampled($this->newImg, $this->img, 0, 0, 0, 0, $imagew,$imageh,   $imgw, $imgh);     }            public function water($file,$place=9){          if(strtolower(pathinfo($file)['extension'])!='png') die ("请指定水印图片为png  格式");          $size=getimagesize($file);          $water_w=$size[0];         $water_h=$size[1];         $imgw=imagesx($this->img);         $imgh=imagesy($this->img);         $water_img=imagecreatefrompng($file);          $this->newImg=  $this->img;          switch ($place) {              case 1:                  imagecopy($this->newImg, $water_img, 0, 0, 0, 0, $water_w,   $water_h);                 break;              case 2:                  imagecopy($this->newImg, $water_img, (imagesx($this->newImg)-   $water_w)/2, 0, 0, 0, $water_w, $water_h);                 break;              case 3:                  imagecopy($this->newImg, $water_img, imagesx($this->newImg)- $water_w,   0, 0, 0, $water_w, $water_h);                 break;              case 4:                  imagecopy($this->newImg, $water_img, 0, (imagesy($this->newImg)-   $water_h)/2, 0, 0, $water_w, $water_h);                 break;              case 5:                  imagecopy($this->newImg, $water_img, (imagesx($this->newImg)-   $water_w)/2, (imagesy($this->newImg)- $water_h)/2, 0, 0, $water_w, $water_h);                 break;              case 6:                  imagecopy($this->newImg, $water_img, imagesx($this->newImg)- $water_w,   (imagesy($this->newImg)- $water_h)/2, 0, 0, $water_w, $water_h);                  break;              case 7:                  imagecopy($this->newImg, $water_img, 0, imagesy($this->newImg)-   $water_h, 0, 0, $water_w, $water_h);                 break;              case 8:                  imagecopy($this->newImg, $water_img, (imagesx($this->newImg)-   $water_w)/2, imagesy($this->newImg)- $water_h, 0, 0, $water_w, $water_h);                 break;              case 9:                  imagecopy($this->newImg, $water_img, imagesx($this->newImg)- $water_w,   imagesy($this->newImg)- $water_h, 0, 0, $water_w, $water_h);                 break;              case 10:                  $i=ceil($imgw/$water_w);                  for($a=0;$a<$i;$a++){                      imagecopy($this->newImg, $water_img, $water_w*$a, ($water_h*(($imgh/$imgw)/($water_h/$water_w))*$a), 0,   0, $water_w, $water_h);                 }                  break;              case 11:                  $i=ceil($imgw/$water_w);                  for($a=0;$a<$i;$a++){                      imagecopy($this->newImg, $water_img, (imagesx($this->newImg)-$water_w*$a)-$water_w, $water_h*$a*(($imgh/$imgw)/($water_h/$water_w)), 0, 0, $water_w, $water_h);                 }                  break;              case 12:                  $i=ceil($imgh/$water_h);                  for($a=0;$a<$i;$a++){                      imagecopy($this->newImg, $water_img, (imagesx($this->newImg)-$water_w)/2, $water_h*$a, 0, 0, $water_w, $water_h);                 }                  break;              case 13:                  $i=ceil($imgw/$water_w);                  for($a=0;$a<$i;$a++){                      imagecopy($this->newImg, $water_img, $water_w*$a, (imagesy($this->newImg)-$water_h)/2, 0, 0, $water_w, $water_h);                 }                  break;              case 14:                  imagecopy($this->newImg, $water_img, rand(0,imagesx($this->newImg)-   $water_w), rand(0,imagesy($this->newImg)- $water_h), 0, 0, $water_w, $water_h);                 break;              default:                  imagecopy($this->newImg, $water_img, imagesx($this->newImg)- $water_w,   imagesy($this->newImg)- $water_h, 0, 0, $water_w, $water_h);             break;          }          header('Content-Type: image/png');          imagepng($this->newImg);      }            public function water_str($str,$place){          $this->newImg=  $this->img;           header('Content-Type: image/png');          imagepng($this->newImg);      }                  public function saveJpeg($path,$ratio=100){          imagejpeg($this->newImg, $path, $ratio);      }            public function savePng($path){          imagesavealpha($this->newImg ,true);          imagepng($this->newImg, $path);      }            public function saveGif($path,$ratio=100){          imagegif($this->newImg, $path, $ratio);      }  }          