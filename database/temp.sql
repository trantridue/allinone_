-- interet
SELECT Sum(( t1.quantity - t1.re_qty ) * (
           t1.export_price - (SELECT Max(import_price)
                              FROM   product_import 
                              WHERE  product_code = 
       t1.product_code) )) AS interet,
       Date_format(t2.date, '%Y-%m-%d') as date
FROM   export_facture_product t1,
       export_facture t2 
WHERE  t1.export_facture_code = t2.code
       AND t2.shop_id = 1
       AND t2.date BETWEEN '2015-05-01' AND '2015-05-31'
GROUP  BY Date_format(t2.date, '%Y-%m-%d');

-- export
SELECT Sum(( t1.quantity - t1.re_qty ) *
           t1.export_price ) AS interet,
       Date_format(t2.date, '%Y-%m-%d') as date
FROM   export_facture_product t1,
       export_facture t2
WHERE  t1.export_facture_code = t2.code
       AND t2.shop_id = 1
       AND t2.date BETWEEN '2015-05-01' AND '2015-05-31'
GROUP  BY Date_format(t2.date, '%Y-%m-%d');