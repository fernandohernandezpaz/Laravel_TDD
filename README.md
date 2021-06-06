<h3>Config to create the sqlite file.</h3>
<p>In the file <code>.env</code>. We have to write the lines.</p>
<ul>
    <li><code>DB_CONNECTION=sqlite</code></li>
    <li><code>DB_HOST=127.0.0.1</code></li>
    <li><code>DB_PORT=3306</code></li>
    <li><code>DB_DATABASE=database/database_name.sqlite</code></li>
    <li><code>DB_USERNAME=homestead</code></li>
    <li><code>DB_PASSWORD=secret</code></li>
</ul>

<p>Crear Provider llamado SqliteServiceProvider y agregar en el metodo boot</p>
<p>Now, we have to create a proiver with name <code>SqliteServiceProvider</code> and add in the boot method of the file.</p>
<pre>
$databaseFile = config('database.connections.sqlite.database');

if (!file_exists($databaseFile)) { 
    info('Make Sqlite File "' . $databaseFile . '"'); 
    file_put_contents($databaseFile, ''); 
}
</pre>

<p>After in the app.php, add <code> App\Providers\SqliteServiceProvider::class</code> below the
<code>App\Providers\RouteServiceProvider::class,</code></p>
<hr>