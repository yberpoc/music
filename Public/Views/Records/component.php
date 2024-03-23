<?php
use \Core\Repositories\RecordsRepository;


$records = new RecordsRepository();

$templateData['items'] = $records->findAll();


include __DIR__ . '/Template/template.php';


