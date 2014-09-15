<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form> 
    <input type="text" name="searchTerms" id="searchterms" class="inptBx" />
    <div id="SuggestionListDiv">
        <ol> 
            <li id="1">sam</li> 
            <li id="2">joe</li> 
            <li id="3">dan</li> 
            <li id="4">tom</li>
            <li id="5">dick</li>
            <li id="">6666</li>
        </ol>
    </div> 
</form>

<script type="text/javascript">
    (function () {
        var searchterms, suggestionList;

        searchterms = document.getElementById('searchterms');
        suggestionList = document.getElementById('SuggestionListDiv');

        if (searchterms && suggestionList) {
            

            searchterms.onfocus = function removeSearchText() { 
                searchterms.value = ""; 
            };

            suggestionList.onclick = function setSearchTerms (e) {
                var targ;
                var e = e || window.event;

                if (e.target) {
                    targ = e.target;
                }
                else if (e.srcElement) {
                    targ = e.srcElement;
                }

                // defeat Safari bug 
                if (targ.nodeType === 3) {
                    targ = targ.parentNode;
                }

                if (targ && targ.tagName.toLowerCase() === 'li' && targ.hasChildNodes()) {
                    searchterms.value = targ.childNodes[0].nodeValue;
                }
            };
        }
    }());
</script>
</body>
</html>