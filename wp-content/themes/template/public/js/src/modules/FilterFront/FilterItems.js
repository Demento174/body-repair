import { Config } from  '../../settings';
import AddHandlerForEvent from "../../Controllers/AddHandlerForEvent";
import {queryElement} from "../../common";
import 'selectize/dist/js/standalone/selectize.min.js';
import Pagination from "../Pagination";

const settings = Config.modules.FilterItems;

export default class FilterItems {
    constructor(options = {})
    {
        this.settings = JSON.stringify(options) == '{}'?settings:options;
        this.markControl = this.settings.selectors.marksControl;
        this.detailControl = this.settings.selectors.detailsControl;
        this.items = this.settings.selectors.items;

        this.handler();
    }

    set markControl(selector)
    {
        this._markControl = $(selector);
    }

    get markControl()
    {
        return this._markControl;
    }

    set detailControl(selector)
    {
        this._detailControl = document.querySelectorAll(selector);
    }

    get detailControl()
    {
        return this._detailControl;
    }

    set items(selector)
    {
        this._items = document.querySelectorAll(selector);
    }

    get items()
    {
        return this._items;
    }

    displayBlockFilter(attributeValue)
    {
        const activeBlock =  document.querySelector(`${this.settings.selectors.filterBlock}[${this.settings.attributeId}="${attributeValue}"]`);
        if(activeBlock)
        {
            activeBlock.style.display = this.settings.displaysStyle.detailsControl;
        }else
            {
                console.log(`Нет блока фильтра с id ${attributeValue}`);
            }
    }

    filterHidden(attribute,id)
    {
        this.items.forEach(item=>
        {
          const arrayId =  item.getAttribute(attribute).split(',');

          if(arrayId.indexOf(id) === -1)
          {
              item.style.display = 'none';

              let attributeNone = item.getAttribute(this.settings.attributeNone);
              item.setAttribute(this.settings.attributeNone,attributeNone !==''?`${attributeNone},${id}`:id);
          }
        });

    }

    handler()
    {

        this.markControl.selectize(
            {
                onChange:(value)=>
                {
                    if(value !== '0')
                    {
                        this.displayBlockFilter(value);
                        this.filterHidden(this.settings.attributeMark,value);
                        new Pagination();
                    }

                }
            }
        );

        new AddHandlerForEvent(this.detailControl,'change',(event)=>{
            this.displayBlockFilter(event.target.getAttribute(this.settings.attributeId));
            this.filterHidden(this.settings.attributeDetail,event.target.getAttribute(this.settings.attributeId));
        });

    }
}