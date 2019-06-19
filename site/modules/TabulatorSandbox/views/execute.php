<p>Available examples:</p>

<ul>
  <?php
  foreach($this->files->find($path, [
    'extensions' => ['php'],
  ]) as $file) {
    $info = (object)pathinfo($file);
    $name = $info->filename;
    echo "<li><a href='./?name=$name'>$name</a></li>";
  }
  ?>
</ul>
