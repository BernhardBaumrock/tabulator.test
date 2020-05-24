$cats = $pages->find('template=cat');
foreach($cats as $cat) {
    $cat->of(false);
    $cat->childcats->removeAll();
    
    $i = 0;
    while($i < rand(1,3)) {
        $cat->childcats->add($cats->getRandom());
        $i++;
    }
    
    $cat->save();
}