# Config to create the sqlite file
In the file ```.env```. We have to write the lines
```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database/database_name.sqlite
DB_USERNAME=homestead
DB_PASSWORD=secret
```


Crear Provider llamado SqliteServiceProvider y agregar en el metodo boot
Now, we have to create a proiver with name ```SqliteServiceProvider``` and add in the boot method of the file.

```$databaseFile = config('database.connections.sqlite.database');

if (!file_exists($databaseFile)) { 
    info('Make Sqlite File "' . $databaseFile . '"'); 
    file_put_contents($databaseFile, ''); 
}
```

After in the app.php, add ```App\Providers\SqliteServiceProvider::class``` below the
```App\Providers\RouteServiceProvider::class```.

# Config for docker
In the file ```.env```. We have to write the lines
```
DB_CONNECTION=pgsql
DB_HOST=database
DB_PORT=5432
DB_DATABASE=laravel_docker
DB_USERNAME=postgres
DB_PASSWORD=secret
```

uncomment the line 18 in docker-compose.yml and after RUN ```docker-compose up```