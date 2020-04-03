import FilterElements from "./FilterElements";
import {getParent} from "../../common";
import AssemblyWrapper from "./AssemblyWrapper";

export default class RemoveFilter extends FilterElements
{
    constructor(id)
    {
        super();
        this.removeBlock = id;
        this.hiddenRemoveBlock();
        this.countFilter = document.querySelectorAll(this.settings.selectors.filterBlock);
        this.handler(id);
    }

    set removeBlock(id)
    {
        this._removeBlock = getParent(
            document.querySelector(`${this.settings.selectors.removeButtons}[${this.settings.attributeId}="${id}"]`),
            this.settings.selectors.removeButtonWrapper
        );
    }

    get removeBlock()
    {
        return this._removeBlock;
    }


    set countFilter(filters)
    {
        this._countFilter = 0;
        filters.forEach(filter=>
        {
            if(filter.style.display !== 'none')
            {
                this._countFilter++;
            }
        });
    }

    get countFilter()
    {
        return this._countFilter;
    }

    hiddenRemoveBlock()
    {
        this.removeBlock.style.display = 'none';
    }


    clearSearch()
    {
        this.searchInput.value = '';
    }

    removerFilterMark()
    {
        console.log("removerFilterMark");
    }

    removerFilterDetail()
    {
        console.log("removerFilterDetail");
    }

    disableRadioButton(id)
    {
        const radioBtn = document.querySelector(`input[type="radio"][${this.settings.attributeId} = "${id}"]`);
        if(radioBtn)
        {
            radioBtn.checked = false;

        }
    }

    disableSelect()
    {
        console.log(this.markControl.setValue(0));
    }

    handler(id)
    {

        if(this.removeBlock.classList.contains(this.settings.selectors.filterBlockMarkClass))
        {
            this.removerFilterMark();

        }else
            {
                this.removerFilterDetail();
            }

        this.items.forEach(item => {

            if(this.countFilter>0)
            {
                let attributeNone = item.getAttribute(this.settings.attributeNone).split(',');

                let attributeActive = item.getAttribute(this.settings.attributeActive).split(',');

                if(attributeNone.indexOf(id) !== -1)
                {
                    attributeNone.splice(attributeNone.indexOf(id),1);

                    item.setAttribute(this.settings.attributeNone,attributeNone.join());
                }

                if(attributeActive.indexOf(id) !== -1)
                {
                    attributeActive.splice(attributeNone.indexOf(id),1);
                    item.setAttribute(this.settings.attributeActive,attributeNone.join());
                }

                if(attributeNone.length > 0 && attributeActive.length === 0)
                {
                    item.style.display = 'none';
                }else if(attributeNone.length === 0 && attributeActive.length > 0)
                {
                    item.style.display='';
                }
            }else
                {
                    item.style.display = '';
                }


        });
        new AssemblyWrapper();

        this.clearSearch();

        this.disableRadioButton(id);

        // this.disableSelect();
    }
}