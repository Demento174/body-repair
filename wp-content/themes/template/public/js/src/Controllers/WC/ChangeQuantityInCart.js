import { WooCommerceConfig } from "../../settings";
import AddHandlerForEvent from "../AddHandlerForEvent";
import WordPressAJAX from "../WordPressAJAX";
import UpdateCart from "./UpdateCart";
import {getParent, queryElement} from "../../common";

const defaultSettings = WooCommerceConfig.changeQunatityInCart;
export default class ChangeQuantityInCart {
    constructor(settings={})
    {
        this.settings =  JSON.stringify(settings) == '{}'?defaultSettings:settings;
        this.btnAdd = this.settings.selectors.btnAdd;
        this.btnMinus = this.settings.selectors.btnMinus;

        if(this.btnAdd && this.btnMinus)
        {
            new AddHandlerForEvent(this.btnAdd,'click',event=>
            {
                const btn = getParent(event.target,'button');
                this.handler(btn);
            });

            new AddHandlerForEvent(this.btnMinus,'click',event=>
            {
                const btn = getParent(event.target,'button');
                this.handler(btn);
            });
        }
    }

    set btnAdd(selector)
    {
        this._btnAdd = document.querySelectorAll(selector);
    }

    get btnAdd()
    {
        return this._btnAdd;
    }

    set btnMinus(selector)
    {
        this._btnMinus = document.querySelectorAll(selector);
    }

    get btnMinus()
    {
        return this._btnMinus;
    }

    set input(btn)
    {
        const wrapper =getParent(btn,`${this.settings.selectors.basketItem}`);
        this._input = wrapper.querySelector(`${this.settings.selectors.input}`);
    }

    get input()
    {
        return this._input;
    }

    handler(btn)
    {
        this.input = btn;
        let value =  this.input.value;
        let key = this.input.getAttribute(this.settings.attributeId);
        if(btn.classList.contains(this.settings.selectors.classAdd))
        {
            value ++;
        }else
            {
                value --;
            }
        new WordPressAJAX('changeQuantityInCart',
            {
              key:key,
              quantity:value
            },
            this.callback.bind(this)
        )
    }
    callback()
    {
        console.log('Quantity complete');
        new UpdateCart();
    }
}