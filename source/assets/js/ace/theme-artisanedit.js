ace.define("ace/theme/artisanedit",["require","exports","module","ace/lib/dom"], function(require, exports, module) {

exports.isDark = false;
exports.cssClass = "ace-artisanedit";
exports.cssText = "\
.ace-artisanedit .ace_gutter {\
background: #515B6A;\
color: #747A83;\
}\
.ace-artisanedit  {\
background: #515B6A;\
color: #FFFFFF;\
}\
.ace-artisanedit .ace_keyword {\
font-weight: bold;\
}\
.ace-artisanedit .ace_string {\
color: #F56D59;\
}\
.ace-artisanedit .ace_variable.ace_class {\
color: #F56D59;\
}\
.ace-artisanedit .ace_constant.ace_numeric {\
color: #F56D59;\
}\
.ace-artisanedit .ace_constant.ace_buildin {\
color: #F56D59;\
}\
.ace-artisanedit .ace_support.ace_function {\
color: #F56D59;\
}\
.ace-artisanedit .ace_comment {\
color: #998;\
font-style: italic;\
}\
.ace-artisanedit .ace_variable.ace_language  {\
color: #F56D59;\
}\
.ace-artisanedit .ace_paren {\
color: #F56D59;\
}\
.ace-artisanedit .ace_boolean {\
color: #F56D59;\
}\
.ace-artisanedit .ace_string.ace_regexp {\
color: #009926;\
font-weight: normal;\
}\
.ace-artisanedit .ace_variable.ace_instance {\
color: teal;\
}\
.ace-artisanedit .ace_constant.ace_language {\
color: #F56D59;\
}\
.ace-artisanedit .ace_cursor {\
color: #FFFFFF;\
}\
.ace-artisanedit .ace_marker-layer .ace_active-line {\
background: rgba(0, 0, 0, 0.07);\
}\
.ace-artisanedit .ace_marker-layer .ace_selection {\
background: rgb(181, 213, 255);\
}\
.ace-artisanedit.ace_multiselect .ace_selection.ace_start {\
box-shadow: 0 0 3px 0px white;\
border-radius: 2px;\
}\
.ace-artisanedit.ace_nobold .ace_line > span {\
font-weight: normal !important;\
}\
.ace-artisanedit .ace_marker-layer .ace_step {\
background: rgb(252, 255, 0);\
}\
.ace-artisanedit .ace_marker-layer .ace_stack {\
background: rgb(164, 229, 101);\
}\
.ace-artisanedit .ace_marker-layer .ace_bracket {\
margin: -1px 0 0 -1px;\
border: 1px solid rgb(192, 192, 192);\
}\
.ace-artisanedit .ace_gutter-active-line {\
background-color : rgba(0, 0, 0, 0.07);\
}\
.ace-artisanedit .ace_marker-layer .ace_selected-word {\
background: rgb(250, 250, 255);\
border: 1px solid rgb(200, 200, 250);\
}\
.ace-artisanedit .ace_print-margin {\
width: 0px;\
background: #e8e8e8;\
}\
.ace-artisanedit .ace_indent-guide {\
background: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAEklEQVQImWPQ0FD0ZXBzd/wPAAjVAoxeSgNeAAAAAElFTkSuQmCC\") right repeat-y;\
}";

    var dom = require("../lib/dom");
    dom.importCssString(exports.cssText, exports.cssClass);
});
