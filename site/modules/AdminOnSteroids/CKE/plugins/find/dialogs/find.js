﻿!function(){function t(t){return t.type==CKEDITOR.NODE_TEXT&&t.getLength()>0&&(!i||!t.isReadOnly())}function e(t){return!(t.type==CKEDITOR.NODE_ELEMENT&&t.isBlockBoundary(CKEDITOR.tools.extend({},CKEDITOR.dtd.$empty,CKEDITOR.dtd.$nonEditable)))}function a(t){var e,a,n,i;e="find"===t?1:0,a=1-e;var h,l=s.length;for(h=0;l>h;h++)n=this.getContentElement(r[e],s[h][e]),i=this.getContentElement(r[a],s[h][a]),i.setValue(n.getValue())}function n(n,r){function s(a,n){var i=this,h=new CKEDITOR.dom.walker(a);h.guard=n?e:function(t){!e(t)&&(i._.matchBoundary=!0)},h.evaluator=t,h.breakOnFalse=1,a.startContainer.type==CKEDITOR.NODE_TEXT&&(this.textNode=a.startContainer,this.offset=a.startOffset-1),this._={matchWord:n,walker:h,matchBoundary:!1}}function l(t,e){var a=n.createRange();return a.setStart(t.textNode,e?t.offset:t.offset+1),a.setEndAt(n.editable(),CKEDITOR.POSITION_BEFORE_END),a}function c(t){var e=n.createRange();return e.setStartAt(n.editable(),CKEDITOR.POSITION_AFTER_START),e.setEnd(t.textNode,t.offset),e}function o(t){var e,a=n.getSelection(),i=a.getRanges()[0],h=n.editable();return i&&!t?(e=i.clone(),e.collapse(!0)):(e=n.createRange(),e.setStartAt(h,CKEDITOR.POSITION_AFTER_START)),e.setEndAt(h,CKEDITOR.POSITION_BEFORE_END),e}var g={attributes:{"data-cke-highlight":1},fullMatch:1,ignoreReadonly:1,childRule:function(){return 0}},d=new CKEDITOR.style(CKEDITOR.tools.extend(g,n.config.find_highlight,!0));s.prototype={next:function(){return this.move()},back:function(){return this.move(!0)},move:function(t){var e=this.textNode;if(null===e)return h.call(this);if(this._.matchBoundary=!1,e&&t&&this.offset>0)return this.offset--,h.call(this);if(e&&this.offset<e.getLength()-1)return this.offset++,h.call(this);for(e=null;!(e||(e=this._.walker[t?"previous":"next"].call(this._.walker),this._.matchWord&&!e||this._.walker._.end)););return this.textNode=e,e?this.offset=t?e.getLength()-1:0:this.offset=0,h.call(this)}};var u=function(t,e){this._={walker:t,cursors:[],rangeLength:e,highlightRange:null,isMatched:0}};u.prototype={toDomRange:function(){var t=n.createRange(),e=this._.cursors;if(e.length<1){var a=this._.walker.textNode;if(!a)return null;t.setStartAfter(a)}else{var i=e[0],h=e[e.length-1];t.setStart(i.textNode,i.offset),t.setEnd(h.textNode,h.offset+1)}return t},updateFromDomRange:function(t){var e,a=new s(t);this._.cursors=[];do e=a.next(),e.character&&this._.cursors.push(e);while(e.character);this._.rangeLength=this._.cursors.length},setMatched:function(){this._.isMatched=!0},clearMatched:function(){this._.isMatched=!1},isMatched:function(){return this._.isMatched},highlight:function(){if(!(this._.cursors.length<1)){this._.highlightRange&&this.removeHighlight();var t=this.toDomRange(),e=t.createBookmark();d.applyToRange(t,n),t.moveToBookmark(e),this._.highlightRange=t;var a=t.startContainer;a.type!=CKEDITOR.NODE_ELEMENT&&(a=a.getParent()),a.scrollIntoView(),this.updateFromDomRange(t)}},removeHighlight:function(){if(this._.highlightRange){var t=this._.highlightRange.createBookmark();d.removeFromRange(this._.highlightRange,n),this._.highlightRange.moveToBookmark(t),this.updateFromDomRange(this._.highlightRange),this._.highlightRange=null}},isReadOnly:function(){return this._.highlightRange?this._.highlightRange.startContainer.isReadOnly():0},moveBack:function(){var t=this._.walker.back(),e=this._.cursors;return t.hitMatchBoundary&&(this._.cursors=e=[]),e.unshift(t),e.length>this._.rangeLength&&e.pop(),t},moveNext:function(){var t=this._.walker.next(),e=this._.cursors;return t.hitMatchBoundary&&(this._.cursors=e=[]),e.push(t),e.length>this._.rangeLength&&e.shift(),t},getEndCharacter:function(){var t=this._.cursors;return t.length<1?null:t[t.length-1].character},getNextCharacterRange:function(t){var e,a,n=this._.cursors;return a=(e=n[n.length-1])&&e.textNode?new s(l(e)):this._.walker,new u(a,t)},getCursors:function(){return this._.cursors}};var f=0,R=1,p=2,m=function(t,e){var a=[-1];e&&(t=t.toLowerCase());for(var n=0;n<t.length;n++)for(a.push(a[n]+1);a[n+1]>0&&t.charAt(n)!=t.charAt(a[n+1]-1);)a[n+1]=a[a[n+1]-1]+1;this._={overlap:a,state:0,ignoreCase:!!e,pattern:t}};m.prototype={feedCharacter:function(t){for(this._.ignoreCase&&(t=t.toLowerCase());;){if(t==this._.pattern.charAt(this._.state))return this._.state++,this._.state==this._.pattern.length?(this._.state=0,p):R;if(!this._.state)return f;this._.state=this._.overlap[this._.state]}},reset:function(){this._.state=0}};var C=/[.,"'?!;: \u0085\u00a0\u1680\u280e\u2028\u2029\u202f\u205f\u3000]/,x=function(t){if(!t)return!0;var e=t.charCodeAt(0);return e>=9&&13>=e||e>=8192&&8202>=e||C.test(t)},_={searchRange:null,matchRange:null,find:function(t,e,a,n,i,h){this.matchRange?(this.matchRange.removeHighlight(),this.matchRange=this.matchRange.getNextCharacterRange(t.length)):this.matchRange=new u(new s(this.searchRange),t.length);for(var r=new m(t,!e),g=f,d="%";null!==d;){for(this.matchRange.moveNext();(d=this.matchRange.getEndCharacter())&&(g=r.feedCharacter(d),g!=p);)this.matchRange.moveNext().hitMatchBoundary&&r.reset();if(g==p){if(a){var R=this.matchRange.getCursors(),C=R[R.length-1],_=R[0],v=c(_),y=l(C);v.trim(),y.trim();var O=new s(v,!0),E=new s(y,!0);if(!x(O.back().character)||!x(E.next().character))continue}return this.matchRange.setMatched(),i!==!1&&this.matchRange.highlight(),!0}}return this.matchRange.clearMatched(),this.matchRange.removeHighlight(),n&&!h?(this.searchRange=o(1),this.matchRange=null,arguments.callee.apply(this,Array.prototype.slice.call(arguments).concat([!0]))):!1},replaceCounter:0,replace:function(t,e,a,h,r,s,l){i=1;var c=0,o=this.hasMatchOptionsChanged(e,h,r);if(!this.matchRange||!this.matchRange.isMatched()||this.matchRange._.isReplaced||this.matchRange.isReadOnly()||o)o&&this.matchRange&&(this.matchRange.clearMatched(),this.matchRange.removeHighlight(),this.matchRange=null),c=this.find(e,h,r,s,!l);else{this.matchRange.removeHighlight();var g=this.matchRange.toDomRange(),d=n.document.createText(a);if(!l){var u=n.getSelection();u.selectRanges([g]),n.fire("saveSnapshot")}g.deleteContents(),g.insertNode(d),l||(u.selectRanges([g]),n.fire("saveSnapshot")),this.matchRange.updateFromDomRange(g),l||this.matchRange.highlight(),this.matchRange._.isReplaced=!0,this.replaceCounter++,c=1}return i=0,c},matchOptions:null,hasMatchOptionsChanged:function(t,e,a){var n=[t,e,a].join("."),i=this.matchOptions&&this.matchOptions!=n;return this.matchOptions=n,i}},v=n.lang.find;return{title:v.title,resizable:CKEDITOR.DIALOG_RESIZE_NONE,minWidth:350,minHeight:170,buttons:[CKEDITOR.dialog.cancelButton(n,{label:n.lang.common.close})],contents:[{id:"find",label:v.find,title:v.find,accessKey:"",elements:[{type:"hbox",widths:["230px","90px"],children:[{type:"text",id:"txtFindFind",label:v.findWhat,isChanged:!1,labelLayout:"horizontal",accessKey:"F"},{type:"button",id:"btnFind",align:"left",style:"width:100%",label:v.find,onClick:function(){var t=this.getDialog();_.find(t.getValueOf("find","txtFindFind"),t.getValueOf("find","txtFindCaseChk"),t.getValueOf("find","txtFindWordChk"),t.getValueOf("find","txtFindCyclic"))||alert(v.notFoundMsg)}}]},{type:"fieldset",label:CKEDITOR.tools.htmlEncode(v.findOptions),style:"margin-top:29px",children:[{type:"vbox",padding:0,children:[{type:"checkbox",id:"txtFindCaseChk",isChanged:!1,label:v.matchCase},{type:"checkbox",id:"txtFindWordChk",isChanged:!1,label:v.matchWord},{type:"checkbox",id:"txtFindCyclic",isChanged:!1,"default":!0,label:v.matchCyclic}]}]}]},{id:"replace",label:v.replace,accessKey:"M",elements:[{type:"hbox",widths:["230px","90px"],children:[{type:"text",id:"txtFindReplace",label:v.findWhat,isChanged:!1,labelLayout:"horizontal",accessKey:"F"},{type:"button",id:"btnFindReplace",align:"left",style:"width:100%",label:v.replace,onClick:function(){var t=this.getDialog();_.replace(t,t.getValueOf("replace","txtFindReplace"),t.getValueOf("replace","txtReplace"),t.getValueOf("replace","txtReplaceCaseChk"),t.getValueOf("replace","txtReplaceWordChk"),t.getValueOf("replace","txtReplaceCyclic"))||alert(v.notFoundMsg)}}]},{type:"hbox",widths:["230px","90px"],children:[{type:"text",id:"txtReplace",label:v.replaceWith,isChanged:!1,labelLayout:"horizontal",accessKey:"R"},{type:"button",id:"btnReplaceAll",align:"left",style:"width:100%",label:v.replaceAll,isChanged:!1,onClick:function(){var t=this.getDialog();for(_.replaceCounter=0,_.searchRange=o(1),_.matchRange&&(_.matchRange.removeHighlight(),_.matchRange=null),n.fire("saveSnapshot");_.replace(t,t.getValueOf("replace","txtFindReplace"),t.getValueOf("replace","txtReplace"),t.getValueOf("replace","txtReplaceCaseChk"),t.getValueOf("replace","txtReplaceWordChk"),!1,!0););_.replaceCounter?(alert(v.replaceSuccessMsg.replace(/%1/,_.replaceCounter)),n.fire("saveSnapshot")):alert(v.notFoundMsg)}}]},{type:"fieldset",label:CKEDITOR.tools.htmlEncode(v.findOptions),children:[{type:"vbox",padding:0,children:[{type:"checkbox",id:"txtReplaceCaseChk",isChanged:!1,label:v.matchCase},{type:"checkbox",id:"txtReplaceWordChk",isChanged:!1,label:v.matchWord},{type:"checkbox",id:"txtReplaceCyclic",isChanged:!1,"default":!0,label:v.matchCyclic}]}]}]}],onLoad:function(){var t,e,n=this,i=0;this.on("hide",function(){i=0}),this.on("show",function(){i=1}),this.selectPage=CKEDITOR.tools.override(this.selectPage,function(h){return function(r){h.call(n,r);var s,l,c,o=n._.tabs[r];l="find"===r?"txtFindFind":"txtFindReplace",c="find"===r?"txtFindWordChk":"txtReplaceWordChk",t=n.getContentElement(r,l),e=n.getContentElement(r,c),o.initialized||(s=CKEDITOR.document.getById(t._.inputId),o.initialized=!0),i&&a.call(this,r)}})},onShow:function(){_.searchRange=o();var t=this.getParentEditor().getSelection().getSelectedText(),e="find"==r?"txtFindFind":"txtFindReplace",a=this.getContentElement(r,e);a.setValue(t),a.select(),this.selectPage(r),this[("find"==r&&this._.editor.readOnly?"hide":"show")+"Page"]("replace")},onHide:function(){var t;_.matchRange&&_.matchRange.isMatched()&&(_.matchRange.removeHighlight(),n.focus(),t=_.matchRange.toDomRange(),t&&n.getSelection().selectRanges([t])),delete _.matchRange},onFocus:function(){return"replace"==r?this.getContentElement("replace","txtFindReplace"):this.getContentElement("find","txtFindFind")}}}var i,h=function(){return{textNode:this.textNode,offset:this.offset,character:this.textNode?this.textNode.getText().charAt(this.offset):null,hitMatchBoundary:this._.matchBoundary}},r=["find","replace"],s=[["txtFindFind","txtFindReplace"],["txtFindCaseChk","txtReplaceCaseChk"],["txtFindWordChk","txtReplaceWordChk"],["txtFindCyclic","txtReplaceCyclic"]];CKEDITOR.dialog.add("find",function(t){return n(t,"find")}),CKEDITOR.dialog.add("replace",function(t){return n(t,"replace")})}();