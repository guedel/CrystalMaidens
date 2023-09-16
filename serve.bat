call app-env.bat
:: symfony run docker compose up -d
start %APPS_HOME%\mailhog\MailHog_windows_amd64.exe
symfony local:server:start -d --port=8001
symfony run -d yarn run watch
symfony console server:dump

