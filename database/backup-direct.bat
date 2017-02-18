cd C:\xampp\htdocs\allinone\database
git pull
plink -ssh -pw RAUE9465jkwh root@103.1.236.134 "sh /root/backup.sh"
pscp -pw RAUE9465jkwh root@103.1.236.134:/root/zkpmolfu_banhang.sql C:\xampp\htdocs\allinone\database\
cd C:\xampp\htdocs\allinone\database
git add C:\xampp\htdocs\allinone\database\zkpmolfu_banhang.sql
git commit -m "auto backup database"
git push