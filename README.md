# sortdata

Classe para reorganizar array multidimensional com valores predefinidos

Surgiu uma necessidade de reorganizar um array de acordo com palavras predefinidas que estariam contidas em um array multidimensional.

No exemplo utilizado, tinha uma lista de produtos, onde era necessario ordenar eles que continham palavras chaves, e assim seriam exibidas primeira.

# Como Utilizar

```php
<?php 

/*Palavras chaves*/
$keywords = array('Photoshop', 'Illustrator', 'CorelDraw', 'Indesign' );

/*Lista vinda do banco de dados*/
$datasource = [];
$datasource[] = array('name' => 'Curso de PHP');
$datasource[] = array('name' => 'Curso de Javascript');
$datasource[] = array('name' => 'Curso de Photoshop');
$datasource[] = array('name' => 'Curso de CorelDraw');
$datasource[] = array('name' => 'Curso de Photoshop Ultimate');

$sortData = new SortData\SortData($keywords, $datasource, 'name');


$sort = $sortData->search()->getResults();

print_r($sort);

```

Você pode também deixar itens encontrados de forma randômica

```php
<?php 

$sort = $sortData->search()->rand()->getResults();
print_r($sort);

```




