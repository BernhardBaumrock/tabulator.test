for($i=0; $i<100; $i++) {
    $p = new Page();
    $p->template = 'cat';
    $p->title = "Cat $i";
    $p->save();
}