//locationインラインスクロール
// const scrEl = document.querySelector('#menu-location_category');
// scrEl.addEventListener('scroll',()=>{
// 	let locaInlineSl = scrEl.scrollLeft;
// 	console.log(locaInlineSl);
// 	//https://shanabrian.com/web/javascript/get-scroll-position.php

// });
//
document.addEventListener("DOMContentLoaded", function () {
  const ta = new TweenTextAnimation(".tween-animate-title");
  setTimeout(() => {
    ta.animate();
  }, 3000);

  // const topAniTitle = document.querySelector('.top_animation_title');
  // const topStr = topAniTitle.innerHTML.trim().split();
  // topAniTitle.innerHTML = topStr.reduce((acc,curr) => {
  // 	curr = curr.replace(' ', '&nbsp;');
  // 	return `${acc}<span class="char">${curr}</span>`
  // } , " ");

  //innerHTMLはDOMへのアクセスになるため、頻繁に更新するとパフォーマンスが落ちる可能性があるため
  //できれば、for文の中で回すのは、避けたほうが良い。
  // let concatStr = '';
  // //のちに再代入するためletを使用。
  // for( let c of topStr) {
  // 	//1文字づつ分割
  // 	c = c.replace(' ', '&nbsp;');
  // 	concatStr +=  `<span class="top-ani-title">${c}</span>`;
  // 	//自己代入　テンプレートリテラル
  // }
  // // console.log(concatStr);
  // topAniTitle.innerHTML = concatStr;
});
class TextAnimation {
  constructor(el) {
    this.DOM = {};
    //オブジェクトリテラルで初期化
    this.DOM.el = document.querySelector(el);
    this.chars = this.DOM.el.innerHTML.trim().split("");
    this.DOM.el.innerHTML = this._splitText();
  }
  _splitText() {
    return this.chars.reduce((acc, curr) => {
      curr = curr.replace(" ", "&nbsp;");
      return `${acc}<span class="char">${curr}</span>`;
    }, " ");
  }
  animate() {
    // console.log(this);
    this.el.classList.toggle("inview");
  }
}
class TweenTextAnimation extends TextAnimation {
  constructor(el) {
    super(el);
    //superを呼ぶと継承先のclassのconstructor()が呼ばれることになる。
    this.DOM.chars = this.DOM.el.querySelectorAll(".char");
    //.charが複数あるため
  }
  animate() {
    this.DOM.el.classList.add("inview");
    this.DOM.chars.forEach((c, i) => {
      TweenMax.to(c, 0.6, {
        ease: Back.easeOut,
        delay: i * 0.03,
        statAt: { y: "-70%", opacity: 0 },
        y: "0%",
        opacity: 1,
      });
    });
  }
}

//pace-jsのデフォルトをcustomizeするための記述
//参考https://m-kenomemo.com/mutation-observer/

// function escapeHtml(str) {
//   str = str.replace(/&/g, "&amp;");
//   str = str.replace(/</g, "&lt;");
//   str = str.replace(/>/g, "&gt;");
//   str = str.replace(/"/g, "&quot;");
//   str = str.replace(/'/g, "&#39;");
//   return str;
// }

window.addEventListener('DOMContentLoaded',() => {


});
//監視したい要素
const targetElm = document.querySelector("body");

//DOMが変更したら実行する関数
//loder,innerHTMLの中身
function addProgress() {
  //pace-progressがあったら
  if (document.querySelector(".pace-progress") != null) {
    document.querySelector(".pace-progress").innerHTML =
      '<div class="cube">' +
      "<div></div>" +
      "<div></div>" +
      "<div></div>" +
      "<div></div>" +
      "<div></div>" +
      "<div></div>" +
      "</div>";
  }
}

//インスタンス生成
const mo = new MutationObserver(addProgress);

//要素の監視を開始
mo.observe(targetElm, { childList: true });

//上下スクロール判定
let set_position = 0;
window.addEventListener("scroll", function () {
  if (set_position < document.documentElement.scrollTop) {
    // console.log(`down`);
  } else {
    // console.log(`up`);
  }

  set_position = document.documentElement.scrollTop;
});

