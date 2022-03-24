FROM mariadb:10.4.17

RUN apt-get update && apt-get install pv

COPY config/mysql/mysqld.cnf /etc/mysql/conf.d/mysqld.cnf
RUN chmod 644 /etc/mysql/conf.d/mysqld.cnf