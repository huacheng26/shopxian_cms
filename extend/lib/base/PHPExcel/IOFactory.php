<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:51
            */
             if (!defined('PHPEXCEL_ROOT')) {            define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../');      require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');  }      class PHPExcel_IOFactory  {            private static $searchLocations = array(          array( 'type' => 'IWriter', 'path' => 'PHPExcel/Writer/{0}.php', 'class' => 'PHPExcel_Writer_{0}' ),          array( 'type' => 'IReader', 'path' => 'PHPExcel/Reader/{0}.php', 'class' => 'PHPExcel_Reader_{0}' )      );              private static $autoResolveClasses = array(          'Excel2007',          'Excel5',          'Excel2003XML',          'OOCalc',          'SYLK',          'Gnumeric',          'HTML',          'CSV',      );              private function __construct()      {      }              public static function getSearchLocations()      {          return self::$searchLocations;      }              public static function setSearchLocations($value)      {          if (is_array($value)) {              self::$searchLocations = $value;          } else {              throw new PHPExcel_Reader_Exception('Invalid parameter passed.');          }      }              public static function addSearchLocation($type = '', $location = '', $classname = '')      {          self::$searchLocations[] = array( 'type' => $type, 'path' => $location, 'class' => $classname );      }              public static function createWriter(PHPExcel $phpExcel, $writerType = '')      {                   $searchType = 'IWriter';                     foreach (self::$searchLocations as $searchLocation) {              if ($searchLocation['type'] == $searchType) {                  $className = str_replace('{0}', $writerType, $searchLocation['class']);                    $instance = new $className($phpExcel);                  if ($instance !== null) {                      return $instance;                  }              }          }                     throw new PHPExcel_Reader_Exception("No $searchType found for type $writerType");      }              public static function createReader($readerType = '')      {                   $searchType = 'IReader';                     foreach (self::$searchLocations as $searchLocation) {              if ($searchLocation['type'] == $searchType) {                  $className = str_replace('{0}', $readerType, $searchLocation['class']);                    $instance = new $className();                  if ($instance !== null) {                      return $instance;                  }              }          }                     throw new PHPExcel_Reader_Exception("No $searchType found for type $readerType");      }              public static function load($pFilename)      {          $reader = self::createReaderForFile($pFilename);          return $reader->load($pFilename);      }              public static function identify($pFilename)      {          $reader = self::createReaderForFile($pFilename);          $className = get_class($reader);          $classType = explode('_', $className);          unset($reader);          return array_pop($classType);      }              public static function createReaderForFile($pFilename)      {                   $pathinfo = pathinfo($pFilename);            $extensionType = null;          if (isset($pathinfo['extension'])) {              switch (strtolower($pathinfo['extension'])) {                  case 'xlsx':                             case 'xlsm':                             case 'xltx':                             case 'xltm':                                 $extensionType = 'Excel2007';                      break;                  case 'xls':                                 case 'xlt':                                     $extensionType = 'Excel5';                      break;                  case 'ods':                                 case 'ots':                                     $extensionType = 'OOCalc';                      break;                  case 'slk':                      $extensionType = 'SYLK';                      break;                  case 'xml':                                     $extensionType = 'Excel2003XML';                      break;                  case 'gnumeric':                      $extensionType = 'Gnumeric';                      break;                  case 'htm':                  case 'html':                      $extensionType = 'HTML';                      break;                  case 'csv':                                                                                     break;                  default:                      break;              }                if ($extensionType !== null) {                  $reader = self::createReader($extensionType);                                   if (isset($reader) && $reader->canRead($pFilename)) {                      return $reader;                  }              }          }                              foreach (self::$autoResolveClasses as $autoResolveClass) {                           if ($autoResolveClass !== $extensionType) {                  $reader = self::createReader($autoResolveClass);                  if ($reader->canRead($pFilename)) {                      return $reader;                  }              }          }            throw new PHPExcel_Reader_Exception('Unable to identify a reader for this file');      }  }  