<?php

require __DIR__ . '/vendor/autoload.php';

use Chambi_Slim_Table\TableFactory;
use Chambi_Slim_Table\TableProxyFactory;

//Create a table
echo '<h2>Create a table</h2>';

//Initialize table
$table = new TableFactory();

//Build your table
$table = $table->createTable(
    $table->createHead(
        $table->createRow(
            $table->createCell('Firstname', true)
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
            $table->createCell('Lastname', true)
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;'])
        )
    ),
    $table->createBody(
        $table->createRow(
            $table->createCell('Jonathan')
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
            $table->createCell('Correa Chambi')
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;'])
        ),
        $table->createRow(
            $table->createCell('Marlene')
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
            $table->createCell('Chambi Villanueva')
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;'])
        )
    )
)->addAttributes(
  [
    'style' => 'border-collapse: collapse; width: 100%;text-align: left;',
    'class' => 'table bottom-default'
  ]
);

//Display table
echo $table->display();

echo '<br><br><br><br>';

//Create a table with proxy
echo '<h2>Create a table with proxy</h2>';

//Users
$users = [
  [
      'id' => 2342,
      'lastname' => 'Messi',
      'firstname' => 'Lionel',
  ],
  [
      'id' => 16,
      'firstname' => 'Oliver ',
      'lastname' => 'Kahn'
  ],
  [
      'id' => 984,
      'firstname' => 'Andres',
      'lastname' => 'Iniesta'
  ],
  [
      'id' => 555,
      'firstname' => 'Xavi',
      'lastname' => 'Hernandez'
  ],
  [
      'id' => 334,
      'firstname' => 'Claudio',
      'lastname' => 'Pizarro'
  ],
  [
      'id' => 60,
      'firstname' => 'Roberto',
      'lastname' => 'Baggio'
  ],
  [
      'id' => 4911,
      'firstname' => 'Ronaldinho',
      'lastname' => 'Gaucho'
  ]
];

//Initialize table
$table = new TableFactory();

//Iterate users
$rowUsers = [];
foreach ($users as $key => $value) {
    //Create Rows and storage in array
    $rowUsers[] = $table->createRow(
      $table->createCell($value['id'])
            ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
        $table->createCell($value['firstname'])
              ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
        $table->createCell($value['lastname'])
              ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;'])
    );
}

//Initialize proxy factory
$proxy = new TableProxyFactory($table);

//Create a body with proxy factory
$proxyBody = $proxy->createBody($rowUsers);

//Build your table
$table = $table->createTable(
    $table->createHead(
        $table->createRow(
          $table->createCell('Id', true)
                ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
            $table->createCell('Firstname', true)
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
            $table->createCell('Lastname', true)
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;'])
        )
    ),
    $proxyBody,
    $table->createFoot(
        $table->createRow(
          $table->createCell('', true)
                ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
            $table->createCell('total', true)
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;']),
            $table->createCell(count($rowUsers), true)
                  ->addAttributes(['style' => 'padding: 8px; border-bottom: 1px solid #ddd;'])
        )
    )
)->addAttributes(
  [
    'style' => 'border-collapse: collapse; width: 100%;text-align: left;',
    'class' => 'table bottom-default'
  ]
);

//Display table
echo $table->display();
