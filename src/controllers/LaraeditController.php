<?php namespace Ibourgeois\Laraedit;

class LaraeditController extends \Controller {

	public function getFileTree() {

        if ( isset ( $_GET['operation'] ) ) {

            $fs = new JsTreeController ( '../' ); 

            try {

                $rslt = null;

                switch ( $_GET['operation'] ) {
                    
                    case 'get_node':
                        $node = isset ( $_GET['id'] ) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                        $rslt = $fs->lst ( $node, ( isset ( $_GET['id'] ) && $_GET['id'] === '#' ) );
                        break;

                    case "get_content":
                        $node = isset ( $_GET['id'] ) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                        $rslt = $fs->data ( $node );
                        break;

                    case 'create_node':
                        $node = isset ( $_GET['id'] ) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                        $rslt = $fs->create ( $node, isset ( $_GET['text'] ) ? $_GET['text'] : '', ( ! isset ( $_GET['type'] ) || $_GET['type'] !== 'file' ) );
                        break;

                    case 'rename_node':
                        $node = isset ( $_GET['id'] ) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                        $rslt = $fs->rename ( $node, isset ( $_GET['text'] ) ? $_GET['text'] : '' );
                        break;

                    case 'delete_node':
                        $node = isset ( $_GET['id'] ) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                        $rslt = $fs->remove ( $node );
                        break;

                    case 'move_node':
                        $node = isset ( $_GET['id'] ) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                        $parn = isset ( $_GET['parent'] ) && $_GET['parent'] !== '#' ? $_GET['parent'] : '/';
                        $rslt = $fs->move ( $node, $parn );
                        break;

                    case 'copy_node':
                        $node = isset ( $_GET['id'] ) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                        $parn = isset ( $_GET['parent'] ) && $_GET['parent'] !== '#' ? $_GET['parent'] : '/';
                        $rslt = $fs->copy ( $node, $parn );
                        break;

                    default:
                        throw new Exception ( 'Unsupported operation: ' . $_GET['operation'] );
                        break;

                }

                return \Response::json( $rslt );

            } catch ( Exception $e ) {

                header ( $_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error' );
                
                header ( 'Status:  500 Server Error' );
                
                echo $e->getMessage( );

            }

            die( );

        }

    }

    public function postTerminal() {

        if ( \Request::ajax() ) {

            $terminal_password = \Config::get('laraedit::laraedit.terminal.password');
            
            $command = '';
            
            if(!empty($_POST['command'])) { 

                $command = $_POST['command']; 

            }
        
            if(strtolower($command=='exit')) {

                \Session::put('term_auth', false);
                $output = '[CLOSED]';
            
            } else if(\Session::get('term_auth') !== true) {
            
                if($command==$terminal_password) {

                    \Session::put('term_auth', true);
                    $output = '[AUTHENTICATED]';

                } else {
                    
                    $output = 'Enter Password:';

                }
            
            } else {
                
                $Terminal = shell_exec($command);
                $output = '';
                $command = explode("&&", $command);
            
                foreach($command as $c) {
                    $Terminal->command = $c;
                    $output .= $Terminal->Process();
                }
        
            }

            return \Response::json( htmlentities($output) );

        }

    }

    public function getIndex() {

		if ( \Request::ajax() ) {
			return $this->getFileTree();
		}

    	return \View::make( 'laraedit::layout.master' );

    }

    public function postSave() {

        $f = file_put_contents( app_path() . '/../' . $_POST['file'], $_POST['contents']) or die("Can not open file");

    }

}