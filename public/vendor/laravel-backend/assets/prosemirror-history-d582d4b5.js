import{R as S}from"./rope-sequence-5ceeafee.js";import{M as k}from"./prosemirror-transform-b4404ce6.js";import{P as O,a as D}from"./prosemirror-state-ba2e3a6a.js";const H=500;class c{constructor(t,e){this.items=t,this.eventCount=e}popEvent(t,e){if(this.eventCount==0)return null;let s=this.items.length;for(;;s--)if(this.items.get(s-1).selection){--s;break}let i,p;e&&(i=this.remapping(s,this.items.length),p=i.maps.length);let l=t.tr,r,a,m=[],f=[];return this.items.forEach((o,u)=>{if(!o.step){i||(i=this.remapping(s,u+1),p=i.maps.length),p--,f.push(o);return}if(i){f.push(new g(o.map));let d=o.step.map(i.slice(p)),w;d&&l.maybeStep(d).doc&&(w=l.mapping.maps[l.mapping.maps.length-1],m.push(new g(w,void 0,void 0,m.length+f.length))),p--,w&&i.appendMap(w,p)}else l.maybeStep(o.step);if(o.selection)return r=i?o.selection.map(i.slice(p)):o.selection,a=new c(this.items.slice(0,s).append(f.reverse().concat(m)),this.eventCount-1),!1},this.items.length,0),{remaining:a,transform:l,selection:r}}addTransform(t,e,s,i){let p=[],l=this.eventCount,r=this.items,a=!i&&r.length?r.get(r.length-1):null;for(let f=0;f<t.steps.length;f++){let o=t.steps[f].invert(t.docs[f]),u=new g(t.mapping.maps[f],o,e),d;(d=a&&a.merge(u))&&(u=d,f?p.pop():r=r.slice(0,r.length-1)),p.push(u),e&&(l++,e=void 0),i||(a=u)}let m=l-s.depth;return m>y&&(r=x(r,m),l-=m),new c(r.append(p),l)}remapping(t,e){let s=new k;return this.items.forEach((i,p)=>{let l=i.mirrorOffset!=null&&p-i.mirrorOffset>=t?s.maps.length-i.mirrorOffset:void 0;s.appendMap(i.map,l)},t,e),s}addMaps(t){return this.eventCount==0?this:new c(this.items.append(t.map(e=>new g(e))),this.eventCount)}rebased(t,e){if(!this.eventCount)return this;let s=[],i=Math.max(0,this.items.length-e),p=t.mapping,l=t.steps.length,r=this.eventCount;this.items.forEach(u=>{u.selection&&r--},i);let a=e;this.items.forEach(u=>{let d=p.getMirror(--a);if(d==null)return;l=Math.min(l,d);let w=p.maps[d];if(u.step){let b=t.steps[d].invert(t.docs[d]),E=u.selection&&u.selection.map(p.slice(a+1,d));E&&r++,s.push(new g(w,b,E))}else s.push(new g(w))},i);let m=[];for(let u=e;u<l;u++)m.push(new g(p.maps[u]));let f=this.items.slice(0,i).append(m).append(s),o=new c(f,r);return o.emptyItemCount()>H&&(o=o.compress(this.items.length-s.length)),o}emptyItemCount(){let t=0;return this.items.forEach(e=>{e.step||t++}),t}compress(t=this.items.length){let e=this.remapping(0,t),s=e.maps.length,i=[],p=0;return this.items.forEach((l,r)=>{if(r>=t)i.push(l),l.selection&&p++;else if(l.step){let a=l.step.map(e.slice(s)),m=a&&a.getMap();if(s--,m&&e.appendMap(m,s),a){let f=l.selection&&l.selection.map(e.slice(s));f&&p++;let o=new g(m.invert(),a,f),u,d=i.length-1;(u=i.length&&i[d].merge(o))?i[d]=u:i.push(o)}}else l.map&&s--},this.items.length,0),new c(S.from(i.reverse()),p)}}c.empty=new c(S.empty,0);function x(n,t){let e;return n.forEach((s,i)=>{if(s.selection&&t--==0)return e=i,!1}),n.slice(e)}class g{constructor(t,e,s,i){this.map=t,this.step=e,this.selection=s,this.mirrorOffset=i}merge(t){if(this.step&&t.step&&!t.selection){let e=t.step.merge(this.step);if(e)return new g(e.getMap().invert(),e,this.selection)}}}class v{constructor(t,e,s,i,p){this.done=t,this.undone=e,this.prevRanges=s,this.prevTime=i,this.prevComposition=p}}const y=20;function F(n,t,e,s){let i=e.getMeta(h),p;if(i)return i.historyState;e.getMeta(K)&&(n=new v(n.done,n.undone,null,0,-1));let l=e.getMeta("appendedTransaction");if(e.steps.length==0)return n;if(l&&l.getMeta(h))return l.getMeta(h).redo?new v(n.done.addTransform(e,void 0,s,M(t)),n.undone,I(e.mapping.maps[e.steps.length-1]),n.prevTime,n.prevComposition):new v(n.done,n.undone.addTransform(e,void 0,s,M(t)),null,n.prevTime,n.prevComposition);if(e.getMeta("addToHistory")!==!1&&!(l&&l.getMeta("addToHistory")===!1)){let r=e.getMeta("composition"),a=n.prevTime==0||!l&&n.prevComposition!=r&&(n.prevTime<(e.time||0)-s.newGroupDelay||!G(e,n.prevRanges)),m=l?C(n.prevRanges,e.mapping):I(e.mapping.maps[e.steps.length-1]);return new v(n.done.addTransform(e,a?t.selection.getBookmark():void 0,s,M(t)),c.empty,m,e.time,r??n.prevComposition)}else return(p=e.getMeta("rebased"))?new v(n.done.rebased(e,p),n.undone.rebased(e,p),C(n.prevRanges,e.mapping),n.prevTime,n.prevComposition):new v(n.done.addMaps(e.mapping.maps),n.undone.addMaps(e.mapping.maps),C(n.prevRanges,e.mapping),n.prevTime,n.prevComposition)}function G(n,t){if(!t)return!1;if(!n.docChanged)return!0;let e=!1;return n.mapping.maps[0].forEach((s,i)=>{for(let p=0;p<t.length;p+=2)s<=t[p+1]&&i>=t[p]&&(e=!0)}),e}function I(n){let t=[];return n.forEach((e,s,i,p)=>t.push(i,p)),t}function C(n,t){if(!n)return null;let e=[];for(let s=0;s<n.length;s+=2){let i=t.map(n[s],1),p=t.map(n[s+1],-1);i<=p&&e.push(i,p)}return e}function R(n,t,e,s){let i=M(t),p=h.get(t).spec.config,l=(s?n.undone:n.done).popEvent(t,i);if(!l)return;let r=l.selection.resolve(l.transform.doc),a=(s?n.done:n.undone).addTransform(l.transform,t.selection.getBookmark(),p,i),m=new v(s?a:l.remaining,s?l.remaining:a,null,0,-1);e(l.transform.setSelection(r).setMeta(h,{redo:s,historyState:m}).scrollIntoView())}let T=!1,P=null;function M(n){let t=n.plugins;if(P!=t){T=!1,P=t;for(let e=0;e<t.length;e++)if(t[e].spec.historyPreserveItems){T=!0;break}}return T}const h=new O("history"),K=new O("closeHistory");function L(n={}){return n={depth:n.depth||100,newGroupDelay:n.newGroupDelay||500},new D({key:h,state:{init(){return new v(c.empty,c.empty,null,0,-1)},apply(t,e,s){return F(e,s,t,n)}},config:n,props:{handleDOMEvents:{beforeinput(t,e){let s=e.inputType,i=s=="historyUndo"?j:s=="historyRedo"?A:null;return i?(e.preventDefault(),i(t.state,t.dispatch)):!1}}}})}const j=(n,t)=>{let e=h.getState(n);return!e||e.done.eventCount==0?!1:(t&&R(e,n,t,!1),!0)},A=(n,t)=>{let e=h.getState(n);return!e||e.undone.eventCount==0?!1:(t&&R(e,n,t,!0),!0)};function W(n){let t=h.getState(n);return t?t.done.eventCount:0}export{W as a,L as h,A as r,j as u};
