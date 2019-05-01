
# PhpStorm Test Environment Setup

- [X] Setting -> Search `Test Frameworks`
- [X] PHP -> CLI Interpreter, `Add New Using Plus +` with set php path `C:\xampp\php\php.exe` 
- [X] Test Frameworks ->
    
        - Use Composer autoloader:- absolute_path\laravel-advance\vendor\autoload.php
        - Default configuration file:- absolute_path/laravel-advance/phpunit.xml
- [X] Select `phpunit.xml` and `pop-up options menu` and `run phpunit.xml`



# Create Local Database and connect it to PhpStorm

- create a normal text file with extension `.sqlite` like `database.sqlite`
- then, connect it to select `Add New or Plus Sign` then choose `Data source from path` in PhpStorm Database Section through `database.sqlite` absolute path.
