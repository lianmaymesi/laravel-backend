import{a as h}from"./prosemirror-state-ba2e3a6a.js";class f{constructor(l,e,t={}){this.match=l,this.match=l,this.handler=typeof e=="string"?m(e):e,this.undoable=t.undoable!==!1,this.inCode=t.inCode||!1}}function m(s){return function(l,e,t,r){let n=s;if(e[1]){let u=e[0].lastIndexOf(e[1]);n+=e[0].slice(u+e[1].length),t+=u;let o=t-r;o>0&&(n=e[0].slice(u-o,u)+n,t=r)}return l.tr.insertText(n,t,r)}}const x=500;function $({rules:s}){let l=new h({state:{init(){return null},apply(e,t){let r=e.getMeta(this);return r||(e.selectionSet||e.docChanged?null:t)}},props:{handleTextInput(e,t,r,n){return g(e,t,r,n,s,l)},handleDOMEvents:{compositionend:e=>{setTimeout(()=>{let{$cursor:t}=e.state.selection;t&&g(e,t.pos,t.pos,"",s,l)})}}},isInputRules:!0});return l}function g(s,l,e,t,r,n){if(s.composing)return!1;let u=s.state,o=u.doc.resolve(l),i=o.parent.textBetween(Math.max(0,o.parentOffset-x),o.parentOffset,null,"￼")+t;for(let c=0;c<r.length;c++){let a=r[c];if(o.parent.type.spec.code){if(!a.inCode)continue}else if(a.inCode==="only")continue;let d=a.match.exec(i),p=d&&a.handler(u,d,l-(d[0].length-t.length),e);if(p)return a.undoable&&p.setMeta(n,{transform:p,from:l,to:e,text:t}),s.dispatch(p),!0}return!1}const I=(s,l)=>{let e=s.plugins;for(let t=0;t<e.length;t++){let r=e[t],n;if(r.spec.isInputRules&&(n=r.getState(s))){if(l){let u=s.tr,o=n.transform;for(let i=o.steps.length-1;i>=0;i--)u.step(o.steps[i].invert(o.docs[i]));if(n.text){let i=u.doc.resolve(n.from).marks();u.replaceWith(n.from,n.to,s.schema.text(n.text,i))}else u.delete(n.from,n.to);l(u)}return!0}}return!1};new f(/--$/,"—");new f(/\.\.\.$/,"…");new f(/(?:^|[\s\{\[\(\<'"\u2018\u201C])(")$/,"“");new f(/"$/,"”");new f(/(?:^|[\s\{\[\(\<'"\u2018\u201C])(')$/,"‘");new f(/'$/,"’");export{f as I,$ as i,I as u};
