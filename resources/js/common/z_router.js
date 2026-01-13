// import { isUndefined } from "lodash";

// export default class Router {

//     constructor() {
//         this.elementIds = {
//             containerWrapper: 'ferry-content-container-wrapper',
//             container: 'ferry-content-container',
//             loader: 'loader'
//         };
//         this.container = this.getContainer();
//         this.containerWrapper = document.getElementById(this.elementIds.containerWrapper);
//         this.loader = document.getElementById(this.elementIds.loader);

//         let url = location.href.replace(new RegExp("\/$", "g"), ''); // 去除最後的 '/'，因 href 屬性會自動在根目錄加上 '/'

//         this.handleRouter();
//         this.handlePageUI(url);
//     }

//     getContainer() {
//         return document.getElementById(this.elementIds.container);
//     }

//     handleRouter() {
//         // click event delegation
//         document.onclick = (e) => {
//             let a = e.target.closest('a');

//             if (! a || a.dataset.fetchUrl === undefined)
//                 return;

//             e.preventDefault();

//             let url = a.href;
//             url = url.replace(new RegExp("\/$", "g"), ''); // 去除最後的 '/'，因 href 屬性會自動在根目錄加上 '/'
//             window.history.pushState({}, null, url);

//             this.loadContent(url);
//             this.handlePageUI(url);

//             return false;
//         };
//     }

//     loadContent(url) {
//         this.handleFadeOut();

//         fetch(url, {
//             'cache': 'no-cache',
//             'headers': { 'X-Requested-With': 'XMLHttpRequest' }
//         })
//         .then((response) => {
//             if (! response.ok) {
//                 throw new Error('頁面請求發生錯誤');
//             }

//             return response.text();
//         })
//         .then((html) => {
//             let parser = new DOMParser();
//             let content = parser.parseFromString(html, 'text/html')
//                                 .getElementById('ferry-content-container');

//             new Promise((resolve) => {
//                 this.container.replaceWith(content);
//                 this.container = this.getContainer(); // 轉換 container
//                 this.executeScripts();
//                 resolve();
//             }).then(() => {
//                 this.handleFadeIn();
//             });
//         })
//         .catch((error) => {
//             alert(error.message);
//             console.log(error);
//         });
//     }

//     executeScripts() {
//         let scriptTags = this.container.getElementsByTagName('script');

//         if (scriptTags.length == 0) {
//             return;
//         }

//         let embedScripts = null;
//         let inlineScripts = '';

//         [].forEach.call(scriptTags, (scriptTag) => {
//             if (scriptTag.src != '') {
//                 // Embed scripts
//                 let tag = document.createElement('script');
//                 tag.src = scriptTag.src;
//                 tag.dataset.override = true;
//                 this.container.appendChild(tag);
//                 embedScripts = true;
//             } else {
//                 // Inline scripts
//                 inlineScripts += scriptTag.innerText;
//             }
//         });

//         // 執行 Inline script
//         if (inlineScripts) {
//             if (! embedScripts) {
//                 excuteInlineScripts(inlineScripts);
//             } else {
//                 // 等最後一個 embed script 完成載入時，再執行腳本
//                 let lastestScript = this.container.lastElementChild;
//                 lastestScript.onload = () => {
//                     excuteInlineScripts(inlineScripts);
//                 };
//             }
//         }

//         // 刪除已複製的 Embed scripts
//         [].forEach.call(scriptTags, function(scriptTag) {
//             if (! scriptTag.dataset.override)
//                 scriptTag.parentNode.removeChild(scriptTag);
//         });

//         function excuteInlineScripts(inlineScripts) {
//             new Function(inlineScripts)();
//         }
//     }

//     handlePageUI(url) {
//         // page scroll to top;
//         window.admin.helpers.goTop(false);

//         // change alpine components data outside
//         document.body.__x.$data.sidebar.isShow = false;
//         document.body.__x.$data.sidebar.active = url;
//     }

//     handleFadeOut() {
//         this.loader.classList.add('is-show');
//         this.containerWrapper.classList.remove('is-show');
//     }

//     handleFadeIn() {
//         this.loader.classList.remove('is-show');
//         this.containerWrapper.classList.add('is-show');
//     }

// }
