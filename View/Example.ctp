<h1>Comparison and Reference</h1>
<div class="span-12">
	<h2>Horizontal Form Html</h2>
	<form class="form-horizontal">
	  <fieldset>
		<div class="control-group">
		  <label class="control-label" for="input01">Text input</label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="input01">
			<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="optionsCheckbox">Checkbox</label>
		  <div class="controls">
			<label class="checkbox">
			  <input type="checkbox" id="optionsCheckbox" value="option1">
			  Option one is this and that—be sure to include why it's great
			</label>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="select01">Select list</label>
		  <div class="controls">
			<select id="select01">
			  <option>something</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="multiSelect">Multicon-select</label>
		  <div class="controls">
			<select multiple="multiple" id="multiSelect">
			  <option>1</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="fileInput">File input</label>
		  <div class="controls">
			<input class="input-file" id="fileInput" type="file">
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="textarea">Textarea</label>
		  <div class="controls">
			<textarea class="input-xlarge" id="textarea" rows="3"></textarea>
		  </div>
		</div>
		<div class="control-group">
		  <label for="optionsCheckboxList" class="control-label">Checkboxes</label>
		  <div class="controls">
			<label class="checkbox">
			  <input type="checkbox" value="option1" name="optionsCheckboxList1">
			  Option one is this and that&mdash;be sure to include why it's great
			</label>
			<label class="checkbox">
			  <input type="checkbox" value="option2" name="optionsCheckboxList2">
			  Option two can also be checked and included in form results
			</label>
			<label class="checkbox">
			  <input type="checkbox" value="option3" name="optionsCheckboxList3">
			  Option three can&mdash;yes, you guessed it&mdash;also be checked and included in form results
			</label>
			<p class="help-block"><strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.</p>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label">Radio buttons</label>
		  <div class="controls">
			<label class="radio">
			  <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">
			  Option one is this and that&mdash;be sure to include why it's great
			</label>
			<label class="radio">
			  <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios">
			  Option two can is something else and selecting it will deselect option one
			</label>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="inlineCheckboxes">Inline checkboxes</label>
		  <div class="controls">
			<label class="checkbox inline">
			  <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
			</label>
			<label class="checkbox inline">
			  <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
			</label>
			<label class="checkbox inline">
			  <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
			</label>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="prependedInput">Prepended text</label>
		  <div class="controls">
			<div class="input-prepend">
			  <span class="add-on">@</span><input class="span2" id="prependedInput" size="16" type="text">
			</div>
			<p class="help-block">Here's some help text</p>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="appendedInput">Appended text</label>
		  <div class="controls">
			<div class="input-append">
			  <input class="span2" id="appendedInput" size="16" type="text"><span class="add-on">.00</span>
			</div>
			<span class="help-inline">Here's more help text</span>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="appendedPrependedInput">Append and prepend</label>
		  <div class="controls">
			<div class="input-prepend input-append">
			  <span class="add-on">$</span><input class="span2" id="appendedPrependedInput" size="16" type="text"><span class="add-on">.00</span>
			</div>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="appendedInputButton">Append with button</label>
		  <div class="controls">
			<div class="input-append">
			  <input class="span2" id="appendedInputButton" size="16" type="text"><button class="btn" type="button">Go!</button>
			</div>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="appendedInputButtons">Two-button append</label>
		  <div class="controls">
			<div class="input-append">
			  <input class="span2" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button">Search</button><button class="btn" type="button">Options</button>
			</div>
		  </div>
		</div>
		<div class="form-actions">
		  <button type="submit" class="btn btn-primary">Save changes</button>
		  <button class="btn">Cancel</button>
		</div>
	  </fieldset>
	</form>
