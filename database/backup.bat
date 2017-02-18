cd C:\AppServ\www\allinone\database
plink -ssh -pw RAUE9465jkwh root@103.1.236.134 "sh /root/backup.sh"
pscp -pw RAUE9465jkwh root@103.1.236.134:/root/zkpmolfu_banhang.sql C:\AppServ\www\allinone\database\
cd C:\AppServ\www\allinone\database
"C:\Program Files\Git\bin\git.exe" pull
"C:\Program Files\Git\bin\git.exe" add C:\AppServ\www\allinone\database\zkpmolfu_banhang.sql
"C:\Program Files\Git\bin\git.exe" commit -m "auto backup database from shop 1"
"C:\Program Files\Git\bin\git.exe" push