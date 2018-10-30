<?php
foreach(glob('*.check') as $filename)
{
  if(time()-filemtime($filename)>120){
  		unlink($filename);
    	echo "删除 $filename\n";
  }
}
echo 'suc';
exit();
?>
