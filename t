[1mdiff --git a/modules/import/editproductimport.php b/modules/import/editproductimport.php[m
[1mindex 301799f..f89aacf 100644[m
[1m--- a/modules/import/editproductimport.php[m
[1m+++ b/modules/import/editproductimport.php[m
[36m@@ -71,7 +71,7 @@[m
 <td align="right">Sex : </td>[m
 <td><?php $commonService->printDropDownListFromTableSelected('sex','edit_sex',$sex_id);?></td>[m
 <td align="right">Brand : </td>[m
[31m-<td><?php $commonService->printDropDownListFromTableSelected('brand','edit_brand',$brand_id);?></td>[m
[32m+[m[32m<td><input id="id_edit_brand_name" type="text" size="10"/><input id="id_edit_brand" type="hidden" value="<?php echo $brand_name?>"/> </td>[m[41m[m
 <td align="right">Product Desc : </td>[m
 <td><input value="<?php echo $description;?>" name="edit_product_description" id="edit_product_description" title="<?php echo $description;?>"/></td>[m
 </tr>[m
[1mdiff --git a/scripts/ajax.js b/scripts/ajax.js[m
[1mindex 0c26b4b..db6f001 100644[m
[1m--- a/scripts/ajax.js[m
[1m+++ b/scripts/ajax.js[m
[36m@@ -2019,4 +2019,16 @@[m [mfunction updateUser(){[m
 			}[m
 		}[m
 	});[m
[31m-}[m
\ No newline at end of file[m
[32m+[m[32m}[m[41m[m
[32m+[m[32m$(document).ready(function(){[m[41m[m
[32m+[m	[32mvar ac_config_brand_edit = {[m[41m[m
[32m+[m		[32msource: "autocomplete/completed_import_brand.php",[m[41m[m
[32m+[m		[32mdestroy: true,[m[41m[m
[32m+[m		[32mselect: function(event, ui){[m[41m[m
[32m+[m			[32m$("#id_edit_brand_name").val(ui.item.code);[m[41m[m
[32m+[m			[32m$("#id_edit_brand").val(ui.item.brand_id);[m[41m[m
[32m+[m		[32m},[m[41m[m
[32m+[m		[32mminLength:1[m[41m[m
[32m+[m	[32m};[m[41m[m
[32m+[m	[32m$("#id_edit_brand_name").autocomplete(ac_config_brand_edit);[m[41m[m
[32m+[m[32m});[m
\ No newline at end of file[m
