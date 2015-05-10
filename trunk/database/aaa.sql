SELECT t.*,
       Ifnull(tx.amount, 0) AS reserved
FROM   (SELECT t1.id,
               t1.NAME,
               t1.tel,
               Sum(( t3.quantity - t3.re_qty ) * t3.export_price) AS total,
               t4.amount                                          AS paid
        FROM   customer t1,
               export_facture t2,
               export_facture_product t3,
               customer_paid t4 
        WHERE  t1.id = t2.customer_id
               AND t2.code = t3.export_facture_code
               AND t4.customer_id = t1.id
        GROUP  BY t1.id
        ORDER  BY total DESC) t
       LEFT JOIN customer_reservation_histo tx
              ON ( t.id = tx.customer_id
                   AND tx.status = 'N' );