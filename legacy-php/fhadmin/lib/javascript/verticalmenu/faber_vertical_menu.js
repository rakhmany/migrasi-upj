var menuids=["faber_vertical_menu_tree"] 

function buildsubmenus(){
    for (var i=0; i<menuids.length; i++){
        var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")

        for (var t=0; t<ultags.length; t++){
            ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" 
            if (ultags[t].parentNode.id!=menuids[i]) {
                ultags[t].parentNode.onmouseover=function(){
                    this.getElementsByTagName("ul")[0].style.display="block"
                }
                ultags[t].parentNode.onmouseout=function(){
                    this.getElementsByTagName("ul")[0].style.display="none"
                }
            }
        }
        
        for (var t=ultags.length-1; t>-1; t--){ 
            ultags[t].style.visibility="visible"
            ultags[t].style.display="none"
        }
        
        ultags[0].parentNode.getElementsByTagName("ul")[0].style.display="block"
    }
}

if (window.addEventListener)
window.addEventListener("load", buildsubmenus, false)
else if (window.attachEvent)
window.attachEvent("onload", buildsubmenus)

