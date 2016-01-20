@ECHO OFF
CLS
NET USE \\GEADCO06\secture lgvA6773 /USER:GOBAGS\luis.villasenor /P:NO
SET FECHA=%date:~6,4%-%date:~3,2%-%date:~0,2%
MKDIR "INVENTARIO-SOFTWARE"
CD "INVENTARIO-SOFTWARE"
ECHO Espere un momento por favor...
COPY "\\GEADCO06\secture\Carpeta compartida\txt\WinAudit2.exe" "."
ECHO Se esta generando el Inventario...
ECHO ---------------------------------------------
ECHO NO CIERRE ESTA VENTANA
ECHO ---------------------------------------------
WinAudit2.exe /r=goPtnpmidSr /f=\\GEADCO06\secture\Carpeta compartida\txt\%COMPUTERNAME%--%USERNAME%--%FECHA%.TXT
DEL /Q *.*
CD..
RMDIR "INVENTARIO-SOFTWARE"
DEL autowinaudit2015.bat
NET USE \\GEADCO06\secture /DELETE