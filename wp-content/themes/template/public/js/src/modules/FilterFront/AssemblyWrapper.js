import FilterElements from "./FilterElements";
import {arrayBreakdown, convertNodeListToArray} from "../../common";
import AddProductToCart from "../../Controllers/WC/AddProductToCart.js ";
import Pagination from "../Pagination";



export default class AssemblyWrapper extends FilterElements{
    constructor()
    {
        super();
        this.cloneWrapper = this.wrapper;
        this.clearItems();
        this.visibleItems = this.items;

        this.handler();
    }

    set visibleItems(items)
    {
        this._visibleItems = [];

        items = this.sortItems(items);

        items.forEach(item=>
        {
            if(item.style.display !== 'none')
            {
                this._visibleItems.push(item.cloneNode(true));
            }else
                {
                    this.hiddenItems.append(item.cloneNode(true));
                }
        });
    }

    get visibleItems()
    {
        return this._visibleItems;
    }

    set cloneWrapper(wrapper)
    {
        if(!wrapper)
        {
            wrapper = document.createElement('div');
            wrapper.classList.add('wrapper');
        }
        this._cloneWrapper =wrapper;
    }

    get cloneWrapper()
    {
        return this._cloneWrapper;
    }

    clearItems()
    {
        this.mainWrapper.innerHTML = '';
        this.hiddenItems.innerHTML = '';
    }

    sortItems(items)
    {
        items = convertNodeListToArray(items);

        items.sort((a,b)=>{
            const titleA = a.querySelector(this.settings.selectors.itemTitle).innerText;
            const titleB = b.querySelector(this.settings.selectors.itemTitle).innerText;

            if (titleA < titleB){
                return -1;

            }else if (titleA > titleB) {
                return  1;

            }else{
                return 0;

            }

        });

        return items;
    }

    handler()
    {
        let i =1;
        arrayBreakdown(this.visibleItems,this.paginationQuantity).forEach(items=>
        {

            let wrapper = this.cloneWrapper.cloneNode();
            wrapper.setAttribute(this.settingsPagination.attribute,i);
             items.forEach(item=>
             {
                 wrapper.append(item);
             });
            i++;
            this.mainWrapper.append(wrapper);

        });

        new AddProductToCart();
        new Pagination();
    }
}