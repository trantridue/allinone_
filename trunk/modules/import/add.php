<form method="post" action="?module=import&submenu=addproduct" onsubmit="return validateImportForm();">
	<label>Facture Code : </label><input name="import_facture_code" id="import_facture_code" value="<?php echo $importService->getImportFactureCode();?>"/><?php echo tab4;?>
	<label>Provider : </label><input name="import_provider" id="import_provider" /><?php echo tab4;?>
	<label>Description : </label><input name="import_description" id="import_description" /><?php echo tab4;?>
	<label>Season : </label><input name="import_season" id="import_season" /><?php echo tab4;?>
	<?php $rowNum = $_SESSION ['import_number_row'];?>
	<input type="submit" value="IMPORT">
	<hr>
	<table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse;">
  <tbody>
     <tr style="text-align: center;font-weight:bold;">
      <td>Code</td>
      <td>Name</td>
      <td>Qty</td>
      <td>Post</td>
      <td>ImPr</td>
      <td>Sex</td>
      <td>Category</td>
      <td>Brand</td>
      <td>Description</td>
    </tr>       
    <?php for ($i=1;$i<=$rowNum;$i++) { ?>
    <tr>
    <td><input name="code_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="7" value="<?php echo $importService->currentMaxProductCode($i);?>"/></td>
    <td><input name="name_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="40"/></td>
    <td><input name="qty_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="7"/></td>
    <td><input name="post_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="7"/></td>
    <td><input name="impr_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="7"/></td>
    <td><input name="sex_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="7"/></td>
    <td><input name="category_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="20"/></td>
    <td><input name="brand_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="15"/></td>
    <td><input name="description_<?php echo $i;?>" id="code_<?php echo $i;?>" autocomplete="off" size="40"/></td>
    </tr>
    <?php 
    }?>
   
    </tbody>
  </table>
	
</form>