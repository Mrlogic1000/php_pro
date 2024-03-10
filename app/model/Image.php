<?php
namespace Model;

class Image{
    public function resize($filename, $max_size = 700){
        $type = mime_content_type($filename);
        if(file_exists($filename)){
            switch($type){
                case "image/png":
                    $image = imagecreatefrompng($filename);
                    break;
                case "image/gif":
                    $image = imagecreatefromgif($filename);
                    break;
                case "image/jpeg":
                    $image = imagecreatefromjpeg($filename);
                    break;
                case "image/wepb":
                    $image = imagecreatefrompng($filename);
                    break;
                default:
                return $filename;
                
            }
        
        // ---------------------------
        $src_w = imagesx($image);
        $src_h = imagesy($image);

            switch($type){
                case "image/png":
                    $image = imagecreatefrompng($filename);
                    break;
                case "image/gif":
                    $image = imagecreatefromgif($filename);
                    break;
                case "image/jpeg":
                    $image = imagecreatefromjpeg($filename);
                    break;
                case "image/wepb":
                    $image = imagecreatefrompng($filename);
                    break;
                default:
                return $filename;
                
            }
        
        // ---------------------------
        $src_w = imagesx($image);
        $src_h = imagesy($image);

        if($src_w > $src_h){

            if($src_w < $max_size){
                $max_size = $src_w;

            }
            $dst_w = $max_size;
            $dst_h = ($src_h / $src_w) * $max_size;
        }else{
            if( $src_h < $max_size){
                $max_size = $src_h;
            }
            $dst_w = ($src_w / $src_h) * $max_size;
            $dst_h =  $max_size;
        }
        // -------------------------

        $dst_w = round($dst_w);
        $dst_h = round($dst_h);
        $dst_image = imagecreatetruecolor($dst_w, $dst_h);

        if($type == 'image/png'){
            imagealphablending($dst_image, false);
            imagesavealpha($dst_image, true);

        }
        // --------------------------
        imagecopyresampled($dst_image, $image,0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
        imagedestroy($image);
        switch($type){
            case 'image/png':
                imagepng($dst_image, $filename,8);
                break;
            case 'image/gif':
                imagegif($dst_image, $filename);
                break;
            case 'image/jpeg':
                imagejpeg($dst_image, $filename,90);
                break;
            case 'image/webp':
                imagewebp($dst_image, $filename,90);
                break;
            default:
            imagejpeg($dst_image, $filename,90);
            break;

        }
        imagedestroy($dst_image);
    }
    return $filename;
}
    public function crop($filename, $max_width = 700,$max_highth = 700){
        $type = mime_content_type($filename);
        if(file_exists($filename)){
            switch($type){
                case "image/png":
                    $image = imagecreatefrompng($filename);
                    break;
                case "image/gif":
                    $image = imagecreatefromgif($filename);
                    break;
                case "image/jpeg":
                    $image = imagecreatefromjpeg($filename);
                    break;
                case "image/wepb":
                    $image = imagecreatefrompng($filename);
                    break;
                default:
                return $filename;
                
            }
        
        // ---------------------------
        $src_w = imagesx($image);
        $src_h = imagesy($image);

        if($src_w > $src_h){

            if($src_w < $max_size){
                $max_size = $src_w;

            }
            $dst_w = $max_size;
            $dst_h = ($src_h / $src_w) * $max_size;
        }else{
            if( $src_h < $max_size){
                $max_size = $src_h;
            }
            $dst_w = ($src_w / $src_h) * $max_size;
            $dst_h =  $max_size;
        }
        // -------------------------

        $dst_w = round($dst_w);
        $dst_h = round($dst_h);
        $dst_image = imagecreatetruecolor($dst_w, $dst_h);

        if($type == 'image/png'){
            imagealphablending($dst_image, false);
            imagesavealpha($dst_image, true);

        }
        // --------------------------
        imagecopyresampled($dst_image, $image,0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
        imagedestroy($image);
        switch($type){
            case 'image/png':
                imagepng($dst_image, $filename,8);
                break;
            case 'image/gif':
                imagegif($dst_image, $filename);
                break;
            case 'image/jpeg':
                imagejpeg($dst_image, $filename,90);
                break;
            case 'image/webp':
                imagewebp($dst_image, $filename,90);
                break;
            default:
            imagejpeg($dst_image, $filename,90);
            break;

        }
        imagedestroy($dst_image);
    }
    return $filename;
}
public function getThumbnail($filename, $max_width = 700,$max_highth = 700){
    if(file_exists($filename)){
        $ext = explode(".",$filename);
        $ext = end($ext);
        $dest = preg_replace("/\.{$ext}$/","_thumbnail.".$ext,$filename);
        copy($filename,$dest);
        // $this->crop($filename,400,400);
    }
    return $filename;

}
    }
    
