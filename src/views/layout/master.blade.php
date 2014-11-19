<!DOCTYPE html>
<html lang="en" class="full">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>{{ Config::get('laraedit::laraedit.title') }}</title>

        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/css/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/css/font-awesome/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/js/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/js/js-tree/themes/default-dark/style.min.css')}}">
        
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Code+Pro:200,400">

        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/css/terminal/screen.css')}}">
        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/css/laraedit/laraedit.css')}}">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="full">        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="sidebar-toggle">
                        <span class="sr-only">Toggle Left Sidebar</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="nav-collapse">
                    <div class="nav navbar-nav navbar-right">
                        <button type="button" class="sidebar-buttons-toggle">
                            <span class="sr-only">Toggle Right Sidebar</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid window">
            <div class="tab-content full">
                <div class="tab-pane fade full" id="tab1">
                    <div class="row full"></div>
                </div>
                <div class="tab-pane fade full active in" id="tab2">
                    <div class="row full">
                        <div class="col-md-2 sidebar full">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="jstree_q">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            </div>
                            <div id="tree"></div>
                        </div>
                        <div class="col-md-10 content full">
                            <pre id="editor"></pre>
                        </div>
                    </div>             
                </div>
                <div class="tab-pane fade full" id="tab3">
                    <div class="row full">
                        <h1>TEST TAB 3</h1>
                    </div>
                </div>
                <div class="tab-pane fade full" id="tab4">
                    <div class="row full">
                        <div id="terminal">
                            <div id="output"></div>
                            <div id="command">
                                <div id="prompt">&gt;_</div>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade full" id="tab5">
                    <div class="row full"></div>
                </div>
                <div class="tab-pane fade full" id="tab6">
                    <div class="row full"></div>
                </div>
                <div class="tab-pane fade full" id="tab7">
                    <div class="row full">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h2>About LaraEdit</h2>
                            <p>LaraEdit is an open source Laravel package that allows users to develop their projects directly within Laravel. It contains a code editor with syntax highlighting and a terminal that allows users to run shell commands on the fly.</p>
                            
                            <p>LaraEdit is currently developed and maintained by me, Derek Bourgeois. And while I love the magic that Laravel brings to my projects, there is still a ton of work involved in building and maintaining this package.</p>
                            
                            <p>I currently have no plans to make any of the features paid and/or closed source, but I will gladly accept donations to help pay for expenses to keep it going.</p>

                            <p>If LaraEdit has helped you or your organization and you would like to donate to the cause, you can click the PayPal Donation button below.</p>

                            <p>While it is not required to use, edit, or modify LaraEdit, every donation will be greatly appreciated! Be sure to add your feature suggestions to your donation comments so I can help make LaraEdit the last IDE you'll ever need!</p>

                            <p>Sincerley,<br />
                            Derek Bourgeois</p>

                            <hr />

                            <center>
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="HXBVN3LTBMBWW">
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-fixed sidebar-buttons full">
                <ul class="nav nav-tabs nav-stacked">
                    <li>
                        <a href="#tab1" data-toggle="tab">
                            <span class="sr-only">LaraEdit Settings</span>
                            <i class="fa fa-cog"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#tab2" data-toggle="tab">
                            <span class="sr-only">Code Editor</span>
                            <i class="fa fa-code"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">
                            <span class="sr-only">Eloquent UI</span>
                            <i class="fa fa-database"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab">
                            <span class="sr-only">Terminal</span>
                            <i class="fa fa-terminal"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#tab5" data-toggle="tab">
                            <span class="sr-only">Laravel Configuration Manager</span>
                            <i class="fa fa-cogs"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#tab6" data-toggle="tab">
                            <span class="sr-only">Laravel Package Manager</span>
                            <i class="fa fa-truck"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#tab7" data-toggle="tab">
                            <span class="sr-only">About LaraEdit</span>
                            <i class="fa fa-beer"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/iBourgeois/LaraEdit/issues" target="_blank">
                            <span class="sr-only">LaraEdit Support</span>
                            <i class="fa fa-support"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <script src="{{asset('packages/ibourgeois/laraedit/js/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('packages/ibourgeois/laraedit/js/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('packages/ibourgeois/laraedit/js/jquery-ui/jquery-ui.min.js')}}"></script> 
        <script src="{{asset('packages/ibourgeois/laraedit/js/ace/ace.js')}}"></script>
        <script src="{{asset('packages/ibourgeois/laraedit/js/js-tree/jstree.min.js')}}"></script>
        <script src="{{asset('packages/ibourgeois/laraedit/js/terminal/system.js')}}"></script>
        <script src="{{asset('packages/ibourgeois/laraedit/js/laraedit/laraedit.js')}}"></script>
    </body>
</html>
