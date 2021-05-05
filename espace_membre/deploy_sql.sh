for procedure in ps*.sql
do
	sudo mysql -h 127.0.0.1 -u root < $procedure
done
