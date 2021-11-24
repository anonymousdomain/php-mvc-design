<?php

namespace app\core\form;

use app\core\Model;

class Field extends BaseField
{

    public string $type;
    

 public function __construct(Model $model,string $attribute)
 {
    $this->type = 'text';
    parent::__construct($model,$attribute);
 }

    public function typeField($type)
    {
        $this->type = $type;
        return $this;
    }

    public function renderInput(): string
    {
        return sprintf(' <input type="%s" name="%s" value="%s"
        class="form-control%s">',
        $this->type,
        $this->attribute,
        $this->model->{$this->attribute},
        $this->model->hasError($this->attribute) ? ' is-invalid' : '',);
    }
}