const drawerIcon = document.querySelector("#js-drawer");
const drawerBg = document.querySelector("#js-drawer-bg");
const drawerBackground = document.querySelector(".drawer_background_pc");
const globalContent = document.getElementById("container");
// window.matchMedia()
//参考記事
//https://www.marukin-ad.co.jp/marulog/?p=2961
//windowの幅取得
// const windowWidthGl = window.matchMedia('(min-width:1300px)').matches;
const windowWidthXl = window.matchMedia("(min-width:1000px) ").matches;
const windowWidthMd = window.matchMedia(
  "(min-width: 768px) and (max-width:999px)"
).matches;
const windowWidthSm = window.matchMedia("(max-width:767px)").matches;

const headerLogo = document.querySelector(".header-logo");
const zJudgment = windowWidthMd && drawerIcon.classList.contains("is-active");
//window幅かつ該当のclassがあるチェックする

const drawerSpHeader = document.querySelector(".header");
///sns-icon
const snsIcons = document.querySelector(".sns-icons");
snsIcons.addEventListener("click", function (e) {
  e.preventDefault();
  this.classList.toggle("is-active");
});
drawerIcon.addEventListener("click", function (e) {
  e.stopPropagation();
  //eventの伝番を止める
  //デスクトップ時のドロワーメニュー
  if (windowWidthXl) {
    drawerIcon.classList.toggle("is-active");
    drawerBg.classList.toggle("is-active");
    drawerBackground.classList.toggle("show");
    if (snsIcons.classList.contains("is-active")) {
      snsIcons.classList.add("is-active");
    }
    snsIcons.classList.toggle("is-active");
    //background overlayerをした時の記述
    drawerBackground.addEventListener("click", function () {
      drawerIcon.classList.remove("is-active");
      drawerBg.classList.remove("is-active");
      drawerBackground.classList.remove("show");
      snsIcons.classList.remove("is-active");
    });
  }
  //タブレット時のドロワーメニュー
  else if (windowWidthMd) {
    drawerIcon.classList.toggle("is-active");
    drawerBg.classList.toggle("is-active");
    // drawerBackground.classList.toggle('show');
    if (zJudgment) {
      //該当のwindow幅以下かつdrawerIconにクラスがあったら
      //classがあるか判定する、参考記事
      //https://www.imamura.biz/blog/27372
      headerLogo.classList.remove("z-index-add");
    } else {
      headerLogo.classList.add("z-index-add");
    }
  }
  //スマホ時のドロワーメニュー
  else if (windowWidthSm) {
    const globalCon = document.querySelector("#global-container");
    globalCon.classList.toggle("is-open");
    globalContent.classList.toggle("is-active");
    drawerIcon.classList.toggle("is-active");
    drawerSpHeader.classList.toggle("is-active");
    if (drawerIcon.classList.contains("is-active")) {
      globalContent.addEventListener("click", function (e) {
        e.stopPropagation();
        globalCon.classList.remove("is-open");
        globalContent.classList.remove("is-active");
        drawerIcon.classList.remove("is-active");
        drawerSpHeader.classList.remove("is-active");
      });
    }
  }
});
const footerLogo = document.querySelector(".footer_logo");
const footerTopBg = document.querySelector(".footer_content_top");
const footerBottomBg = document.querySelector(".footer_lists_content");
const fListTargets = document.querySelectorAll(".footer_list a");
const copylightBg = document.querySelector(".copylight_message");
fListTargets.forEach((fListTarget) => {
	function footerEvent(over,out) {
		footerLogo.addEventListener(over, () => {
		  footerTopBg.classList.add("is-hover");
		  footerBottomBg.classList.add("is-hover");
		  fListTarget.classList.add("is-hover");
		  copylightBg.classList.add("is-hover");
		});
		footerLogo.addEventListener(out, () => {
		  footerTopBg.classList.remove("is-hover");
		  footerBottomBg.classList.remove("is-hover");
		  fListTarget.classList.remove("is-hover");
		  copylightBg.classList.remove("is-hover");
		});
	}
	footerEvent('mouseover','mouseout');
	footerEvent('touchstart','touchend');
	//参考記事https://web-breeze.net/js-touch-event/
	//スマホ用イベント
});

