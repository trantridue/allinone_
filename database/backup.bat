mysqldump --single-transaction -hlocalhost -utest -ptest zkpmolfu_banhang > zkpmolfu_banhang.sql
cd C:\xampp\htdocs\allinone\database
git add --all
git commit -m "auto backup"
git push