<?php


return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "El campo :attribute debe ser aceptado.",
	"active_url"           => "El campo :attribute no es una URL valida.",
	"after"                => "El campo :attribute debe ser una fecha despues de :date.",
	"alpha"                => "El campo :attribute debe contener solo ciertas letras.",
	"alpha_dash"           => "El campo :attribute debe contener solo ciertas letras, numeros y caracteres especiales.",
	"alpha_num"            => "El campo :attribute debe contener solo letras y/o numeros.",
	"array"                => "El campo :attribute debe ser una array.",
	"before"               => "El campo :attribute debe ser una fecha despues de :date.",
	"between"              => [
		"numeric" => "El campo :attribute debe estar entre :min y :max.",
		"file"    => "El campo :attribute debe estar entre :min y :max kilobytes.",
		"string"  => "El campo :attribute debe estar entre :min y :max caracteres.",
		"array"   => "El campo :attribute debe tener entre :min y :max items.",
	],
	"boolean"              => "El campo :attribute debe ser true o false.",
	"confirmed"            => "El campo :attribute confirmacion no coincide.",
	"date"                 => "El campo :attribute no es una fecha valida.",
	"date_format"          => "El campo :attribute no cumple el formato :format.",
	"different"            => "El campo :attribute y :other deben ser diferentes.",
	"digits"               => "El campo :attribute debe ser de :digits digitos.",
	"digits_between"       => "El campo :attribute debe estar entre :min y :max digitos.",
	"email"                => "El campo :attribute debe ser una direccion electronica valida.",
	"filled"               => "El campo :attribute es necesario.",
	"exists"               => "El campo seleccionado :attribute no es valido.",
	"image"                => "El campo :attribute debe ser una imagen.",
	"in"                   => "El campo selecionado :attribute no es valido.",
	"integer"              => "El campo :attribute debe ser integer(numero).",
	"ip"                   => "El campo :attribute debe ser una direccion IP.",
	"max"                  => [
		"numeric" => "El campo :attribute no debe ser mayor que :max.",
		"file"    => "El campo :attribute no debe ser mayor que :max kilobytes.",
		"string"  => "El campo :attribute no debe ser mayor que :max caracteres.",
		"array"   => "El campo :attribute no puede tener mas de :max items.",
	],
	"mimes"                => "El campo :attribute debe ser un archivo del tipo: :values.",
	"min"                  => [
		"numeric" => "El campo :attribute debe ser de almenos :min.",
		"file"    => "El campo :attribute debe ser de almenos :min kilobytes.",
		"string"  => "El campo :attribute debe ser de almenos :min caracteres.",
		"array"   => "El campo :attribute debe tener almenos :min items.",
	],
	"not_in"               => "El campo seleccionado :attribute es invalido.",
	"numeric"              => "El campo :attribute debe ser un umero.",
	"regex"                => "El campo :attribute format is invalid.",
	"required"             => "El campo :attribute es necesario.",
	"required_if"          => "El campo :attribute es necesario cuando :other es :value.",
	"required_with"        => "El campo :attribute es necesario cuando :values esta presente.",
	"required_with_all"    => "El campo :attribute es necesario cuando :values esta presente.",
	"required_without"     => "El campo :attribute es necesario cuando :values no esta presente.",
	"required_without_all" => "El campo :attribute es necesario cuando ninguno de :values estan presentes.",
	"same"                 => "El campo :attribute y :other deben coincidir.",
	"size"                 => [
		"numeric" => "El campo :attribute debe ser de :size.",
		"file"    => "El campo :attribute debe ser de :size kilobytes.",
		"string"  => "El campo :attribute debe ser de :size caracteres.",
		"array"   => "El campo :attribute debe contener :size items.",
	],
	"unique"               => "El campo :attribute ya ha sido recogido.",
	"url"                  => "El campo :attribute tiene un formato invalido.",
	"timezone"             => "El campo :attribute debe ser una zona valida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
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
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
