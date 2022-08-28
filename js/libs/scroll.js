class ScrollObserver {
    constructor(els, cb, options) {
        this.els = document.querySelectorAll(els);
        const defaultOptions = {
            root: null,
            rootMargin: "0px",
            threshold: 0,
            once: true
        };
        this.cb = cb;
        this.options = Object.assign(defaultOptions, options);
        //constructor引数のoptionsに4行目の定数をマージする。
        //違うoptionがconstructorに渡ってきた場合は、後からせってした物が上書きされる。
        this.once = this.options.once;
        this._init();
    }
    _init() {
        //プライベートメソッド
        const callback = function (entries, observer) {
            //スクロールオブザーバーのインスタンスの第二引数として渡される。
            //main.js参照
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.cb(entry.target, true);
                    if(this.once) {
                        observer.unobserve(entry.target);
                    }
                } else {
                    this.cb(entry.target, false);
                }
            });
        };

        this.io = new IntersectionObserver(callback.bind(this), this.options);
        //第二引数で11行目を参照
        //第一引数は、scrollObserverを参照したいのでbindでthisを束縛。

        // @see https://github.com/w3c/IntersectionObserver/tree/master/polyfill
        this.io.POLL_INTERVAL = 100;
        
        this.els.forEach(el => this.io.observe(el));
    }

    destroy() {
        this.io.disconnect();
    }
}