
# ChambiSlimTable

Simple and slim php framework for creating html tables


## Usage

```bash
<?php

use Chambi_Slim_Table\TableFactory;

//Initialize table
$tableFactory = new TableFactory();

//Build your table
$table = $tableFactory->createTable(
    $tableFactory->createHead(
        $tableFactory->createRow(
            $tableFactory->createCell('Firstname', true),
            $tableFactory->createCell('Lastname', true)
        )
    ),
    $tableFactory->createBody(
        $tableFactory->createRow(
            $tableFactory->createCell('Jonathan Josué'),
            $tableFactory->createCell('Correa Chambi')
        )
    )
);

//Display table
echo $table->display();
```

## Usage with Proxy

```bash
<?php

use Chambi_Slim_Table\TableFactory;
use Chambi_Slim_Table\TableProxyFactory;

$footballers = [
  [ 'name' => 'Lionel Messi', 'nationality' => 'Argentina'],
  [ 'name' => 'Oliver Kahn', 'nationality' => 'Germany'],
  [ 'name' => 'Andres Iniesta', 'nationality' => 'Spain'],
  [ 'name' => 'Xavi Hernandez', 'nationality' => 'Spain'],
  [ 'name' => 'Claudio Pizarro', 'nationality' => 'Peru'],
  [ 'name' => 'Roberto Baggio', 'nationality' => 'Italy'],
  [ 'name' => 'Ronaldinho Gaucho','nationality' => 'Brazil']
];

//Initialize table
$tableFactory = new TableFactory();

//Initialize proxy
$tableProxyFactory = new TableProxyFactory($tableFactory);

//Create rows with $tableFactory and storage in array
$storageRows = [];
foreach ($footballers as $footballer) {
    $storageRows[] = $tableFactory->createRow(
          $tableFactory->createCell($footballer['name']),
          $tableFactory->createCell($footballer['nationality'])
    );
}

//Create a body with $tableProxyFactory
$createBody = $tableProxyFactory->createBody($storageRows);

//Build your table
$table = $tableFactory->createTable(
    $tableFactory->createHead(
        $tableFactory->createRow(
            $tableFactory->createCell('Name', true),
            $tableFactory->createCell('Nationality', true)
        )
    ),
    $createBody
);

//Display table
echo $table->display();
```


## Add attributes

```bash
  $tableFactory->createRow(
      $tableFactory->createCell('Add attributes example')->addAttributes(['class' => 'col-12'])
  )->addAttributes(['class' => 'col-12 clearfix', 'id' => 'header-row-1'])
```


## Collections

A list of all collection methods that you can create using the TableFactory or TableProxyFactor can be found <a href="src/TableFactoryInterface.php" alt="Slim_Table" title="Slim_Table">here</a>


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
