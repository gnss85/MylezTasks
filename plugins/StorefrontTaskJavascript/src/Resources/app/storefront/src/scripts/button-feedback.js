import AddToCart from "src/plugin/add-to-cart/add-to-cart.plugin";
import DomAccess from "src/helper/dom-access.helper";

export default class buttonFeedback extends AddToCart {
    init() {
        super.init();
        this._cartButton = DomAccess.querySelector(this.el, ".btn-buy");
    }

    _openOffCanvasCart(instance, requestUrl, formData) {
        super._openOffCanvasCart(instance, requestUrl, formData);
        this._FeedbackClass();
    }

    /* To also prevent the offcanvasCart this procedure can be used:
    https://academy.shopware.com/courses/take/shopware-6-advanced-template-training-english/lessons/9747212-javascript-plugin-override
     */

    _FeedbackClass() {
        this._cartButton.classList.add("button-feedback");
        const originalText = this._cartButton.innerText;
        this._cartButton.innerText = this._cartButton.dataset.feedbacktext;
        window.setTimeout(() => {
            this._cartButton.classList.remove("button-feedback");
            this._cartButton.innerText = originalText;
        }, 1000);
    }
}
