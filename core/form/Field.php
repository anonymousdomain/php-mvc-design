<?php

namespace app\core\form;

use app\core\Model;

class Field
{
   
public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->type='text';
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf(
            '
        <div class="form-group">
          <label class="form-label mt-4">%s</label>
          <input type="%s" name="%s" value="%s"
          class="form-control%s">
          <div class="invalid-feedback">%s</div>
        </div> 
        ',
            $this->attribute,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid': '',
            $this->model->getFirstError($this->attribute)
        );
    }

    public function typeField($type){
        $this->type=$type;
        return $this;
    }
}
