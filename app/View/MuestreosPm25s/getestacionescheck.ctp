<?php foreach ($estaciones as $key => $value): ?>
<div class ="checkbox" >
<input name="data[estaciones][]" value="<?php echo $key; ?>" id="ModelField1" type="checkbox" checked="checked">
      <label for="ModelField1"><?php echo $value; ?></label>
</div>
<?php  

endforeach; ?>