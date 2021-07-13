Element.prototype.addClass = function(name){if(!new RegExp(name, "gi").test(this.className)){this.className = this.className+" "+name;}return this;};
Element.prototype.removeClass = function(name){this.className = this.className.replace(new RegExp(name, "gi"), '').replace(/ {2,}/g, ' ').replace(/^ | $/gi, ''); return this;};
var inpChange, lastInp, ajax, Location={locId:'', pincodeId:'', loc:'',pincode:''};
$(document).ready(function(){
    document.getElementById('castocksearchInp').onkeyup = cReg.inputChange;
    document.getElementById('castocksearchInp').onkeydown = cReg.inputKeyDown;

    cReg.casearchCodeList = document.getElementById('casearchCodeList');
    cReg.cityInp = document.getElementById('castocksearchInp');
    cReg.searchResult = document.getElementById('searchResult');
});
var cReg = {
    inputChange: function(e){
        if(!(/^(40|38|13|27|9)$/gi).test(e.keyCode)){
            inpChange?clearTimeout(inpChange):0;
            inpChange = setTimeout(cReg.inpCheckTmo, 300);
        }
    },
    inpCheckTmo: function(){
        var k = document.getElementById('castocksearchInp').value.trim();
        if(k!=lastInp){
            cReg.casearchCodeList.innerHTML = '';
            cReg.ajaxGetStockSuggestion(k);
            lastInp = k;
        }
    },
    ajaxGetStockSuggestion: function(k){
        ajax?ajax.abort():0;
        if(k!=''){
            cReg.cityInp.addClass('checking'); 
            k = k.toLowerCase();
           
                ajax = $.ajax('ajax/getStock.php/?key='+k, {
                success:cReg.ajaxGetStockSuccess, key:k, error:cReg.netWorkErr});

        }else{
            cReg.casearchCodeList.innerHTML = '';
        }
    },
    ajaxGetStockSuccess:function(dt){
        if(dt.status=='success'){

            var a=dt.result || [], b=a.length;
            if(b>0){
                cReg.loadlocations(a, this.key);
            }
        }
    },
    loadlocations: function(data, k){
        var key = this.key || k, a = data.length,b,c;
        
        if(a>0){
           document.getElementById('ca_stocksearch_picker').className = 'stocksearch-selector show'
            b = ''; 
           document.getElementById('casearchCodeList').style.display = 'block';
            for(i=0; i<a; i++){
                c = data[i];
                b += '<li class="stocksearch-name" data-id="'+c.id+'" data-code="">'+
                       
                        c.name+
                    '</li>';
            }
            
            cReg.casearchCodeList.removeClass('hidden').innerHTML = b;
            $(cReg.casearchCodeList).find('li').click(cReg.suggestionClickEvent);
        }else{
            cReg.casearchCodeList.innerHTML = '';
        }
        k = key || ''; 
        if(k!=''){
        }
        $(document).bind('click', cReg.hideSuggesLst);
    },
    suggestionClickEvent: function(){
        cReg.chooseName($(this).attr('data-id'));
    },
    netWorkErr: function(){
        cReg.casearchCodeList.innerHTML = '';
    },
    hideSuggesLst: function(e){
        e.target.id!='casearchCodeList'?cReg.casearchCodeList.innerHTML='':0;
    },
    inputKeyDown: function(e){
        var a,b,c;
        if((/^(40|38|13|27|9)$/gi).test(e.keyCode)){
            if(e.keyCode==27 ||e.keyCode==9){
                cReg.ctySugLst.addClass('hidden').innerHTML = '';
            }else if(e.keyCode==40 || e.keyCode==38){
                b = cReg.casearchCodeList.getElementsByTagName('li'), c=-1, a=b.length;
                if(a>0){
                    for(i=0; i<a; i++){
                        if((/active/gi).test(b[i].className)){
                            c = i;
                            b[i].removeClass('active');
                        }
                    }
                    c += 1*(e.keyCode==40?1:-1);
                    c<0?c=a-1:(c>=a?c=0:0);
                    b[c].addClass('active');
                }
            }else if(e.keyCode==13){
                b = cReg.casearchCodeList.getElementsByClassName('active')[0];
                if(b!=undefined){
                    cReg.chooseName($(b).data('code'),$(b).data('id'));
                }else{
                    return true;
                }
            }
            return false;
        }
    },
    chooseName: function(a){
       
        lastInp = '';
        cReg.casearchCodeList.addClass('hidden').innerHTML = '';
        ajax = $.ajax('ajax/getStockDetails.php/?id='+a, {
                success:cReg.ajaxGetStockDeatilsSuccess, error:cReg.netWorkErr});

    },
    ajaxGetStockDeatilsSuccess:function(dt){
        if(dt.status=='success'){
             cReg.searchResult.addClass('hidden').innerHTML =dt.txt;
          
              
            
        } 
    }

    
}


