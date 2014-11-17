var jsFile;
$( document ).ready(function() {
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/artisanedit");
    document.getElementById('editor').style.fontSize='14pt';
    document.getElementById('editor').style.fontFamily='Source Code Pro';
    document.getElementById('editor').style.fontWeight='200';
    editor.getSession().setUseWrapMode(true);
    editor.commands.addCommand({
        name: "save",
        bindKey: { win: "Ctrl-s", mac: "Command-s"},
        exec: function(editor) {
        var jsVar = editor.getValue();
        $.post("laraedit/save", { file: jsFile, contents: jsVar} );
            alert("File saved!");
        },
        readOnly: false
    });
});

$(function() {
    $(".sidebar-toggle").click(function() {
        $(".sidebar").toggleClass("hidden").toggleClass('col-md-2');
        $(".content").toggleClass("col-md-12").toggleClass('col-md-10');
    });
    $(".sidebar-buttons-toggle").click(function() {
        $(".sidebar-buttons").toggleClass("hidden");
        $(".window .row").toggleClass("row-gain");
    });
});

 $(function () {
            var editor = ace.edit("editor");
            $(window).resize(function () {
                var h = Math.max($(window).height() - 0, 420);
                $('#container, #data, #tree, #data .content').height(h).filter('.default').css('lineHeight', h + 'px');
            }).resize();

            $('#tree')
                .jstree({
                    'core' : {
                        'data' : {
                            'url' : '?operation=get_node',
                            'data' : function (node) {
                                return { 'id' : node.id };
                            }
                        },
                        'check_callback' : function(o, n, p, i, m) {
                            if(m && m.dnd && m.pos !== 'i') { return false; }
                            if(o === "move_node" || o === "copy_node") {
                                if(this.get_node(n).parent === this.get_node(p).id) { return false; }
                            }
                            return true;
                        },
                        'themes' : {
                            'name' : 'default-dark',
                            'responsive' : false,
                            'variant' : 'small',
                            'stripes' : false,
                            'dots' : false,
                            'icons' : true
                        }
                    },
                    'sort' : function(a, b) {
                        return this.get_type(a) === this.get_type(b) ? (this.get_text(a) > this.get_text(b) ? 1 : -1) : (this.get_type(a) >= this.get_type(b) ? 1 : -1);
                    },
                    'contextmenu' : {
                        'items' : function(node) {
                            var tmp = $.jstree.defaults.contextmenu.items();
                            delete tmp.create.action;
                            tmp.create.label = "New";
                            tmp.create.submenu = {
                                "create_folder" : {
                                    "separator_after"   : true,
                                    "label"             : "Folder",
                                    "action"            : function (data) {
                                        var inst = $.jstree.reference(data.reference),
                                            obj = inst.get_node(data.reference);
                                        inst.create_node(obj, { type : "default" }, "last", function (new_node) {
                                            setTimeout(function () { inst.edit(new_node); },0);
                                        });
                                    }
                                },
                                "create_file" : {
                                    "label"             : "File",
                                    "action"            : function (data) {
                                        var inst = $.jstree.reference(data.reference),
                                            obj = inst.get_node(data.reference);
                                        inst.create_node(obj, { type : "file" }, "last", function (new_node) {
                                            setTimeout(function () { inst.edit(new_node); },0);
                                        });
                                    }
                                }
                            };
                            if(this.get_type(node) === "file") {
                                delete tmp.create;
                            }
                            return tmp;
                        }
                    },
                    'types' : {
                        'default' : { 'icon' : 'folder' },
                        'file' : { 'valid_children' : [], 'icon' : 'file' }
                    },
                    'unique' : {
                        'duplicate' : function (name, counter) {
                            return name + ' ' + counter;
                        }
                    },
                    'plugins' : ['state','dnd','sort','types','contextmenu','unique', 'wholerow', 'search']
                })
                .on('delete_node.jstree', function (e, data) {
                    $.get('?operation=delete_node', { 'id' : data.node.id })
                        .fail(function () {
                            data.instance.refresh();
                        });
                })
                .on('create_node.jstree', function (e, data) {
                    $.get('?operation=create_node', { 'type' : data.node.type, 'id' : data.node.parent, 'text' : data.node.text })
                        .done(function (d) {
                            data.instance.set_id(data.node, d.id);
                        })
                        .fail(function () {
                            data.instance.refresh();
                        });
                })
                .on('rename_node.jstree', function (e, data) {
                    $.get('?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
                        .done(function (d) {
                            data.instance.set_id(data.node, d.id);
                        })
                        .fail(function () {
                            data.instance.refresh();
                        });
                })
                .on('move_node.jstree', function (e, data) {
                    $.get('?operation=move_node', { 'id' : data.node.id, 'parent' : data.parent })
                        .done(function (d) {
                            //data.instance.load_node(data.parent);
                            data.instance.refresh();
                        })
                        .fail(function () {
                            data.instance.refresh();
                        });
                })
                .on('copy_node.jstree', function (e, data) {
                    $.get('?operation=copy_node', { 'id' : data.original.id, 'parent' : data.parent })
                        .done(function (d) {
                            //data.instance.load_node(data.parent);
                            data.instance.refresh();
                        })
                        .fail(function () {
                            data.instance.refresh();
                        });
                })
                .on('changed.jstree', function (e, data) {
                    if(data && data.selected && data.selected.length) {
                        $.get('?operation=get_content&id=' + data.selected.join(':'), function (d) {
                            if(d && typeof d.type !== 'undefined') {
                                $('#data .content').hide();
                                switch(d.type) {
                                    case 'text':
                                        editor.getSession().setMode("ace/mode/text");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'txt':
                                        editor.getSession().setMode("ace/mode/text");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'md':
                                        editor.getSession().setMode("ace/mode/markdown");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'yml':
                                        editor.getSession().setMode("ace/mode/yml");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'htaccess':
                                    case 'log':
                                    case 'sql':
                                        editor.getSession().setMode("ace/mode/sql");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'php':
                                        editor.getSession().setMode("ace/mode/php");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'js':
                                        editor.getSession().setMode("ace/mode/javascript");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'json':
                                        editor.getSession().setMode("ace/mode/json");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'css':
                                        editor.getSession().setMode("ace/mode/css");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'html':
                                        editor.getSession().setMode("ace/mode/html");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'xml':
                                        editor.getSession().setMode("ace/mode/xml");
                                        editor.setValue(d.content);
                                        editor.gotoLine(0);
                                        editor.focus();
                                        jsFile = data.node.id;
                                        break;
                                    case 'png':
                                    case 'jpg':
                                    case 'jpeg':
                                    case 'bmp':
                                    case 'gif':
                                        $('#data .image img').one('load', function () { $(this).css({'marginTop':'-' + $(this).height()/2 + 'px','marginLeft':'-' + $(this).width()/2 + 'px'}); }).attr('src',d.content);
                                        $('#data .image').show();
                                        break;
                                    default:
                                        $('#data .default').html(d.content).show();
                                        break;
                                }
                            }
                        });
                    }
                    else {
                        $('#data .content').hide();
                        $('#data .default').html('Select a file from the tree.').show();
                    }
                });
                var to = false;
                $('#jstree_q').keyup(function () {
                    if(to) { clearTimeout(to); }
                    to = setTimeout(function () {
                        var v = $('#jstree_q').val();
                        $('#tree').jstree(true).search(v);
                    }, 250);
                });
            //});
        });