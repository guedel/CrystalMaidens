# CrystalMaidens

This is a helper application for the game Crystal Maidens.

## Installation
This is a Symfony version. 

After cloning you can run this programm locally with the Symfony local server. 

Before launch the server you must create the database.
```
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
```

And after load the datas:
```
symfony console doctrine:fixtures:load
```

For Windows users I've created a start script "serve.bat". You have just to launch it.

## Configuration

Override the .env file configuration by creating a .env.local file.

You can change the mailer dsn. By default it's setting for use of mailhog development mail server. 

## History
Before creating this project, I've done with a MS-Access database manager.

For me it was a good opportunity of training to create a similar with the Symfony framework.

## Sample as
- personnal load of datafixtures store in CSV files.
- export table content to CSV files.
- use of easyAdmin bundle with user forms.
- use of datatable.net front library
- use of Bootstrap 5 CSS framework
