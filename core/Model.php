<?php

namespace app\core;

use Attribute;

abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public array $errors = [];
    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            //store the attrib in a value 
            $value = $this->{$attribute};
            //store rules in rulename
            foreach ($rules as $rule) {
                $rulename = $rule;
                if (is_array($rulename)) {
                    $rulename = $rule[0];
                }
                if ($rulename === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($rulename === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($rulename === self::RULE_MIN && strlen($value)<$rule['min'])  {
                    $this->addError($attribute, self::RULE_MIN,$rule);
                } 
                if ($rulename === self::RULE_MAX  && strlen($value)>$rule['max'])  {
                    $this->addError($attribute, self::RULE_MAX,$rule);
                } 
                if ($rulename === self::RULE_MATCH  && $value!==$this->{$rule['match']})  {
                    $this->addError($attribute, self::RULE_MATCH,$rule);
                }
            }
        }
        return empty($this->errors);
    }
    public function addError(string $attribute, string $rule,$params=[])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach($params as $key=>$value){
            $message=str_replace("{{$key}}",$value,$message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'this field is required',
            self::RULE_EMAIL => 'eneter valid email address',
            self::RULE_MIN => 'min length of this field must be {min}',
            self::RULE_MATCH => 'max length of this field must be {max}',
            self::RULE_MATCH => 'this filed must be the same as {match}',
            self::RULE_UNIQUE => 'user already loged in with this account'
        ];
    }
}
