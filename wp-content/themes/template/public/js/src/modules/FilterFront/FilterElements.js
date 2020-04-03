import { Config } from  '../../settings';
import {queryElement} from "../../common";

const settings = Config.modules.FilterItems;
const settingsPagination = Config.modules.pagination;

export default class FilterElements {

    constructor(options = {})
    {
        this.settings = JSON.stringify(options) == '{}'?settings:options;
        this.settingsPagination = settingsPagination;

        this.markControl = this.settings.selectors.marksControl;
        this.detailControl = this.settings.selectors.detailsControl;
        this.items = this.settings.selectors.items;



        this.wrapper = this.settings.selectors.wrappers;
        this.mainWrapper = this.settings.selectors.mainWrapper;
        this.hiddenItems = this.settings.selectors.hiddenItems;
        this.removeButtons = this.settings.selectors.removeButtons;
        this.searchBtn = this.settings.selectors.searchBtn;
        this.searchInput = this.settings.selectors.searchInput;
        this.paginationQuantity = this.settings.attributePaginationQuantity;
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

    set paginationQuantity(attribute)
    {
        if(document.querySelector(`[${attribute}]`))
        {
            this._paginationQuantity = document.querySelector(`[${attribute}]`).getAttribute(attribute);
        }else
            {
                this._paginationQuantity = null;
            }
    }

    get paginationQuantity()
    {
        return this._paginationQuantity;
    }

    set wrapper(selector)
    {
        this._wrapper = queryElement(selector);
    }

    get wrapper()
    {
        return this._wrapper;
    }

    set mainWrapper(selector)
    {
        this._mainWrapper = queryElement(selector);
    }

    get mainWrapper()
    {
        return this._mainWrapper;
    }

    set hiddenItems(selector)
    {
        this._hiddenItems = queryElement(selector);
    }

    get hiddenItems()
    {
        return this._hiddenItems;
    }

    set removeButtons(selector)
    {

        this._removeButtons = document.querySelectorAll(selector);
    }

    get removeButtons()
    {
        return this._removeButtons;
    }

    set searchBtn(selector)
    {
        this._searchBtn = queryElement(selector);
    }

    get searchBtn()
    {
        return this._searchBtn;
    }

    set searchInput(selector)
    {
        this._searchInput = queryElement(selector);
    }

    get searchInput()
    {
        return this._searchInput;
    }
}