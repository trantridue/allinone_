2015-07-22:
SELECT round(( t.total / ( t.total + t.return_amount ) ) * 10, 0)*10 as percent,
round(count(*)/(select count(*) from customer where tel NOT LIKE '%aaaaaaa%')*100,2)
FROM   (SELECT t1.id,
               t1.tel,
               t1.NAME,
               t1.description, 
               t1.created_date,
               t1.isboss, 
               (SELECT Max(t4.date)
                FROM   export_facture t4 
                WHERE  t4.customer_id = t1.id)                    AS date,
               Sum(( t3.quantity - t3.re_qty ) * t3.export_price) AS total, 
               Sum(t3.export_price * t3.re_qty)                   AS
               return_amount, 
               (SELECT Sum(amount) 
                FROM   export_facture_trace t4
                WHERE  t4.customer_id = t1.id)                    AS paid, 
               (SELECT Sum(bonus_used * bonus_ratio) 
                FROM   export_facture_trace t4
                WHERE  t4.customer_id = t1.id)                    AS bonus_used
        FROM   customer t1, 
               export_facture t2, 
               export_facture_product t3
        WHERE  t1.id = t2.customer_id 
               AND t2.code = t3.export_facture_code 
               AND t1.tel NOT LIKE '%aaaaaaa%'
        GROUP  BY t1.id) t group by round(( t.total / ( t.total + t.return_amount ) ) * 10, 0);