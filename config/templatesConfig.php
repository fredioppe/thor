<?php
$config = [
    'Templates'=>[
        'shortForm' => [
            'formstart' => '<form {{attrs}} class="form-horizontal" >',
            'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
            'input' => '<div class="col-sm-10"><input type="{{type}}" class="form-control" name="{{name}}" {{attrs}} /> </div>',
            'select' => '<div class="col-sm-10"><select class="form-control" name="{{name}}" {{attrs}}>{{content}}</select></div>',
            'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">{{content}}</div>',              
            'inputContainerError' => '<div class="form-group has-error" {{class}}>             
            {{content}}{{error}} </div>',
           'error' => '<span class="help-block" {{class}} >{{content}}</span>',
            'hiddenBlock' => '<div style="display:none;">{{content}}</div>', 
            'checkContainer' => '<div class="col-sm-10 checkbox">{{hidden}}{{content}}</div>'],
        'cleanForm' => [
            'formstart' => '<form {{attrs}}>',
            'label' => '<label  {{attrs}}>{{text}}</label>',
            'input' => '<input type="{{type}}" name="{{name}}" {{attrs}} />',
            'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
            'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
            'inputContainer' => '{{content}}',
            //'inputContainer' => '<div class=" {{required}}" form-type="{{type}}">{{content}}</div>',
            'checkContainer' => '',],
        'produtoForm' => [
            'formstart' => '<form {{attrs}}  >',
            'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
            'label' => '<label class="col-lg-3 control-label" {{attrs}}>{{text}}</label>',
            'input' => '<div class="col-lg-9" ><input type="{{type}}" class="form-control" name="{{name}}" {{attrs}} /></div>',
            'select' => '<div class="col-lg-9"><select class="form-control" name="{{name}}" {{attrs}}>{{content}}</select></div>',
            'inputContainer' => '<div class="form-group {{required}} {{varClass}}" id="{{class}}"  form-type="{{type}}">{{content}}</div>',
            'checkContainer' => '<div class="col-sm-10 checkbox"></div>'],
            
        'cnpjForm' => [
            'formstart' => '<form {{attrs}} class="form-horizontal" >',
            'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
            'input' => '<div class="col-sm-10"><input type="{{type}}" class="form-control" name="{{name}}" {{attrs}} /> </div>',
            'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">{{content}}</div>',              
            'inputContainerError' => '<div class="form-group has-error" {{class}}>             
            {{content}} </div>',
           'error' => '<span class="help-block" id="cnpj-error1" {{class}} >{{content}}</span>'
            ],
        'emailForm' => [
            'formstart' => '<form {{attrs}} class="form-horizontal" >',
            'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
            'input' => '<div class="col-sm-10"><input type="{{type}}" class="form-control" name="{{name}}" {{attrs}} /> </div>',
            'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">{{content}}</div>',              
            'inputContainerError' => '<div class="form-group has-error" {{class}}>             
            {{content}} </div>',
           'error' => '<span class="help-block" id="email-error1" {{class}} >{{content}}</span>'
            ],
    ]
];


