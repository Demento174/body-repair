import { Config } from "../settings";
import {queryElement} from "../common";
import AddHandlerForEvent from "../Controllers/AddHandlerForEvent";


export default class LoadMorePortfolio {
    constructor(settings = {})
    {
        this.settings = JSON.stringify(settings) == '{}' ? Config.modules.loadMorePortfolio : settings;
        this.items = this.settings.selectors.items;
        this.button = this.settings.selectors.btn;
        this.styleDisplay = this.items;
        this.count = this.settings.count;

        if (this.items.length > 0) {
            new AddHandlerForEvent(this.button, 'click', () => {
                this.handler();
            });

        }

    }

    set items(selector)
    {
        this._items = document.querySelectorAll(selector);
    }

    get items()
    {
        return this._items;
    }

    set button(selector)
    {
        this._button = queryElement(selector);
    }

    get button()
    {
        return this._button;
    }

    set styleDisplay(items)
    {
        for (let i = 0; i < items.length; i++)
        {

            if (getComputedStyle(items[i]).display !== 'none')
            {
                this._styleDisplay = getComputedStyle(items[i]).display;
                break;
            }
        }
    }

    get styleDisplay()
    {
        return this._styleDisplay;
    }

    hiddenButton()
    {
        let result = true;

        this.items.forEach(item=>
        {
            if(item.style.display === 'none')
            {
                result = false;
            }
        });

        if(result)
        {
            this.button.style.display = 'none';
        }
    }

    handler() {


        let count = 0;
        for (let i = 0; i < this.items.length; i++)
        {

            if (getComputedStyle(this.items[i]).display === 'none')
            {

                count ++;
                this.items[i].style.display = this.styleDisplay;

                if(count >= this.count)
                {
                    break;
                }
            }
        }

        this.hiddenButton();

    }
}