class CssVariables {
    init() {
        ['load', 'resize'].forEach((listner) => {
            window.addEventListener(listner, this.setCssVars.bind(this));
        });
        ['DOMContentLoaded'].forEach((dom) => {
            window.addEventListener(dom, this.setCssVars.bind(this));
        });
    }


    setCssVars() {
        const scrollBarWidth = window.innerWidth - document.documentElement.clientWidth;
        this.setCssVariable('--scrollbar',scrollBarWidth+'px').setCssVariable('--window-height',window.innerHeight+'px');
    }

    parsePropName(prop) {
        let propName = prop;
        if (prop.slice(0, 2) !== '--') {
            propName = '--' + prop;
        }
        return propName;
    }
    setCssVariable(prop, value) {
        document.documentElement.style.setProperty(this.parsePropName(prop), value);
        return this;
    }
}

export default new CssVariables();