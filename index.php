<?php

error_reporting(E_ALL);
ini_set("display_errors", -1);

require 'src/Forms/Form.php';

$form = new Forms\Form(['id' => 'demo', 'name' => 'demo', 'method' => 'post', 'action' => '/submit']);

$form->addElement(new Forms\Elements\Hidden('id', [
	'value' => 1234
]));

$form->addElement(new Forms\Elements\Input('first_name', [
	'label' => 'First Name',
	'value' => 'Dave'
]));

$form->addElement(new Forms\Elements\Select('gender', [
	'label' => 'Gender',
	'value' => 'f',
	'options' => ['m' => 'Male', 'f' => 'Female']
]));

$form->addElement(new Forms\Elements\Textarea('bio', [
	'label' => 'Bio',
	'value' => 'Hello world'
]));

$form->addElement(new Forms\Elements\Checkbox('marketing', [
	'label' => 'Marketing',
	'value' => '1'
]));

$form->addElement(new Forms\Elements\Radio('subscription', [
	'label' => '1 Month',
	'value' => '1'
]));

$form->addElement(new Forms\Elements\Radio('subscription', [
	'label' => '6 Month',
	'value' => '6'
]));

$form->addElement(new Forms\Elements\Button('submit', [
	'type' => 'submit',
	'value' => 'Save'
]));

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Forms Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
        body {
            font-family: 'Roboto', Calibri, Helvetica, sans-serif;
            background-color: #EEE;
            font-size: 14px;
            color: #222222;
        }

        p {
            margin: 3px;
            padding-bottom: 10px;
        }

        .container {
            width: 100%;
            max-width: 960px;
            margin: 0 auto;
            position: relative;
            top: 20px;
            padding: 10px 20px;
            border: 1px dashed #333;
        }

        #demo {
            display: inline-block;
            width: 350px;
            padding: 5px;
        }

        #demo .forms-group {
            padding-bottom: 5px;
        }

        #demo .forms-group label {
            display: inline-block;
            width: 20%;
        }

        #demo .forms-group textarea {
            display: inline-block;
            width: 95%;
        }
        </style>
    </head>
    <body>
        <div id="wrapper" class="container">
            <h1>rwarasaurus/forms</h1>
            <div id="group-demo" class="container">
                <h2>Grouped Build Demo</h2>
                <?php echo $form->buildGrouped(); ?>
            </div>
        </div>
    </body>
</html>