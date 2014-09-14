<?php

spl_autoload_register(function($class) {
	require __DIR__ . '/../src/' . str_replace('\\', '/', $class) . '.php';
});

$form = new Forms\Form(['method' => 'post', 'action' => '/submit']);

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

<?php echo $form->open(); ?>

<?php foreach($form as $element): ?>

<?php if($element->hasLabel()): ?>
<p><label><?php echo $element->getLabel(); ?>
<?php endif; ?>

<?php echo $element->getHtml(); ?>

<?php if($element->hasLabel()): ?>
</label></p>
<?php endif; ?>

<?php endforeach; ?>

<?php echo $form->close(); ?>