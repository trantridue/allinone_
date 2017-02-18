mysqldump --single-transaction -hlocalhost -utest -ptest zkpmolfu_banhang > zkpmolfu_banhang.sql
git add --all
git commit -m "auto backup"
git push