<?php namespace Ibourgeois\Laraedit;
    
    class TerminalController extends \Controller {

        public $command          = '';
        public $output           = '';
        public $directory        = '';
        public $command_exec     = '';
        
        public function __construct() {

            $terminal_root    = \Config::get('laraedit::laraedit.terminal.root');

            if(! \Session::has('dir')) {

                if($terminal_root=='') {

                    $this->command_exec = 'pwd';
                    $this->Execute();
                    \Session::put('dir', $this->output);

                } else {

                    $this->directory = $terminal_root;
                    $this->ChangeDirectory();

                }

            } else {

                $this->directory = \Session::get('dir');
                $this->ChangeDirectory();

            }

        }
        
        public function Process() {

            $this->ParseCommand();
            $this->Execute();
            return $this->output;

        }
        
        public function ParseCommand() {

            $terminal_blocked = \Config::get('laraedit::laraedit.terminal.blocked');
            
            $command_parts = explode(" ",$this->command);

            if(in_array('cd',$command_parts)) {

                $cd_key = array_search('cd', $command_parts);
                $cd_key++;
                $this->directory = $command_parts[$cd_key];
                $this->ChangeDirectory();
                $this->command = str_replace('cd '.$this->directory,'',$this->command);

            }
            
            $editors = array('vi','vim','nano');

            $this->command = str_replace($editors,'cat',$this->command);
            
            $blocked = explode(',',$terminal_blocked);

            if(in_array($command_parts[0],$blocked)) {

                $this->command = 'echo ERROR: Command not allowed';

            }
            
            $this->command_exec = $this->command . ' 2>&1';

        }
        
        public function ChangeDirectory() {

            chdir($this->directory);
            \Session::put('dir', exec('pwd'));

        }
        
        public function Execute() {

            if(function_exists('system')) {

                ob_start();
                system($this->command_exec);
                $this->output = ob_get_contents();
                ob_end_clean();

            }

            else if(function_exists('passthru')) {

                ob_start();
                passthru($this->command_exec);
                $this->output = ob_get_contents();
                ob_end_clean();

            }

            else if(function_exists('exec')) {

                exec($this->command_exec , $this->output);
                $this->output = implode("\n" , $output);

            }

            else if(function_exists('shell_exec')) {

                $this->output = shell_exec($this->command_exec);

            }

            else {

                $this->output = 'Command execution not possible on this system';

            }

        }        
        
    }