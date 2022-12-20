window.addEventListener("load", easyTabs, false);

function easyTabs() {

    var groups = document.querySelectorAll('.t-container');

    //if t-container
    if (groups.length > 0) {

        for(i = 0; i < groups.length; i++){
            //tabs
            var tabs = groups[i].querySelectorAll('.t-tab');
            for(t = 0; t < tabs.length; t++){
                tabs[t].setAttribute("index", t+1);
                if(t==0)tabs[t].className="t-tab selected";
            }
            //contents
            var contents = groups[i].querySelectorAll('.t-content');
            for(c = 0; c < contents.length; c++){
                contents[c].setAttribute("index", c+1);
                if(c==0)contents[c].className="t-content selected";
            }
            if(tabs.length!=contents.length) alert('ERROR: \r\nEl número de elementos <li> y <div> de algún grupo de pestañas creado no es el correcto. Por favor, revísalo para corregir el error.');
        }

        //clicks
        var clicks = document.querySelectorAll('.t-tab');
        for(i = 0; i < clicks.length; i++){
            clicks[i].onclick = function() {
                //remove tab selected classes
                var tSiblings = this.parentElement.children;
                for(i = 0; i < tSiblings.length; i++){
                    tSiblings[i].className="t-tab";
                }
                //add tab selected class
                this.className="t-tab selected";
                var idx = this.getAttribute("index");
                if(idx==5)document.getElementById('t-multiple').className='t-container showit';
                else
                if(this.parentElement.parentElement.getAttribute('id')=='t-principal')document.getElementById('t-multiple').className='t-container';
                // selected content
                var cSiblings = this.parentElement.parentElement.querySelectorAll('.t-content');
                for(i = 0; i < cSiblings.length; i++){
                    //remove content selected classes
                    cSiblings[i].className="t-content";
                    //add content selected classes
                    if(cSiblings[i].getAttribute("index")==idx){
                        cSiblings[i].className="t-content selected";
                    }
                }
            };
        }

    }
}

(function() {
    easyTabs() ;
})();