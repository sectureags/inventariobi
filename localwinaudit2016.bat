@ECHO OFF
CLS
SET FECHA=%date:~6,4%-%date:~3,2%-%date:~0,2%
ECHO ----------   Espere un momento por favor...
ECHO ----------   Se esta generando el Inventario del equipo...
ECHO ----------   ---------------------------------------------
ECHO ----------   ESTA VENTANA SE CIERRA EN AUTOMATICO, ESPERE...
ECHO ----------   ---------------------------------------------
WinAudit2.exe /r=goPtnpmidSr /f=%COMPUTERNAME%--%USERNAME%--%FECHA%.TXT
ECHO ----------   --------------------------------------------
