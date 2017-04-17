export default class defaultPage {
    protected id : number = null;
    public constructor()
    {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has("id"))
            this.id =  parseInt(urlParams.get("id"))
        else
            alert("id not defined");
    }

    public populateData = (object: any, selector: JQuery) => {
        console.log(object);
        for (var key in object) {
            if (object.hasOwnProperty(key)) {
                let tmpQ = selector.find("[data-" + key + "]");
                if (tmpQ != null) {
                    tmpQ.text(object[key]);
                }
            }
        }
    }

    public ArrayToJson<T>(ary : any[], key:string) : { string : T } 
    {
        let rtn = {} as { string : T };
        
        if (ary == undefined)
            return rtn;

        ary.forEach(a => {
            rtn[a[key]] = a;
        });

        return rtn;
    }

    public getId = () : number => {
        return this.id;
    }
}   