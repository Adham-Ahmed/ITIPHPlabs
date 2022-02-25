<?php 

class Counter
{
    static function increment()
    {
        $lines=file("Counter.txt");
        $lines[0]++;
        $file_handle = fopen("Counter.txt", 'w'); 
        fwrite($file_handle,$lines[0]++ );
        fclose($file_handle);

    }
}

?>