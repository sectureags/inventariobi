@ECHO OFF
CLS
SET FECHA=%date:~6,4%-%date:~3,2%-%date:~0,2%
MKDIR "INVENTARIO-SOFTWARE"
CD "INVENTARIO-SOFTWARE"
ECHO Espere un momento por favor...
COPY "..\WinAudit2.exe" "."
ECHO Se esta generando el Inventario del equipo...
ECHO ---------------------------------------------
ECHO ESTA VENTANA SE CIERRA EN AUTOMATICO, ESPERE...
ECHO ---------------------------------------------
WinAudit2.exe /r=goPtnpmidSr /f=..\..\WINAUDIT\%COMPUTERNAME%--%USERNAME%--%FECHA%.TXT
DEL /Q *.*
CD..
RMDIR "INVENTARIO-SOFTWARE"
