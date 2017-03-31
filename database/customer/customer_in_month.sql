select us.id,us.name,us.tel as tel, sum((efp.quantity) * efp.export_price) as total, ef.date
from customer us,export_facture_product efp, export_facture ef
where us.id = ef.customer_id and DATE_FORMAT(ef.date, '%Y-%m') = DATE_FORMAT(now(), '%Y-%m') and
 efp.export_facture_code = ef.code group by us.tel order by total desc;