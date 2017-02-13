<div id="field_{{ $id }}"{!! Html::classes(['form-group','input-field ' ,'has-error' => $hasErrors]) !!}>
        {!! $input !!}
    <label id="label_{{ $id }}" for="{{ $id }}" class=" ">
        {{ $label }}
    </label>

    @if ($required)
        <span class="label label-info">Required</span>
    @endif
    <div class="row  " style=" font-size: 12px; height: 1px; ">
        @foreach ($errors as $error)
            <div class="help-block col-xs-12" >
                <div class="text-right">
                    {{ $error }}
                </div>
            </div>
        @endforeach
    </div>
@if($errors)
    <br>
@endif

</div>

<!-- 
<?php
//vendor/styde/config.php esto ya NOO
return [

	/*
		             * Set the HTML theme for the components
		             * like alerts, form fields, menus, etc.
	*/
	'theme' => 'bootstrap',

	/*
		             * Set the folder to store the custom templates
	*/
	'custom' => 'template.default',

	/*
		             * Set to false to deactivate the AccessHandler component
		             * Doing so the component will run slightly faster but
		             * the logged and roles checkers won't be available
	*/
	'control_access' => true,

	/*
		             * Set to false to deactivate the Translator for the alert and menu
		             * components, doing so they will run slightly faster but won't
		             * search for Lang keys to translate texts.
		             *
		             * Note: the FieldBuilder will always use the translator
		             * to search for attribute names and other texts,
		             * regardless of this configuration value.
	*/
	'translate_texts' => true,

	/*
		             * Set to true to deactivate HTML5 form validation
		             * and test the backend validation
	*/
	'novalidate' => false,

	/*
		             * Specify abbreviations for the form field attributes
	*/
	'abbreviations' => [
		'ph' => 'placeholder',
		'max' => 'maxlength',
		'tpl' => 'template',
	],

	/*
		             * Set the configuration for each theme
	*/
	'themes' => [
		/**
		 * Default configuration for the Twitter Bootstrap framework
		 */
		'bootstrap' => [
			/*
				                             * Set a specific HTML template for a field type if the
				                             * type is not set, the default template will be used
			*/
			'field_templates' => [
				// type => template
				'checkbox' => 'checkbox',
				'checkboxes' => 'collections',
				'radios' => 'collections',
			],
			/*
				                             * Set the default classes for each field type
			*/
			'field_classes' => [
				// type => class or classes
				'default' => 'input-field',
				'checkbox' => '',
				'error' => 'input-with-feedback',
			],
		],
	],

];
 -->