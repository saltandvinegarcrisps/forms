# Form builder

Example

	$form = new Forms\Form([
		'method' => 'post',
		'action' => '/submit',
	]);

	$form->append(new Forms\Elements\Hidden('id', [
		'value' => 1234
	]));

	$form->append(new Forms\Elements\Input('first_name', [
		'label' => 'First Name',
		'value' => 'Dave'
	]));

	$form->append(new Forms\Elements\Select('gender', [
		'label' => 'Gender',
		'value' => 'f',
		'options' => [
			'm' => 'Male',
			'f' => 'Female',
			'o' => 'Other',
		],
	]));

	$form->append(new Forms\Elements\Textarea('bio', [
		'label' => 'Bio',
		'value' => 'Hello world'
	]));

	$form->append(new Forms\Elements\Checkbox('marketing', [
		'label' => 'Marketing',
		'value' => '1'
	]));

	$form->append(new Forms\Elements\Radio('subscription', [
		'label' => '1 Month',
		'value' => '1'
	]));

	$form->append(new Forms\Elements\Radio('subscription', [
		'label' => '6 Month',
		'value' => '6'
	]));

	$form->append(new Forms\Elements\Button('submit', [
		'type' => 'submit',
		'value' => 'Save'
	]));

	?>

	<?php echo $form->open(['class' => 'form--inline']); ?>

	<?php foreach($form as $element): ?>

		<?php if($element->hasLabel()): ?>
		<label for="<?php echo $element->getName(); ?>"><?php echo $element->getLabel(); ?></label>
		<?php endif; ?>

		<?php echo $element->withAttribute('id', $element->getName())->getHtml(); ?>

	<?php endforeach; ?>

	<?php echo $form->close(); ?>