// function footerLogoMouser() {
// 	footerTopBg.classList.remove('is-hover');
// 	footerBottomBg.classList.remove('is-hover');

// }

//nav世界地図のロジックを作る
// const lists = [
// 	'currentcurr1',
// 	'currentcurr2',
// 	'currentcurr3',
// 	'currentcurr4',
// ];

//地図のロジック部分
const lists = [];
for (let $i = 1; $i <= 29; $i++) {
  lists.push(`currentcurr${$i}`);
}
const worldCurrents = document.querySelectorAll(
  "#menu-location_category .menu-item"
);
const countryTypeBg = document.querySelector(".l-location-bg");
const locationBgMap = document.querySelector(".l-location-bg-map");
const currMeIt = document.querySelector(".current-menu-item");
const currBg = document.querySelector(".curr-bg");
const locaBgBefo = document.querySelector(".l-location-bg-before");
worldCurrents.forEach((worldCurrent, i) => {
  if (worldCurrent.classList.contains("current-menu-item")) {
    countryTypeBg.classList.add(lists[i]);
  }
  worldCurrent.addEventListener("mouseover", function () {
    countryTypeBg.classList.add(lists[i]);
    locaBgBefo.classList.add(lists[i]);
  });
  worldCurrent.addEventListener("mouseout", function () {
    countryTypeBg.classList.remove(lists[i]);
    locaBgBefo.classList.remove(lists[i]);
  });
});

//パララックスの記述
//https://www.konosumi.net/entry/2019/05/26/220321
const parallaxWidthXl = window.matchMedia(
  "(min-width:1000px) and (max-width:1300px)"
).matches;
const parallaxWidthGl = window.matchMedia("(min-width:1301px)").matches;
let targetFactor = 0.25;
if (parallaxWidthXl) {
  targetFactor = 1.0;
} else if (parallaxWidthGl) {
  targetFactor = 1.4;
} else if (windowWidthMd) {
  targetFactor = 0.54;
}
const windowHeight = Math.min(
  window.innerHeight,
  document.documentElement.clientHeight
);

const parallax = document.getElementsByClassName("parallax");
const targets = Array.prototype.slice.call(parallax);

window.addEventListener("scroll", () => {
  const scrollY = Math.max(
    window.pageYOffset,
    document.documentElement.scrollTop
  );

  for (const target of targets) {
    const targetOffsetTop = target.offsetTop;
    const scrollYStart = targetOffsetTop - windowHeight;
    target.style.backgroundPositionY =
      scrollY > scrollYStart
        ? `${(scrollY - targetOffsetTop) * targetFactor}px`
        : "top";
  }
});
//スクロール量割合計算記述
//参考サイトhttps://gxy-life.com/2PC/PC/PC20210825.html
//https://web-dev.tech/front-end/javascript/page-scroll-progress-bar/
//https://mebee.info/2020/08/13/post-16557/
window.addEventListener("scroll", function () {
  //  ページの高さ：A
  // document.documentElement.scrollHeight
  //  画面の高さ：B
  // document.documentElement.clientHeight
  //  まだスクロールされていない部分の高さ：C = A - B
  let hiddenHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  //  スクロール量（px）: D
  let scrollPx = document.documentElement.scrollTop;
  //  スクロール量(%)：E = D / C * 100
  let scrollValue = Math.round((scrollPx / hiddenHeight) * 100);
  // console.log(scrollValue);
  // console.log(scrollPx);
  const progress_bar = document.querySelector(".progress_bar");
  const pScaV = scrollValue / 100;

  progress_bar.style.transform = `scaleX(${pScaV})`;
});

