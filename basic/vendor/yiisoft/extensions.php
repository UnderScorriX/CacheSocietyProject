<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-faker' => 
  array (
    'name' => 'yiisoft/yii2-faker',
    'version' => '2.0.5.0',
    'alias' => 
    array (
      '@yii/faker' => $vendorDir . '/yiisoft/yii2-faker/src',
    ),
  ),
  'yiisoft/yii2-bootstrap5' => 
  array (
    'name' => 'yiisoft/yii2-bootstrap5',
    'version' => '2.0.3.0',
    'alias' => 
    array (
      '@yii/bootstrap5' => $vendorDir . '/yiisoft/yii2-bootstrap5/src',
    ),
    'bootstrap' => 'yii\\bootstrap5\\i18n\\TranslationBootstrap',
  ),
  'kartik-v/yii2-krajee-base' => 
  array (
    'name' => 'kartik-v/yii2-krajee-base',
    'version' => '3.0.5.0',
    'alias' => 
    array (
      '@kartik/base' => $vendorDir . '/kartik-v/yii2-krajee-base/src',
    ),
  ),
  'kartik-v/yii2-widget-datepicker' => 
  array (
    'name' => 'kartik-v/yii2-widget-datepicker',
    'version' => 'dev-master',
    'alias' => 
    array (
      '@kartik/date' => $vendorDir . '/kartik-v/yii2-widget-datepicker/src',
    ),
  ),
  'yiisoft/yii2-symfonymailer' => 
  array (
    'name' => 'yiisoft/yii2-symfonymailer',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@yii/symfonymailer' => $vendorDir . '/yiisoft/yii2-symfonymailer/src',
    ),
  ),
  'yiisoft/yii2-gii' => 
  array (
    'name' => 'yiisoft/yii2-gii',
    'version' => '2.2.5.0',
    'alias' => 
    array (
      '@yii/gii' => $vendorDir . '/yiisoft/yii2-gii/src',
    ),
  ),
  'yiisoft/yii2-debug' => 
  array (
    'name' => 'yiisoft/yii2-debug',
    'version' => '2.1.21.0',
    'alias' => 
    array (
      '@yii/debug' => $vendorDir . '/yiisoft/yii2-debug/src',
    ),
  ),
  'kartik-v/yii2-widget-timepicker' => 
  array (
    'name' => 'kartik-v/yii2-widget-timepicker',
    'version' => 'dev-master',
    'alias' => 
    array (
      '@kartik/time' => $vendorDir . '/kartik-v/yii2-widget-timepicker/src',
    ),
  ),
  'kartik-v/yii2-widget-fileinput' => 
  array (
    'name' => 'kartik-v/yii2-widget-fileinput',
    'version' => 'dev-master',
    'alias' => 
    array (
      '@kartik/file' => $vendorDir . '/kartik-v/yii2-widget-fileinput/src',
    ),
  ),
);
