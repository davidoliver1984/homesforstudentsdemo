# homesforstudents
cd into the folder where you have save the code
In the terminal run:

	- composer install
	- npm install
	- cp .env.example .env
	- php artisan key:generate
 	- php artisan storage:link
	- Create an empty mySql database and add the credentials to the .env file
	- In the terminal run php artisan migrate, then php artisan db:seed
 	- To manually send out the 'New blog posts' email use console command php artisan new-blog-posts
	- For the email to be sent at 6pm daily set up a cron job in terminal using crontab -e 
 	- then cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
    - For admin access username is admin@admin.com and password admin

 	


