import{f as P,r as v,R,a as D,l as h,c as A}from"./prosemirror-transform-b4404ce6.js";import{F as S,a as B}from"./prosemirror-model-3f3367be.js";import{S as C,N as b,A as M,T as V}from"./prosemirror-state-ba2e3a6a.js";const F=(t,e)=>t.selection.empty?!1:(e&&e(t.tr.deleteSelection().scrollIntoView()),!0);function K(t,e){let{$cursor:n}=t.selection;return!n||(e?!e.endOfTextblock("backward",t):n.parentOffset>0)?null:n}const q=(t,e,n)=>{let r=K(t,n);if(!r)return!1;let l=E(r);if(!l){let i=r.blockRange(),f=i&&h(i);return f==null?!1:(e&&e(t.tr.lift(i,f).scrollIntoView()),!0)}let o=l.nodeBefore;if(!o.type.spec.isolating&&$(t,l,e))return!0;if(r.parent.content.size==0&&(w(o,"end")||b.isSelectable(o))){let i=v(t.doc,r.before(),r.after(),B.empty);if(i&&i.slice.size<i.to-i.from){if(e){let f=t.tr.step(i);f.setSelection(w(o,"end")?C.findFrom(f.doc.resolve(f.mapping.map(l.pos,-1)),-1):b.create(f.doc,l.pos-o.nodeSize)),e(f.scrollIntoView())}return!0}}return o.isAtom&&l.depth==r.depth-1?(e&&e(t.tr.delete(l.pos-o.nodeSize,l.pos).scrollIntoView()),!0):!1};function w(t,e,n=!1){for(let r=t;r;r=e=="start"?r.firstChild:r.lastChild){if(r.isTextblock)return!0;if(n&&r.childCount!=1)return!1}return!1}const H=(t,e,n)=>{let{$head:r,empty:l}=t.selection,o=r;if(!l)return!1;if(r.parent.isTextblock){if(n?!n.endOfTextblock("backward",t):r.parentOffset>0)return!1;o=E(r)}let i=o&&o.nodeBefore;return!i||!b.isSelectable(i)?!1:(e&&e(t.tr.setSelection(b.create(t.doc,o.pos-i.nodeSize)).scrollIntoView()),!0)};function E(t){if(!t.parent.type.spec.isolating)for(let e=t.depth-1;e>=0;e--){if(t.index(e)>0)return t.doc.resolve(t.before(e+1));if(t.node(e).type.spec.isolating)break}return null}function J(t,e){let{$cursor:n}=t.selection;return!n||(e?!e.endOfTextblock("forward",t):n.parentOffset<n.parent.content.size)?null:n}const G=(t,e,n)=>{let r=J(t,n);if(!r)return!1;let l=j(r);if(!l)return!1;let o=l.nodeAfter;if($(t,l,e))return!0;if(r.parent.content.size==0&&(w(o,"start")||b.isSelectable(o))){let i=v(t.doc,r.before(),r.after(),B.empty);if(i&&i.slice.size<i.to-i.from){if(e){let f=t.tr.step(i);f.setSelection(w(o,"start")?C.findFrom(f.doc.resolve(f.mapping.map(l.pos)),1):b.create(f.doc,f.mapping.map(l.pos))),e(f.scrollIntoView())}return!0}}return o.isAtom&&l.depth==r.depth-1?(e&&e(t.tr.delete(l.pos,l.pos+o.nodeSize).scrollIntoView()),!0):!1},L=(t,e,n)=>{let{$head:r,empty:l}=t.selection,o=r;if(!l)return!1;if(r.parent.isTextblock){if(n?!n.endOfTextblock("forward",t):r.parentOffset<r.parent.content.size)return!1;o=j(r)}let i=o&&o.nodeAfter;return!i||!b.isSelectable(i)?!1:(e&&e(t.tr.setSelection(b.create(t.doc,o.pos)).scrollIntoView()),!0)};function j(t){if(!t.parent.type.spec.isolating)for(let e=t.depth-1;e>=0;e--){let n=t.node(e);if(t.index(e)+1<n.childCount)return t.doc.resolve(t.after(e+1));if(n.type.spec.isolating)break}return null}const Q=(t,e)=>{let{$head:n,$anchor:r}=t.selection;return!n.parent.type.spec.code||!n.sameParent(r)?!1:(e&&e(t.tr.insertText(`
`).scrollIntoView()),!0)};function T(t){for(let e=0;e<t.edgeCount;e++){let{type:n}=t.edge(e);if(n.isTextblock&&!n.hasRequiredAttrs())return n}return null}const U=(t,e)=>{let{$head:n,$anchor:r}=t.selection;if(!n.parent.type.spec.code||!n.sameParent(r))return!1;let l=n.node(-1),o=n.indexAfter(-1),i=T(l.contentMatchAt(o));if(!i||!l.canReplaceWith(o,o,i))return!1;if(e){let f=n.after(),a=t.tr.replaceWith(f,f,i.createAndFill());a.setSelection(C.near(a.doc.resolve(f),1)),e(a.scrollIntoView())}return!0},X=(t,e)=>{let n=t.selection,{$from:r,$to:l}=n;if(n instanceof M||r.parent.inlineContent||l.parent.inlineContent)return!1;let o=T(l.parent.contentMatchAt(l.indexAfter()));if(!o||!o.isTextblock)return!1;if(e){let i=(!r.parentOffset&&l.index()<l.parent.childCount?r:l).pos,f=t.tr.insert(i,o.createAndFill());f.setSelection(V.create(f.doc,i+1)),e(f.scrollIntoView())}return!0},Y=(t,e)=>{let{$cursor:n}=t.selection;if(!n||n.parent.content.size)return!1;if(n.depth>1&&n.after()!=n.end(-1)){let o=n.before();if(A(t.doc,o))return e&&e(t.tr.split(o).scrollIntoView()),!0}let r=n.blockRange(),l=r&&h(r);return l==null?!1:(e&&e(t.tr.lift(r,l).scrollIntoView()),!0)};function Z(t){return(e,n)=>{let{$from:r,$to:l}=e.selection;if(e.selection instanceof b&&e.selection.node.isBlock)return!r.parentOffset||!A(e.doc,r.pos)?!1:(n&&n(e.tr.split(r.pos).scrollIntoView()),!0);if(!r.parent.isBlock)return!1;if(n){let o=l.parentOffset==l.parent.content.size,i=e.tr;(e.selection instanceof V||e.selection instanceof M)&&i.deleteSelection();let f=r.depth==0?null:T(r.node(-1).contentMatchAt(r.indexAfter(-1))),a=t&&t(l.parent,o),s=a?[a]:o&&f?[{type:f}]:void 0,p=A(i.doc,i.mapping.map(r.pos),1,s);if(!s&&!p&&A(i.doc,i.mapping.map(r.pos),1,f?[{type:f}]:void 0)&&(f&&(s=[{type:f}]),p=!0),p&&(i.split(i.mapping.map(r.pos),1,s),!o&&!r.parentOffset&&r.parent.type!=f)){let c=i.mapping.map(r.before()),u=i.doc.resolve(c);f&&r.node(-1).canReplaceWith(u.index(),u.index()+1,f)&&i.setNodeMarkup(i.mapping.map(r.before()),f)}n(i.scrollIntoView())}return!0}}const _=Z(),ee=(t,e)=>(e&&e(t.tr.setSelection(new M(t.doc))),!0);function te(t,e,n){let r=e.nodeBefore,l=e.nodeAfter,o=e.index();return!r||!l||!r.type.compatibleContent(l.type)?!1:!r.content.size&&e.parent.canReplace(o-1,o)?(n&&n(t.tr.delete(e.pos-r.nodeSize,e.pos).scrollIntoView()),!0):!e.parent.canReplace(o,o+1)||!(l.isTextblock||D(t.doc,e.pos))?!1:(n&&n(t.tr.clearIncompatible(e.pos,r.type,r.contentMatchAt(r.childCount)).join(e.pos).scrollIntoView()),!0)}function $(t,e,n){let r=e.nodeBefore,l=e.nodeAfter,o,i;if(r.type.spec.isolating||l.type.spec.isolating)return!1;if(te(t,e,n))return!0;let f=e.parent.canReplace(e.index(),e.index()+1);if(f&&(o=(i=r.contentMatchAt(r.childCount)).findWrapping(l.type))&&i.matchType(o[0]||l.type).validEnd){if(n){let c=e.pos+l.nodeSize,u=S.empty;for(let m=o.length-1;m>=0;m--)u=S.from(o[m].create(null,u));u=S.from(r.copy(u));let d=t.tr.step(new R(e.pos-1,c,e.pos,c,new B(u,1,0),o.length,!0)),g=c+2*o.length;D(d.doc,g)&&d.join(g),n(d.scrollIntoView())}return!0}let a=C.findFrom(e,1),s=a&&a.$from.blockRange(a.$to),p=s&&h(s);if(p!=null&&p>=e.depth)return n&&n(t.tr.lift(s,p).scrollIntoView()),!0;if(f&&w(l,"start",!0)&&w(r,"end")){let c=r,u=[];for(;u.push(c),!c.isTextblock;)c=c.lastChild;let d=l,g=1;for(;!d.isTextblock;d=d.firstChild)g++;if(c.canReplace(c.childCount,c.childCount,d.content)){if(n){let m=S.empty;for(let x=u.length-1;x>=0;x--)m=S.from(u[x].copy(m));let y=t.tr.step(new R(e.pos-u.length,e.pos+l.nodeSize,e.pos+g,e.pos+l.nodeSize-g,new B(m,u.length,0),0,!0));n(y.scrollIntoView())}return!0}}return!1}function W(t){return function(e,n){let r=e.selection,l=t<0?r.$from:r.$to,o=l.depth;for(;l.node(o).isInline;){if(!o)return!1;o--}return l.node(o).isTextblock?(n&&n(e.tr.setSelection(V.create(e.doc,t<0?l.start(o):l.end(o)))),!0):!1}}const re=W(-1),ne=W(1);function ae(t,e=null){return function(n,r){let{$from:l,$to:o}=n.selection,i=l.blockRange(o),f=i&&P(i,t,e);return f?(r&&r(n.tr.wrap(i,f).scrollIntoView()),!0):!1}}function se(t,e=null){return function(n,r){let l=!1;for(let o=0;o<n.selection.ranges.length&&!l;o++){let{$from:{pos:i},$to:{pos:f}}=n.selection.ranges[o];n.doc.nodesBetween(i,f,(a,s)=>{if(l)return!1;if(!(!a.isTextblock||a.hasMarkup(t,e)))if(a.type==t)l=!0;else{let p=n.doc.resolve(s),c=p.index();l=p.parent.canReplaceWith(c,c+1,t)}})}if(!l)return!1;if(r){let o=n.tr;for(let i=0;i<n.selection.ranges.length;i++){let{$from:{pos:f},$to:{pos:a}}=n.selection.ranges[i];o.setBlockType(f,a,t,e)}r(o.scrollIntoView())}return!0}}function le(t,e,n){for(let r=0;r<e.length;r++){let{$from:l,$to:o}=e[r],i=l.depth==0?t.inlineContent&&t.type.allowsMarkType(n):!1;if(t.nodesBetween(l.pos,o.pos,f=>{if(i)return!1;i=f.inlineContent&&f.type.allowsMarkType(n)}),i)return!0}return!1}function ue(t,e=null){return function(n,r){let{empty:l,$cursor:o,ranges:i}=n.selection;if(l&&!o||!le(n.doc,i,t))return!1;if(r)if(o)t.isInSet(n.storedMarks||o.marks())?r(n.tr.removeStoredMark(t)):r(n.tr.addStoredMark(t.create(e)));else{let f=!1,a=n.tr;for(let s=0;!f&&s<i.length;s++){let{$from:p,$to:c}=i[s];f=n.doc.rangeHasMark(p.pos,c.pos,t)}for(let s=0;s<i.length;s++){let{$from:p,$to:c}=i[s];if(f)a.removeMark(p.pos,c.pos,t);else{let u=p.pos,d=c.pos,g=p.nodeAfter,m=c.nodeBefore,y=g&&g.isText?/^\s*/.exec(g.text)[0].length:0,x=m&&m.isText?/\s*$/.exec(m.text)[0].length:0;u+y<d&&(u+=y,d-=x),a.addMark(u,d,t.create(e))}}r(a.scrollIntoView())}return!0}}function z(...t){return function(e,n,r){for(let l=0;l<t.length;l++)if(t[l](e,n,r))return!0;return!1}}let I=z(F,q,H),O=z(F,G,L);const k={Enter:z(Q,X,Y,_),"Mod-Enter":U,Backspace:I,"Mod-Backspace":I,"Shift-Backspace":I,Delete:O,"Mod-Delete":O,"Mod-a":ee},N={"Ctrl-h":k.Backspace,"Alt-Backspace":k["Mod-Backspace"],"Ctrl-d":k.Delete,"Ctrl-Alt-Backspace":k["Mod-Delete"],"Alt-Delete":k["Mod-Delete"],"Alt-d":k["Mod-Delete"],"Ctrl-a":re,"Ctrl-e":ne};for(let t in k)N[t]=k[t];const oe=typeof navigator<"u"?/Mac|iP(hone|[oa]d)/.test(navigator.platform):typeof os<"u"&&os.platform?os.platform()=="darwin":!1,pe=oe?N:k;export{ee as a,pe as b,z as c,F as d,U as e,G as j,Q as n,se as s,ue as t,ae as w};
