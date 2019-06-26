<?php namespace ProcessWire;
$time_pre = microtime(true);
include("../../../index.php"); // bootstrap ProcessWire
$last = $pages->findOne("parent=/data,sort=-id");
$i = (int)(string)$last->title ?: 0; // multilang quickfix convert to string

// foreach($pages->find('parent=/data') as $p) {
//     $p->delete();
//     echo "deleted $p\n";
// }
// return;

$i++;
$num = 0;
while($i <= 200000) {
    // create page
    $p = new Page();
    $p->template = 'basic-page';
    $p->parent = '/data';
    $p->title = $i;
    $p->save();
    $num++;
    echo "done: $num ($i)\n";
    $i++;
    gc_collect_cycles();
}

function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

$time_post = microtime(true);
$t = $time_post - $time_pre;
$m = memory_get_usage();
echo "created $num pages in " . round($t, 3) . "s, " . round($t/$num, 3) . "s per page, used " . convert($m) . " memory\n";