//modal-windowの記述
//参考サイトhttps://orange-log.com/javascript-modal/
document.addEventListener("DOMContentLoaded", function () {
  const modalLink = document.querySelector("#js-modal-link");
  const modalWindow = document.querySelector("#js-modal-window");
  const modalClose = document.querySelector("#js-modal-close");
  const modalOverlay = document.querySelector("#js-modal-overlay");
  const noScroll = document.querySelector("body");
  modalLink.addEventListener("click", modalShowFn);
  modalOverlay.addEventListener("click", modalCloseFn);
  modalClose.addEventListener("click", modalCloseFn);
  function modalShowFn(e) {
    e.preventDefault();
    modalWindow.classList.add("is-show");
    modalClose.classList.add("is-show");
    modalOverlay.classList.add("is-show");
    noScroll.classList.add("js-no-scroll");
  }
  function modalCloseFn() {
    modalWindow.classList.remove("is-show");
    modalClose.classList.remove("is-show");
    modalOverlay.classList.remove("is-show");
    noScroll.classList.remove("js-no-scroll");
  }
});
//drawer-backgroundに画像表示出し分ける記述
let imgList = [];
for (let $i = 1; $i <= 6; $i++) {
  imgList.push(`img${$i}`);
}
// drawerBackground.style.background();
//querySelectorAll何個目があたったか判定
const dMouseMoveTarget = document.querySelectorAll(".js_drawer_mouse_move a");
dMouseMoveTarget.forEach((moveTarget, index) => {
  // console.log(moveTarget,index);
  moveTarget.addEventListener("mouseover", function () {
    drawerBackground.classList.add(imgList[index]);
  });
  moveTarget.addEventListener("mouseout", function () {
    drawerBackground.classList.remove(imgList[index]);
  });
  // 1個づつ画像を出し分ける//if文でaddEventListenerをわける//何個目のtargetが当たったか判定
});
//ページトップ
//参考https://1-notes.com/javascript-scroll-to-top-button/
//https://imuza.com/smoothscroll/
//ボタン
const scroll_to_top_btn = document.querySelector("#scroll-to-top-btn");
//クリックイベントを追加
scroll_to_top_btn.addEventListener("click", scroll_to_top);
function scroll_to_top() {
  window.scroll({ top: 0, behavior: "smooth" });
}
//スクロール時のイベントを追加
window.addEventListener("scroll", scroll_event);
function scroll_event() {
  if (window.pageYOffset > 400) {
    scroll_to_top_btn.style.opacity = "1";
  } else if (window.pageYOffset < 400) {
    scroll_to_top_btn.style.opacity = "0";
  }
}
//アコーディオンUI
//https://web-dev.tech/front-end/javascript/accordion/
//https://freelance321.com/javascript/accordion/
//https://flex-box.net/js-accordion/
//https://orange-log.com/javascript-accordion/
//https://posipan.com/js-accordion/
//https://web-dev.tech/front-end/javascript/accordion/

const accordionTriggers = document.querySelectorAll(
  ".l-qa_item_row .l-qa_item_dt"
);
accordionTriggers.forEach((accoTrig) => {
  accoTrig.addEventListener("click", () => {
    accoTrig.classList.toggle("is-open");
    accoTrig.nextElementSibling.classList.toggle("is-open");
  });
});
//タブ切り替えメニュー
//https://blog-and-destroy.com/24218
//https://into-the-program.com/dataset/
//https://freefuntimes.com/?p=502

const tabBtns = document.querySelectorAll(".tab_btn a");
tabBtns.forEach((tabBtn) => {
  tabBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const tabLabels = document.querySelectorAll(".tab_btn a");
    tabLabels.forEach((tabLabel) => {
      tabLabel.classList.remove("is-show");
      //全てのクラスを消す
    });
    tabBtn.classList.add("is-show");
    //clickしたところに対して。
    const tabContents = document.querySelectorAll(".js-tab-content");
    tabContents.forEach((tabContent) => {
      tabContent.classList.remove("is-show");
    });
    //全てのコンテンツからclassをとる
    document.getElementById(tabBtn.dataset.tabindex).classList.add("is-show");
    //clickしたところのdata-の在処を探し、対象のコンテンツに足してclassをつける。
  });
});

