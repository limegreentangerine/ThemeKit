// scroll listener init
var scrollObject: ScrollObject = {
    x: 0,
    y: 0
};

const getScrollDistance = () => {
    scrollObject = {
        x: window.pageXOffset,
        y: window.pageYOffset
    }
    scrollObject.y > 0 ? document.body.classList.add('scrolled') : document.body.classList.remove('scrolled');
}

window.addEventListener('scroll', () => {
    getScrollDistance();
});

window.addEventListener('load', () => {
    document.body.classList.add('loaded');
    getScrollDistance();
});

type ScrollObject = {
    x: number;
    y: number;
}
