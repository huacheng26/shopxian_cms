<?php 
        namespace lib\base;  use think\Cache;  use think\Config;  use think\Db;  use think\Debug;  use think\Request;  use think\Response;    class AppDebug {      protected $config = [          'trace_file' => '',          'trace_tabs' => ['base' => 'base', 'file' => 'file', 'info' => 'info', 'notice|error' => 'notice', 'sql' => 'SQL', 'debug|log' => 'debug'],      ];             public function __construct(array $config = [])      {          $this->config['trace_file'] = THINK_PATH . 'tpl/page_trace.tpl';          $this->config               = array_merge($this->config, $config);      }              public function output(Response $response, array $log = [])      {          $request     = Request::instance();          $contentType = $response->getHeader('Content-Type');          $accept      = $request->header('accept');          if (strpos($accept, 'application/json') === 0 || $request->isAjax()) {              return false;          } elseif (!empty($contentType) && strpos($contentType, 'html') === false) {              return false;          }                   $runtime = number_format(microtime(true) - THINK_START_TIME, 10);          $reqs    = $runtime > 0 ? number_format(1 / $runtime, 2) : '∞';          $mem     = number_format((memory_get_usage() - THINK_START_MEM) / 1024, 2);                     if (isset($_SERVER['HTTP_HOST'])) {              $uri = $_SERVER['SERVER_PROTOCOL'] . ' ' . $_SERVER['REQUEST_METHOD'] . ' : ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];          } else {              $uri = 'cmd:' . implode(' ', $_SERVER['argv']);          }          $base = [              'solicited_message' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . ' ' . $uri,              'run_time' => number_format($runtime, 6) . 's [ 吞吐率：' . $reqs . 'req/s ] 内存消耗：' . $mem . 'kb 文件加载：' . count(get_included_files()),              'search_information' => Db::$queryTimes . ' queries ' . Db::$executeTimes . ' writes ',              'cached_information' => Cache::$readTimes . ' reads,' . Cache::$writeTimes . ' writes',              'configuration_loaded' => count(Config::get()),          ];            if (session_id()) {              $base['会话信息'] = 'SESSION_ID=' . session_id();          }            $info = Debug::getFile(true);                     $trace = [];          foreach ($this->config['trace_tabs'] as $name => $title) {              $name = strtolower($name);              switch ($name) {                  case 'base':                      $trace[$title] = $base;                      break;                  case 'file':                      $trace[$title] = $info;                      break;                  default:                      if (strpos($name, '|')) {                                                   $names  = explode('|', $name);                          $result = [];                          foreach ($names as $name) {                              $result = array_merge($result, isset($log[$name]) ? $log[$name] : []);                          }                          $trace[$title] = $result;                      } else {                          $trace[$title] = isset($log[$name]) ? $log[$name] : '';                      }              }          }                                     print_r($trace);          print_r($base);die;               }  }  