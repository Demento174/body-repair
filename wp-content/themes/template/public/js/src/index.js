import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.js';
import '../../libs/awesome/src.js';
import '../../less/style.less';

import TabController from "./modules/TabsController";
import CarouselWrapper from "./modules/carouselWrapper";
import NumberDivision from "./modules/NumberDivision";
import Forms from "./modules/Forms";
import SwitchingTheClass from "./Controllers/SwitchingTheClass";
import WrapperMap from "./modules/WrapperMap";
import FancyBoxWrapper from "./modules/FancyBoxWrapper";

import { Config } from "./settings";
import HeightBlocksInGrid from "./modules/HeightBlocksInGrid";
import AddHandlerForEvent from "./Controllers/AddHandlerForEvent";
import FilterItems from "./modules/FilterItems";
const settings = Config;

document.addEventListener('DOMContentLoaded',
    ()=>
    {
        console.log('ready');
    });

