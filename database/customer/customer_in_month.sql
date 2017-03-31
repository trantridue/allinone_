SELECT us.id,
       us.NAME, 
       us.tel                                   AS tel, 
       Sum(( efp.quantity ) * efp.export_price) AS total, 
       ef.code, 
       ef.date 
FROM   customer us, 
       export_facture_product efp, 
       export_facture ef 
WHERE  us.id = ef.customer_id 
       AND Date_format(ef.date, '%Y-%m') = Date_format(Now(), '%Y-%m') 
       AND efp.export_facture_code = ef.code 
       AND us.tel NOT LIKE '%aaa%' 
GROUP  BY ef.code 
ORDER  BY us.tel DESC; 