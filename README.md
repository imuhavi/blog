clone the project git clone https://github.com/imuhavi/blog.git .
cd blog.
copy the env.example by writing cp env.example .env.
create a database in mysql.
Match the env credentials to your created database in mysql.
Run php artisan migrate to run your migrations.
To seed run php artisan db:seed --class ContactTableSeeder.
Run php artisan serve to serve your application.
