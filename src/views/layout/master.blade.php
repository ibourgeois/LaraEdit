<!DOCTYPE html>
<html lang="en" class="full">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>LaraEdit</title>

        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/css/bootstrap/bootstrap.min.css')}}">
        
        <!-- // Replace with local versions... 
        
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:200,400' rel='stylesheet' type='text/css'>
        
        <!-- // Upload stylesheets and update path(s)
        
        <link rel="stylesheet" href="assets/js/js-tree/themes/default-dark/style.min.css" />
        <link rel="stylesheet" href="assets/css/terminal/screen.css">
        
        -->

        <link rel="stylesheet" href="{{asset('packages/ibourgeois/laraedit/css/laraedit/laraedit.css')}}">

        <!--[if lt IE 9]> // Replace with local versions
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="full">        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="sidebar-toggle">
                        <span class="sr-only">Toggle Sidebar</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="nav-collapse">
                    <div class="nav navbar-nav navbar-right">
                        <button type="button" class="sidebar-buttons-toggle">
                            <span class="sr-only">Toggle Sidebar</span>
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
                    <div class="row full"><h1>TEST TAB 3</h1></div>
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
            </div>
            <div class="col-fixed sidebar-buttons full">
                <ul class="nav nav-tabs nav-stacked">
                    <li><a href="#tab1" data-toggle="tab"><i class="fa fa-cog"></i></a></li>
                    <li class="active"><a href="#tab2" data-toggle="tab"><i class="fa fa-code"></i></a></li>
                    <li><a href="#tab3" data-toggle="tab"><i class="fa fa-database"></i></a></li>
                    <li><a href="#tab4" data-toggle="tab"><i class="fa fa-terminal"></i></a></li>
                    <li><a href="#tab5" data-toggle="tab"><i class="fa fa-cogs"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- // Replace with local versions
        
        <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        
        <!-- // Upload JS files and update path(s)

        <script src="assets/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>\
        <script src="assets/js/js-tree/jstree.min.js"></script>
        <script src="assets/js/terminal/system.js"></script>
        <script src="foot.js"></script>

        -->

    </body>
</html>