call app-env.bat
:: symfony run docker compose up -d
start %APPS_HOME%\mailpit\mailpit.exe
symfony local:server:start -d --port=8001
symfony run -d yarn run watch
symfony console server:dump
