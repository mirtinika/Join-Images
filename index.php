
<?php 

fusePNG();

function fusePNG(){
    $file_img="img/result.png";


        header('Content-Type: image/png');
        $canvas = imagecreatetruecolor(333, 333);
        // set background to white
        $white = imagecolorallocate($canvas, 255, 255, 255);
        imagefill($canvas, 0, 0, $white);

        for ($i = 1; $i <= 3; $i++) {

                $img = imagecreatefrompng("img/P".$i.".png");
                $info=array();
                $info=getimagesize("img/P".$i.".png");
                $dist_x=(333-$info[0])/2;
                $dist_y=(333-$info[1])/2;
                imageAlphaBlending($img, true);
                imageSaveAlpha($img, true);
                imagecopy($canvas, $img, $dist_x, $dist_y, 0, 0, $info[0], $info[1]);
        }

        $create=imagepng($canvas, $file_img);
        imagedestroy($canvas);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Fuse PNG</title>
</head>
<body>
    <img src="img/P1.png" alt="Pice 1">
    <img src="img/P2.png" alt="Pice 2">
    <img src="img/P3.png" alt="Pice 3">
    <img src="img/result.png" alt="Result">
</body>

</html>