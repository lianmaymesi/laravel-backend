import{f as J,r as F,R,a as E,l as V,c as B}from"./prosemirror-transform-cba30629.js";import{F as A,a as I}from"./prosemirror-model-dd7f7acd.js";import{S as C,N as S,b as D,A as z,T}from"./prosemirror-state-0e661cb9.js";const W=(t,e)=>t.selection.empty?!1:(e&&e(t.tr.deleteSelection().scrollIntoView()),!0);function G(t,e){let{$cursor:n}=t.selection;return!n||(e?!e.endOfTextblock("backward",t):n.parentOffset>0)?null:n}const L=(t,e,n)=>{let r=G(t,n);if(!r)return!1;let o=j(r);if(!o){let i=r.blockRange(),f=i&&V(i);return f==null?!1:(e&&e(t.tr.lift(i,f).scrollIntoView()),!0)}let l=o.nodeBefore;if(N(t,o,e,-1))return!0;if(r.parent.content.size==0&&(h(l,"end")||S.isSelectable(l)))for(let i=r.depth;;i--){let f=F(t.doc,r.before(i),r.after(i),I.empty);if(f&&f.slice.size<f.to-f.from){if(e){let s=t.tr.step(f);s.setSelection(h(l,"end")?C.findFrom(s.doc.resolve(s.mapping.map(o.pos,-1)),-1):S.create(s.doc,o.pos-l.nodeSize)),e(s.scrollIntoView())}return!0}if(i==1||r.node(i-1).childCount>1)break}return l.isAtom&&o.depth==r.depth-1?(e&&e(t.tr.delete(o.pos-l.nodeSize,o.pos).scrollIntoView()),!0):!1};function h(t,e,n=!1){for(let r=t;r;r=e=="start"?r.firstChild:r.lastChild){if(r.isTextblock)return!0;if(n&&r.childCount!=1)return!1}return!1}const Q=(t,e,n)=>{let{$head:r,empty:o}=t.selection,l=r;if(!o)return!1;if(r.parent.isTextblock){if(n?!n.endOfTextblock("backward",t):r.parentOffset>0)return!1;l=j(r)}let i=l&&l.nodeBefore;return!i||!S.isSelectable(i)?!1:(e&&e(t.tr.setSelection(S.create(t.doc,l.pos-i.nodeSize)).scrollIntoView()),!0)};function j(t){if(!t.parent.type.spec.isolating)for(let e=t.depth-1;e>=0;e--){if(t.index(e)>0)return t.doc.resolve(t.before(e+1));if(t.node(e).type.spec.isolating)break}return null}function U(t,e){let{$cursor:n}=t.selection;return!n||(e?!e.endOfTextblock("forward",t):n.parentOffset<n.parent.content.size)?null:n}const X=(t,e,n)=>{let r=U(t,n);if(!r)return!1;let o=P(r);if(!o)return!1;let l=o.nodeAfter;if(N(t,o,e,1))return!0;if(r.parent.content.size==0&&(h(l,"start")||S.isSelectable(l))){let i=F(t.doc,r.before(),r.after(),I.empty);if(i&&i.slice.size<i.to-i.from){if(e){let f=t.tr.step(i);f.setSelection(h(l,"start")?C.findFrom(f.doc.resolve(f.mapping.map(o.pos)),1):S.create(f.doc,f.mapping.map(o.pos))),e(f.scrollIntoView())}return!0}}return l.isAtom&&o.depth==r.depth-1?(e&&e(t.tr.delete(o.pos,o.pos+l.nodeSize).scrollIntoView()),!0):!1},Y=(t,e,n)=>{let{$head:r,empty:o}=t.selection,l=r;if(!o)return!1;if(r.parent.isTextblock){if(n?!n.endOfTextblock("forward",t):r.parentOffset<r.parent.content.size)return!1;l=P(r)}let i=l&&l.nodeAfter;return!i||!S.isSelectable(i)?!1:(e&&e(t.tr.setSelection(S.create(t.doc,l.pos)).scrollIntoView()),!0)};function P(t){if(!t.parent.type.spec.isolating)for(let e=t.depth-1;e>=0;e--){let n=t.node(e);if(t.index(e)+1<n.childCount)return t.doc.resolve(t.after(e+1));if(n.type.spec.isolating)break}return null}const Z=(t,e)=>{let{$head:n,$anchor:r}=t.selection;return!n.parent.type.spec.code||!n.sameParent(r)?!1:(e&&e(t.tr.insertText(`
`).scrollIntoView()),!0)};function v(t){for(let e=0;e<t.edgeCount;e++){let{type:n}=t.edge(e);if(n.isTextblock&&!n.hasRequiredAttrs())return n}return null}const _=(t,e)=>{let{$head:n,$anchor:r}=t.selection;if(!n.parent.type.spec.code||!n.sameParent(r))return!1;let o=n.node(-1),l=n.indexAfter(-1),i=v(o.contentMatchAt(l));if(!i||!o.canReplaceWith(l,l,i))return!1;if(e){let f=n.after(),s=t.tr.replaceWith(f,f,i.createAndFill());s.setSelection(C.near(s.doc.resolve(f),1)),e(s.scrollIntoView())}return!0},ee=(t,e)=>{let n=t.selection,{$from:r,$to:o}=n;if(n instanceof z||r.parent.inlineContent||o.parent.inlineContent)return!1;let l=v(o.parent.contentMatchAt(o.indexAfter()));if(!l||!l.isTextblock)return!1;if(e){let i=(!r.parentOffset&&o.index()<o.parent.childCount?r:o).pos,f=t.tr.insert(i,l.createAndFill());f.setSelection(T.create(f.doc,i+1)),e(f.scrollIntoView())}return!0},te=(t,e)=>{let{$cursor:n}=t.selection;if(!n||n.parent.content.size)return!1;if(n.depth>1&&n.after()!=n.end(-1)){let l=n.before();if(B(t.doc,l))return e&&e(t.tr.split(l).scrollIntoView()),!0}let r=n.blockRange(),o=r&&V(r);return o==null?!1:(e&&e(t.tr.lift(r,o).scrollIntoView()),!0)};function re(t){return(e,n)=>{let{$from:r,$to:o}=e.selection;if(e.selection instanceof S&&e.selection.node.isBlock)return!r.parentOffset||!B(e.doc,r.pos)?!1:(n&&n(e.tr.split(r.pos).scrollIntoView()),!0);if(!r.depth)return!1;let l=[],i,f,s=!1,p=!1;for(let c=r.depth;;c--)if(r.node(c).isBlock){s=r.end(c)==r.pos+(r.depth-c),p=r.start(c)==r.pos-(r.depth-c),f=v(r.node(c-1).contentMatchAt(r.indexAfter(c-1)));let m=t&&t(o.parent,s,r);l.unshift(m||(s&&f?{type:f}:null)),i=c;break}else{if(c==1)return!1;l.unshift(null)}let u=e.tr;(e.selection instanceof T||e.selection instanceof z)&&u.deleteSelection();let g=u.mapping.map(r.pos),d=B(u.doc,g,l.length,l);if(d||(l[0]=f?{type:f}:null,d=B(u.doc,g,l.length,l)),u.split(g,l.length,l),!s&&p&&r.node(i).type!=f){let c=u.mapping.map(r.before(i)),a=u.doc.resolve(c);f&&r.node(i-1).canReplaceWith(a.index(),a.index()+1,f)&&u.setNodeMarkup(u.mapping.map(r.before(i)),f)}return n&&n(u.scrollIntoView()),!0}}const ne=re(),le=(t,e)=>(e&&e(t.tr.setSelection(new z(t.doc))),!0);function oe(t,e,n){let r=e.nodeBefore,o=e.nodeAfter,l=e.index();return!r||!o||!r.type.compatibleContent(o.type)?!1:!r.content.size&&e.parent.canReplace(l-1,l)?(n&&n(t.tr.delete(e.pos-r.nodeSize,e.pos).scrollIntoView()),!0):!e.parent.canReplace(l,l+1)||!(o.isTextblock||E(t.doc,e.pos))?!1:(n&&n(t.tr.join(e.pos).scrollIntoView()),!0)}function N(t,e,n,r){let o=e.nodeBefore,l=e.nodeAfter,i,f,s=o.type.spec.isolating||l.type.spec.isolating;if(!s&&oe(t,e,n))return!0;let p=!s&&e.parent.canReplace(e.index(),e.index()+1);if(p&&(i=(f=o.contentMatchAt(o.childCount)).findWrapping(l.type))&&f.matchType(i[0]||l.type).validEnd){if(n){let c=e.pos+l.nodeSize,a=A.empty;for(let b=i.length-1;b>=0;b--)a=A.from(i[b].create(null,a));a=A.from(o.copy(a));let m=t.tr.step(new R(e.pos-1,c,e.pos,c,new I(a,1,0),i.length,!0)),k=m.doc.resolve(c+2*i.length);k.nodeAfter&&k.nodeAfter.type==o.type&&E(m.doc,k.pos)&&m.join(k.pos),n(m.scrollIntoView())}return!0}let u=l.type.spec.isolating||r>0&&s?null:C.findFrom(e,1),g=u&&u.$from.blockRange(u.$to),d=g&&V(g);if(d!=null&&d>=e.depth)return n&&n(t.tr.lift(g,d).scrollIntoView()),!0;if(p&&h(l,"start",!0)&&h(o,"end")){let c=o,a=[];for(;a.push(c),!c.isTextblock;)c=c.lastChild;let m=l,k=1;for(;!m.isTextblock;m=m.firstChild)k++;if(c.canReplace(c.childCount,c.childCount,m.content)){if(n){let b=A.empty;for(let x=a.length-1;x>=0;x--)b=A.from(a[x].copy(b));let y=t.tr.step(new R(e.pos-a.length,e.pos+l.nodeSize,e.pos+k,e.pos+l.nodeSize-k,new I(b,a.length,0),0,!0));n(y.scrollIntoView())}return!0}}return!1}function K(t){return function(e,n){let r=e.selection,o=t<0?r.$from:r.$to,l=o.depth;for(;o.node(l).isInline;){if(!l)return!1;l--}return o.node(l).isTextblock?(n&&n(e.tr.setSelection(T.create(e.doc,t<0?o.start(l):o.end(l)))),!0):!1}}const ie=K(-1),fe=K(1);function me(t,e=null){return function(n,r){let{$from:o,$to:l}=n.selection,i=o.blockRange(l),f=i&&J(i,t,e);return f?(r&&r(n.tr.wrap(i,f).scrollIntoView()),!0):!1}}function ge(t,e=null){return function(n,r){let o=!1;for(let l=0;l<n.selection.ranges.length&&!o;l++){let{$from:{pos:i},$to:{pos:f}}=n.selection.ranges[l];n.doc.nodesBetween(i,f,(s,p)=>{if(o)return!1;if(!(!s.isTextblock||s.hasMarkup(t,e)))if(s.type==t)o=!0;else{let u=n.doc.resolve(p),g=u.index();o=u.parent.canReplaceWith(g,g+1,t)}})}if(!o)return!1;if(r){let l=n.tr;for(let i=0;i<n.selection.ranges.length;i++){let{$from:{pos:f},$to:{pos:s}}=n.selection.ranges[i];l.setBlockType(f,s,t,e)}r(l.scrollIntoView())}return!0}}function se(t,e,n,r){for(let o=0;o<e.length;o++){let{$from:l,$to:i}=e[o],f=l.depth==0?t.inlineContent&&t.type.allowsMarkType(n):!1;if(t.nodesBetween(l.pos,i.pos,(s,p)=>{if(f||!r&&s.isAtom&&s.isInline&&p>=l.pos&&p+s.nodeSize<=i.pos)return!1;f=s.inlineContent&&s.type.allowsMarkType(n)}),f)return!0}return!1}function ce(t){let e=[];for(let n=0;n<t.length;n++){let{$from:r,$to:o}=t[n];r.doc.nodesBetween(r.pos,o.pos,(l,i)=>{if(l.isAtom&&l.content.size&&l.isInline&&i>=r.pos&&i+l.nodeSize<=o.pos)return i+1>r.pos&&e.push(new D(r,r.doc.resolve(i+1))),r=r.doc.resolve(i+1+l.content.size),!1}),r.pos<o.pos&&e.push(new D(r,o))}return e}function ke(t,e=null,n){let r=(n&&n.removeWhenPresent)!==!1,o=(n&&n.enterInlineAtoms)!==!1;return function(l,i){let{empty:f,$cursor:s,ranges:p}=l.selection;if(f&&!s||!se(l.doc,p,t,o))return!1;if(i)if(s)t.isInSet(l.storedMarks||s.marks())?i(l.tr.removeStoredMark(t)):i(l.tr.addStoredMark(t.create(e)));else{let u,g=l.tr;o||(p=ce(p)),r?u=!p.some(d=>l.doc.rangeHasMark(d.$from.pos,d.$to.pos,t)):u=!p.every(d=>{let c=!1;return g.doc.nodesBetween(d.$from.pos,d.$to.pos,(a,m,k)=>{if(c)return!1;c=!t.isInSet(a.marks)&&!!k&&k.type.allowsMarkType(t)&&!(a.isText&&/^\s*$/.test(a.textBetween(Math.max(0,d.$from.pos-m),Math.min(a.nodeSize,d.$to.pos-m))))}),!c});for(let d=0;d<p.length;d++){let{$from:c,$to:a}=p[d];if(!u)g.removeMark(c.pos,a.pos,t);else{let m=c.pos,k=a.pos,b=c.nodeAfter,y=a.nodeBefore,x=b&&b.isText?/^\s*/.exec(b.text)[0].length:0,H=y&&y.isText?/\s*$/.exec(y.text)[0].length:0;m+x<k&&(m+=x,k-=H),g.addMark(m,k,t.create(e))}}i(g.scrollIntoView())}return!0}}function $(...t){return function(e,n,r){for(let o=0;o<t.length;o++)if(t[o](e,n,r))return!0;return!1}}let M=$(W,L,Q),O=$(W,X,Y);const w={Enter:$(Z,ee,te,ne),"Mod-Enter":_,Backspace:M,"Mod-Backspace":M,"Shift-Backspace":M,Delete:O,"Mod-Delete":O,"Mod-a":le},q={"Ctrl-h":w.Backspace,"Alt-Backspace":w["Mod-Backspace"],"Ctrl-d":w.Delete,"Ctrl-Alt-Backspace":w["Mod-Delete"],"Alt-Delete":w["Mod-Delete"],"Alt-d":w["Mod-Delete"],"Ctrl-a":ie,"Ctrl-e":fe};for(let t in w)q[t]=w[t];const ae=typeof navigator<"u"?/Mac|iP(hone|[oa]d)/.test(navigator.platform):typeof os<"u"&&os.platform?os.platform()=="darwin":!1,be=ae?q:w;export{le as a,be as b,$ as c,W as d,_ as e,X as j,Z as n,ge as s,ke as t,me as w};