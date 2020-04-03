import {WooCommerceConfig} from "../../settings.js";
import {queryElement} from "../../common";
import WordPressAJAX from "../WordPressAJAX";
import NumberDivision from "../../modules/NumberDivision";

const defaultSettings = WooCommerceConfig.Cart;


export default class UpdateCart {
    constructor(settings = {})
    {
        this.settings =  JSON.stringify(settings) == '{}'?defaultSettings:settings;
        this.quantityElement = this.settings.selectors.quantityElement;
        this.amountElement = this.settings.selectors.amountElement;
        this.amountEmpty = this.settings.selectors.amountEmpty;
        this.amountWrapper = this.settings.selectors.amountWrapper;
        this.amountCartPage = this.settings.selectors.amountCartPage;
        this.handler();

    }

    set quantityElement(selector)
    {
        this._quantityElement = queryElement(selector);
    }

    get quantityElement()
    {
        return this._quantityElement;
    }

    set amountElement(selector)
    {
        this._amountElement = queryElement(selector);
    }

    get amountElement()
    {
        return this._amountElement;
    }

    set amountCartPage(selector)
    {
        this._amountCartPage = queryElement(selector);
    }

    get amountCartPage()
    {
        return this._amountCartPage;
    }

    set amountEmpty(selector)
    {
        this._amountEmpty = queryElement(selector);
    }

    get amountEmpty()
    {
        return this._amountEmpty;
    }

    set amountWrapper(selector)
    {
        this._amountWrapper = queryElement(selector);
    }

    get amountWrapper()
    {
        return this._amountWrapper;
    }

    set_quantity_value(quantity)
    {
        if(!this.quantityElement)
        {
            return;
        }
        this.quantityElement.innerHTML = quantity;
    }

    set_amount_value(amount)
    {

        amount = Number(amount);
        if(amount>0)
        {

            if(!this.amountElement)
            {
                const b = document.createElement('b');
                this.amountWrapper.append(b);
                this.amountElement  = this.settings.selectors.amountElement;
            }

            if(this.amountEmpty)
            {
                this.amountEmpty.style.display='none';
            }
            this.amountElement.style = '';
            this.amountElement.innerHTML = `<span class="number-division">${amount}</span> &#8381`;

        }else
            {
                if(!this.amountEmpty)
                {
                    const p = document.createElement('p');
                    this.amountWrapper.append(p);
                    this.amountEmpty  = this.settings.selectors.amountEmpty;
                }
                if(this.amountElement)
                {
                    this.amountElement.style.display = 'none'
                }
                this.amountEmpty.style.display = '';
                this.amountEmpty.innerHTML = this.settings.emptyText;
            }


        if(this.amountCartPage)
        {
            this.amountCartPage.innerHTML = `<span class="number-division">${amount}</span> &#8381`;

        }
        new NumberDivision();
    }

    handler()
    {
        new WordPressAJAX('quantity_in_cart',null,this.set_quantity_value.bind(this));
        new WordPressAJAX('cart_amount',null,this.set_amount_value.bind(this));

    }
}