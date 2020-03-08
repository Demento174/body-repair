export function prevAll(element) {
    let result = [];

    while (element = element.previousElementSibling)
    {
        result.push(element);
    }

    return result;
}

export function nextAll(element) {
    let result = [];

    while (element = element.nextElementSibling)
    {
        result.push(element);
    }

    return result;
}


export function queryElement(selectorOrElement) {
    let element;
    if(typeof selectorOrElement === 'string')
    {
        element = document.querySelector(selectorOrElement)
    }else
    {
        element = selectorOrElement;
    }
    return element;
}

export function getParent(elemSelector, parentSelector) {
    const elem = queryElement(elemSelector);
    const parents = document.querySelectorAll(parentSelector);

    for (let i = 0; i < parents.length; i++) {
        const parent = parents[i];

        if (parent.contains(elem)) {
            return parent;
        }
    }

    return null;
}

export function removeClass(elements,className)
{
    elements.forEach(item=>{
        if(item.classList.contains(className))
        {
            item.classList.remove(className);
        }
    });
}
