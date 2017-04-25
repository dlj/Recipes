import defaultPage from './defaultPage'

class index extends defaultPage {

        public constructor() {
        super();
        this.initializeEvents();
    }
    
    public initializeEvents() : void
    {
        $("#addrecipe").click(event => {
            window.location.assign("?p=recipeeditor");
        });

        $("#editrecipe").click(event => {
            if (this.getId() == undefined)
                return;
            window.location.assign("?p=recipeeditor&id=" + this.getId());
        });
    }
}

let indexPage = new index();
