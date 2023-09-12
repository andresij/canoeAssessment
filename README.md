## Canoe Tech Assessment for Remotely


Repo URL :  https://github.com/andresij/canoeAssessment

For running the project you will need  MySql server and Php.
This Assessment was tested using PHP 7.4.16 and MySQL Server version: 8.0.27-0ubuntu0.21.04.1 with Ubuntu OS
Also composer (https://getcomposer.org/), Git client and Postman are required.

1 - Clone the project from github 

from a terminal window: 

- # git clone https://github.com/andresij/canoeAssessment.git
After pulling the repository, change directory to the project directory

- # cd canoeAssessment

2 - Add packages and dependencies
- # composer install 

3 - Configure DB connection - Create .env file
- # cp .env.example .env
Open .env file and modify lines 12, 13, 14, 15, 16 to mach your db connection. 
You will need to create the Database, User and Password in your running instance of MySQLServer

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=canoe
- DB_USERNAME=canoe
- DB_PASSWORD=canoe

4 - Run migration and seeds for creating tables and content
# php artisan migrate --seed

5- Generate Application key
# php artisan key:generate

6 - Run the backend application 
# php artisan serve
This will start the server on 127.0.0.1 (localhost) on port 8000.
If needed, port may be changed using --port XXXX

### Available End Points

GET http://127.0.0.1:8000/api/funds  : List existing Funds (may receive parameters: fundName, fundsManagerId and startYear for filtering)
GET http://127.0.0.1:8000/api/fundsmanagers : List existing Funds Managers (useful for filtering Funds by Manager id)
GET http://127.0.0.1:8000/api/companies : List existing Companies (useful for setting relations between Funds and Companies)
GET http://127.0.0.1:8000/api/funds/{fund_id} : Show a specific Fund information
POST http://127.0.0.1:8000/api/funds : Create a new Fund
PUT/PATCH http://127.0.0.1:8000/api/funds/{fund_id} : Update an existing Fund (only changes the submited fields - including Aliases and
 Companies) 

Bonus:
GET http://127.0.0.1:8000/api/duplicates : Dump the list of potentially duplicate funds 

### DOCS. 

Under the DOCS directory you will find:
 - A Postman collection for testing all the described End Points.
 - The first draft of the ER Diagram.
 - Canoe Tech Assessment for Remotely-June 12.pdf
