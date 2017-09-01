<h3>Your file(s) was successfully uploaded!</h3>

<?php foreach($success[0] as $key => $upload_data):?>
  <h3>File ke -<?php echo ($key+1);?></h3>
  <ul>
     <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
     <?php endforeach; ?>
  </ul>
<?php endforeach;?>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>