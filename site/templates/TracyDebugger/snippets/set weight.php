$owners = $pages->find('template=person'); 
foreach($pages->find('template=cat|dog') as $p) {
    $person = $owners->getRandom();
    $p->of(false);
    $p->owner->removeAll();
    $p->owner->add($person);
    $p->save();
}