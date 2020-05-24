$rf = new RockFinder2;
$rf->find('template=cat, limit=10', ['nosort'=>true]);
$rf->addColumns(['title', 'owner', 'created']);
$rf->addOptions('tags');
d($rf->getData());