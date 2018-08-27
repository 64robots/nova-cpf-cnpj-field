<?php

namespace R64\NovaCpfCnpjField;

use Laravel\Nova\Fields\Field;

class Cpf extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-cpf-field';


    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @return void
     */
    public function __construct($name, $attribute = null)
    {
        parent::__construct($name, $attribute);

        $this->rules('cpf');
    }

    /**
     * Set the validation rules for the field.
     *
     * @param  \Closure|array  $rules
     * @return $this
     */
    public function rules($rules)
    {
        parent::rules($rules);

        array_push($this->rules, 'cpf');

        return $this;
    }

}
