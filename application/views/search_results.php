<div id="content">
  <?php if (!isset($results) || empty($results)) {
    echo '<p>Your keyword <strong>"' . $_GET['keyword'] . '"</strong> did not yield results.</p>';
  } else {
    echo '<p>Your keyword <strong>"' . $_GET['keyword'] . '"</strong> yielded the following results:</p>';
    foreach ($results as $result) $this->view('result', array('result' => $result));
  } ?>
</div>