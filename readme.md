# AJAX Field for Laravel Nova

## Installation

`composer require razorcreations/ajax-field`

## Usage

```php
	// Inside your resources fields definition
	AjaxField::make('Foo')->setUrl('/api/ajaxselect/foo'),

	// If you are using integers or floats for the values ensure to chain on the type methods...
	AjaxField::make('Foo')->setUrl('/api/ajaxselect/foo')->typeInt(),
```

The field expects the response from the AJAX call to respond with a JSON array of options in the following format:
```json
[
	{
		"label": "Bob",
		"value": 1,
	},
	{
		"label": "Jenny",
		"value": 2,
	}
]
```
If you wish you can override the default keys of "value" and "label" using the following methods:
```php
	AjaxField::make('Foo')->setUrl('/api/ajaxselect/foo')->setValueKey('id')->setLabelKey('name'),
```

## Contributing

If you would like to contribute please fork the project and submit a PR.

### Coding Standards

- `composer run fix` to fix any PHP linting issues automatically
- `composer run lint` to show any PHP linting issues
- `npm run fix` to fix any JS/Vue linting issue automatically
- `npm run lint` to show any JS/Vue linting issues