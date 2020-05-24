$last = $pages->findOne("parent=/data,sort=-id");
d($last->title);return;
$last = $last->title ?: 0;
for($i=$last+1;$i<$last+10;$i++) {
    // create page
    $p = new Page();
    $p->template = 'basic-page';
    $p->parent = '/data';
    $p->title = $i;
    $p->save();
    l("saved page $i");
}
d('done');