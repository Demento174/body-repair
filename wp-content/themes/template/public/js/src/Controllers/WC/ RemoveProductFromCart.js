import { WooCommerceConfig } from "../../settings";
import AddHandlerForEvent from "../AddHandlerForEvent";
import WordPressAJAX from "../WordPressAJAX";
import UpdateCart from "./UpdateCart";
import {getParent, queryElement} from "../../common";

const defaultSettings = WooCommerceConfig.RemoveProductFromCart;

export default class RemoveProductFromCart {
    constructor(settings={})
    {
        this.settings =  JSON.stringify(settings) == '{}'?defaultSettings:settings;

        this.buttonsRemove = this.settings.buttonRemove.selector;
        this.attributeId = this.settings.buttonRemove.attributeId;


        if(this.buttonsRemove)
        {
            new AddHandlerForEvent(this.buttonsRemove,'click',event=>{
                const btn = getParent(event.target,this.settings.buttonRemove.selector);

                if(!btn.getAttribute(this.attributeId) )
                {
                    console.error(`${btn} has no id attribute`);
                }else
                {
                    this.handler(btn.getAttribute(this.attributeId),btn);
                }
            });
        }
    }


    set buttonsRemove(selector)
    {
        this._buttonRemove = document.querySelectorAll(selector);
    }

    get buttonsRemove()
    {
        return this._buttonRemove;
    }


    set basketItem(btn)
    {
        this._basketItem = getParent(btn,this.settings.basketItemSelector);
    }

    get basketItem()
    {
        return this._basketItem;
    }

    basketItemRemove()
    {

        if(this.basketItem)
        {
            this.basketItem.remove();
        }
    }

    handler(id,btn)
    {


        this.basketItem =btn;
        new WordPressAJAX('removeFromBasket',
            {
                "key":id,
            },
            this.callback.bind(this)
        );

    }

    callback(response)
    {
        console.log(`Товар Удалён`);
        new UpdateCart();
        this.basketItemRemove();
    }
}