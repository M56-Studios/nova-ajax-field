<?php

namespace Razorcreations\AjaxField;

use Laravel\Nova\Fields\Field;

class AjaxField extends Field
{
	/**
	 * The field's component.
	 *
	 * @var string
	 */
	public $component = 'ajax-field';

	/**
	 * Set the URL that should be called via AJAX.
	 *
	 * The endpoint should return an array of objects in JSON e.g.
	 * [
	 *   {
	 *      "value": "Foo",
	 *      "label": "foo"
	 *   },
	 *  ...
	 * ]
	 */
	public function setUrl(string $url): self
	{
		return $this->withMeta([
			'url' => $url,
		]);
	}

	/**
	 * Sets the key of the selected option that should be saved as the value, default is "value".
	 */
	public function setValueKey(string $key): self
	{
		return $this->withMeta([
			'valueKey' => $key,
		]);
	}

	/**
	 * Sets the key of the selected option that should be displayed, default is "label".
	 */
	public function setLabelKey(string $key): self
	{
		return $this->withMeta([
			'labelKey' => $key,
		]);
	}

	/**
     * Sets the key of the results that should be displayed, default is root.
     */
    public function setResultsKey(string $key): self
    {
        return $this->withMeta([
            'resultsKey' => $key,
        ]);
    }

	/**
	 * Sets the type of the value being save to an integer.
	 */
	public function typeInt(): self
	{
		return $this->setType('int');
	}

	/**
	 * Sets the type of the value being save to a float.
	 */
	public function typeFloat(): self
	{
		return $this->setType('float');
	}

	/**
	 * Enable multi-select.
	 *
	 * Note: values are saved comma seperated
	 */
	public function multiple(): self
	{
		return $this->withMeta([
			'multiple' => true,
		]);
	}

	/*
	* Adds a param to the ajax call so it can pass through a value from another field
	*/
	public function parent(string $attribute): self
	{
		return $this->withMeta([
			'parent_field' => $attribute,
		]);
	}

	/*
	* Ajax request to be on text input as opposed to single intitial request
	*/
	public function responsive(): self
	{
		return $this->withMeta([
			'responsive' => true,
			'filterable' => false, // @see https://vue-select.org/guide/ajax.html#disabling-filtering
		]);
	}

	/**
	 * When loading server side options, it can be useful to disable the client side filtering. Use the filterable prop to disable filtering.
	 *
	 * @see https://vue-select.org/guide/ajax.html#disabling-filtering
	 */
	public function filterable(bool $filterable = true): self
	{
		return $this->withMeta([
			'filterable' => $filterable,
		]);
	}

	private function setType(string $type): self
	{
		return $this->withMeta([
			'type' => $type,
		]);
	}
}
