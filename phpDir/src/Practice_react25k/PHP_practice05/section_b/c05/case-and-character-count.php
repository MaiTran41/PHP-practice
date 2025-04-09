<?php
$text = 'Home sweet home';
$lowercase_text = strtolower($text);
$uppercase_text = strtoupper($text);
$characters = strlen(str_replace(" ",  "", $text));
$word_count = str_word_count($text);
?>
<?php include 'includes/header.php'; ?>

<p>
  <?= $lowercase_text ?> : <?= $characters ?> letters : <?= $word_count ?> words.
  <br>
  <?= $uppercase_text ?> : <?= $characters ?> letters : <?= $word_count ?> words.
  <br>

</p>

<?php include 'includes/footer.php'; ?>