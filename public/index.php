<?php
//http://pooform.dev:8080/
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Configurando o autoload
define('CLASS_DIR','../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$form = new \FABIANO\Form\GeraForm();

$form->setAction('mailto:teste@teste.com');
$form->setMetodo('GET');
$form->addItem((new \FABIANO\Form\Tipo\Label())->setLabel('Nome')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->addItem((new \FABIANO\Form\Tipo\Text())->setId('nome')->setType('text')->setName('nome')->setRequired(true)->setPlaceholder('Nome'));
$form->addItem((new \FABIANO\Form\Tipo\Label())->setLabel('Email')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->addItem((new \FABIANO\Form\Tipo\Text())->setId('email')->setType('text')->setName('email')->setRequired(true)->setPlaceholder('Email'));
$form->addItem((new \FABIANO\Form\Tipo\Label())->setLabel('Mensagem')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->addItem((new \FABIANO\Form\Tipo\TextArea())->setValue(''));
$form->addItem((new \FABIANO\Form\Tipo\Label())->setLabel('Sexo')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->addItem((new \FABIANO\Form\Tipo\Radio())->setType('radio')->setName('sexo')->setValue('Masculino')->setChecked(true));
$form->addItem((new \FABIANO\Form\Tipo\Radio())->setType('radio')->setName('sexo')->setValue('Feminino'));
$form->addItem((new \FABIANO\Form\Tipo\Label())->setLabel('Estados')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->addItem((new \FABIANO\Form\Tipo\Select(
				array("pr" => "Parana", "sc" => "Santa Catarina")))
		->setSelected('')
		->setName('Estados')
				);
$form->addItem((new \FABIANO\Form\Tipo\Label())->setLabel('Informativo')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->addItem((new \FABIANO\Form\Tipo\Radio())->setType('checkbox')->setName('info')->setValue('Receber informativo em seu e-mail')->setChecked(true));
$form->addItem((new \FABIANO\Form\Tipo\Submit())->setType('submit')->setValue('Enviar formulário')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->addItem((new \FABIANO\Form\Tipo\ResetForm())->setType('reset')->setValue('Apagar')->setStyle('display:block; clear:both; margin:10px 0 0 0'));

$form->render();
