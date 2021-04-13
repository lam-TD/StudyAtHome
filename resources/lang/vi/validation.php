<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Trường following language lines contain Trường default error messages used by
    | Trường validator class. Some of these rules have multiple versions such
    | as Trường size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Trường :attribute must be accepted.',
    'active_url'           => 'Trường :attribute is not a valid URL.',
    'after'                => 'Trường :attribute must be a date after :date.',
    'after_or_equal'       => 'Trường :attribute must be a date after or equal to :date.',
    'alpha'                => 'Trường :attribute may only contain letters.',
    'alpha_dash'           => 'Trường :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'Trường :attribute may only contain letters and numbers.',
    'array'                => 'Trường :attribute must be an array.',
    'before'               => 'Trường :attribute must be a date before :date.',
    'before_or_equal'      => 'Trường :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Trường :attribute must be between :min and :max.',
        'file'    => 'Trường :attribute must be between :min and :max kilobytes.',
        'string'  => 'Trường :attribute must be between :min and :max characters.',
        'array'   => 'Trường :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'Trường :attribute field must be true or false.',
    'confirmed'            => 'Trường :attribute xác nhận không khớp.',
    'date'                 => 'Trường :attribute is not a valid date.',
    'date_format'          => 'Trường :attribute does not match Trường format :format.',
    'different'            => 'Trường :attribute and :other must be different.',
    'digits'               => 'Trường :attribute must be :digits digits.',
    'digits_between'       => 'Trường :attribute must be between :min and :max digits.',
    'dimensions'           => 'Trường :attribute has invalid image dimensions.',
    'distinct'             => 'Trường :attribute field has a duplicate value.',
    'email'                => 'Trường :attribute must be a valid email address.',
    'exists'               => 'Trường selected :attribute is invalid.',
    'file'                 => 'Trường :attribute must be a file.',
    'filled'               => 'Trường :attribute field must have a value.',
    'image'                => 'Trường :attribute must be an image.',
    'in'                   => 'Trường selected :attribute is invalid.',
    'in_array'             => 'Trường :attribute field does not exist in :other.',
    'integer'              => 'Trường :attribute must be an integer.',
    'ip'                   => 'Trường :attribute must be a valid IP address.',
    'json'                 => 'Trường :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Trường :attribute may not be greater than :max.',
        'file'    => 'Trường :attribute may not be greater than :max kilobytes.',
        'string'  => 'Trường :attribute may not be greater than :max characters.',
        'array'   => 'Trường :attribute may not have more than :max items.',
    ],
    'mimes'                => 'Trường :attribute must be a file of type: :values.',
    'mimetypes'            => 'Trường :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'Trường :attribute ít nhất phải :min.',
        'file'    => 'Trường :attribute ít nhất phải :min kilobytes.',
        'string'  => 'Trường :attribute ít nhất phải :min ký tự.',
        'array'   => 'Trường :attribute ít nhất phải :min items.',
    ],
    'not_in'               => 'Trường selected :attribute is invalid.',
    'numeric'              => 'Trường :attribute must be a number.',
    'present'              => 'Trường :attribute field must be present.',
    'regex'                => 'Trường :attribute format is invalid.',
    'required'             => 'Trường :attribute field is required.',
    'required_if'          => 'Trường :attribute field is required when :other is :value.',
    'required_unless'      => 'Trường :attribute field is required unless :other is in :values.',
    'required_with'        => 'Trường :attribute field is required when :values is present.',
    'required_with_all'    => 'Trường :attribute field is required when :values is present.',
    'required_without'     => 'Trường :attribute field is required when :values is not present.',
    'required_without_all' => 'Trường :attribute field is required when none of :values are present.',
    'same'                 => 'Trường :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'Trường :attribute ít nhất phải :size.',
        'file'    => 'Trường :attribute ít nhất phải :size kilobytes.',
        'string'  => 'Trường :attribute ít nhất phải :size characters.',
        'array'   => 'Trường :attribute must contain :size items.',
    ],
    'string'               => 'Trường :attribute must be a string.',
    'timezone'             => 'Trường :attribute must be a valid zone.',
    'unique'               => 'Trường :attribute has already been taken.',
    'uploaded'             => 'Trường :attribute failed to upload.',
    'url'                  => 'Trường :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name Trường lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Trường following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