//headerスクロールで色変える。
//参考サイトhttps://www.delftstack.com/ja/howto/javascript/javascript-get-height-of-div/
//https://1-notes.com/javascript-change-background-color-on-scrolling/
//エラー事項clientHeightの高さがトップページ以外で取れない。2つ呼ぼうとするとそれもエラーになる。
// window.addEventListener('DOMContentLoaded', scrollEv ) ;
function scrollEv() {
  window.addEventListener("scroll", () => {
    let scrollPage = window.pageYOffset;
    const videoEl = document.getElementById("top_visual");
    const videoElHight = videoEl.clientHeight - 150;
    const header = document.querySelector(".header");
    if (scrollPage > videoElHight) {
      header.classList.add("js-header-change");
    } else {
      header.classList.remove("js-header-change");
    }
  });
}
scrollEv();

//intersectionObserver関連
const heddings = document.querySelectorAll(".section_head");
// console.log(heddings);
const io = new IntersectionObserver(showElements);

heddings.forEach((hedding) => {
  io.observe(hedding);
});
function showElements(entries) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("add_show");
    }
  });
}
//swiper
//サムネイル
var sliderThumbnail = new Swiper(".slider-thumbnail", {
  breakpoints: {
    999: {
      slidesPerView: 4,
    },
    768: {
      slidesPerView: 3,
    },
    0: {
      slidesPerView: 2,
    },
  },
  freeMode: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  grabCursor: true,
});
const swiper = new Swiper(".swiper", {
  loop: true, //ループさせる
  effect: "coverflow", //フェードのエフェクト
  grabCursor: true,

  // watchSlidesVisibility: true,
  // watchSlidesProgress: true,
  centeredSlides: true,
  slidesPerView: 1,
  breakpoints: {
    999: { slidesPerView: 1.8 },
  },
  fadeEffect: {
    crossFade: true,
  },
  autoplay: {
    delay: 5000, //5秒後つぎの画像へ
    disableOnInteraction: false,
  },
  // speed: 2000, //２秒かけながら次の画像へ移動
  // allowTouchMove: false, //マウスでのスワイプを禁止
  pagination: {
    //円形のページネーションを有効にする
    el: ".swiper-pagination",
    clickable: true, //クリックを有効にする
  },
  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: sliderThumbnail,
  },
});

//参考サイトhttps://into-the-program.com/javascript-get-address-zipcode-search-api/
let input = document.getElementById("postcode");
function postValue() {
  let api = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=";
  let error = document.getElementById("error");
  let address1 = document.getElementById("prefectures");
  let address2 = document.getElementById("city");
  let param = input.value.replace("-", ""); //入力された郵便番号から「-」を削除
  let url = api + param;

  fetchJsonp(url, {
    timeout: 10000, //タイムアウト時間
  })
    .then((response) => {
      error.textContent = ""; //HTML側のエラーメッセージ初期化
      return response.json();
    })
    .then((data) => {
      if (data.status === 400) {
        //エラー時
        error.textContent = data.message;
      } else if (data.results === null) {
        error.textContent = "郵便番号から住所が見つかりませんでした。";
      } else {
        address1.value = data.results[0].address1;
        address2.value = data.results[0].address2;
        // address3.value = data.results[0].address3;
      }
    })
    .catch((ex) => {
      //例外処理
      console.log(ex);
    });
}
input.addEventListener("input", postValue, false);
input.addEventListener("change", postValue, false);
//form関連
//form disabledをかける

//参考サイトhttps://www.azukipan.com/posts/javascript-form-disabled/

const form = document.querySelector("#form");
const subConf = document.querySelector("#form-submit");
form.addEventListener("input", upDate);
form.addEventListener("change", upDate);
function upDate() {
  const isRequired = form.checkValidity();
  //formのrequiredの項目が全て入力されているか検知
  if (isRequired) {
    subConf.disabled = false;
  } else {
    subConf.disabled = true;
  }
}

////
//ANIMATIONの文字分割
// alert('hello');
// document.addEventListener('DOMContentLoaded',function(){
// });
