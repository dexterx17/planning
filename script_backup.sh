##
# Script para respaldar la bdd periodicamente
##
#!/bin/bash

## 15/oct/14 01:00:00
FechaActual=`date +"%d/%b/%g %r"`
## 151014010000
Fecha=`date +%d%m%y%H%M%S`
## 01:00:00
Hora=`date +%r`

MysqlBinPath="/usr/bin"
MysqlHost="192.168.1.8"
LocalBackupPath="/var/www/html/planning/backup"
LogFile="/var/log/mysql-backup.log"
MailNotification="jaimesantanal@hotmail.com"
DataBase="planificacion"
Password="0112358"
echo -e "Backup mysql $FechaActual. \n" >$LogFile

## Eliminar backup local
CmdStatus=$(rm -rf $LocalBackupPath/*) 
## Inciar backup 
echo "$FechaActual: Iniciando backup, ejecutando $MysqlBinPath/mysqldump  --host $MysqlHost -p$Password $DataBase > $LocalBackupPath" >> $LogFile   
CmdStatus=`$MysqlBinPath/mysqldump  --host $MysqlHost -p$Password $DataBase >  $LocalBackupPath/backup.sql` 


if [ $? -ne 0 ]; then 
	echo "$FechaActual: Hay un error en el backup en $MongoHost.Abortando backup, por favor revisar! " >> $LogFile 
	cat $CmdStatus >> $LogFile 
	mail -s "Error de backup en $MongoHost el $TodayDate" $MailNotification < $LogFile exit 
fi 
CurrentTime=`date +"%r"` 
BackupSize=$(du -sh $LocalBackupPath/. | awk '{ print $1 }') 
echo "$CurrentTime: Backup cimpletado. Tamaño: $BackupSize. " >> $LogFile

