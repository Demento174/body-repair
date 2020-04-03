import { Config } from "../settings";
import {getParent, queryElement} from "../common";
import AddHandlerForEvent from "../Controllers/AddHandlerForEvent";
import HeightBlocksInGrid from "./HeightBlocksInGrid";

export default class Pagination {
    constructor(settings = {})
    {
        this.settings = JSON.stringify(settings) == '{}'?Config.modules.pagination:settings;
        this.attribute = this.settings.attribute;

        this.wrapper = this.settings.selectors.wrapper;
        if(!this.wrapper)
        {
            return;
        }
        this.list = this.settings.selectors.list;
        this.item = `${this.settings.selectors.wrapper} ${this.settings.selectors.item}`;
        this.prev = this.settings.selectors.prev;
        this.next = this.settings.selectors.next;
        this.pages = this.settings.selectors.pages;



        if(this.pages.length > 1)
        {
            if(document.documentElement.clientWidth >= 520)
            {
                new HeightBlocksInGrid([this.settings.selectors.pages]);
            }

            this.assembly(this.pages.length);

            this.visibleWrapper();

            this.items = `${this.settings.selectors.wrapper} ${this.settings.selectors.item}`;

            this.items.forEach(item=>
            {
                new AddHandlerForEvent(item,'click',(event)=>{

                    this.handler(item.getAttribute(this.attribute));
                });
            });

            new AddHandlerForEvent(this.prev,'click',(event)=>{
                event.preventDefault();

                const link = getParent(event.target,'a');

                if(link.getAttribute(this.attribute) >= 1)
                {
                    this.handler(link.getAttribute(this.attribute));
                }
            });

            new AddHandlerForEvent(this.next,'click',(event)=>{

                event.preventDefault();

                const link = getParent(event.target,'a');

                if(link.getAttribute(this.attribute) <= this.pages.length)
                {
                    this.handler(link.getAttribute(this.attribute));
                }

            });



        }else
            {

                this.hiddenWrapper();
            }



        this.setStartDisplayPages();
    }

    set wrapper(selector)
    {
        this._wrapper = queryElement(selector);
    }

    get wrapper()
    {
        return this._wrapper;
    }

    set list(selector)
    {
        this._list = this.wrapper.querySelector(selector);
    }

    get list()
    {
        return this._list;
    }

    set item(selector)
    {
        this._item = this.wrapper.querySelector(selector);
    }

    get item()
    {
        return this._item;
    }

    set items(selector)
    {
        this._items = document.querySelectorAll(selector);
    }

    get items()
    {
        return this._items;
    }

    set activeItem(pageNumber)
    {

        this._activeItem = this.wrapper.querySelector(`${this.settings.selectors.item}[${this.attribute}="${pageNumber}"]`);
    }

    get activeItem()
    {
        return this._activeItem;
    }

    set prev(selector)
    {
        this.wrapper.querySelector(selector).parentNode.replaceChild(this.wrapper.querySelector(selector).cloneNode(true),this.wrapper.querySelector(selector));
        this._prev = this.wrapper.querySelector(selector);
    }

    get prev()
    {
        return this._prev;
    }

    set next(selector)
    {
        this.wrapper.querySelector(selector).parentNode.replaceChild(this.wrapper.querySelector(selector).cloneNode(true),this.wrapper.querySelector(selector));


        this._next = this.wrapper.querySelector(selector);
    }

    get next()
    {
        return this._next;
    }

    set pages(selector)
    {
        this._pages = document.querySelectorAll(selector);
    }

    get pages()
    {
        return this._pages;
    }


    set activePage(pageNumber)
    {
        this._activePage = document.querySelector(`${this.settings.selectors.pages}[${this.attribute}="${pageNumber}"]`);
    }

    get activePage()
    {
        return this._activePage;
    }


    assembly(count)
    {

        const pageLink = this.item.cloneNode();
        pageLink.classList.remove(this.settings.activeClass);
        this.list.innerHTML = '';


        for (let i= 1; i<=count;i++)
        {
            let currentPage = pageLink.cloneNode();

            currentPage.innerText = i;
            currentPage.setAttribute(this.attribute,i);
            if(i === 1)
            {
                currentPage.classList.add(this.settings.activeClass);
            }

            this.list.append(currentPage);

            this.prev.setAttribute(this.attribute,1);
            this.next.setAttribute(this.attribute,2);

            this.prev.style.visibility = 'hidden';

            if(i!== 1)
            {
                this.pages[i-1].style.display = 'none';
            }
        }
    }

    hiddenWrapper()
    {
        this.wrapper.style.display = 'none';
    }

    visibleWrapper()
    {
        this.wrapper.style.display = '';
    }

    activationItem(activeItem)
    {
        this.wrapper.querySelector(`${this.settings.selectors.item}.active`).classList.remove(this.settings.activeClass);
        activeItem.classList.add(this.settings.activeClass);
    }

    setPrevValue(pageNumber)
    {

        if(pageNumber >= 1)
        {
            this.prev.setAttribute(this.attribute,pageNumber);
            this.prev.style.visibility='';
        }else
            {
                this.prev.style.visibility='hidden';
            }
    }

    setNextValue(pageNumber)
    {
        if(pageNumber<=this.pages.length)
        {
            this.next.setAttribute(this.attribute,pageNumber);
            this.next.style.visibility='';
        }else
            {
                this.next.style.visibility='hidden';
            }
    }


    setStartDisplayPages()
    {

        for (let i =0;i< this.pages.length;i++)
        {
            this.pages[i].style.display = i!==0?'none':'block';
        }
    }

    handler(pageNumber)
    {
        this.activePage = pageNumber;
        this.activeItem = pageNumber;

        this.activationItem(this.activeItem);

        this.pages.forEach(item=>
        {
            item.style.display = 'none';
        });

        this._activePage.style.display = 'block';

        this.setPrevValue((Number(pageNumber) - Number(1)));
        this.setNextValue((Number(pageNumber) +Number(1)));
    }


}