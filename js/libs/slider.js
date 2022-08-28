class HeroSlider {
    constructor(el) {
        this.el = el;
        this.swiper = this._initSwiper();
    }

    _initSwiper() {
        return new Swiper(this.el, {
            // Optional parameters
            // direction: 'vertical',
            loop: true,
            grabCursor: true,
            //mouseover時にpointerがgrabに変更、掴めるとわかるもの
            effect: 'coverflow',
            //立体的なスライドのモード
            centeredSlides: true,
            //sliderを中央揃えにする
            slidesPerView: 1,
            //現在の画面に何枚のスライドを表示するか。
            speed: 1000,
            breakpoints: {
                1024: {
                    //以上の場合に適用
                    slidesPerView: 2,
                }
            },
        });
    }

    start(options = {}) {
        options = Object.assign({
            delay: 4000,
            disableOnInteraction: false
            //mouseで変更しても以降もdelayが適用
        }, options);
        
        this.swiper.params.autoplay = options;
        this.swiper.autoplay.start();
    }
    stop() {
        this.swiper.autoplay.stop();
    }
}