</div>
<div class="span-12 last">
	<h2>Horizontal Form Helper</h2>
	<?php echo $this->Form->create('Member', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<?php echo $this->TwitterBootstrap->input('text_input', array(
				'label' => 'Text input',
				'help_block' => 'In addition to freeform text, any HTML5 text-based input appears like so.',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('checkbox', array(
				'label' => 'Checkbox',
				'type' => 'checkbox',
				'checkbox_label' => 'Option one is this and that—be sure to include why it\'s great'
				)); ?>
			<?php echo $this->TwitterBootstrap->input('select_list', array(
				'options' => array('Something', '2', '3', '4'),
				)); ?>
			<?php echo $this->TwitterBootstrap->input('multicon_select', array(
				'label' => 'Multicon-select',
				'options' => array('1', '2', '3', '4'),
				'multiple' => 'multiple',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('file_input', array(
				'type' => 'file',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('textarea', array(
				'type' => 'textarea',
				'rows' => 3,
				'class' => 'input-xlarge',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('xcheckboxes', array(
				'label' => 'Checkboxes',
				'legend' => false,
				'type' => "select",
				'multiple' => "checkbox",
				'options' => array(
					"Option one is this and that&mdash;be sure to include why it's great",
					"Option two can also be checked and included in form results",
					"Option three can—yes, you guessed it—also be checked and included in form results",
					),
				'help_block' => "<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form."
				)); ?>
			<?php echo $this->TwitterBootstrap->radio('radio_buttons', array(
				'label' => 'Radio buttons',
				'legend' => false,
				'type' => "radio",
				'options' => array(
					"Option one is this and that&mdash;be sure to include why it's great",
					"Option two can is something else and selecting it will deselect option one",
					)
				)); ?>
			<?php echo $this->TwitterBootstrap->input('inline_checkboxes', array(
				'label' => 'Inline checkboxes',
				'legend' => false,
				'multiple' => "checkbox",
				'class' => "checkbox inline",
				'separator' => " ",
				'options' => array(1, 2, 3),
				)); ?>
			<?php echo $this->TwitterBootstrap->input('prepend_text', array(
				'label' => 'Prepend text',
				'class' => 'span2',
				'prepend' => '@',
				'help_block' => "Here's some help text",
				)); ?>
			<?php echo $this->TwitterBootstrap->input('append_text', array(
				'label' => 'Append text',
				'class' => 'span2',
				'append' => '.00',
				'help_inline' => "Here's more help text",
				)); ?>
			<?php echo $this->TwitterBootstrap->input('a_p_text', array(
				'label' => 'Append and prepend',
				'class' => 'span2',
				'prepend' => '@',
				'append' => '.00',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('a_button_text', array(
				'label' => 'Append with button',
				'class' => 'span2',
				'append' => '<button class="btn" type="button">Go!</button>',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('a_twobutton_text', array(
				'label' => 'Two-button append',
				'class' => 'span2',
				'append' => '<button type="button" class="btn">Search</button><button type="button" class="btn">Options</button>',
				)); ?>
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Save changes</button>
			  <button class="btn">Cancel</button>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear"><!--e--></div>
<?php
$optionsGender = array('male' => 'Male', 'female' => 'Female', 'both' => 'Both', 'other' => 'Other');
$optionsColors = array('red' => 'Red', 'orange' => 'Orange', 'yellow' => 'Yellow', 'green' => 'Green', 'blue' => 'Blue', 'indigo' => 'Indigo', 'violet' => 'Violet', 'black' => 'Black');
$optionsPets = array('dogs' => 'Dogs', 'cats' => 'Cats', 'fish' => 'Fish', 'birds' => 'Birds');
$optionsGroups = array(1 => 'Admin', 2 => 'Really Cool Guys', 3 => 'Underwear Models');
?>
<div class="span-12">
	<h2>Second Test - automagics</h2>
	<?php echo $this->Form->create('Member', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<?php echo $this->TwitterBootstrap->input('id'); ?>
			<?php echo $this->TwitterBootstrap->input('email'); ?>
			<?php echo $this->TwitterBootstrap->input('first_name'); ?>
			<?php echo $this->TwitterBootstrap->input('last_name'); ?>
			<?php echo $this->TwitterBootstrap->input('is_active'); ?>
			<?php echo $this->TwitterBootstrap->radio('gender', array('label' => 'Gender', 'options' => $optionsGender)); ?>
			<?php echo $this->TwitterBootstrap->input('favorite_color', array('label' => 'Favorite Color', 'options' => $optionsColors)); ?>
			<?php echo $this->TwitterBootstrap->input('hated_color', array('label' => 'Hated Colors', 'multiple' => 'checkbox', 'options' => $optionsColors)); ?>
			<?php echo $this->TwitterBootstrap->input('pets', array(
				'multiple' => "checkbox",
				'class' => "checkbox inline",
				'options' => $optionsPets,
				)); ?>
			<?php echo $this->TwitterBootstrap->input('salary', array(
				'class' => 'span2',
				'prepend' => '$',
				'append' => 'per year',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('Group.Group', array(
				'multiple' => "checkbox",
				'options' => $optionsGroups,
				)); ?>
		</fieldset>
	</form>
</div>
<div class="span-12 last">
	<h2>Third Test - automagics + defaults</h2>
	<?php
	// these would probably be set by the controller as $this->data, which gets merged into $this->Form->data
	$this->Form->data = array(
		'Member' => array(
			'id' => 12345,
			'email' => 'member@domain.com',
			'first_name' => 'Jane',
			'last_name' => 'Doe',
			'is_active' => 1,
			'gender' => 'female',
			'favorite_color' => 'blue',
			'hated_colors' => array('green', 'orange', 'violet'),
			'pets' => array('dogs', 'fish'),
			'salary' => '1,000,000',
			),
		'Group' => array(
			array('id' => 1, 'title' => 'admin'),
			array('id' => 3, 'title' => 'model'),
			),
		);
	?>
	<?php echo $this->Form->create('Member', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<?php echo $this->TwitterBootstrap->input('id'); ?>
			<?php echo $this->TwitterBootstrap->input('email'); ?>
			<?php echo $this->TwitterBootstrap->input('first_name'); ?>
			<?php echo $this->TwitterBootstrap->input('last_name'); ?>
			<?php echo $this->TwitterBootstrap->input('is_active'); ?>
			<?php echo $this->TwitterBootstrap->radio('gender', array('label' => 'Gender', 'options' => $optionsGender)); ?>
			<?php echo $this->TwitterBootstrap->input('favorite_color', array('label' => 'Favorite Color', 'options' => $optionsColors)); ?>
			<?php echo $this->TwitterBootstrap->input('hated_colors', array('label' => 'Hated Colors', 'multiple' => 'checkbox', 'options' => $optionsColors)); ?>
			<?php echo $this->TwitterBootstrap->input('pets', array(
				'multiple' => "checkbox",
				'class' => "checkbox inline",
				'options' => $optionsPets,
				)); ?>
			<?php echo $this->TwitterBootstrap->input('salary', array(
				'class' => 'span2',
				'prepend' => '$',
				'append' => 'per year',
				)); ?>
			<?php echo $this->TwitterBootstrap->input('Group.Group', array(
				'multiple' => "checkbox",
				'options' => $optionsGroups,
				)); ?>
		</fieldset>
	</form>
</div>